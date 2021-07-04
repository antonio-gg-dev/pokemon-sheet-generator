<?php

declare(strict_types=1);

namespace PSG\SpeciesUpdater\Domain\Entities;

use PSG\SpeciesUpdater\Domain\ValueObjects\Type;

final class Specie
{
    public function __construct(
        private string $name,
        private int $nationalPokedexNumber,
        private Type $firstType,
        private null | Type $secondType,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNationalPokedexNumber(): int
    {
        return $this->nationalPokedexNumber;
    }

    public function getFirstType(): Type
    {
        return $this->firstType;
    }

    public function getSecondType(): ?Type
    {
        return $this->secondType;
    }
}
