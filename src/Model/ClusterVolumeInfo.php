<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ClusterVolumeInfo extends \ArrayObject
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
     * The capacity of the volume in bytes. A value of 0 indicates that
     * the capacity is unknown.
     *
     * @var int|null
     */
    protected $capacityBytes;
    /**
     * A map of strings to strings returned from the storage plugin when
     * the volume is created.
     *
     * @var array<string, string>|null
     */
    protected $volumeContext;
    /**
     * The ID of the volume as returned by the CSI storage plugin. This
     * is distinct from the volume's ID as provided by Docker. This ID
     * is never used by the user when communicating with Docker to refer
     * to this volume. If the ID is blank, then the Volume has not been
     * successfully created in the plugin yet.
     *
     * @var string|null
     */
    protected $volumeID;
    /**
     * The topology this volume is actually accessible from.
     *
     * @var list<array<string, string>>|null
     */
    protected $accessibleTopology;

    /**
     * The capacity of the volume in bytes. A value of 0 indicates that
     * the capacity is unknown.
     */
    public function getCapacityBytes(): ?int
    {
        return $this->capacityBytes;
    }

    /**
     * The capacity of the volume in bytes. A value of 0 indicates that
     * the capacity is unknown.
     */
    public function setCapacityBytes(?int $capacityBytes): self
    {
        $this->initialized['capacityBytes'] = true;
        $this->capacityBytes = $capacityBytes;

        return $this;
    }

    /**
     * A map of strings to strings returned from the storage plugin when
     * the volume is created.
     *
     * @return array<string, string>|null
     */
    public function getVolumeContext(): ?iterable
    {
        return $this->volumeContext;
    }

    /**
     * A map of strings to strings returned from the storage plugin when
     * the volume is created.
     *
     * @param array<string, string>|null $volumeContext
     */
    public function setVolumeContext(?iterable $volumeContext): self
    {
        $this->initialized['volumeContext'] = true;
        $this->volumeContext = $volumeContext;

        return $this;
    }

    /**
     * The ID of the volume as returned by the CSI storage plugin. This
     * is distinct from the volume's ID as provided by Docker. This ID
     * is never used by the user when communicating with Docker to refer
     * to this volume. If the ID is blank, then the Volume has not been
     * successfully created in the plugin yet.
     */
    public function getVolumeID(): ?string
    {
        return $this->volumeID;
    }

    /**
     * The ID of the volume as returned by the CSI storage plugin. This
     * is distinct from the volume's ID as provided by Docker. This ID
     * is never used by the user when communicating with Docker to refer
     * to this volume. If the ID is blank, then the Volume has not been
     * successfully created in the plugin yet.
     */
    public function setVolumeID(?string $volumeID): self
    {
        $this->initialized['volumeID'] = true;
        $this->volumeID = $volumeID;

        return $this;
    }

    /**
     * The topology this volume is actually accessible from.
     *
     * @return list<array<string, string>>|null
     */
    public function getAccessibleTopology(): ?array
    {
        return $this->accessibleTopology;
    }

    /**
     * The topology this volume is actually accessible from.
     *
     * @param list<array<string, string>>|null $accessibleTopology
     */
    public function setAccessibleTopology(?array $accessibleTopology): self
    {
        $this->initialized['accessibleTopology'] = true;
        $this->accessibleTopology = $accessibleTopology;

        return $this;
    }
}
