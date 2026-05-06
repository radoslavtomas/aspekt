/**
 * Tiptap JS Node extension — restores the legacy `awcodes/filament-tiptap-editor`
 * oembed feature on top of Filament v5's bundled RichEditor.
 *
 * This file is a hand-written native ES module with no external imports;
 * it lives directly under `public/` and is served as-is by the web server.
 * No bundler step is required.
 *
 * Filament dynamically `import()`s this module from a URL provided by the PHP
 * `RichContentPlugin::getTipTapJsExtensions()` hook and uses its default
 * export as a Tiptap extension. The editor bundle exposes `@tiptap/core`
 * on `window.FilamentRichEditor.tiptap.core`, so we reuse that instead of
 * shipping a second copy of Tiptap.
 *
 * The schema and parse/render rules mirror the PHP `OembedNode` (see
 * app/Filament/RichContent/Tiptap/OembedNode.php) exactly, so the editor
 * round-trips both the legacy wrapped form
 * (`<div data-{provider}-video><iframe…></iframe></div>`) and the bare
 * `<iframe>` form losslessly.
 *
 * Newly inserted embeds default to the bare `<iframe>` shape, which
 * matches the dominant form already in the database.
 */

const { Node, mergeAttributes } = window.FilamentRichEditor.tiptap.core

const YOUTUBE_HOST = /(^|\.)(youtube\.com|youtu\.be|youtube-nocookie\.com)$/i
const VIMEO_HOST = /(^|\.)vimeo\.com$/i
const YOUTUBE_ID = /^[A-Za-z0-9_-]{6,20}$/

const provider = (url) => {
    let host
    try {
        host = new URL(url).hostname.toLowerCase()
    } catch (e) {
        return null
    }
    if (YOUTUBE_HOST.test(host)) return 'youtube'
    if (VIMEO_HOST.test(host)) return 'vimeo'
    return null
}

const toEmbedUrl = (input) => {
    const trimmed = (input ?? '').toString().trim()
    if (!trimmed) return null
    let url
    try {
        url = new URL(trimmed)
    } catch (e) {
        return null
    }
    const kind = provider(trimmed)
    if (kind === null) return null

    if (kind === 'youtube') {
        const host = url.hostname.toLowerCase()
        let id = null

        if (host.endsWith('youtu.be')) {
            id = url.pathname.replace(/^\//, '').split('/')[0] || null
        } else {
            const m = url.pathname.match(/^\/(?:embed|v|shorts|live)\/([A-Za-z0-9_-]+)/)
            if (m) id = m[1]
            if (!id && url.searchParams.has('v')) id = url.searchParams.get('v')
        }

        if (!id || !YOUTUBE_ID.test(id)) return null

        url.searchParams.delete('v')
        const query = url.searchParams.toString()
        return `https://www.youtube.com/embed/${id}${query ? `?${query}` : ''}`
    }

    // vimeo
    const m = url.pathname.match(/\/(?:video\/)?(\d+)(?:\/|$)/)
    if (!m) return null
    const query = url.searchParams.toString()
    return `https://player.vimeo.com/video/${m[1]}${query ? `?${query}` : ''}`
}

const isSupported = (url) => toEmbedUrl(url) !== null

const Oembed = Node.create({
    name: 'oembed',
    group: 'block',
    atom: true,
    selectable: true,
    draggable: true,

    addAttributes() {
        return {
            src: { default: null },
            wrap: { default: null },
            provider: { default: null },
            width: { default: null },
            height: { default: null },
            style: { default: null },
            allow: { default: null },
            allowfullscreen: { default: null },
        }
    },

    parseHTML() {
        return [
            {
                tag: 'div[data-youtube-video]',
                priority: 60,
                getAttrs: (node) => readWrapper(node, 'youtube'),
            },
            {
                tag: 'div[data-vimeo-video]',
                priority: 60,
                getAttrs: (node) => readWrapper(node, 'vimeo'),
            },
            {
                tag: 'iframe[src]',
                priority: 60,
                getAttrs: (node) => readIframe(node),
            },
        ]
    },

    renderHTML({ node, HTMLAttributes }) {
        const attrs = node.attrs ?? {}
        const src = toEmbedUrl(attrs.src ?? '')
        if (!src) return null

        const iframeAttrs = pickDefined({
            src,
            width: attrs.width,
            height: attrs.height,
            allowfullscreen: attrs.allowfullscreen,
            allow: attrs.allow,
            style: attrs.style,
        })

        const iframe = ['iframe', mergeAttributes(iframeAttrs)]

        if (attrs.wrap !== 'wrapper') {
            return iframe
        }

        const kind = attrs.provider ?? provider(src) ?? 'youtube'

        return [
            'div',
            mergeAttributes({ [`data-${kind}-video`]: 'true', class: 'responsive' }),
            iframe,
        ]
    },

    addCommands() {
        return {
            setOembed:
                (options = {}) =>
                ({ commands }) => {
                    const url = (options.url ?? '').toString().trim()
                    const src = toEmbedUrl(url)
                    if (!src) return false

                    // Defaults match the legacy `awcodes/filament-tiptap-editor`
                    // output so newly inserted embeds render the same way as
                    // existing rows on the public site (which uses `v-html`).
                    return commands.insertContent({
                        type: this.name,
                        attrs: {
                            src,
                            wrap: options.wrap ?? null,
                            provider: provider(src),
                            width: options.width ?? '1600',
                            height: options.height ?? '900',
                            style: options.style ?? 'aspect-ratio:16/9; width: 100%; height: auto;',
                            allow: options.allow ?? 'autoplay; fullscreen; picture-in-picture',
                            allowfullscreen: options.allowfullscreen ?? 'true',
                        },
                    })
                },
            unsetOembed:
                () =>
                ({ commands, state }) => {
                    const { selection } = state
                    if (selection.node?.type?.name === this.name) {
                        return commands.deleteSelection()
                    }
                    return false
                },
        }
    },
})

function readWrapper(domNode, expectedProvider) {
    if (!(domNode instanceof Element)) return false
    const iframe = domNode.querySelector('iframe[src]')
    if (!iframe) return false

    const src = iframe.getAttribute('src') ?? ''
    if (!isSupported(src)) return false

    return {
        src,
        wrap: 'wrapper',
        provider: domNode.hasAttribute('data-vimeo-video') ? 'vimeo' : expectedProvider,
        width: iframe.getAttribute('width') || null,
        height: iframe.getAttribute('height') || null,
        style: iframe.getAttribute('style') || null,
        allow: iframe.getAttribute('allow') || null,
        allowfullscreen: iframe.getAttribute('allowfullscreen') || null,
    }
}

function readIframe(domNode) {
    if (!(domNode instanceof Element)) return false

    // The wrapper rules above match first and consume the inner <iframe>
    // as part of the wrapper subtree. Skip iframes whose immediate parent
    // is one of those wrappers so we don't produce a duplicate node.
    const parent = domNode.parentElement
    if (
        parent &&
        parent.tagName === 'DIV' &&
        (parent.hasAttribute('data-youtube-video') || parent.hasAttribute('data-vimeo-video'))
    ) {
        return false
    }

    const src = domNode.getAttribute('src') ?? ''
    if (!isSupported(src)) return false

    return {
        src,
        wrap: null,
        provider: provider(src),
        width: domNode.getAttribute('width') || null,
        height: domNode.getAttribute('height') || null,
        style: domNode.getAttribute('style') || null,
        allow: domNode.getAttribute('allow') || null,
        allowfullscreen: domNode.getAttribute('allowfullscreen') || null,
    }
}

function pickDefined(obj) {
    const out = {}
    for (const key of Object.keys(obj)) {
        const value = obj[key]
        if (value !== null && value !== undefined && value !== '') {
            out[key] = value
        }
    }
    return out
}

export default Oembed
