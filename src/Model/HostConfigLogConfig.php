<?php

declare(strict_types=1);

namespace Docker\API\Model;

class HostConfigLogConfig extends \ArrayObject
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
    protected $type;
    /**
     * @var string[]|null
     */
    protected $config;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getConfig(): ?iterable
    {
        return $this->config;
    }

    /**
     * @param string[]|null $config
     */
    public function setConfig(?iterable $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }
}
