<?php

namespace App\Filament\Widgets;

use App\Models\Anggota;
use App\Models\Pengurus;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverviewStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Anggota', Anggota::count())
                ->description('Total anggota saat ini')
                ->icon('heroicon-o-users')
                ->color('success'),

            Stat::make('Jumlah Pengurus', Pengurus::count())
                ->description('Total pengurus saat ini')
                ->icon('heroicon-o-user-group')
                ->color('primary'),
        ];
    }
}
