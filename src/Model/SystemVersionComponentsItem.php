<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class SystemVersionComponentsItem implements AdditionalPropertiesInterface
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
     * Name of the component.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Version of the component.
     *
     * @var string|null
     */
    protected $version;
    /**
     * Key/value pairs of strings with additional information about the
     * component. These values are intended for informational purposes
     * only, and their content is not defined, and not part of the API
     * specification.
     *
     * These messages can be printed by the client as information to the user.
     *
     * @var array<string, mixed>|null
     */
    protected $details;

    /**
     * Name of the component.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the component.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Version of the component.
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * Version of the component.
     */
    public function setVersion(?string $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    /**
     * Key/value pairs of strings with additional information about the
     * component. These values are intended for informational purposes
     * only, and their content is not defined, and not part of the API
     * specification.
     *
     * These messages can be printed by the client as information to the user.
     *
     * @return array<string, mixed>|null
     */
    public function getDetails(): ?iterable
    {
        return $this->details;
    }

    /**
     * Key/value pairs of strings with additional information about the
     * component. These values are intended for informational purposes
     * only, and their content is not defined, and not part of the API
     * specification.
     *
     * These messages can be printed by the client as information to the user.
     *
     * @param array<string, mixed>|null $details
     */
    public function setDetails(?iterable $details): self
    {
        $this->initialized['details'] = true;
        $this->details = $details;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['Name', 'getName', 'setName'], 'version' => ['Version', 'getVersion', 'setVersion'], 'details' => ['Details', 'getDetails', 'setDetails']];
    }
}
