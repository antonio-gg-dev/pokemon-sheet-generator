<?php

declare(strict_types=1);

namespace PSG\SpeciesUpdater\Domain\Repositories;

use PSG\SpeciesUpdater\Domain\Entities\Specie;

interface RemoteSpeciesRepository
{
    /** @return Specie[] */
    public function fetchSpecies(): array;
}
