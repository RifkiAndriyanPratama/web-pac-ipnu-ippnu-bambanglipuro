<?php

namespace App\Enums;

enum PotensiAnggota: string
{
    case PROGRAMMING = 'programming';
    case MULTIMEDIA = 'multimedia';
    case KEAGAMAAN = 'keagamaan';
    case OLAHRAGA = 'olahraga';
    case LAINNYA = 'lainnya';

    public function label(): string
    {
        return match($this) {
            self::PROGRAMMING => 'Programming',
            self::MULTIMEDIA => 'Multimedia',
            self::KEAGAMAAN => 'Keagamaan',
            self::OLAHRAGA => 'Olahraga',
            self::LAINNYA => 'Lainnya',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [$case->value => $case->label()])
            ->toArray();
    }
}
