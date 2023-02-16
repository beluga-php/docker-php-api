<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ObjectVersion extends \ArrayObject
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
    protected $index;

    public function getIndex(): ?int
    {
        return $this->index;
    }

    public function setIndex(?int $index): self
    {
        $this->initialized['index'] = true;
        $this->index = $index;

        return $this;
    }
}
