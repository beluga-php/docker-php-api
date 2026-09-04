<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class EventMessage implements AdditionalPropertiesInterface
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
     * The type of object emitting the event.
     *
     * @var string|null
     */
    protected $type;
    /**
     * The type of event.
     *
     * @var string|null
     */
    protected $action;
    /**
     * Actor describes something that generates events, like a container, network,
     * or a volume.
     *
     * @var EventActor|null
     */
    protected $actor;
    /**
     * Scope of the event. Engine events are `local` scope. Cluster (Swarm)
     * events are `swarm` scope.
     *
     * @var string|null
     */
    protected $scope;
    /**
     * Timestamp of event.
     *
     * @var int|null
     */
    protected $time;
    /**
     * Timestamp of event, with nanosecond accuracy.
     *
     * @var int|null
     */
    protected $timeNano;

    /**
     * The type of object emitting the event.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * The type of object emitting the event.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The type of event.
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * The type of event.
     */
    public function setAction(?string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;

        return $this;
    }

    /**
     * Actor describes something that generates events, like a container, network,
     * or a volume.
     */
    public function getActor(): ?EventActor
    {
        return $this->actor;
    }

    /**
     * Actor describes something that generates events, like a container, network,
     * or a volume.
     */
    public function setActor(?EventActor $actor): self
    {
        $this->initialized['actor'] = true;
        $this->actor = $actor;

        return $this;
    }

    /**
     * Scope of the event. Engine events are `local` scope. Cluster (Swarm)
     * events are `swarm` scope.
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * Scope of the event. Engine events are `local` scope. Cluster (Swarm)
     * events are `swarm` scope.
     */
    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * Timestamp of event.
     */
    public function getTime(): ?int
    {
        return $this->time;
    }

    /**
     * Timestamp of event.
     */
    public function setTime(?int $time): self
    {
        $this->initialized['time'] = true;
        $this->time = $time;

        return $this;
    }

    /**
     * Timestamp of event, with nanosecond accuracy.
     */
    public function getTimeNano(): ?int
    {
        return $this->timeNano;
    }

    /**
     * Timestamp of event, with nanosecond accuracy.
     */
    public function setTimeNano(?int $timeNano): self
    {
        $this->initialized['timeNano'] = true;
        $this->timeNano = $timeNano;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['Type', 'getType', 'setType'], 'action' => ['Action', 'getAction', 'setAction'], 'actor' => ['Actor', 'getActor', 'setActor'], 'scope' => ['scope', 'getScope', 'setScope'], 'time' => ['time', 'getTime', 'setTime'], 'timeNano' => ['timeNano', 'getTimeNano', 'setTimeNano']];
    }
}
