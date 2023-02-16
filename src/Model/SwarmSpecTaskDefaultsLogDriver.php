<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SwarmSpecTaskDefaultsLogDriver extends \ArrayObject
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
     * The log driver to use as a default for new tasks.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Driver-specific options for the selectd log driver, specified
     * as key/value pairs.
     *
     * @var string[]|null
     */
    protected $options;

    /**
     * The log driver to use as a default for new tasks.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * The log driver to use as a default for new tasks.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Driver-specific options for the selectd log driver, specified
     * as key/value pairs.
     *
     * @return string[]|null
     */
    public function getOptions(): ?iterable
    {
        return $this->options;
    }

    /**
     * Driver-specific options for the selectd log driver, specified
     * as key/value pairs.
     *
     * @param string[]|null $options
     */
    public function setOptions(?iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }
}
