<?php

namespace App\Filament\Widgets;

use App\Models\ProfileView;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class ProfileViewsChart extends ChartWidget
{
    protected static ?string $heading = 'Profile Views';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 2;

    protected function getData(): array
    {
        $data = Trend::query( ProfileView::where('user_id', '=', auth()->user()->id) )
            ->between(
                start: now()->startOfDay(),
                end: now()->endOfDay()
            )
            ->perHour()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Profile Views',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ]
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
