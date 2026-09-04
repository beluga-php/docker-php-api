<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ConfigReference implements AdditionalPropertiesInterface
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
     * The name of the config-only network that provides the network's
     * configuration. The specified network must be an existing config-only
     * network. Only network names are allowed, not network IDs.
     *
     * @var string|null
     */
    protected $network;

    /**
     * The name of the config-only network that provides the network's
     * configuration. The specified network must be an existing config-only
     * network. Only network names are allowed, not network IDs.
     */
    public function getNetwork(): ?string
    {
        return $this->network;
    }

    /**
     * The name of the config-only network that provides the network's
     * configuration. The specified network must be an existing config-only
     * network. Only network names are allowed, not network IDs.
     */
    public function setNetwork(?string $network): self
    {
        $this->initialized['network'] = true;
        $this->network = $network;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['network' => ['Network', 'getNetwork', 'setNetwork']];
    }
}
