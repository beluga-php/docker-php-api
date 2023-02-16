<?php

declare(strict_types=1);

namespace Docker\API\Model;

class Network extends \ArrayObject
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
    protected $name;
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $created;
    /**
     * @var string|null
     */
    protected $scope;
    /**
     * @var string|null
     */
    protected $driver;
    /**
     * @var bool|null
     */
    protected $enableIPv6;
    /**
     * @var IPAM|null
     */
    protected $iPAM;
    /**
     * @var bool|null
     */
    protected $internal;
    /**
     * @var bool|null
     */
    protected $attachable;
    /**
     * @var bool|null
     */
    protected $ingress;
    /**
     * @var NetworkContainer[]|null
     */
    protected $containers;
    /**
     * @var string[]|null
     */
    protected $options;
    /**
     * @var string[]|null
     */
    protected $labels;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getCreated(): ?string
    {
        return $this->created;
    }

    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    public function getScope(): ?string
    {
        return $this->scope;
    }

    public function setScope(?string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    public function getDriver(): ?string
    {
        return $this->driver;
    }

    public function setDriver(?string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    public function getEnableIPv6(): ?bool
    {
        return $this->enableIPv6;
    }

    public function setEnableIPv6(?bool $enableIPv6): self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;

        return $this;
    }

    public function getIPAM(): ?IPAM
    {
        return $this->iPAM;
    }

    public function setIPAM(?IPAM $iPAM): self
    {
        $this->initialized['iPAM'] = true;
        $this->iPAM = $iPAM;

        return $this;
    }

    public function getInternal(): ?bool
    {
        return $this->internal;
    }

    public function setInternal(?bool $internal): self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;

        return $this;
    }

    public function getAttachable(): ?bool
    {
        return $this->attachable;
    }

    public function setAttachable(?bool $attachable): self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;

        return $this;
    }

    public function getIngress(): ?bool
    {
        return $this->ingress;
    }

    public function setIngress(?bool $ingress): self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;

        return $this;
    }

    /**
     * @return NetworkContainer[]|null
     */
    public function getContainers(): ?iterable
    {
        return $this->containers;
    }

    /**
     * @param NetworkContainer[]|null $containers
     */
    public function setContainers(?iterable $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getOptions(): ?iterable
    {
        return $this->options;
    }

    /**
     * @param string[]|null $options
     */
    public function setOptions(?iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * @param string[]|null $labels
     */
    public function setLabels(?iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }
}
