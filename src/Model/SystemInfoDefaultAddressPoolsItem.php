<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SystemInfoDefaultAddressPoolsItem extends \ArrayObject
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
     * The network address in CIDR format.
     *
     * @var string|null
     */
    protected $base;
    /**
     * The network pool size.
     *
     * @var int|null
     */
    protected $size;

    /**
     * The network address in CIDR format.
     */
    public function getBase(): ?string
    {
        return $this->base;
    }

    /**
     * The network address in CIDR format.
     */
    public function setBase(?string $base): self
    {
        $this->initialized['base'] = true;
        $this->base = $base;

        return $this;
    }

    /**
     * The network pool size.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * The network pool size.
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }
}
