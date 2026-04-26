<?php

namespace App\Filament\Concerns;

use App\Filament\RichContent\LegacyTiptapRichContentPlugin;
use Filament\Forms\Components\RichEditor\Plugins\Contracts\RichContentPlugin;

/**
 * Shared RichEditor configuration for content-style fields used across the
 * Blog, Book, Event, People (and Page) resources.
 *
 * Restores the historical Tiptap "custom" profile from the deprecated
 * `awcodes/filament-tiptap-editor` plugin as faithfully as possible by
 * combining Filament v5's built-in tools (heading levels, alignment,
 * highlight, lead, small, horizontalRule, details, grid, textColor,
 * clearFormatting, ...) with a small custom plugin that adds checked
 * task lists.
 *
 * The only original tool genuinely not restored is `oembed`, which would
 * require shipping a custom Tiptap JS extension; see
 * App\Filament\RichContent\LegacyTiptapRichContentPlugin for hooks.
 */
trait HasRichContentToolbar
{
    /**
     * @return array<int, array<int, string>>
     */
    protected static function richContentToolbar(): array
    {
        return [
            ['bold', 'italic', 'underline', 'strike', 'highlight'],
            ['h1', 'h2', 'h3', 'lead', 'small'],
            ['alignStart', 'alignCenter', 'alignEnd', 'alignJustify'],
            ['textColor', 'clearFormatting'],
            ['blockquote', 'bulletList', 'orderedList', 'taskList', 'horizontalRule'],
            ['link', 'table', 'grid', 'details', 'attachFiles'],
            ['undo', 'redo'],
        ];
    }

    /**
     * @return array<RichContentPlugin>
     */
    protected static function richContentPlugins(): array
    {
        return [
            LegacyTiptapRichContentPlugin::make(),
        ];
    }
}
