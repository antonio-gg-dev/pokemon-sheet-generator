<?php

namespace Tests\SpeciesUpdater\Infrastructure\Repositories;

use PHPUnit\Framework\TestCase;
use PSG\SpeciesUpdater\Infrastructure\Repositories\PokeApiRemoteSpeciesRepository;

class PokeApiRemoteSpeciesRepositoryExternalTest extends TestCase
{
    public function test_some_pokemon_species_are_returned(): void
    {
        $repository = new PokeApiRemoteSpeciesRepository();
        $species = $repository->fetchSpecies();

        self::assertEquals('Bulbasaur', $species[0]->getName());
        self::assertEquals('Heracross', $species[213]->getName());
        self::assertEquals('Blissey', $species[241]->getName());
        self::assertEquals('Polteageist', $species[854]->getName());
        self::assertEquals('Calyrex', $species[897]->getName());
    }
}
