<?php

namespace App\Filament\Resources\Forum\ForumPostResource\Pages;

use App\Filament\Resources\Forum\ForumPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListForumPosts extends ListRecords
{
    protected static string $resource = ForumPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
