<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobExamResource\Pages;
use App\Filament\Resources\JobExamResource\RelationManagers;
use App\Models\JobExam;
use App\Models\QualificationSet;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

use Filament\Forms\Components\TextInput;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobExamResource extends Resource
{
    protected static ?string $model = JobExam::class;


    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Select::make('gov')
                    ->options([
                        'centre' => 'Centre',
                        'state' => 'State',
                    ])
                    ->required(),
                TextInput::make('min_age')
                    ->required()
                    ->numeric()
                    ->default(18),
                TextInput::make('max_age')
                    ->required()
                    ->numeric(),


                Select::make('gender')
                    ->options(
                        [
                            'male' => 'Male',
                            'female' => 'Female',
                            'all' => 'All',
                        ]

                    )->default('all')
                    ->required(),
                Select::make('type')
                    ->options([
                        'exam' => 'Exam',
                        'job' => 'Job',
                    ])
                    ->required(),
                Select::make('interest_area_id')
                    ->relationship('interestArea', 'name')
                    ->native(false)
                    ->required(),
                Select::make('qualificationSet')
                    ->relationship('qualificationSet', 'name')
                    ->multiple()
                    ->options(function () {
                        return QualificationSet::all()->pluck('name', 'id');
                    })
                    ->native(false)
                    ->required(),
                Textarea::make('obc_special')
                    ->columnSpanFull(),
                TextInput::make('created_by')
                    ->numeric()
                    ->default(null),
                Toggle::make('verified')
                    ->default(true)
                    ->required(),
                TextInput::make('highest_qual')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gov'),
                Tables\Columns\TextColumn::make('min_age')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_age')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('interestArea.name')
                    ->numeric()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('created_by')
                //     ->numeric()
                //     ->sortable(),
                Tables\Columns\IconColumn::make('verified')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('highest_qual')
                //     ->searchable(),
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
            'index' => Pages\ListJobExams::route('/'),
            'create' => Pages\CreateJobExam::route('/create'),
            'edit' => Pages\EditJobExam::route('/{record}/edit'),
        ];
    }
}
