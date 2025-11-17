<?php

declare(strict_types=1);

namespace Docker\API\Model;

class TaskStatus extends \ArrayObject
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
     * @var string|null
     */
    protected $timestamp;
    /**
     * @var string|null
     */
    protected $state;
    /**
     * @var string|null
     */
    protected $message;
    /**
     * @var string|null
     */
    protected $err;
    /**
     * represents the status of a container.
     *
     * @var ContainerStatus|null
     */
    protected $containerStatus;
    /**
     * represents the port status of a task's host ports whose service has published host ports.
     *
     * @var PortStatus|null
     */
    protected $portStatus;

    public function getTimestamp(): ?string
    {
        return $this->timestamp;
    }

    public function setTimestamp(?string $timestamp): self
    {
        $this->initialized['timestamp'] = true;
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }

    public function getErr(): ?string
    {
        return $this->err;
    }

    public function setErr(?string $err): self
    {
        $this->initialized['err'] = true;
        $this->err = $err;

        return $this;
    }

    /**
     * represents the status of a container.
     */
    public function getContainerStatus(): ?ContainerStatus
    {
        return $this->containerStatus;
    }

    /**
     * represents the status of a container.
     */
    public function setContainerStatus(?ContainerStatus $containerStatus): self
    {
        $this->initialized['containerStatus'] = true;
        $this->containerStatus = $containerStatus;

        return $this;
    }

    /**
     * represents the port status of a task's host ports whose service has published host ports.
     */
    public function getPortStatus(): ?PortStatus
    {
        return $this->portStatus;
    }

    /**
     * represents the port status of a task's host ports whose service has published host ports.
     */
    public function setPortStatus(?PortStatus $portStatus): self
    {
        $this->initialized['portStatus'] = true;
        $this->portStatus = $portStatus;

        return $this;
    }
}
