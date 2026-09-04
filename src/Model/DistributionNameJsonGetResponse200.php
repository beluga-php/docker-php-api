<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class DistributionNameJsonGetResponse200 implements AdditionalPropertiesInterface
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
     * A descriptor struct containing digest, media type, and size.
     *
     * @var DistributionNameJsonGetResponse200Descriptor|null
     */
    protected $descriptor;
    /**
     * An array containing all platforms supported by the image.
     *
     * @var list<DistributionNameJsonGetResponse200PlatformsItem>|null
     */
    protected $platforms;

    /**
     * A descriptor struct containing digest, media type, and size.
     */
    public function getDescriptor(): ?DistributionNameJsonGetResponse200Descriptor
    {
        return $this->descriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size.
     */
    public function setDescriptor(?DistributionNameJsonGetResponse200Descriptor $descriptor): self
    {
        $this->initialized['descriptor'] = true;
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * An array containing all platforms supported by the image.
     *
     * @return list<DistributionNameJsonGetResponse200PlatformsItem>|null
     */
    public function getPlatforms(): ?array
    {
        return $this->platforms;
    }

    /**
     * An array containing all platforms supported by the image.
     *
     * @param list<DistributionNameJsonGetResponse200PlatformsItem>|null $platforms
     */
    public function setPlatforms(?array $platforms): self
    {
        $this->initialized['platforms'] = true;
        $this->platforms = $platforms;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['descriptor' => ['Descriptor', 'getDescriptor', 'setDescriptor'], 'platforms' => ['Platforms', 'getPlatforms', 'setPlatforms']];
    }
}
