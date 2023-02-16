<?php

declare(strict_types=1);

namespace Docker\API\Model;

class GenericResourcesItem extends \ArrayObject
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
     * @var GenericResourcesItemNamedResourceSpec|null
     */
    protected $namedResourceSpec;
    /**
     * @var GenericResourcesItemDiscreteResourceSpec|null
     */
    protected $discreteResourceSpec;

    public function getNamedResourceSpec(): ?GenericResourcesItemNamedResourceSpec
    {
        return $this->namedResourceSpec;
    }

    public function setNamedResourceSpec(?GenericResourcesItemNamedResourceSpec $namedResourceSpec): self
    {
        $this->initialized['namedResourceSpec'] = true;
        $this->namedResourceSpec = $namedResourceSpec;

        return $this;
    }

    public function getDiscreteResourceSpec(): ?GenericResourcesItemDiscreteResourceSpec
    {
        return $this->discreteResourceSpec;
    }

    public function setDiscreteResourceSpec(?GenericResourcesItemDiscreteResourceSpec $discreteResourceSpec): self
    {
        $this->initialized['discreteResourceSpec'] = true;
        $this->discreteResourceSpec = $discreteResourceSpec;

        return $this;
    }
}
