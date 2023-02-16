<?php

declare(strict_types=1);

namespace Docker\API\Model;

class TaskStatusContainerStatus extends \ArrayObject
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
    protected $containerID;
    /**
     * @var int|null
     */
    protected $pID;
    /**
     * @var int|null
     */
    protected $exitCode;

    public function getContainerID(): ?string
    {
        return $this->containerID;
    }

    public function setContainerID(?string $containerID): self
    {
        $this->initialized['containerID'] = true;
        $this->containerID = $containerID;

        return $this;
    }

    public function getPID(): ?int
    {
        return $this->pID;
    }

    public function setPID(?int $pID): self
    {
        $this->initialized['pID'] = true;
        $this->pID = $pID;

        return $this;
    }

    public function getExitCode(): ?int
    {
        return $this->exitCode;
    }

    public function setExitCode(?int $exitCode): self
    {
        $this->initialized['exitCode'] = true;
        $this->exitCode = $exitCode;

        return $this;
    }
}
