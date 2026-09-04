<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ImageInspectMetadata implements AdditionalPropertiesInterface
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
     * Date and time at which the image was last tagged in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if the image was tagged locally,
     * and omitted otherwise.
     *
     * @var string|null
     */
    protected $lastTagTime;

    /**
     * Date and time at which the image was last tagged in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if the image was tagged locally,
     * and omitted otherwise.
     */
    public function getLastTagTime(): ?string
    {
        return $this->lastTagTime;
    }

    /**
     * Date and time at which the image was last tagged in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if the image was tagged locally,
     * and omitted otherwise.
     */
    public function setLastTagTime(?string $lastTagTime): self
    {
        $this->initialized['lastTagTime'] = true;
        $this->lastTagTime = $lastTagTime;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['lastTagTime' => ['LastTagTime', 'getLastTagTime', 'setLastTagTime']];
    }
}
