<?php

namespace App\Filament\Widgets;

use App\Models\Admin;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ChartsOverview extends ChartWidget
{
    // protected static ?string $heading = 'Chart';
    protected static string $color = 'info';
    public static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Trend::model(User::class)
            ->between(
                start: now()->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perDay()
            ->count();



        return [
            'datasets' => [
                [
                    'label' => 'Users',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],

            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
