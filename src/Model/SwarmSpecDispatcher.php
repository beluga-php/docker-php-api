<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class SwarmSpecDispatcher implements AdditionalPropertiesInterface
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
     * The delay for an agent to send a heartbeat to the dispatcher.
     *
     * @var int|null
     */
    protected $heartbeatPeriod;

    /**
     * The delay for an agent to send a heartbeat to the dispatcher.
     */
    public function getHeartbeatPeriod(): ?int
    {
        return $this->heartbeatPeriod;
    }

    /**
     * The delay for an agent to send a heartbeat to the dispatcher.
     */
    public function setHeartbeatPeriod(?int $heartbeatPeriod): self
    {
        $this->initialized['heartbeatPeriod'] = true;
        $this->heartbeatPeriod = $heartbeatPeriod;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['heartbeatPeriod' => ['HeartbeatPeriod', 'getHeartbeatPeriod', 'setHeartbeatPeriod']];
    }
}
