<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class OCIDescriptor implements AdditionalPropertiesInterface
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
     * The media type of the object this schema refers to.
     *
     * @var string|null
     */
    protected $mediaType;
    /**
     * The digest of the targeted content.
     *
     * @var string|null
     */
    protected $digest;
    /**
     * The size in bytes of the blob.
     *
     * @var int|null
     */
    protected $size;

    /**
     * The media type of the object this schema refers to.
     */
    public function getMediaType(): ?string
    {
        return $this->mediaType;
    }

    /**
     * The media type of the object this schema refers to.
     */
    public function setMediaType(?string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * The digest of the targeted content.
     */
    public function getDigest(): ?string
    {
        return $this->digest;
    }

    /**
     * The digest of the targeted content.
     */
    public function setDigest(?string $digest): self
    {
        $this->initialized['digest'] = true;
        $this->digest = $digest;

        return $this;
    }

    /**
     * The size in bytes of the blob.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * The size in bytes of the blob.
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['mediaType' => ['mediaType', 'getMediaType', 'setMediaType'], 'digest' => ['digest', 'getDigest', 'setDigest'], 'size' => ['size', 'getSize', 'setSize']];
    }
}
