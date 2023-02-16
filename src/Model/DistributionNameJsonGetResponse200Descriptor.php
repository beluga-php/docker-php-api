<?php

declare(strict_types=1);

namespace Docker\API\Model;

class DistributionNameJsonGetResponse200Descriptor extends \ArrayObject
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
    protected $mediaType;
    /**
     * @var int|null
     */
    protected $size;
    /**
     * @var string|null
     */
    protected $digest;
    /**
     * @var string[]|null
     */
    protected $uRLs;

    public function getMediaType(): ?string
    {
        return $this->mediaType;
    }

    public function setMediaType(?string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    public function getDigest(): ?string
    {
        return $this->digest;
    }

    public function setDigest(?string $digest): self
    {
        $this->initialized['digest'] = true;
        $this->digest = $digest;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getURLs(): ?array
    {
        return $this->uRLs;
    }

    /**
     * @param string[]|null $uRLs
     */
    public function setURLs(?array $uRLs): self
    {
        $this->initialized['uRLs'] = true;
        $this->uRLs = $uRLs;

        return $this;
    }
}
