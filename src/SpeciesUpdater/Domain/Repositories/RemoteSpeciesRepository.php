<?php

declare(strict_types=1);

namespace PSG\SpeciesUpdater\Domain\Repositories;

interface RemoteSpeciesRepository
{
    public function fetchSpecies();
}
