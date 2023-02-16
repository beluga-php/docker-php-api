<?php

declare(strict_types=1);

namespace Docker\API\Model;

class EndpointSettings extends \ArrayObject
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
     * EndpointIPAMConfig represents an endpoint's IPAM configuration.
     *
     * @var EndpointIPAMConfig|null
     */
    protected $iPAMConfig;
    /**
     * @var string[]|null
     */
    protected $links;
    /**
     * @var string[]|null
     */
    protected $aliases;
    /**
     * Unique ID of the network.
     *
     * @var string|null
     */
    protected $networkID;
    /**
     * Unique ID for the service endpoint in a Sandbox.
     *
     * @var string|null
     */
    protected $endpointID;
    /**
     * Gateway address for this network.
     *
     * @var string|null
     */
    protected $gateway;
    /**
     * IPv4 address.
     *
     * @var string|null
     */
    protected $iPAddress;
    /**
     * Mask length of the IPv4 address.
     *
     * @var int|null
     */
    protected $iPPrefixLen;
    /**
     * IPv6 gateway address.
     *
     * @var string|null
     */
    protected $iPv6Gateway;
    /**
     * Global IPv6 address.
     *
     * @var string|null
     */
    protected $globalIPv6Address;
    /**
     * Mask length of the global IPv6 address.
     *
     * @var int|null
     */
    protected $globalIPv6PrefixLen;
    /**
     * MAC address for the endpoint on this network.
     *
     * @var string|null
     */
    protected $macAddress;
    /**
     * DriverOpts is a mapping of driver options and values. These options
     * are passed directly to the driver and are driver specific.
     *
     * @var string[]|null
     */
    protected $driverOpts;

    /**
     * EndpointIPAMConfig represents an endpoint's IPAM configuration.
     */
    public function getIPAMConfig(): ?EndpointIPAMConfig
    {
        return $this->iPAMConfig;
    }

    /**
     * EndpointIPAMConfig represents an endpoint's IPAM configuration.
     */
    public function setIPAMConfig(?EndpointIPAMConfig $iPAMConfig): self
    {
        $this->initialized['iPAMConfig'] = true;
        $this->iPAMConfig = $iPAMConfig;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getLinks(): ?array
    {
        return $this->links;
    }

    /**
     * @param string[]|null $links
     */
    public function setLinks(?array $links): self
    {
        $this->initialized['links'] = true;
        $this->links = $links;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getAliases(): ?array
    {
        return $this->aliases;
    }

    /**
     * @param string[]|null $aliases
     */
    public function setAliases(?array $aliases): self
    {
        $this->initialized['aliases'] = true;
        $this->aliases = $aliases;

        return $this;
    }

    /**
     * Unique ID of the network.
     */
    public function getNetworkID(): ?string
    {
        return $this->networkID;
    }

    /**
     * Unique ID of the network.
     */
    public function setNetworkID(?string $networkID): self
    {
        $this->initialized['networkID'] = true;
        $this->networkID = $networkID;

        return $this;
    }

    /**
     * Unique ID for the service endpoint in a Sandbox.
     */
    public function getEndpointID(): ?string
    {
        return $this->endpointID;
    }

    /**
     * Unique ID for the service endpoint in a Sandbox.
     */
    public function setEndpointID(?string $endpointID): self
    {
        $this->initialized['endpointID'] = true;
        $this->endpointID = $endpointID;

        return $this;
    }

    /**
     * Gateway address for this network.
     */
    public function getGateway(): ?string
    {
        return $this->gateway;
    }

    /**
     * Gateway address for this network.
     */
    public function setGateway(?string $gateway): self
    {
        $this->initialized['gateway'] = true;
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * IPv4 address.
     */
    public function getIPAddress(): ?string
    {
        return $this->iPAddress;
    }

    /**
     * IPv4 address.
     */
    public function setIPAddress(?string $iPAddress): self
    {
        $this->initialized['iPAddress'] = true;
        $this->iPAddress = $iPAddress;

        return $this;
    }

    /**
     * Mask length of the IPv4 address.
     */
    public function getIPPrefixLen(): ?int
    {
        return $this->iPPrefixLen;
    }

    /**
     * Mask length of the IPv4 address.
     */
    public function setIPPrefixLen(?int $iPPrefixLen): self
    {
        $this->initialized['iPPrefixLen'] = true;
        $this->iPPrefixLen = $iPPrefixLen;

        return $this;
    }

    /**
     * IPv6 gateway address.
     */
    public function getIPv6Gateway(): ?string
    {
        return $this->iPv6Gateway;
    }

    /**
     * IPv6 gateway address.
     */
    public function setIPv6Gateway(?string $iPv6Gateway): self
    {
        $this->initialized['iPv6Gateway'] = true;
        $this->iPv6Gateway = $iPv6Gateway;

        return $this;
    }

    /**
     * Global IPv6 address.
     */
    public function getGlobalIPv6Address(): ?string
    {
        return $this->globalIPv6Address;
    }

    /**
     * Global IPv6 address.
     */
    public function setGlobalIPv6Address(?string $globalIPv6Address): self
    {
        $this->initialized['globalIPv6Address'] = true;
        $this->globalIPv6Address = $globalIPv6Address;

        return $this;
    }

    /**
     * Mask length of the global IPv6 address.
     */
    public function getGlobalIPv6PrefixLen(): ?int
    {
        return $this->globalIPv6PrefixLen;
    }

    /**
     * Mask length of the global IPv6 address.
     */
    public function setGlobalIPv6PrefixLen(?int $globalIPv6PrefixLen): self
    {
        $this->initialized['globalIPv6PrefixLen'] = true;
        $this->globalIPv6PrefixLen = $globalIPv6PrefixLen;

        return $this;
    }

    /**
     * MAC address for the endpoint on this network.
     */
    public function getMacAddress(): ?string
    {
        return $this->macAddress;
    }

    /**
     * MAC address for the endpoint on this network.
     */
    public function setMacAddress(?string $macAddress): self
    {
        $this->initialized['macAddress'] = true;
        $this->macAddress = $macAddress;

        return $this;
    }

    /**
     * DriverOpts is a mapping of driver options and values. These options
     * are passed directly to the driver and are driver specific.
     *
     * @return string[]|null
     */
    public function getDriverOpts(): ?iterable
    {
        return $this->driverOpts;
    }

    /**
     * DriverOpts is a mapping of driver options and values. These options
     * are passed directly to the driver and are driver specific.
     *
     * @param string[]|null $driverOpts
     */
    public function setDriverOpts(?iterable $driverOpts): self
    {
        $this->initialized['driverOpts'] = true;
        $this->driverOpts = $driverOpts;

        return $this;
    }
}
