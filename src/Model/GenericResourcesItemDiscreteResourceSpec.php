<?php

declare(strict_types=1);

namespace Docker\API\Model;

class GenericResourcesItemDiscreteResourceSpec extends \ArrayObject
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
    protected $kind;
    /**
     * @var int|null
     */
    protected $value;

    public function getKind(): ?string
    {
        return $this->kind;
    }

    public function setKind(?string $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
