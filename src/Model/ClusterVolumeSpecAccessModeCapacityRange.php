<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ClusterVolumeSpecAccessModeCapacityRange implements AdditionalPropertiesInterface
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
     * The volume must be at least this big. The value of 0
     * indicates an unspecified minimum.
     *
     * @var int|null
     */
    protected $requiredBytes;
    /**
     * The volume must not be bigger than this. The value of 0
     * indicates an unspecified maximum.
     *
     * @var int|null
     */
    protected $limitBytes;

    /**
     * The volume must be at least this big. The value of 0
     * indicates an unspecified minimum.
     */
    public function getRequiredBytes(): ?int
    {
        return $this->requiredBytes;
    }

    /**
     * The volume must be at least this big. The value of 0
     * indicates an unspecified minimum.
     */
    public function setRequiredBytes(?int $requiredBytes): self
    {
        $this->initialized['requiredBytes'] = true;
        $this->requiredBytes = $requiredBytes;

        return $this;
    }

    /**
     * The volume must not be bigger than this. The value of 0
     * indicates an unspecified maximum.
     */
    public function getLimitBytes(): ?int
    {
        return $this->limitBytes;
    }

    /**
     * The volume must not be bigger than this. The value of 0
     * indicates an unspecified maximum.
     */
    public function setLimitBytes(?int $limitBytes): self
    {
        $this->initialized['limitBytes'] = true;
        $this->limitBytes = $limitBytes;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['requiredBytes' => ['RequiredBytes', 'getRequiredBytes', 'setRequiredBytes'], 'limitBytes' => ['LimitBytes', 'getLimitBytes', 'setLimitBytes']];
    }
}
