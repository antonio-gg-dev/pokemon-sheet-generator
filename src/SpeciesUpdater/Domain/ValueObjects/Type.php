<?php

declare(strict_types=1);

namespace PSG\SpeciesUpdater\Domain\ValueObjects;

use PSG\SpeciesUpdater\Domain\Exceptions\InvalidTypeException;

final class Type
{
    public const NORMAL_TYPE = 'normal';
    public const FIGHTING_TYPE = 'fighting';
    public const FLYING_TYPE = 'flying';
    public const POISON_TYPE = 'poison';
    public const GROUND_TYPE = 'ground';
    public const ROCK_TYPE = 'rock';
    public const BUG_TYPE = 'bug';
    public const GHOST_TYPE = 'ghost';
    public const STEEL_TYPE = 'steel';
    public const FIRE_TYPE = 'fire';
    public const WATER_TYPE = 'water';
    public const GRASS_TYPE = 'grass';
    public const ELECTRIC_TYPE = 'electric';
    public const PSYCHIC_TYPE = 'psychic';
    public const ICE_TYPE = 'ice';
    public const DRAGON_TYPE = 'dragon';
    public const DARK_TYPE = 'dark';
    public const FAIRY_TYPE = 'fairy';

    private const AVAILABLE_TYPES = [
        self::NORMAL_TYPE,
        self::FIGHTING_TYPE,
        self::FLYING_TYPE,
        self::POISON_TYPE,
        self::GROUND_TYPE,
        self::ROCK_TYPE,
        self::BUG_TYPE,
        self::GHOST_TYPE,
        self::STEEL_TYPE,
        self::FIRE_TYPE,
        self::WATER_TYPE,
        self::GRASS_TYPE,
        self::ELECTRIC_TYPE,
        self::PSYCHIC_TYPE,
        self::ICE_TYPE,
        self::DRAGON_TYPE,
        self::DARK_TYPE,
        self::FAIRY_TYPE,
    ];

    public function __construct(
        private string $name
    ) {
        self::assertName($this->name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    private static function assertName(string $name): void
    {
        if (!in_array($name, self::AVAILABLE_TYPES)) {
            throw new InvalidTypeException($name);
        }
    }
}
