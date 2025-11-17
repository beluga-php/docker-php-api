<?php

declare(strict_types=1);

namespace Docker\API\Model;

class TaskSpecContainerSpecPrivilegesSeccomp extends \ArrayObject
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
    /**
     * The custom seccomp profile as a json object.
     *
     * @var string|null
     */
    protected $profile;

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

    /**
     * The custom seccomp profile as a json object.
     */
    public function getProfile(): ?string
    {
        return $this->profile;
    }

    /**
     * The custom seccomp profile as a json object.
     */
    public function setProfile(?string $profile): self
    {
        $this->initialized['profile'] = true;
        $this->profile = $profile;

        return $this;
    }
}
