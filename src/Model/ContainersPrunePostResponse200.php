<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainersPrunePostResponse200 implements AdditionalPropertiesInterface
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
     * Container IDs that were deleted.
     *
     * @var list<string>|null
     */
    protected $containersDeleted;
    /**
     * Disk space reclaimed in bytes.
     *
     * @var int|null
     */
    protected $spaceReclaimed;

    /**
     * Container IDs that were deleted.
     *
     * @return list<string>|null
     */
    public function getContainersDeleted(): ?array
    {
        return $this->containersDeleted;
    }

    /**
     * Container IDs that were deleted.
     *
     * @param list<string>|null $containersDeleted
     */
    public function setContainersDeleted(?array $containersDeleted): self
    {
        $this->initialized['containersDeleted'] = true;
        $this->containersDeleted = $containersDeleted;

        return $this;
    }

    /**
     * Disk space reclaimed in bytes.
     */
    public function getSpaceReclaimed(): ?int
    {
        return $this->spaceReclaimed;
    }

    /**
     * Disk space reclaimed in bytes.
     */
    public function setSpaceReclaimed(?int $spaceReclaimed): self
    {
        $this->initialized['spaceReclaimed'] = true;
        $this->spaceReclaimed = $spaceReclaimed;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['containersDeleted' => ['ContainersDeleted', 'getContainersDeleted', 'setContainersDeleted'], 'spaceReclaimed' => ['SpaceReclaimed', 'getSpaceReclaimed', 'setSpaceReclaimed']];
    }
}
