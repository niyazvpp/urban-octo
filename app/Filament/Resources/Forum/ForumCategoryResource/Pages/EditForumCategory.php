<?php

namespace App\Filament\Resources\Forum\ForumCategoryResource\Pages;

use App\Filament\Resources\Forum\ForumCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditForumCategory extends EditRecord
{
    protected static string $resource = ForumCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
