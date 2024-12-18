<?php

namespace App\Filament\Resources\SpecialQualificationResource\Pages;

use App\Filament\Resources\SpecialQualificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpecialQualification extends EditRecord
{
    protected static string $resource = SpecialQualificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
