<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Tabs::make()
                    ->contained(false)
                    ->tabs([
                        Tab::make('Aparência')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Group::make([
                                            FileUpload::make('logo')
                                                ->label('Logo')
                                                ->avatar(),

                                            TextInput::make('slug')
                                                ->label('Slug')
                                                ->prefix('https://linknabio.com/')
                                                ->required(),

                                            TextInput::make('title')
                                                ->label('Título'),

                                            Textarea::make('description')
                                                ->label('Descrição')
                                                ->rows(5),

                                            Fieldset::make('Aparência Geral')
                                                ->schema([
                                                    ColorPicker::make('background_color')
                                                        ->label('Cor de Fundo'),

                                                    ColorPicker::make('text_color')
                                                        ->label('Cor do Texto'),

                                                    ColorPicker::make('link_background_color')
                                                        ->label('Cor do Fundo do Link'),

                                                    ColorPicker::make('link_text_color')
                                                        ->label('Cor do Texto do Link'),

                                                    ToggleButtons::make('link_border_radius')
                                                        ->label('Estilo de borda do Link')
                                                        ->options([
                                                            '0rem' => 'Quadrada',
                                                            '0.5rem' => 'Arredondada',
                                                            '3rem' => 'Circular',
                                                        ])
                                                        ->inline()
                                                        ->default('0rem')
                                                        ->columnSpanFull(),
                                                ]),
                                        ]),

                                        Section::make()
                                            ->schema([
                                                View::make('filament.resources.pages.preview'),
                                            ])
                                            ->columnSpan(1),
                                    ])->columns(2),
                            ]),

                        Tab::make('Links')
                            ->schema([
                                Section::make()
                                    ->schema([
                                        Repeater::make('links')
                                            ->label(false)
                                            ->addActionLabel('Adicionar link')
                                            ->relationship()
                                            ->schema([
                                                TextInput::make('title')
                                                    ->label('Título')
                                                    ->required(),

                                                TextInput::make('url')
                                                    ->label('URL')
                                                    ->url()
                                                    ->required(),

                                                Fieldset::make('Aparência Individual')
                                                    ->schema([
                                                        ColorPicker::make('background_color')
                                                            ->label('Cor de Fundo'),

                                                        ColorPicker::make('text_color')
                                                            ->label('Cor do Texto'),

                                                        ToggleButtons::make('border_radius')
                                                            ->label('Estilo de borda')
                                                            ->options([
                                                                '0rem' => 'Quadrada',
                                                                '0.5rem' => 'Arredondada',
                                                                '3rem' => 'Circular',
                                                            ])
                                                            ->inline()
                                                            ->columnSpanFull()
                                                            ->default('0rem'),
                                                    ])
                                                    ->columns(2),
                                            ])
                                            ->collapsible()
                                            ->reorderable()
                                            ->orderColumn('sort')
                                            ->reorderableWithDragAndDrop(),

                                        Section::make()
                                            ->schema([
                                                View::make('filament.resources.pages.preview'),
                                            ])
                                            ->columnSpan(1),
                                    ])->columns(2),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Título'),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->prefix('https://linknabio.com/')
                    ->url(
                        url: fn (TextColumn $component, string $state) => $component->getPrefix().$state,
                        shouldOpenInNewTab: true,
                    ),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
