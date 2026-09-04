<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class EventActor implements AdditionalPropertiesInterface
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
     * The ID of the object emitting the event.
     *
     * @var string|null
     */
    protected $iD;
    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @var array<string, string>|null
     */
    protected $attributes;

    /**
     * The ID of the object emitting the event.
     */
    public function getID(): ?string
    {
        return $this->iD;
    }

    /**
     * The ID of the object emitting the event.
     */
    public function setID(?string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @return array<string, string>|null
     */
    public function getAttributes(): ?iterable
    {
        return $this->attributes;
    }

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @param array<string, string>|null $attributes
     */
    public function setAttributes(?iterable $attributes): self
    {
        $this->initialized['attributes'] = true;
        $this->attributes = $attributes;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['iD' => ['ID', 'getID', 'setID'], 'attributes' => ['Attributes', 'getAttributes', 'setAttributes']];
    }
}
