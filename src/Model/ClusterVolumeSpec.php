<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ClusterVolumeSpec implements AdditionalPropertiesInterface
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
     * Group defines the volume group of this volume. Volumes belonging to
     * the same group can be referred to by group name when creating
     * Services.  Referring to a volume by group instructs Swarm to treat
     * volumes in that group interchangeably for the purpose of scheduling.
     * Volumes with an empty string for a group technically all belong to
     * the same, emptystring group.
     *
     * @var string|null
     */
    protected $group;
    /**
     * Defines how the volume is used by tasks.
     *
     * @var ClusterVolumeSpecAccessMode|null
     */
    protected $accessMode;

    /**
     * Group defines the volume group of this volume. Volumes belonging to
     * the same group can be referred to by group name when creating
     * Services.  Referring to a volume by group instructs Swarm to treat
     * volumes in that group interchangeably for the purpose of scheduling.
     * Volumes with an empty string for a group technically all belong to
     * the same, emptystring group.
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }

    /**
     * Group defines the volume group of this volume. Volumes belonging to
     * the same group can be referred to by group name when creating
     * Services.  Referring to a volume by group instructs Swarm to treat
     * volumes in that group interchangeably for the purpose of scheduling.
     * Volumes with an empty string for a group technically all belong to
     * the same, emptystring group.
     */
    public function setGroup(?string $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;

        return $this;
    }

    /**
     * Defines how the volume is used by tasks.
     */
    public function getAccessMode(): ?ClusterVolumeSpecAccessMode
    {
        return $this->accessMode;
    }

    /**
     * Defines how the volume is used by tasks.
     */
    public function setAccessMode(?ClusterVolumeSpecAccessMode $accessMode): self
    {
        $this->initialized['accessMode'] = true;
        $this->accessMode = $accessMode;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['group' => ['Group', 'getGroup', 'setGroup'], 'accessMode' => ['AccessMode', 'getAccessMode', 'setAccessMode']];
    }
}
