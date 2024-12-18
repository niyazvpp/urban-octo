<?php

namespace App\Filament\Widgets;

use App\Models\Admin;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class AdminChartsOverview extends ChartWidget
{
    // protected static ?string $heading = 'Chart';
    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $admin = auth()->guard('admin')->user();
        $mahalls = Trend::query(
            Admin::query()->where('role', 'super')  // Use query builder here
        )
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();

        if ($admin && $admin->isSuperAdmin()) {
            return [
                'datasets' => [
                    [
                        'label' => 'Mahalls',
                        'data' => $mahalls->map(fn(TrendValue $value) => $value->aggregate),
                    ],
                ],
                'labels' => $mahalls->map(fn(TrendValue $value) => $value->date),
            ];
        }
        return [];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
