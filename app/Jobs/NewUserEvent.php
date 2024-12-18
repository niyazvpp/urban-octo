<?php

namespace App\Jobs;

use App\Models\Admin;
use App\Notifications\NewUserNotification;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class NewUserEvent implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected $name;
    protected $mahall;
    public function __construct($name, $mahall)
    {
        $this->name = $name;
        $this->mahall = $mahall;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $name = $this->name;
        $admin = Admin::find($this->mahall);
        $adminName = $admin->name;

        Notification::make()
            ->title('New user registered')
            ->body("new user {$name} registered")
            ->sendToDatabase($admin, isEventDispatched: true);
    }
}
