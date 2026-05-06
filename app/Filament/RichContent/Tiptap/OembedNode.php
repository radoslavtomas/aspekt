<?php

namespace App\Filament\RichContent\Tiptap;

use App\Support\Oembed\OembedUrl;
use DOMElement;
use Tiptap\Core\Node;

/**
 * TipTap PHP node that mirrors the legacy `awcodes/filament-tiptap-editor`
 * oembed markup used in the existing database content.
 *
 * Two stored shapes are recognised:
 *   1. The wrapped form (≈13 blog rows):
 *        <div data-youtube-video="true" class="responsive">
 *            <iframe src="https://www.youtube.com/embed/<id>" .../>
 *        </div>
 *   2. The bare form (the majority of legacy content):
 *        <iframe src="https://www.youtube.com/embed/<id>" .../>
 *
 * The node tracks which shape it was loaded in via the `wrap` attribute
 * (`'wrapper'` or `null`) and re-emits the same shape on render so that
 * existing rows are byte-equivalent after a no-op edit.
 */
class OembedNode extends Node
{
    public static $name = 'oembed';

    public static $priority = 110;

    public function addOptions()
    {
        return [
            'HTMLAttributes' => [],
        ];
    }

    public function addAttributes()
    {
        // Attributes are populated via the parseHTML rules' `getAttrs`
        // callbacks below, so per-attribute parseHTML callbacks are
        // intentionally omitted. We only declare them here so the schema
        // round-trip preserves their values.
        return [
            'src' => ['default' => null, 'rendered' => false],
            'wrap' => ['default' => null, 'rendered' => false],
            'provider' => ['default' => null, 'rendered' => false],
            'width' => ['default' => null, 'rendered' => false],
            'height' => ['default' => null, 'rendered' => false],
            'style' => ['default' => null, 'rendered' => false],
            'allow' => ['default' => null, 'rendered' => false],
            'allowfullscreen' => ['default' => null, 'rendered' => false],
        ];
    }

    public function parseHTML()
    {
        return [
            [
                'tag' => 'div[data-youtube-video]',
                'priority' => 60,
                'getAttrs' => fn ($DOMNode) => $this->parseWrapperAttrs($DOMNode),
            ],
            [
                'tag' => 'div[data-vimeo-video]',
                'priority' => 60,
                'getAttrs' => fn ($DOMNode) => $this->parseWrapperAttrs($DOMNode),
            ],
            [
                'tag' => 'iframe[src]',
                'priority' => 60,
                'getAttrs' => fn ($DOMNode) => $this->parseIframeAttrs($DOMNode),
            ],
        ];
    }

    public function renderHTML($node, $HTMLAttributes = [])
    {
        $attrs = is_object($node->attrs ?? null) ? (array) $node->attrs : [];

        $src = isset($attrs['src']) ? OembedUrl::toEmbedUrl((string) $attrs['src']) : null;

        if ($src === null) {
            // Defence in depth: if the URL ever fails normalisation we
            // emit nothing rather than render an unsanitised iframe.
            return null;
        }

        $iframeAttrs = array_filter([
            'src' => $src,
            'width' => $attrs['width'] ?? null,
            'height' => $attrs['height'] ?? null,
            'allowfullscreen' => $attrs['allowfullscreen'] ?? null,
            'allow' => $attrs['allow'] ?? null,
            'style' => $attrs['style'] ?? null,
        ], fn ($value) => $value !== null && $value !== '');

        $iframe = ['iframe', $iframeAttrs, 0];

        if (($attrs['wrap'] ?? null) !== 'wrapper') {
            return $iframe;
        }

        $provider = $attrs['provider'] ?? OembedUrl::provider($src) ?? 'youtube';

        return [
            'div',
            [
                'data-' . $provider . '-video' => 'true',
                'class' => 'responsive',
            ],
            $iframe,
        ];
    }

    /**
     * @return array<string, mixed>|false
     */
    private function parseWrapperAttrs($DOMNode)
    {
        if (! $DOMNode instanceof DOMElement) {
            return false;
        }

        $iframe = $DOMNode->getElementsByTagName('iframe')->item(0);

        if (! $iframe instanceof DOMElement) {
            return false;
        }

        $src = $iframe->getAttribute('src');

        if (! OembedUrl::isSupported($src)) {
            return false;
        }

        $provider = $DOMNode->hasAttribute('data-vimeo-video') ? 'vimeo' : 'youtube';

        return [
            'src' => $src,
            'wrap' => 'wrapper',
            'provider' => $provider,
            'width' => $iframe->getAttribute('width') ?: null,
            'height' => $iframe->getAttribute('height') ?: null,
            'style' => $iframe->getAttribute('style') ?: null,
            'allow' => $iframe->getAttribute('allow') ?: null,
            'allowfullscreen' => $iframe->getAttribute('allowfullscreen') ?: null,
        ];
    }

    /**
     * @return array<string, mixed>|false
     */
    private function parseIframeAttrs($DOMNode)
    {
        if (! $DOMNode instanceof DOMElement) {
            return false;
        }

        // The wrapper rules above run first thanks to a higher priority
        // and parse the whole `<div data-…-video>…<iframe></iframe></div>`
        // subtree. The DOM parser then descends into the wrapper's
        // children, so we have to ignore iframes whose immediate parent
        // is one of those wrappers — otherwise we'd produce a duplicate
        // node nested inside the wrapper.
        $parent = $DOMNode->parentNode;

        if ($parent instanceof DOMElement && $parent->nodeName === 'div'
            && ($parent->hasAttribute('data-youtube-video') || $parent->hasAttribute('data-vimeo-video'))) {
            return false;
        }

        $src = $DOMNode->getAttribute('src');

        if (! OembedUrl::isSupported($src)) {
            return false;
        }

        return [
            'src' => $src,
            'wrap' => null,
            'provider' => OembedUrl::provider($src),
            'width' => $DOMNode->getAttribute('width') ?: null,
            'height' => $DOMNode->getAttribute('height') ?: null,
            'style' => $DOMNode->getAttribute('style') ?: null,
            'allow' => $DOMNode->getAttribute('allow') ?: null,
            'allowfullscreen' => $DOMNode->getAttribute('allowfullscreen') ?: null,
        ];
    }
}
