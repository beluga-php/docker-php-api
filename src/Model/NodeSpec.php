<?php

declare(strict_types=1);

namespace Docker\API\Model;

class NodeSpec extends \ArrayObject
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
     * Name for the node.
     *
     * @var string|null
     */
    protected $name;
    /**
     * User-defined key/value metadata.
     *
     * @var string[]|null
     */
    protected $labels;
    /**
     * Role of the node.
     *
     * @var string|null
     */
    protected $role;
    /**
     * Availability of the node.
     *
     * @var string|null
     */
    protected $availability;

    /**
     * Name for the node.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name for the node.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return string[]|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param string[]|null $labels
     */
    public function setLabels(?iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * Role of the node.
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * Role of the node.
     */
    public function setRole(?string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;

        return $this;
    }

    /**
     * Availability of the node.
     */
    public function getAvailability(): ?string
    {
        return $this->availability;
    }

    /**
     * Availability of the node.
     */
    public function setAvailability(?string $availability): self
    {
        $this->initialized['availability'] = true;
        $this->availability = $availability;

        return $this;
    }
}
