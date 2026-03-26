<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Articles';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Content')->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation === 'create') {
                            $set('slug', Str::slug($state));
                        }
                    }),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(Article::class, 'slug', ignoreRecord: true)
                    ->helperText('Auto-generated from title. Edit if needed.'),

                Forms\Components\Textarea::make('excerpt')
                    ->rows(3)
                    ->maxLength(500)
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('body')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike',
                        'h2', 'h3', 'bulletList', 'orderedList',
                        'link', 'blockquote', 'undo', 'redo',
                    ]),
            ])->columns(2),

            Forms\Components\Section::make('Classification')->schema([
                Forms\Components\Select::make('category')
                    ->options([
                        'AI News'   => 'AI News',
                        'AI Models' => 'AI Models',
                        'Research'  => 'Research',
                        'Products'  => 'Products',
                        'Tools'     => 'Tools',
                    ])
                    ->default('AI News')
                    ->required(),

                Forms\Components\TextInput::make('source_name')
                    ->maxLength(255),

                Forms\Components\TextInput::make('author')
                    ->maxLength(255),

                Forms\Components\TextInput::make('source_url')
                    ->url()
                    ->maxLength(2048)
                    ->label('Source URL'),

                Forms\Components\TextInput::make('image_url')
                    ->url()
                    ->maxLength(2048)
                    ->label('Image URL'),
            ])->columns(2),

            Forms\Components\Section::make('Publishing')->schema([
                Forms\Components\Toggle::make('is_published')
                    ->label('Published')
                    ->default(true),

                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Published At')
                    ->default(now()),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(60)
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color('primary')
                    ->searchable(),

                Tables\Columns\TextColumn::make('source_name')
                    ->searchable()
                    ->label('Source')
                    ->placeholder('—'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime('M d, Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'AI News'   => 'AI News',
                        'AI Models' => 'AI Models',
                        'Research'  => 'Research',
                        'Products'  => 'Products',
                        'Tools'     => 'Tools',
                    ]),

                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Published status')
                    ->trueLabel('Published only')
                    ->falseLabel('Unpublished only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('published_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit'   => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
