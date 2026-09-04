<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class Topology implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * @var array<string, string>|null
     */
    protected $segments;

    /**
     * @return array<string, string>|null
     */
    public function getSegments(): ?iterable
    {
        return $this->segments;
    }

    /**
     * @param array<string, string>|null $segments
     */
    public function setSegments(?iterable $segments): self
    {
        $this->initialized['segments'] = true;
        $this->segments = $segments;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['segments' => ['Segments', 'getSegments', 'setSegments']];
    }
}
