<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ConfigSpec implements AdditionalPropertiesInterface
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
     * User-defined name of the config.
     *
     * @var string|null
     */
    protected $name;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>|null
     */
    protected $labels;
    /**
     * Data is the data to store as a config, formatted as a standard base64-encoded
     * ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-4)) string.
     * The maximum allowed size is 1000KB, as defined in [MaxConfigSize](https://pkg.go.dev/github.com/moby/swarmkit/v2@v2.0.0-20250103191802-8c1959736554/manager/controlapi#MaxConfigSize).
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
     * @return array<string, string>|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string>|null $labels
     */
    public function setLabels(?iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * Data is the data to store as a config, formatted as a standard base64-encoded
     * ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-4)) string.
     * The maximum allowed size is 1000KB, as defined in [MaxConfigSize](https://pkg.go.dev/github.com/moby/swarmkit/v2@v2.0.0-20250103191802-8c1959736554/manager/controlapi#MaxConfigSize).
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Data is the data to store as a config, formatted as a standard base64-encoded
     * ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-4)) string.
     * The maximum allowed size is 1000KB, as defined in [MaxConfigSize](https://pkg.go.dev/github.com/moby/swarmkit/v2@v2.0.0-20250103191802-8c1959736554/manager/controlapi#MaxConfigSize).
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

    public function definedProperties(): array
    {
        return ['name' => ['Name', 'getName', 'setName'], 'labels' => ['Labels', 'getLabels', 'setLabels'], 'data' => ['Data', 'getData', 'setData'], 'templating' => ['Templating', 'getTemplating', 'setTemplating']];
    }
}
