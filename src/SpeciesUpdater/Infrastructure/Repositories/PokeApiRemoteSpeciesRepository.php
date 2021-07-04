<?php

declare(strict_types=1);

namespace PSG\SpeciesUpdater\Infrastructure\Repositories;

use CurlHandle;
use PSG\SpeciesUpdater\Domain\Entities\Specie;
use PSG\SpeciesUpdater\Domain\Repositories\RemoteSpeciesRepository;
use PSG\SpeciesUpdater\Domain\ValueObjects\Type;
use stdClass;

final class PokeApiRemoteSpeciesRepository implements RemoteSpeciesRepository
{
    private const DEFAULT_CURL_OPTIONS = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
    ];

    private CurlHandle $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    /** @inheritDoc */
    public function fetchSpecies(): array
    {
        $species = [];
        $id = 1;

        do {
            $result = $this->fetchSpecieById($id);

            if (!is_null($result)) {
                $species[] = $this->makeSpecieFromResult($result);
                $id++;
            }
        } while ($result);

        curl_close($this->curl);

        return $species;
    }

    private function fetchSpecieById(int $id): null | stdClass
    {
        curl_setopt_array(
            $this->curl,
            self::DEFAULT_CURL_OPTIONS + [
                CURLOPT_URL => "https://pokeapi.co/api/v2/pokemon/{$id}"
            ]
        );

        return json_decode(curl_exec($this->curl));
    }

    private function makeSpecieFromResult(stdClass $result): Specie
    {
        return new Specie(
            $this->getNameFromResult($result),
            $this->getNationalPokedexNumberFromResult($result),
            $this->getFirstTypeFromResult($result),
            $this->getSecondTypeFromResult($result),
        );
    }

    private function getNameFromResult(stdClass $result): string
    {
        return mb_convert_case($result->name, MB_CASE_TITLE);
    }

    private function getNationalPokedexNumberFromResult(stdClass $result): int
    {
        return $result->id;
    }

    private function getFirstTypeFromResult(stdClass $result): Type
    {
        $resultType = array_values(
            array_filter(
                $result->types,
                fn ($type) => $type->slot === 1
            )
        );

        return new Type($resultType[0]->type->name);
    }

    private function getSecondTypeFromResult(stdClass $result): null | Type
    {
        $resultType = array_values(
            array_filter(
                $result->types,
                fn ($type) => $type->slot === 2
            )
        );

        if (empty($resultType)) {
            return null;
        }

        return new Type($resultType[0]->type->name);
    }
}
