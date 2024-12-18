<?php

namespace App\Filament\Resources\JobExamResource\Pages;

use App\Filament\Resources\JobExamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobExam extends EditRecord
{
    protected static string $resource = JobExamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
