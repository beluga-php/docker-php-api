<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ConfigsCreatePostBody extends \ArrayObject
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
     * User-defined name of the config.
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
     * Base64-url-safe-encoded ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-5))
     * config data.
     *
     * @var string|null
     */
    protected $data;
    /**
     * Driver represents a driver (network, logging, secrets).
     *
     * @var Driver|null
     */
    protected $templating;

    /**
     * User-defined name of the config.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * User-defined name of the config.
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
     * Base64-url-safe-encoded ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-5))
     * config data.
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Base64-url-safe-encoded ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-5))
     * config data.
     */
    public function setData(?string $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }

    /**
     * Driver represents a driver (network, logging, secrets).
     */
    public function getTemplating(): ?Driver
    {
        return $this->templating;
    }

    /**
     * Driver represents a driver (network, logging, secrets).
     */
    public function setTemplating(?Driver $templating): self
    {
        $this->initialized['templating'] = true;
        $this->templating = $templating;

        return $this;
    }
}
