<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PluginConfigLinux extends \ArrayObject
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
     * @var string[]|null
     */
    protected $capabilities;
    /**
     * @var bool|null
     */
    protected $allowAllDevices;
    /**
     * @var PluginDevice[]|null
     */
    protected $devices;

    /**
     * @return string[]|null
     */
    public function getCapabilities(): ?array
    {
        return $this->capabilities;
    }

    /**
     * @param string[]|null $capabilities
     */
    public function setCapabilities(?array $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;

        return $this;
    }

    public function getAllowAllDevices(): ?bool
    {
        return $this->allowAllDevices;
    }

    public function setAllowAllDevices(?bool $allowAllDevices): self
    {
        $this->initialized['allowAllDevices'] = true;
        $this->allowAllDevices = $allowAllDevices;

        return $this;
    }

    /**
     * @return PluginDevice[]|null
     */
    public function getDevices(): ?array
    {
        return $this->devices;
    }

    /**
     * @param PluginDevice[]|null $devices
     */
    public function setDevices(?array $devices): self
    {
        $this->initialized['devices'] = true;
        $this->devices = $devices;

        return $this;
    }
}
