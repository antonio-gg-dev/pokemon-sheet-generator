<?php

declare(strict_types=1);

namespace Tests\SpeciesUpdater\Application;

use PSG\SpeciesUpdater\Application\SpeciesUpdater;
use PHPUnit\Framework\TestCase;
use PSG\SpeciesUpdater\Domain\Repositories\RemoteSpeciesRepository;

final class SpeciesUpdaterTest extends TestCase
{
    public function test_call_remote_species_repository(): void
    {
        $remoteSpeciesRepository = $this->createMock(RemoteSpeciesRepository::class);
        $speciesUpdater = new SpeciesUpdater($remoteSpeciesRepository);

        $remoteSpeciesRepository->expects($this->once())
            ->method('fetchSpecies');

        $speciesUpdater->updateSpecies();
    }
}
