<?php

declare(strict_types=1);

namespace Docker\API\Model;

class DistributionInspect extends \ArrayObject
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
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor|null
     */
    protected $descriptor;
    /**
     * An array containing all platforms supported by the image.
     *
     * @var list<OCIPlatform>|null
     */
    protected $platforms;

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function getDescriptor(): ?OCIDescriptor
    {
        return $this->descriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function setDescriptor(?OCIDescriptor $descriptor): self
    {
        $this->initialized['descriptor'] = true;
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * An array containing all platforms supported by the image.
     *
     * @return list<OCIPlatform>|null
     */
    public function getPlatforms(): ?array
    {
        return $this->platforms;
    }

    /**
     * An array containing all platforms supported by the image.
     *
     * @param list<OCIPlatform>|null $platforms
     */
    public function setPlatforms(?array $platforms): self
    {
        $this->initialized['platforms'] = true;
        $this->platforms = $platforms;

        return $this;
    }
}
