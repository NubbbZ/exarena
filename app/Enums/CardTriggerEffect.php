<?php

namespace App\Enums;

enum CardTriggerEffect: string
{
    case GET = 'get';
    case COLOR = 'color';
    case DRAW = 'draw';
    case ACTIVE = 'active';
    case RAID = 'raid';
    case FINAL = 'final';
    case SPECIAL = 'special';

    public function displayText (): string
    {
        return match ($this) {
            self::GET => 'Get',
            self::COLOR => 'Color',
            self::DRAW => 'Draw',
            self::ACTIVE => 'Active',
            self::RAID => 'Raid',
            self::FINAL => 'Final',
            self::SPECIAL => 'Special',
        };
    }
}
