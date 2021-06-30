<?php

declare(strict_types=1);

namespace PSG\SpeciesUpdater\Domain\Repositories;

use PSG\SpeciesUpdater\Domain\Entities\Specie;

interface LocalSpeciesRepository
{
    /** @param Specie[] $species */
    public function storeSpecies(array $species): void;
}
