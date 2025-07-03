<?php

namespace App\Filament\Widgets;

use App\Enums\PotensiAnggota;
use App\Models\Anggota;
use Filament\Widgets\ChartWidget;

class StatistikPotensi extends ChartWidget
{
    protected static ?string $heading = 'Statistik Potensi Anggota';

    protected function getData(): array
    {
        $labels = [];
        $data = [];

        foreach (PotensiAnggota::cases() as $potensi) {
            $labels[] = $potensi->label();
            $data[] = Anggota::where('potensi', $potensi->value)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Anggota',
                    'data' => $data,
                    'backgroundColor' => [
                        '#4F46E5', // ungu
                        '#22C55E', // hijau
                        '#F59E0B', // oranye
                        '#EF4444', // merah
                        '#6B7280', // abu
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Bisa diganti 'pie', 'doughnut', dll.
    }

    protected function getOptions(): ?array
{
    return [
        'scales' => [
            'y' => [
                'ticks' => [
                    'precision' => 0,
                    'beginAtZero' => true,
                    'stepSize' => 1,
                ],
            ],
        ],
    ];
}

public function getColumnSpan(): int|string|array
{
    return [
        'md' => 2,
        'xl' => 2,
        'default' => 'full',
    ];
}

protected static ?string $maxHeight = '400px'; // Atur tinggi maksimum


}
