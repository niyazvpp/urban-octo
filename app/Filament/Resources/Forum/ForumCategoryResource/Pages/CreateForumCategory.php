<?php

namespace App\Filament\Resources\Forum\ForumCategoryResource\Pages;

use App\Filament\Resources\Forum\ForumCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateForumCategory extends CreateRecord
{
    protected static string $resource = ForumCategoryResource::class;
}
