<?php

declare(strict_types=1);

namespace Docker\API\Model;

class TaskSpecContainerSpecPrivilegesAppArmor extends \ArrayObject
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
    protected $mode;

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(?string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;

        return $this;
    }
}
