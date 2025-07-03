<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Anggota;

class JumlahAnggota extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Anggota', Anggota::count())
                ->description('Total anggota saat ini')
                ->icon('heroicon-o-users')
                ->color('success'),
        ];
    }
}