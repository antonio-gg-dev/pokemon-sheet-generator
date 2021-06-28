<?php

declare(strict_types=1);

namespace PSG\SpeciesUpdater\Application;

use PSG\SpeciesUpdater\Domain\Repositories\RemoteSpeciesRepository;

final class SpeciesUpdater
{
    public function __construct(
        private RemoteSpeciesRepository $remoteSpeciesRepository
    ) {}

    public function updateSpecies(): void
    {
        $this->remoteSpeciesRepository->fetchSpecies();
    }
}
