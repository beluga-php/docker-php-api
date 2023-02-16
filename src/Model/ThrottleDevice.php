<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ThrottleDevice extends \ArrayObject
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
     * Device path.
     *
     * @var string|null
     */
    protected $path;
    /**
     * Rate.
     *
     * @var int|null
     */
    protected $rate;

    /**
     * Device path.
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * Device path.
     */
    public function setPath(?string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;

        return $this;
    }

    /**
     * Rate.
     */
    public function getRate(): ?int
    {
        return $this->rate;
    }

    /**
     * Rate.
     */
    public function setRate(?int $rate): self
    {
        $this->initialized['rate'] = true;
        $this->rate = $rate;

        return $this;
    }
}
