<?php

declare(strict_types=1);

namespace Docker\API\Model;

class MountTmpfsOptions extends \ArrayObject
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
     * The size for the tmpfs mount in bytes.
     *
     * @var int|null
     */
    protected $sizeBytes;
    /**
     * The permission mode for the tmpfs mount in an integer.
     *
     * @var int|null
     */
    protected $mode;

    /**
     * The size for the tmpfs mount in bytes.
     */
    public function getSizeBytes(): ?int
    {
        return $this->sizeBytes;
    }

    /**
     * The size for the tmpfs mount in bytes.
     */
    public function setSizeBytes(?int $sizeBytes): self
    {
        $this->initialized['sizeBytes'] = true;
        $this->sizeBytes = $sizeBytes;

        return $this;
    }

    /**
     * The permission mode for the tmpfs mount in an integer.
     */
    public function getMode(): ?int
    {
        return $this->mode;
    }

    /**
     * The permission mode for the tmpfs mount in an integer.
     */
    public function setMode(?int $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;

        return $this;
    }
}
