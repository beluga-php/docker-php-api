<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class IPAMConfig implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
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
    protected $subnet;
    /**
     * @var string|null
     */
    protected $iPRange;
    /**
     * @var string|null
     */
    protected $gateway;
    /**
     * @var array<string, string>|null
     */
    protected $auxiliaryAddresses;

    public function getSubnet(): ?string
    {
        return $this->subnet;
    }

    public function setSubnet(?string $subnet): self
    {
        $this->initialized['subnet'] = true;
        $this->subnet = $subnet;

        return $this;
    }

    public function getIPRange(): ?string
    {
        return $this->iPRange;
    }

    public function setIPRange(?string $iPRange): self
    {
        $this->initialized['iPRange'] = true;
        $this->iPRange = $iPRange;

        return $this;
    }

    public function getGateway(): ?string
    {
        return $this->gateway;
    }

    public function setGateway(?string $gateway): self
    {
        $this->initialized['gateway'] = true;
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @return array<string, string>|null
     */
    public function getAuxiliaryAddresses(): ?iterable
    {
        return $this->auxiliaryAddresses;
    }

    /**
     * @param array<string, string>|null $auxiliaryAddresses
     */
    public function setAuxiliaryAddresses(?iterable $auxiliaryAddresses): self
    {
        $this->initialized['auxiliaryAddresses'] = true;
        $this->auxiliaryAddresses = $auxiliaryAddresses;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['subnet' => ['Subnet', 'getSubnet', 'setSubnet'], 'iPRange' => ['IPRange', 'getIPRange', 'setIPRange'], 'gateway' => ['Gateway', 'getGateway', 'setGateway'], 'auxiliaryAddresses' => ['AuxiliaryAddresses', 'getAuxiliaryAddresses', 'setAuxiliaryAddresses']];
    }
}
