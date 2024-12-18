<?php

namespace App\Filament\Widgets;

use App\Models\JobExam;
use Filament\Forms;
use App\Models\Admin;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Define the form schema (this will be the filter form)
    protected ?string $heading = 'Analytics';

    protected ?string $description = 'An overview of some analytics.';

    // Define the stats
    protected function getStats(): array
    {
        $admin = auth()->guard('admin')->user(); // Get the logged-in admin
        $stats = [];
        $stats[] = Stat::make('Total Users', User::query()->count())
            ->description('')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success');
        $stats[] = Stat::make('Total Jobs', JobExam::query()->count())
            ->description('')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success');

        if ($admin && $admin->isSuperAdmin()) {
            // Super Admin stats
            $stats[] = Stat::make('Total Mahalls', Admin::query()->where('role', 'admin')->count())
                ->description('')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success');
        } else {
            // Local Admin stats

        }

        return $stats;
    }

    // You don't need to override render() for dashboards; Filament will handle that.
}
