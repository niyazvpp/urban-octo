<?php

namespace App\Filament\Resources\InterestAreaResource\Pages;

use App\Filament\Resources\InterestAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInterestAreas extends ListRecords
{
    protected static string $resource = InterestAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
