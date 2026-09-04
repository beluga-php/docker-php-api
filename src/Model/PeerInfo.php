<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class PeerInfo implements AdditionalPropertiesInterface
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
     * ID of the peer-node in the Swarm cluster.
     *
     * @var string|null
     */
    protected $name;
    /**
     * IP-address of the peer-node in the Swarm cluster.
     *
     * @var string|null
     */
    protected $iP;

    /**
     * ID of the peer-node in the Swarm cluster.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * ID of the peer-node in the Swarm cluster.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * IP-address of the peer-node in the Swarm cluster.
     */
    public function getIP(): ?string
    {
        return $this->iP;
    }

    /**
     * IP-address of the peer-node in the Swarm cluster.
     */
    public function setIP(?string $iP): self
    {
        $this->initialized['iP'] = true;
        $this->iP = $iP;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['Name', 'getName', 'setName'], 'iP' => ['IP', 'getIP', 'setIP']];
    }
}
