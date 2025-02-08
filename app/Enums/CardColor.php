<?php

namespace App\Enums;

enum CardColor: string
{
    case RED = 'red';
    case BLUE = 'blue';
    case YELLOW = 'yellow';
    case GREEN = 'green';
    case PURPLE = 'purple';

    public function displayText (): string
    {
        return match ($this) {
            self::RED => 'Red',
            self::BLUE => 'Blue',
            self::YELLOW => 'Yellow',
            self::GREEN => 'Green',
            self::PURPLE => 'Purple',
        };
    }
}
