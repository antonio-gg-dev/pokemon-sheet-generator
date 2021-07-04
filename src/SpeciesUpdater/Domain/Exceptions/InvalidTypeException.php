<?php

declare(strict_types=1);

namespace PSG\SpeciesUpdater\Domain\Exceptions;

use Exception;

final class InvalidTypeException extends Exception
{
    public function __construct(
        private string $type
    ) {
        parent::__construct("The '{$this->type}' type is not a valid type.");
    }

    public function getType(): string
    {
        return $this->type;
    }
}
