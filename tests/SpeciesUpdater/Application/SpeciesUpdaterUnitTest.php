<?php

declare(strict_types=1);

namespace Tests\SpeciesUpdater\Application;

use PHPUnit\Framework\MockObject\MockObject;
use PSG\SpeciesUpdater\Application\SpeciesUpdater;
use PHPUnit\Framework\TestCase;
use PSG\SpeciesUpdater\Domain\Entities\Specie;
use PSG\SpeciesUpdater\Domain\Repositories\LocalSpeciesRepository;
use PSG\SpeciesUpdater\Domain\Repositories\RemoteSpeciesRepository;
use PSG\SpeciesUpdater\Domain\ValueObjects\Type;

final class SpeciesUpdaterUnitTest extends TestCase
{
    /** @var mixed|MockObject|RemoteSpeciesRepository */
    private mixed $remoteSpeciesRepository;
    /** @var mixed|MockObject|LocalSpeciesRepository */
    private mixed $localSpeciesRepository;
    private SpeciesUpdater $speciesUpdater;

    protected function setUp(): void
    {
        $this->remoteSpeciesRepository = $this->createMock(RemoteSpeciesRepository::class);
        $this->localSpeciesRepository = $this->createMock(LocalSpeciesRepository::class);

        $this->speciesUpdater = new SpeciesUpdater(
            $this->remoteSpeciesRepository,
            $this->localSpeciesRepository
        );

        parent::setUp();
    }

    public function test_call_remote_species_repository(): void
    {
        $this->remoteSpeciesRepository->expects($this->once())
            ->method('fetchSpecies');

        $this->speciesUpdater->updateSpecies();
    }

    public function test_call_local_species_repository(): void
    {
        $this->localSpeciesRepository->expects($this->once())
            ->method('storeSpecies');

        $this->speciesUpdater->updateSpecies();
    }

    public function test_remote_species_are_sent_to_local(): void
    {
        $species = [
            self::makeSpecie(name: 'First Specie Name'),
            self::makeSpecie(name: 'Second Specie Name'),
            self::makeSpecie(name: 'Third Specie Name'),
        ];
        $this->remoteSpeciesRepository->expects($this->once())
            ->method('fetchSpecies')
            ->willReturn($species);

        $this->localSpeciesRepository->expects($this->once())
            ->method('storeSpecies')
            ->with($species);

        $this->speciesUpdater->updateSpecies();
    }

    private static function makeSpecie(string $name): Specie
    {
        return new Specie(
            $name,
            1,
            new Type(Type::BUG_TYPE),
            null
        );
    }
}
