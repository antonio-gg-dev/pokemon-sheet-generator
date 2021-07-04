<?php

namespace Tests\SpeciesUpdater\Domain\ValueObjects;

use PSG\SpeciesUpdater\Domain\Exceptions\InvalidTypeException;
use PSG\SpeciesUpdater\Domain\ValueObjects\Type;
use PHPUnit\Framework\TestCase;
use Generator;

class TypeUnitTest extends TestCase
{
    public function test_can_not_create_invalid_type(): void
    {
        $this->expectException(InvalidTypeException::class);

        new Type('invalid');
    }

    /** @dataProvider availableTypesProvider */
    public function test_can_create_type(string $typeName): void
    {
        $type = new Type($typeName);

        self::assertEquals($typeName, $type->getName());
    }

    public function availableTypesProvider(): Generator
    {
        yield Type::NORMAL_TYPE => [Type::NORMAL_TYPE];
        yield Type::FIGHTING_TYPE => [Type::FIGHTING_TYPE];
        yield Type::FLYING_TYPE => [Type::FLYING_TYPE];
        yield Type::POISON_TYPE => [Type::POISON_TYPE];
        yield Type::GROUND_TYPE => [Type::GROUND_TYPE];
        yield Type::ROCK_TYPE => [Type::ROCK_TYPE];
        yield Type::BUG_TYPE => [Type::BUG_TYPE];
        yield Type::GHOST_TYPE => [Type::GHOST_TYPE];
        yield Type::STEEL_TYPE => [Type::STEEL_TYPE];
        yield Type::FIRE_TYPE => [Type::FIRE_TYPE];
        yield Type::WATER_TYPE => [Type::WATER_TYPE];
        yield Type::GRASS_TYPE => [Type::GRASS_TYPE];
        yield Type::ELECTRIC_TYPE => [Type::ELECTRIC_TYPE];
        yield Type::PSYCHIC_TYPE => [Type::PSYCHIC_TYPE];
        yield Type::ICE_TYPE => [Type::ICE_TYPE];
        yield Type::DRAGON_TYPE => [Type::DRAGON_TYPE];
        yield Type::DARK_TYPE => [Type::DARK_TYPE];
        yield Type::FAIRY_TYPE => [Type::FAIRY_TYPE];
    }
}
