<?php

namespace App\Filament\Resources\InterestAreaResource\Pages;

use App\Filament\Resources\InterestAreaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInterestArea extends EditRecord
{
    protected static string $resource = InterestAreaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
