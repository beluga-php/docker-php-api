<?php

declare(strict_types=1);

namespace Docker\API\Model;

class NetworksCreatePostResponse201 extends \ArrayObject
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
     * The ID of the created network.
     *
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $warning;

    /**
     * The ID of the created network.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID of the created network.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getWarning(): ?string
    {
        return $this->warning;
    }

    public function setWarning(?string $warning): self
    {
        $this->initialized['warning'] = true;
        $this->warning = $warning;

        return $this;
    }
}
