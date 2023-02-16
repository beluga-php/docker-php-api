<?php

declare(strict_types=1);

namespace Docker\API\Model;

class TaskSpecNetworkAttachmentSpec extends \ArrayObject
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
     * ID of the container represented by this task.
     *
     * @var string|null
     */
    protected $containerID;

    /**
     * ID of the container represented by this task.
     */
    public function getContainerID(): ?string
    {
        return $this->containerID;
    }

    /**
     * ID of the container represented by this task.
     */
    public function setContainerID(?string $containerID): self
    {
        $this->initialized['containerID'] = true;
        $this->containerID = $containerID;

        return $this;
    }
}
