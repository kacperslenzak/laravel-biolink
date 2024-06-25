<?php

namespace App\Filament\Widgets;

use App\Models\Links;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Username', auth()->user()->name),
            Stat::make('UID', auth()->user()->id),
            Stat::make('Active Links', count(Links::all()->where('user_id', auth()->user()->id))),
            Stat::make('Profile URL', 'fraud.cool/' . auth()->user()->name),
        ];
    }
}
