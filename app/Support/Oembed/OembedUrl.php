<?php

namespace App\Support\Oembed;

/**
 * Pure URL helper for the legacy `oembed` RichEditor tool.
 *
 * Only YouTube and Vimeo URLs are supported. Anything else is rejected
 * by `isSupported()` so the editor's modal validation, the JS extension's
 * `parseHTML` rule and the PHP TipTap node all share the same definition
 * of "trusted embeddable URL".
 */
class OembedUrl
{
    /**
     * Returns 'youtube', 'vimeo' or null.
     */
    public static function provider(string $url): ?string
    {
        $host = strtolower((string) parse_url(trim($url), PHP_URL_HOST));

        if ($host === '') {
            return null;
        }

        if (preg_match('/(^|\.)(youtube\.com|youtu\.be|youtube-nocookie\.com)$/', $host)) {
            return 'youtube';
        }

        if (preg_match('/(^|\.)(vimeo\.com)$/', $host)) {
            return 'vimeo';
        }

        return null;
    }

    public static function isSupported(string $url): bool
    {
        return self::toEmbedUrl($url) !== null;
    }

    /**
     * Normalise the input URL to a canonical embed URL or return null
     * if the URL cannot be safely embedded.
     *
     * The canonical YouTube form is https://www.youtube.com/embed/<id>
     * (matches the legacy `awcodes/filament-tiptap-editor` shape that's
     * already in the database). Vimeo canonicalises to
     * https://player.vimeo.com/video/<id>.
     *
     * Existing query parameters from the input are preserved.
     */
    public static function toEmbedUrl(string $url): ?string
    {
        $url = trim($url);

        if ($url === '') {
            return null;
        }

        $parts = parse_url($url);

        if (! is_array($parts) || empty($parts['host'])) {
            return null;
        }

        $provider = self::provider($url);

        if ($provider === null) {
            return null;
        }

        $query = $parts['query'] ?? null;

        if ($provider === 'youtube') {
            $id = self::extractYoutubeId($parts);

            if ($id === null) {
                return null;
            }

            // Drop `v=<id>` from preserved query string since the ID has
            // moved into the path.
            $query = self::stripQueryKeys($query, ['v']);

            return self::buildUrl(
                'https://www.youtube.com/embed/' . $id,
                $query,
            );
        }

        // vimeo
        $id = self::extractVimeoId($parts);

        if ($id === null) {
            return null;
        }

        return self::buildUrl(
            'https://player.vimeo.com/video/' . $id,
            $query,
        );
    }

    /**
     * @param  array<string, string|null>  $parts
     */
    private static function extractYoutubeId(array $parts): ?string
    {
        $host = strtolower((string) ($parts['host'] ?? ''));
        $path = (string) ($parts['path'] ?? '');
        $query = (string) ($parts['query'] ?? '');

        // youtu.be/<id>
        if (str_ends_with($host, 'youtu.be')) {
            $candidate = ltrim($path, '/');
            $candidate = explode('/', $candidate)[0] ?? '';

            return self::sanitiseYoutubeId($candidate);
        }

        // /embed/<id>, /v/<id>, /shorts/<id>, /live/<id>
        if (preg_match('#^/(?:embed|v|shorts|live)/([A-Za-z0-9_-]+)#', $path, $matches)) {
            return self::sanitiseYoutubeId($matches[1]);
        }

        // /watch?v=<id>
        if ($query !== '') {
            parse_str($query, $params);

            if (isset($params['v']) && is_string($params['v'])) {
                return self::sanitiseYoutubeId($params['v']);
            }
        }

        return null;
    }

    /**
     * @param  array<string, string|null>  $parts
     */
    private static function extractVimeoId(array $parts): ?string
    {
        $path = (string) ($parts['path'] ?? '');

        // /video/<id> or /<id>
        if (preg_match('#/(?:video/)?(\d+)(?:/|$)#', $path, $matches)) {
            return $matches[1];
        }

        return null;
    }

    private static function sanitiseYoutubeId(string $id): ?string
    {
        return preg_match('/^[A-Za-z0-9_-]{6,20}$/', $id) === 1 ? $id : null;
    }

    private static function stripQueryKeys(?string $query, array $keys): ?string
    {
        if ($query === null || $query === '') {
            return null;
        }

        parse_str($query, $params);

        foreach ($keys as $key) {
            unset($params[$key]);
        }

        if ($params === []) {
            return null;
        }

        return http_build_query($params);
    }

    private static function buildUrl(string $base, ?string $query): string
    {
        return $query !== null && $query !== ''
            ? $base . '?' . $query
            : $base;
    }
}
