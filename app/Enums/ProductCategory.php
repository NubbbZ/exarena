<?php

namespace App\Enums;

enum ProductCategory: string
{
    case BOOSTER_BOX = 'booster_box';
    case BOOSTER_PACK = 'booster_pack';
    case BLISTER_PACK = 'blister_pack';
    case STARTER_DECK = 'starter_deck';
    case SLEEVES = 'sleeves';
    case PLAYMAT_STORAGE = 'playmat_storage';
    case PACK = 'pack';

    public function displayText(): string
    {
        return match ($this) {
            self::BOOSTER_BOX => 'Booster Box',
            self::BOOSTER_PACK => 'Booster Pack',
            self::BLISTER_PACK => 'Blister Pack',
            self::STARTER_DECK => 'Starter Deck',
            self::SLEEVES => 'Sleeves',
            self::PLAYMAT_STORAGE => 'Playmat Storage',
            self::PACK => 'Pack',
        };
    }
}
