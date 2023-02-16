<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ContainerState extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * String representation of the container state. Can be one of "created",
     * "running", "paused", "restarting", "removing", "exited", or "dead".
     *
     * @var string|null
     */
    protected $status;
    /**
     * Whether this container is running.
     *
     * Note that a running container can be _paused_. The `Running` and `Paused`
     * booleans are not mutually exclusive:
     *
     * When pausing a container (on Linux), the freezer cgroup is used to suspend
     * all processes in the container. Freezing the process requires the process to
     * be running. As a result, paused containers are both `Running` _and_ `Paused`.
     *
     * Use the `Status` field instead to determine if a container's state is "running".
     *
     * @var bool|null
     */
    protected $running;
    /**
     * Whether this container is paused.
     *
     * @var bool|null
     */
    protected $paused;
    /**
     * Whether this container is restarting.
     *
     * @var bool|null
     */
    protected $restarting;
    /**
     * Whether this container has been killed because it ran out of memory.
     *
     * @var bool|null
     */
    protected $oOMKilled;
    /**
     * @var bool|null
     */
    protected $dead;
    /**
     * The process ID of this container.
     *
     * @var int|null
     */
    protected $pid;
    /**
     * The last exit code of this container.
     *
     * @var int|null
     */
    protected $exitCode;
    /**
     * @var string|null
     */
    protected $error;
    /**
     * The time when this container was last started.
     *
     * @var string|null
     */
    protected $startedAt;
    /**
     * The time when this container last exited.
     *
     * @var string|null
     */
    protected $finishedAt;
    /**
     * Health stores information about the container's healthcheck results.
     *
     * @var Health|null
     */
    protected $health;

    /**
     * String representation of the container state. Can be one of "created",
     * "running", "paused", "restarting", "removing", "exited", or "dead".
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * String representation of the container state. Can be one of "created",
     * "running", "paused", "restarting", "removing", "exited", or "dead".
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Whether this container is running.
     *
     * Note that a running container can be _paused_. The `Running` and `Paused`
     * booleans are not mutually exclusive:
     *
     * When pausing a container (on Linux), the freezer cgroup is used to suspend
     * all processes in the container. Freezing the process requires the process to
     * be running. As a result, paused containers are both `Running` _and_ `Paused`.
     *
     * Use the `Status` field instead to determine if a container's state is "running".
     */
    public function getRunning(): ?bool
    {
        return $this->running;
    }

    /**
     * Whether this container is running.
     *
     * Note that a running container can be _paused_. The `Running` and `Paused`
     * booleans are not mutually exclusive:
     *
     * When pausing a container (on Linux), the freezer cgroup is used to suspend
     * all processes in the container. Freezing the process requires the process to
     * be running. As a result, paused containers are both `Running` _and_ `Paused`.
     *
     * Use the `Status` field instead to determine if a container's state is "running".
     */
    public function setRunning(?bool $running): self
    {
        $this->initialized['running'] = true;
        $this->running = $running;

        return $this;
    }

    /**
     * Whether this container is paused.
     */
    public function getPaused(): ?bool
    {
        return $this->paused;
    }

    /**
     * Whether this container is paused.
     */
    public function setPaused(?bool $paused): self
    {
        $this->initialized['paused'] = true;
        $this->paused = $paused;

        return $this;
    }

    /**
     * Whether this container is restarting.
     */
    public function getRestarting(): ?bool
    {
        return $this->restarting;
    }

    /**
     * Whether this container is restarting.
     */
    public function setRestarting(?bool $restarting): self
    {
        $this->initialized['restarting'] = true;
        $this->restarting = $restarting;

        return $this;
    }

    /**
     * Whether this container has been killed because it ran out of memory.
     */
    public function getOOMKilled(): ?bool
    {
        return $this->oOMKilled;
    }

    /**
     * Whether this container has been killed because it ran out of memory.
     */
    public function setOOMKilled(?bool $oOMKilled): self
    {
        $this->initialized['oOMKilled'] = true;
        $this->oOMKilled = $oOMKilled;

        return $this;
    }

    public function getDead(): ?bool
    {
        return $this->dead;
    }

    public function setDead(?bool $dead): self
    {
        $this->initialized['dead'] = true;
        $this->dead = $dead;

        return $this;
    }

    /**
     * The process ID of this container.
     */
    public function getPid(): ?int
    {
        return $this->pid;
    }

    /**
     * The process ID of this container.
     */
    public function setPid(?int $pid): self
    {
        $this->initialized['pid'] = true;
        $this->pid = $pid;

        return $this;
    }

    /**
     * The last exit code of this container.
     */
    public function getExitCode(): ?int
    {
        return $this->exitCode;
    }

    /**
     * The last exit code of this container.
     */
    public function setExitCode(?int $exitCode): self
    {
        $this->initialized['exitCode'] = true;
        $this->exitCode = $exitCode;

        return $this;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(?string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;

        return $this;
    }

    /**
     * The time when this container was last started.
     */
    public function getStartedAt(): ?string
    {
        return $this->startedAt;
    }

    /**
     * The time when this container was last started.
     */
    public function setStartedAt(?string $startedAt): self
    {
        $this->initialized['startedAt'] = true;
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * The time when this container last exited.
     */
    public function getFinishedAt(): ?string
    {
        return $this->finishedAt;
    }

    /**
     * The time when this container last exited.
     */
    public function setFinishedAt(?string $finishedAt): self
    {
        $this->initialized['finishedAt'] = true;
        $this->finishedAt = $finishedAt;

        return $this;
    }

    /**
     * Health stores information about the container's healthcheck results.
     */
    public function getHealth(): ?Health
    {
        return $this->health;
    }

    /**
     * Health stores information about the container's healthcheck results.
     */
    public function setHealth(?Health $health): self
    {
        $this->initialized['health'] = true;
        $this->health = $health;

        return $this;
    }
}
