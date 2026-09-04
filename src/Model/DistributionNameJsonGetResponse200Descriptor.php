<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class DistributionNameJsonGetResponse200Descriptor implements AdditionalPropertiesInterface
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
     * @var list<string>|null
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
     * @return list<string>|null
     */
    public function getURLs(): ?array
    {
        return $this->uRLs;
    }

    /**
     * @param list<string>|null $uRLs
     */
    public function setURLs(?array $uRLs): self
    {
        $this->initialized['uRLs'] = true;
        $this->uRLs = $uRLs;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['mediaType' => ['MediaType', 'getMediaType', 'setMediaType'], 'size' => ['Size', 'getSize', 'setSize'], 'digest' => ['Digest', 'getDigest', 'setDigest'], 'uRLs' => ['URLs', 'getURLs', 'setURLs']];
    }
}
