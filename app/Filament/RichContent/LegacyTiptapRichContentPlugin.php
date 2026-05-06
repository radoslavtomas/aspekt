<?php

namespace App\Filament\RichContent;

use App\Filament\RichContent\Tiptap\OembedNode;
use App\Support\Oembed\OembedUrl;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\RichEditor\EditorCommand;
use Filament\Forms\Components\RichEditor\Plugins\Contracts\RichContentPlugin;
use Filament\Forms\Components\RichEditor\RichEditorTool;
use Filament\Forms\Components\TextInput;
use Filament\Support\Enums\Width;
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
 * - `oembed` — YouTube/Vimeo iframe embeds. Provided by `OembedNode` on
 *   the PHP side and `public/js/filament/rich-content/oembed.js` on the
 *   front end. A modal action collects the URL, validates it via
 *   `OembedUrl::isSupported()`, and dispatches the JS `setOembed` command.
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
        // PHP-side TipTap nodes required so that content saved with task
        // lists or oembed iframes round-trips correctly through
        // RichContentRenderer.
        return [
            app(TaskList::class),
            app(TaskItem::class),
            app(OembedNode::class),
        ];
    }

    /**
     * @return array<string>
     */
    public function getTipTapJsExtensions(): array
    {
        return [
            $this->oembedScriptUrl(),
        ];
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

            RichEditorTool::make('oembed')
                ->label('Embed video')
                ->icon(Heroicon::OutlinedFilm)
                ->action('oembed'),
        ];
    }

    /**
     * @return array<\Filament\Actions\Action>
     */
    public function getEditorActions(): array
    {
        return [
            $this->oembedAction(),
        ];
    }

    private function oembedAction(): Action
    {
        return Action::make('oembed')
            ->label('Embed video')
            ->modalHeading('Embed video')
            ->modalDescription('Only YouTube and Vimeo URLs are supported.')
            ->modalWidth(Width::Large)
            ->fillForm(fn (array $arguments): array => [
                'url' => $arguments['url'] ?? null,
            ])
            ->schema([
                TextInput::make('url')
                    ->label('Video URL')
                    ->required()
                    ->inputMode('url')
                    ->placeholder('https://www.youtube.com/watch?v=…')
                    ->rule(static function () {
                        return static function (string $attribute, mixed $value, \Closure $fail): void {
                            if (! is_string($value) || ! OembedUrl::isSupported($value)) {
                                $fail('Only YouTube or Vimeo URLs are supported.');
                            }
                        };
                    }),
            ])
            ->action(function (array $arguments, array $data, RichEditor $component): void {
                $component->runCommands(
                    [
                        EditorCommand::make(
                            'setOembed',
                            arguments: [[
                                'url' => $data['url'],
                            ]],
                        ),
                    ],
                    editorSelection: $arguments['editorSelection'] ?? null,
                );
            });
    }

    private function oembedScriptUrl(): string
    {
        $relative = 'js/filament/rich-content/oembed.js';
        $absolute = public_path($relative);
        $version = is_file($absolute) ? (string) filemtime($absolute) : '0';

        return asset($relative) . '?v=' . $version;
    }
}
