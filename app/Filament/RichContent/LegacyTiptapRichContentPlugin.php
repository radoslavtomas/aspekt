<?php

namespace App\Filament\RichContent;

use Filament\Forms\Components\RichEditor\Plugins\Contracts\RichContentPlugin;
use Filament\Forms\Components\RichEditor\RichEditorTool;
use Filament\Support\Icons\Heroicon;
use Tiptap\Nodes\TaskItem;
use Tiptap\Nodes\TaskList;

/**
 * Restores tools that the legacy `awcodes/filament-tiptap-editor` package
 * provided but Filament v5's RichEditor does not ship by default.
 *
 * Currently restored:
 * - `taskList` — interactive checked-list / task-list. Filament's bundled
 *   editor JS already includes the `toggleTaskList` command and TaskList /
 *   TaskItem nodes, so a simple jsHandler tool is enough on the front end.
 *   The matching PHP TipTap extensions are registered so server-side
 *   rendering of stored content (via RichContentRenderer) keeps working.
 *
 * Not restored (intentional — they require a bundled Tiptap JS extension
 * that goes beyond a single PHP plugin class):
 * - `oembed` — embedding remote video / iframe content. Filament's bundled
 *   editor schema does not allow `<iframe>` nodes, so re-introducing this
 *   would mean shipping a custom Tiptap JS extension via FilamentAsset and
 *   wiring up an URL modal action. The hooks for that are documented in
 *   getTipTapJsExtensions() below.
 */
class LegacyTiptapRichContentPlugin implements RichContentPlugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    /**
     * @return array<\Tiptap\Core\Extension|\Tiptap\Core\Node|\Tiptap\Core\Mark>
     */
    public function getTipTapPhpExtensions(): array
    {
        // PHP-side TipTap nodes required so that content saved with task lists
        // (either by this plugin's toolbar tool or by the legacy editor)
        // round-trips correctly through RichContentRenderer.
        return [
            app(TaskList::class),
            app(TaskItem::class),
        ];
    }

    /**
     * @return array<string>
     */
    public function getTipTapJsExtensions(): array
    {
        // Return URLs to JS files that should be loaded into the editor.
        //
        // Example for adding an oembed/iframe Tiptap node in future:
        //
        //     return [
        //         FilamentAsset::getScriptSrc('rich-content-plugins/oembed'),
        //     ];
        //
        // The script needs to be registered via FilamentAsset::register() in a
        // service provider, and the file itself must define a Tiptap Node and
        // attach it to the editor instance Filament exposes on window.
        return [];
    }

    /**
     * @return array<RichEditorTool>
     */
    public function getEditorTools(): array
    {
        return [
            // Filament's bundled rich-editor.js already ships TaskList /
            // TaskItem nodes plus the `toggleTaskList` command, so a thin
            // jsHandler is enough.
            RichEditorTool::make('taskList')
                ->label('Task list')
                ->icon(Heroicon::OutlinedClipboardDocumentList)
                ->jsHandler('$getEditor()?.chain().focus().toggleTaskList().run()'),
        ];
    }

    /**
     * @return array<\Filament\Actions\Action>
     */
    public function getEditorActions(): array
    {
        return [];
    }
}
