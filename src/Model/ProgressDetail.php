<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ProgressDetail extends \ArrayObject
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
     * @var int|null
     */
    protected $current;
    /**
     * @var int|null
     */
    protected $total;

    public function getCurrent(): ?int
    {
        return $this->current;
    }

    public function setCurrent(?int $current): self
    {
        $this->initialized['current'] = true;
        $this->current = $current;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): self
    {
        $this->initialized['total'] = true;
        $this->total = $total;

        return $this;
    }
}
