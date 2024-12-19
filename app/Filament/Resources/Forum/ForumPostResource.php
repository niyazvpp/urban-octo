<?php

namespace App\Filament\Resources\Forum;

use App\Filament\Resources\Forum\ForumPostResource\Pages;
use App\Filament\Resources\Forum\ForumPostResource\RelationManagers;
use App\Models\Forum\ForumPost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class ForumPostResource extends Resource
{
    protected static ?string $model = ForumPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Forum';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->reactive()
                    ->afterStateUpdated(function (?string $state, callable $set, callable $get) {
                        // Check if the slug has been manually edited
                        $isSlugManuallyEdited = $get('is_slug_manually_edited') ?? false;

                        // Only update slug if it hasn't been manually edited
                        if (!$isSlugManuallyEdited) {
                            $set('slug', $state ? Str::slug($state) : '');
                        }
                    }),
                // Forms\Components\TextInput::make('type')
                //     ->required(),
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->columnSpanFull()
                    ->default(30)
                    ->required(),
                Forms\Components\Select::make('forum_category_id')
                    ->relationship('category', 'name')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->reactive()
                    ->afterStateUpdated(function (?string $state, callable $set, callable $get) {
                        // Prevent feedback loop by only setting the manual edit flag
                        if ($state !== $get('slug')) {
                            $set('is_slug_manually_edited', true);
                        }
                    }),

                Forms\Components\Hidden::make('is_slug_manually_edited')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('forum_category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListForumPosts::route('/'),
            'create' => Pages\CreateForumPost::route('/create'),
            'edit' => Pages\EditForumPost::route('/{record}/edit'),
        ];
    }
}
