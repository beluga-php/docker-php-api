<?php

namespace Docker\API\Model;

class DistributionNameJsonGetResponse200 extends \ArrayObject
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
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
     * @var DistributionNameJsonGetResponse200PlatformsItem[]|null
     */
    protected $platforms;
    /**
     * A descriptor struct containing digest, media type, and size.
     *
     * @return DistributionNameJsonGetResponse200Descriptor|null
     */
    public function getDescriptor() : ?DistributionNameJsonGetResponse200Descriptor
    {
        return $this->descriptor;
    }
    /**
     * A descriptor struct containing digest, media type, and size.
     *
     * @param DistributionNameJsonGetResponse200Descriptor|null $descriptor
     *
     * @return self
     */
    public function setDescriptor(?DistributionNameJsonGetResponse200Descriptor $descriptor) : self
    {
        $this->initialized['descriptor'] = true;
        $this->descriptor = $descriptor;
        return $this;
    }
    /**
     * An array containing all platforms supported by the image.
     *
     * @return DistributionNameJsonGetResponse200PlatformsItem[]|null
     */
    public function getPlatforms() : ?array
    {
        return $this->platforms;
    }
    /**
     * An array containing all platforms supported by the image.
     *
     * @param DistributionNameJsonGetResponse200PlatformsItem[]|null $platforms
     *
     * @return self
     */
    public function setPlatforms(?array $platforms) : self
    {
        $this->initialized['platforms'] = true;
        $this->platforms = $platforms;
        return $this;
    }
}