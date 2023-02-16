<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SwarmUnlockPostBody extends \ArrayObject
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
     * The swarm's unlock key.
     *
     * @var string|null
     */
    protected $unlockKey;

    /**
     * The swarm's unlock key.
     */
    public function getUnlockKey(): ?string
    {
        return $this->unlockKey;
    }

    /**
     * The swarm's unlock key.
     */
    public function setUnlockKey(?string $unlockKey): self
    {
        $this->initialized['unlockKey'] = true;
        $this->unlockKey = $unlockKey;

        return $this;
    }
}
