<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpecialQualificationResource\Pages;
use App\Filament\Resources\SpecialQualificationResource\RelationManagers;
use App\Models\SpecialQualification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SpecialQualificationResource extends Resource
{
    protected static ?string $model = SpecialQualification::class;
    protected static ?string $modelLabel = "Qualifications";
    protected static ?string $navigationIcon = "heroicon-o-check-badge";
    protected static ?int $navigationSort = 2;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Qualification Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')

                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('qualification_id')
                    ->label('General qualification')
                    ->relationship('qualification', 'name')
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('qualification.name')
                    ->label('General qualification')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListSpecialQualifications::route('/'),
            // 'create' => Pages\CreateSpecialQualification::route('/create'),
            // 'edit' => Pages\EditSpecialQualification::route('/{record}/edit'),
        ];
    }
    public static function canViewAny(): bool
    {
        return auth()->guard('admin')->user()->isSuperAdmin();
    }
}
