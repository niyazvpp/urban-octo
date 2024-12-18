<?php

namespace App\Filament\Resources\QualificationSetResource\Pages;

use App\Filament\Resources\QualificationSetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQualificationSet extends EditRecord
{
    protected static string $resource = QualificationSetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
