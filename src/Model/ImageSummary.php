<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ImageSummary extends \ArrayObject
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
    protected $id;
    /**
     * @var string|null
     */
    protected $parentId;
    /**
     * @var string[]|null
     */
    protected $repoTags;
    /**
     * @var string[]|null
     */
    protected $repoDigests;
    /**
     * @var int|null
     */
    protected $created;
    /**
     * @var int|null
     */
    protected $size;
    /**
     * @var int|null
     */
    protected $sharedSize;
    /**
     * @var int|null
     */
    protected $virtualSize;
    /**
     * @var string[]|null
     */
    protected $labels;
    /**
     * @var int|null
     */
    protected $containers;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    public function setParentId(?string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getRepoTags(): ?array
    {
        return $this->repoTags;
    }

    /**
     * @param string[]|null $repoTags
     */
    public function setRepoTags(?array $repoTags): self
    {
        $this->initialized['repoTags'] = true;
        $this->repoTags = $repoTags;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getRepoDigests(): ?array
    {
        return $this->repoDigests;
    }

    /**
     * @param string[]|null $repoDigests
     */
    public function setRepoDigests(?array $repoDigests): self
    {
        $this->initialized['repoDigests'] = true;
        $this->repoDigests = $repoDigests;

        return $this;
    }

    public function getCreated(): ?int
    {
        return $this->created;
    }

    public function setCreated(?int $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

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

    public function getSharedSize(): ?int
    {
        return $this->sharedSize;
    }

    public function setSharedSize(?int $sharedSize): self
    {
        $this->initialized['sharedSize'] = true;
        $this->sharedSize = $sharedSize;

        return $this;
    }

    public function getVirtualSize(): ?int
    {
        return $this->virtualSize;
    }

    public function setVirtualSize(?int $virtualSize): self
    {
        $this->initialized['virtualSize'] = true;
        $this->virtualSize = $virtualSize;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getLabels(): ?iterable
    {
        return $this->labels;
    }

    /**
     * @param string[]|null $labels
     */
    public function setLabels(?iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    public function getContainers(): ?int
    {
        return $this->containers;
    }

    public function setContainers(?int $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }
}
