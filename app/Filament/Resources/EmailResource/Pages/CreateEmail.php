<?php

namespace App\Filament\Resources\EmailResource\Pages;

use App\Filament\Resources\EmailResource;
use App\Jobs\AdminToUserJob;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateEmail extends CreateRecord
{
    protected static string $resource = EmailResource::class;

    protected function afterCreate(): void
    {
        $record = $this->record; // Access the record directly
        $issuper = auth()->guard('admin')->user()->isSuperAdmin();
        $adminId = auth()->guard('admin')->user()->id; // Get the authenticated user
        $subject = $record->subject; // Get the subject from the created record
        $content = $record->content; // Get the content from the created record
        AdminToUserJob::dispatch($subject, $content, $adminId, $issuper);
        $recipient = auth()->guard('admin')->user();
        Notification::make()
            ->title("Mail {$subject} Sent successfully")
            ->sendToDatabase($recipient, isEventDispatched: true);
    }
}
