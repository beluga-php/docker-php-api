<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class TaskSpecPlacementPreferencesItemSpread implements AdditionalPropertiesInterface
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
     * label descriptor, such as `engine.labels.az`.
     *
     * @var string|null
     */
    protected $spreadDescriptor;

    /**
     * label descriptor, such as `engine.labels.az`.
     */
    public function getSpreadDescriptor(): ?string
    {
        return $this->spreadDescriptor;
    }

    /**
     * label descriptor, such as `engine.labels.az`.
     */
    public function setSpreadDescriptor(?string $spreadDescriptor): self
    {
        $this->initialized['spreadDescriptor'] = true;
        $this->spreadDescriptor = $spreadDescriptor;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['spreadDescriptor' => ['SpreadDescriptor', 'getSpreadDescriptor', 'setSpreadDescriptor']];
    }
}
