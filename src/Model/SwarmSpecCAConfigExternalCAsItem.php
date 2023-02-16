<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SwarmSpecCAConfigExternalCAsItem extends \ArrayObject
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
     * Protocol for communication with the external CA (currently
     * only `cfssl` is supported).
     *
     * @var string|null
     */
    protected $protocol = 'cfssl';
    /**
     * URL where certificate signing requests should be sent.
     *
     * @var string|null
     */
    protected $uRL;
    /**
     * An object with key/value pairs that are interpreted as
     * protocol-specific options for the external CA driver.
     *
     * @var string[]|null
     */
    protected $options;
    /**
     * The root CA certificate (in PEM format) this external CA uses
     * to issue TLS certificates (assumed to be to the current swarm
     * root CA certificate if not provided).
     *
     * @var string|null
     */
    protected $cACert;

    /**
     * Protocol for communication with the external CA (currently
     * only `cfssl` is supported).
     */
    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    /**
     * Protocol for communication with the external CA (currently
     * only `cfssl` is supported).
     */
    public function setProtocol(?string $protocol): self
    {
        $this->initialized['protocol'] = true;
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * URL where certificate signing requests should be sent.
     */
    public function getURL(): ?string
    {
        return $this->uRL;
    }

    /**
     * URL where certificate signing requests should be sent.
     */
    public function setURL(?string $uRL): self
    {
        $this->initialized['uRL'] = true;
        $this->uRL = $uRL;

        return $this;
    }

    /**
     * An object with key/value pairs that are interpreted as
     * protocol-specific options for the external CA driver.
     *
     * @return string[]|null
     */
    public function getOptions(): ?iterable
    {
        return $this->options;
    }

    /**
     * An object with key/value pairs that are interpreted as
     * protocol-specific options for the external CA driver.
     *
     * @param string[]|null $options
     */
    public function setOptions(?iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * The root CA certificate (in PEM format) this external CA uses
     * to issue TLS certificates (assumed to be to the current swarm
     * root CA certificate if not provided).
     */
    public function getCACert(): ?string
    {
        return $this->cACert;
    }

    /**
     * The root CA certificate (in PEM format) this external CA uses
     * to issue TLS certificates (assumed to be to the current swarm
     * root CA certificate if not provided).
     */
    public function setCACert(?string $cACert): self
    {
        $this->initialized['cACert'] = true;
        $this->cACert = $cACert;

        return $this;
    }
}
