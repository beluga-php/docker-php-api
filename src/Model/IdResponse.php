<?php

declare(strict_types=1);

namespace Docker\API\Model;

class IdResponse extends \ArrayObject
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
     * The id of the newly created object.
     *
     * @var string|null
     */
    protected $id;

    /**
     * The id of the newly created object.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The id of the newly created object.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }
}
