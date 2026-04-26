<?php

namespace App\Filament\Concerns;

/**
 * Shared toolbar configuration for content-style RichEditor fields used across
 * Blog, Book, Event, People (and any future content resource).
 *
 * Mirrors as much of the historical Tiptap "custom" profile as Filament's
 * native RichEditor supports out of the box. Tools that have no v4 built-in
 * equivalent (lead, small, color, highlight, oembed, grid-builder, details,
 * checked-list, hr) are intentionally omitted; they would require a custom
 * RichContentPlugin to reintroduce.
 */
trait HasRichContentToolbar
{
    /**
     * @return array<int, array<int, string>>
     */
    protected static function richContentToolbar(): array
    {
        return [
            ['bold', 'italic', 'underline', 'strike'],
            ['h1', 'h2', 'h3'],
            ['alignStart', 'alignCenter', 'alignEnd'],
            ['blockquote', 'bulletList', 'orderedList'],
            ['table', 'link', 'attachFiles'],
            ['undo', 'redo'],
        ];
    }
}
