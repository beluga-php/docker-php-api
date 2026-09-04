<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class PluginInterfaceType implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $prefix;
    /**
     * @var string|null
     */
    protected $capability;
    /**
     * @var string|null
     */
    protected $version;

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(?string $prefix): self
    {
        $this->initialized['prefix'] = true;
        $this->prefix = $prefix;

        return $this;
    }

    public function getCapability(): ?string
    {
        return $this->capability;
    }

    public function setCapability(?string $capability): self
    {
        $this->initialized['capability'] = true;
        $this->capability = $capability;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['prefix' => ['Prefix', 'getPrefix', 'setPrefix'], 'capability' => ['Capability', 'getCapability', 'setCapability'], 'version' => ['Version', 'getVersion', 'setVersion']];
    }
}
