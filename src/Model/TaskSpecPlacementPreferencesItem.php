<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class TaskSpecPlacementPreferencesItem implements AdditionalPropertiesInterface
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
     * @var TaskSpecPlacementPreferencesItemSpread|null
     */
    protected $spread;

    public function getSpread(): ?TaskSpecPlacementPreferencesItemSpread
    {
        return $this->spread;
    }

    public function setSpread(?TaskSpecPlacementPreferencesItemSpread $spread): self
    {
        $this->initialized['spread'] = true;
        $this->spread = $spread;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['spread' => ['Spread', 'getSpread', 'setSpread']];
    }
}
