<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ContainerSummaryItem extends \ArrayObject
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
     * The ID of this container.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The names that this container has been given.
     *
     * @var string[]|null
     */
    protected $names;
    /**
     * The name of the image used when creating this container.
     *
     * @var string|null
     */
    protected $image;
    /**
     * The ID of the image that this container was created from.
     *
     * @var string|null
     */
    protected $imageID;
    /**
     * Command to run when starting the container.
     *
     * @var string|null
     */
    protected $command;
    /**
     * When the container was created.
     *
     * @var int|null
     */
    protected $created;
    /**
     * The ports exposed by this container.
     *
     * @var Port[]|null
     */
    protected $ports;
    /**
     * The size of files that have been created or changed by this container.
     *
     * @var int|null
     */
    protected $sizeRw;
    /**
     * The total size of all the files in this container.
     *
     * @var int|null
     */
    protected $sizeRootFs;
    /**
     * User-defined key/value metadata.
     *
     * @var string[]|null
     */
    protected $labels;
    /**
     * The state of this container (e.g. `Exited`).
     *
     * @var string|null
     */
    protected $state;
    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     *
     * @var string|null
     */
    protected $status;
    /**
     * @var ContainerSummaryItemHostConfig|null
     */
    protected $hostConfig;
    /**
     * A summary of the container's network settings.
     *
     * @var ContainerSummaryItemNetworkSettings|null
     */
    protected $networkSettings;
    /**
     * @var Mount[]|null
     */
    protected $mounts;

    /**
     * The ID of this container.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * The ID of this container.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The names that this container has been given.
     *
     * @return string[]|null
     */
    public function getNames(): ?array
    {
        return $this->names;
    }

    /**
     * The names that this container has been given.
     *
     * @param string[]|null $names
     */
    public function setNames(?array $names): self
    {
        $this->initialized['names'] = true;
        $this->names = $names;

        return $this;
    }

    /**
     * The name of the image used when creating this container.
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * The name of the image used when creating this container.
     */
    public function setImage(?string $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;

        return $this;
    }

    /**
     * The ID of the image that this container was created from.
     */
    public function getImageID(): ?string
    {
        return $this->imageID;
    }

    /**
     * The ID of the image that this container was created from.
     */
    public function setImageID(?string $imageID): self
    {
        $this->initialized['imageID'] = true;
        $this->imageID = $imageID;

        return $this;
    }

    /**
     * Command to run when starting the container.
     */
    public function getCommand(): ?string
    {
        return $this->command;
    }

    /**
     * Command to run when starting the container.
     */
    public function setCommand(?string $command): self
    {
        $this->initialized['command'] = true;
        $this->command = $command;

        return $this;
    }

    /**
     * When the container was created.
     */
    public function getCreated(): ?int
    {
        return $this->created;
    }

    /**
     * When the container was created.
     */
    public function setCreated(?int $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * The ports exposed by this container.
     *
     * @return Port[]|null
     */
    public function getPorts(): ?array
    {
        return $this->ports;
    }

    /**
     * The ports exposed by this container.
     *
     * @param Port[]|null $ports
     */
    public function setPorts(?array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }

    /**
     * The size of files that have been created or changed by this container.
     */
    public function getSizeRw(): ?int
    {
        return $this->sizeRw;
    }

    /**
     * The size of files that have been created or changed by this container.
     */
    public function setSizeRw(?int $sizeRw): self
    {
        $this->initialized['sizeRw'] = true;
        $this->sizeRw = $sizeRw;

        return $this;
    }

    /**
     * The total size of all the files in this container.
     */
    public function getSizeRootFs(): ?int
    {
        return $this->sizeRootFs;
    }

    /**
     * The total size of all the files in this container.
     */
    public function setSizeRootFs(?int $sizeRootFs): self
    {
        $this->initialized['sizeRootFs'] = true;
        $this->sizeRootFs = $sizeRootFs;

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
     * The state of this container (e.g. `Exited`).
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * The state of this container (e.g. `Exited`).
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    public function getHostConfig(): ?ContainerSummaryItemHostConfig
    {
        return $this->hostConfig;
    }

    public function setHostConfig(?ContainerSummaryItemHostConfig $hostConfig): self
    {
        $this->initialized['hostConfig'] = true;
        $this->hostConfig = $hostConfig;

        return $this;
    }

    /**
     * A summary of the container's network settings.
     */
    public function getNetworkSettings(): ?ContainerSummaryItemNetworkSettings
    {
        return $this->networkSettings;
    }

    /**
     * A summary of the container's network settings.
     */
    public function setNetworkSettings(?ContainerSummaryItemNetworkSettings $networkSettings): self
    {
        $this->initialized['networkSettings'] = true;
        $this->networkSettings = $networkSettings;

        return $this;
    }

    /**
     * @return Mount[]|null
     */
    public function getMounts(): ?array
    {
        return $this->mounts;
    }

    /**
     * @param Mount[]|null $mounts
     */
    public function setMounts(?array $mounts): self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;

        return $this;
    }
}
