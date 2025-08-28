<?php

namespace App\Models\Animal;

use App\Models\Farm;

abstract class AbstractAnimal implements AnimalInterface
{
    private string $identifier;

    private ?Farm $farm = null;

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getFarm(): ?Farm
    {
        return $this->farm;
    }

    public function setFarm(?Farm $farm): self
    {
        $this->farm = $farm;

        return $this;
    }

    public function getTypeClassName(): string
    {
        return '';
    }
}
