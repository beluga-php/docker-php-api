<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SwarmSpecEncryptionConfig extends \ArrayObject
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
     * If set, generate a key and use it to lock data stored on the
     * managers.
     *
     * @var bool|null
     */
    protected $autoLockManagers;

    /**
     * If set, generate a key and use it to lock data stored on the
     * managers.
     */
    public function getAutoLockManagers(): ?bool
    {
        return $this->autoLockManagers;
    }

    /**
     * If set, generate a key and use it to lock data stored on the
     * managers.
     */
    public function setAutoLockManagers(?bool $autoLockManagers): self
    {
        $this->initialized['autoLockManagers'] = true;
        $this->autoLockManagers = $autoLockManagers;

        return $this;
    }
}
