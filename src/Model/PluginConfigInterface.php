<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PluginConfigInterface extends \ArrayObject
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
     * @var PluginInterfaceType[]|null
     */
    protected $types;
    /**
     * @var string|null
     */
    protected $socket;
    /**
     * Protocol to use for clients connecting to the plugin.
     *
     * @var string|null
     */
    protected $protocolScheme;

    /**
     * @return PluginInterfaceType[]|null
     */
    public function getTypes(): ?array
    {
        return $this->types;
    }

    /**
     * @param PluginInterfaceType[]|null $types
     */
    public function setTypes(?array $types): self
    {
        $this->initialized['types'] = true;
        $this->types = $types;

        return $this;
    }

    public function getSocket(): ?string
    {
        return $this->socket;
    }

    public function setSocket(?string $socket): self
    {
        $this->initialized['socket'] = true;
        $this->socket = $socket;

        return $this;
    }

    /**
     * Protocol to use for clients connecting to the plugin.
     */
    public function getProtocolScheme(): ?string
    {
        return $this->protocolScheme;
    }

    /**
     * Protocol to use for clients connecting to the plugin.
     */
    public function setProtocolScheme(?string $protocolScheme): self
    {
        $this->initialized['protocolScheme'] = true;
        $this->protocolScheme = $protocolScheme;

        return $this;
    }
}
