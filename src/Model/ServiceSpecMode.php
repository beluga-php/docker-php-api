<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ServiceSpecMode implements AdditionalPropertiesInterface
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
     * @var ServiceSpecModeReplicated|null
     */
    protected $replicated;
    /**
     * @var array<string, mixed>|null
     */
    protected $global;
    /**
     * The mode used for services with a finite number of tasks that run
     * to a completed state.
     *
     * @var ServiceSpecModeReplicatedJob|null
     */
    protected $replicatedJob;
    /**
     * The mode used for services which run a task to the completed state
     * on each valid node.
     *
     * @var array<string, mixed>|null
     */
    protected $globalJob;

    public function getReplicated(): ?ServiceSpecModeReplicated
    {
        return $this->replicated;
    }

    public function setReplicated(?ServiceSpecModeReplicated $replicated): self
    {
        $this->initialized['replicated'] = true;
        $this->replicated = $replicated;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getGlobal(): ?iterable
    {
        return $this->global;
    }

    /**
     * @param array<string, mixed>|null $global
     */
    public function setGlobal(?iterable $global): self
    {
        $this->initialized['global'] = true;
        $this->global = $global;

        return $this;
    }

    /**
     * The mode used for services with a finite number of tasks that run
     * to a completed state.
     */
    public function getReplicatedJob(): ?ServiceSpecModeReplicatedJob
    {
        return $this->replicatedJob;
    }

    /**
     * The mode used for services with a finite number of tasks that run
     * to a completed state.
     */
    public function setReplicatedJob(?ServiceSpecModeReplicatedJob $replicatedJob): self
    {
        $this->initialized['replicatedJob'] = true;
        $this->replicatedJob = $replicatedJob;

        return $this;
    }

    /**
     * The mode used for services which run a task to the completed state
     * on each valid node.
     *
     * @return array<string, mixed>|null
     */
    public function getGlobalJob(): ?iterable
    {
        return $this->globalJob;
    }

    /**
     * The mode used for services which run a task to the completed state
     * on each valid node.
     *
     * @param array<string, mixed>|null $globalJob
     */
    public function setGlobalJob(?iterable $globalJob): self
    {
        $this->initialized['globalJob'] = true;
        $this->globalJob = $globalJob;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['replicated' => ['Replicated', 'getReplicated', 'setReplicated'], 'global' => ['Global', 'getGlobal', 'setGlobal'], 'replicatedJob' => ['ReplicatedJob', 'getReplicatedJob', 'setReplicatedJob'], 'globalJob' => ['GlobalJob', 'getGlobalJob', 'setGlobalJob']];
    }
}
