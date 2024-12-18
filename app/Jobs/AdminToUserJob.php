<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\AdminToAdminNotification;
use App\Notifications\AdminToUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminToUserJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected $subject;
    protected $content;
    protected $adminId;
    protected $issuper;
    public function __construct($subject, $content, $adminId, $issuper)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->adminId = $adminId;
        $this->issuper = $issuper;
        // true or false
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $passedUsers = [];
        $failedUsers = [];

        // Determine the target users
        if ($this->issuper) {
            $users = User::all();
            Log::info('Sending notifications to all users by super admin.');
        } else {
            $users = User::where('mahall', $this->adminId)->get();
            Log::info('Sending notifications to users with `mahall`: ' . $this->adminId);
        }

        // Notify each user
        foreach ($users as $user) {
            try {
                $user->notify(new AdminToUserNotification($this->subject, $this->content));
                Log::info('Notification sent to user ID: ' . $user->id);
                $passedUsers[] = $user->email;
            } catch (\Exception $e) {
                Log::error('Failed to send notification to user ID: ' . $user->id, [
                    'error' => $e->getMessage(),
                ]);
                $failedUsers[] = $user->email;
            }
        }

        // Prepare data for database notification
        $admin = \App\Models\Admin::find($this->adminId);
        if ($admin) {
            $data = [
                'subject' => $this->subject,
                'passed' => $passedUsers,
                'failed' => $failedUsers,
            ];

            try {
                $admin->notify(new AdminToAdminNotification($data));
                Log::info('Database notification sent to admin ID: ' . $this->adminId);
            } catch (\Exception $e) {
                Log::error('Failed to send database notification to admin ID: ' . $this->adminId, [
                    'error' => $e->getMessage(),
                ]);
            }
        }
    }
}
