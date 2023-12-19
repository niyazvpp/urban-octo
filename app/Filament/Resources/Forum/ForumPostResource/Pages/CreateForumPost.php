<?php

namespace App\Filament\Resources\Forum\ForumPostResource\Pages;

use App\Filament\Resources\Forum\ForumPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateForumPost extends CreateRecord
{
    protected static string $resource = ForumPostResource::class;
}
