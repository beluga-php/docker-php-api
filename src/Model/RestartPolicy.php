<?php

declare(strict_types=1);

namespace Docker\API\Model;

class RestartPolicy extends \ArrayObject
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
     * - Empty string means not to restart
     * - `always` Always restart
     * - `unless-stopped` Restart always except when the user has manually stopped the container
     * - `on-failure` Restart only when the container exit code is non-zero.
     *
     * @var string|null
     */
    protected $name;
    /**
     * If `on-failure` is used, the number of times to retry before giving up.
     *
     * @var int|null
     */
    protected $maximumRetryCount;

    /**
     * - Empty string means not to restart
     * - `always` Always restart
     * - `unless-stopped` Restart always except when the user has manually stopped the container
     * - `on-failure` Restart only when the container exit code is non-zero.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * - Empty string means not to restart
     * - `always` Always restart
     * - `unless-stopped` Restart always except when the user has manually stopped the container
     * - `on-failure` Restart only when the container exit code is non-zero.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * If `on-failure` is used, the number of times to retry before giving up.
     */
    public function getMaximumRetryCount(): ?int
    {
        return $this->maximumRetryCount;
    }

    /**
     * If `on-failure` is used, the number of times to retry before giving up.
     */
    public function setMaximumRetryCount(?int $maximumRetryCount): self
    {
        $this->initialized['maximumRetryCount'] = true;
        $this->maximumRetryCount = $maximumRetryCount;

        return $this;
    }
}
