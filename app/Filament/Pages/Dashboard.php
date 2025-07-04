<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\JumlahAnggota;
use App\Filament\Widgets\JumlahPengurus;
use App\Filament\Widgets\StatistikPotensi;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\WidgetGroup;
use App\Filament\Widgets\OverviewStats;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $routePath = '/';


protected function getHeaderWidgets(): array
{
    return [
        OverviewStats::class,
    ];
}


    protected function getFooterWidgets(): array
    {
        return [
            StatistikPotensi::class,
        ];
    }
}
