<?php

namespace App\Filament\Resources\QualificationSetResource\Pages;

use App\Filament\Resources\QualificationSetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQualificationSets extends ListRecords
{
    protected static string $resource = QualificationSetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
