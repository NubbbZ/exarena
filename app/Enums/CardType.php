<?php

namespace App\Enums;

enum CardType : string
{
    case ACTION_POINT = 'action_point';
    case CHARACTER = 'character';
    case EVENT = 'event';
    case SITE = 'site';

    public function displayText (): string
    {
        return match ($this) {
            self::ACTION_POINT => 'Action Point',
            self::CHARACTER => 'Character',
            self::EVENT => 'Event',
            self::SITE => 'Site',
        };
    }
}
