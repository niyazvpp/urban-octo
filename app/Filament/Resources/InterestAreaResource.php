<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InterestAreaResource\Pages;
use App\Filament\Resources\InterestAreaResource\RelationManagers;
use App\Models\InterestArea;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InterestAreaResource extends Resource
{
    protected static ?string $model = InterestArea::class;
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\FileUpload::make('image')
                        ->directory('interestedArea')
                        ->image(),
                    Forms\Components\Textarea::make('description')
                        ->columnSpanFull(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListInterestAreas::route('/'),
            // 'create' => Pages\CreateInterestArea::route('/create'),
            // 'edit' => Pages\EditInterestArea::route('/{record}/edit'),
        ];
    }
    public static function canViewAny(): bool
    {
        return auth()->guard('admin')->user()->isSuperAdmin();
    }
}
