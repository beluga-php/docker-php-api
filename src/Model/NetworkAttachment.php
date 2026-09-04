<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class NetworkAttachment implements AdditionalPropertiesInterface
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
     * @var Network|null
     */
    protected $network;
    /**
     * The IP addresses (in CIDR notation) assigned to the task on this
     * network. To maintain backward compatibility this field accepts CIDR
     * notation, but only the IP address is used.
     *
     * @var list<string>|null
     */
    protected $addresses;

    public function getNetwork(): ?Network
    {
        return $this->network;
    }

    public function setNetwork(?Network $network): self
    {
        $this->initialized['network'] = true;
        $this->network = $network;

        return $this;
    }

    /**
     * The IP addresses (in CIDR notation) assigned to the task on this
     * network. To maintain backward compatibility this field accepts CIDR
     * notation, but only the IP address is used.
     *
     * @return list<string>|null
     */
    public function getAddresses(): ?array
    {
        return $this->addresses;
    }

    /**
     * The IP addresses (in CIDR notation) assigned to the task on this
     * network. To maintain backward compatibility this field accepts CIDR
     * notation, but only the IP address is used.
     *
     * @param list<string>|null $addresses
     */
    public function setAddresses(?array $addresses): self
    {
        $this->initialized['addresses'] = true;
        $this->addresses = $addresses;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['network' => ['Network', 'getNetwork', 'setNetwork'], 'addresses' => ['Addresses', 'getAddresses', 'setAddresses']];
    }
}
