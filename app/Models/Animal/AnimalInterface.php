<?php

namespace App\Models\Animal;

use App\Models\Farm;

interface AnimalInterface
{
    public function setIdentifier(string $identifier): self;

    public function getIdentifier(): string;

    public function setFarm(?Farm $farm): self;

    public function getFarm(): ?Farm;

    public function getTypeClassName(): string;
}