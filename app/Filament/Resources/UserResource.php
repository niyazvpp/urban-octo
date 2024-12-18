<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\InterestAreasRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\SpecialQualificationsRelationManager;
use App\Models\Admin;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
// use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;


    protected static ?string $navigationIcon = 'heroicon-o-user';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('dob')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y'),
                        Forms\Components\TextInput::make('phone_number')
                            ->tel()
                            ->minLength(10)
                            ->maxLength(10)
                            ->default(+91),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                                'Other' => 'Other',
                            ])
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('marital_status')
                            ->native(false)
                            ->options([
                                'Single' => 'Single',
                                'Married' => 'Married',
                                'Divorced' => 'Divorced',
                                'Widowed' => 'Widowed',
                                'Other' => 'Other',
                            ]),
                        Forms\Components\FileUpload::make('avatar')
                            ->directory('userImages')
                            ->columnSpanFull(),
                        Forms\Components\Select::make('state_id')
                            ->relationship('state', 'name')
                            ->native(false)
                            ->live()
                            ->preload()
                            ->searchable()
                            ->afterStateUpdated(fn(Set $set) => $set('mahall', null))
                            ->required()
                            ->default(12),
                        Forms\Components\Select::make('mahall')
                            ->options(fn(Get $get) => Admin::query()
                                ->where('state_id', $get('state_id'))
                                ->where('role', 'admin')  // Add this line to filter by role
                                ->pluck('name', 'id'))
                            ->native(false)
                            ->live()
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('password')
                            ->revealable()
                            ->password()
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->dehydrated(fn($state) => filled($state))
                            ->required(fn(string $context): bool => $context === 'create')
                            ->maxLength(255)
                            ->confirmed(),
                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->required(fn(string $context): bool => $context === 'create'),

                    ])->columns(2),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->query(User::query()->withTrashed())
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular(),
                Tables\Columns\TextColumn::make('email')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('dob')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('gender')
                    ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('marital_status'),

                Tables\Columns\TextColumn::make('state.name'),
                Tables\Columns\TextColumn::make('mahallAc.name')
                    ->label('Mahall'),
                Tables\Columns\IconColumn::make('verified')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->boolean(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
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
                Tables\Actions\EditAction::make()
                    ->color('info'),

                Tables\Actions\DeleteAction::make()
                    ->label('Block')
                    ->color('warning')
                    ->icon('heroicon-o-shield-exclamation')
                    ->modalHeading('Block user')
                    ->visible(fn($record): bool => $record->deleted_at === null),
                Tables\Actions\Action::make('restore')
                    ->label('Restore')
                    ->icon('heroicon-o-arrow-path-rounded-square')
                    ->requiresConfirmation()
                    ->color('success')
                    ->visible(fn($record): bool => $record->deleted_at !== null) // Show only if soft-deleted
                    ->action(function ($record) {
                        $record->restore();
                        session()->flash('success', 'Record restored successfully.');
                    }),

                Tables\Actions\Action::make('forceDelete')
                    ->label('Delete')
                    ->icon('heroicon-o-trash')
                    ->requiresConfirmation()
                    ->color('danger')
                    ->action(function ($record) {
                        $record->forceDelete();
                        if ($record->image) {
                            Storage::disk('public')->delete($record->image);
                        }
                        session()->flash('success', 'Record force deleted successfully.');
                    }),


            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
            ])->recordUrl(
                fn(Model $record): string => Pages\ViewUser::getUrl([$record->id]),
            );
    }

    public static function getRelations(): array
    {
        return [
            InterestAreasRelationManager::class,
            SpecialQualificationsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
