<?php

declare(strict_types=1);

namespace Docker\API\Model;

class BuildCache extends \ArrayObject
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
    protected $iD;
    /**
     * @var string|null
     */
    protected $parent;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * @var string|null
     */
    protected $description;
    /**
     * @var bool|null
     */
    protected $inUse;
    /**
     * @var bool|null
     */
    protected $shared;
    /**
     * Amount of disk space used by the build cache (in bytes).
     *
     * @var int|null
     */
    protected $size;
    /**
     * Date and time at which the build cache was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string|null
     */
    protected $createdAt;
    /**
     * Date and time at which the build cache was last used in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string|null
     */
    protected $lastUsedAt;
    /**
     * @var int|null
     */
    protected $usageCount;

    public function getID(): ?string
    {
        return $this->iD;
    }

    public function setID(?string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->initialized['parent'] = true;
        $this->parent = $parent;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    public function getInUse(): ?bool
    {
        return $this->inUse;
    }

    public function setInUse(?bool $inUse): self
    {
        $this->initialized['inUse'] = true;
        $this->inUse = $inUse;

        return $this;
    }

    public function getShared(): ?bool
    {
        return $this->shared;
    }

    public function setShared(?bool $shared): self
    {
        $this->initialized['shared'] = true;
        $this->shared = $shared;

        return $this;
    }

    /**
     * Amount of disk space used by the build cache (in bytes).
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * Amount of disk space used by the build cache (in bytes).
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Date and time at which the build cache was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Date and time at which the build cache was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setCreatedAt(?string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date and time at which the build cache was last used in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getLastUsedAt(): ?string
    {
        return $this->lastUsedAt;
    }

    /**
     * Date and time at which the build cache was last used in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setLastUsedAt(?string $lastUsedAt): self
    {
        $this->initialized['lastUsedAt'] = true;
        $this->lastUsedAt = $lastUsedAt;

        return $this;
    }

    public function getUsageCount(): ?int
    {
        return $this->usageCount;
    }

    public function setUsageCount(?int $usageCount): self
    {
        $this->initialized['usageCount'] = true;
        $this->usageCount = $usageCount;

        return $this;
    }
}
