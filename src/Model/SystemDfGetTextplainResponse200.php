<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SystemDfGetTextplainResponse200 extends \ArrayObject
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
     * @var int|null
     */
    protected $layersSize;
    /**
     * @var list<ImageSummary>|null
     */
    protected $images;
    /**
     * @var list<ContainerSummary>|null
     */
    protected $containers;
    /**
     * @var list<Volume>|null
     */
    protected $volumes;
    /**
     * @var list<BuildCache>|null
     */
    protected $buildCache;

    public function getLayersSize(): ?int
    {
        return $this->layersSize;
    }

    public function setLayersSize(?int $layersSize): self
    {
        $this->initialized['layersSize'] = true;
        $this->layersSize = $layersSize;

        return $this;
    }

    /**
     * @return list<ImageSummary>|null
     */
    public function getImages(): ?array
    {
        return $this->images;
    }

    /**
     * @param list<ImageSummary>|null $images
     */
    public function setImages(?array $images): self
    {
        $this->initialized['images'] = true;
        $this->images = $images;

        return $this;
    }

    /**
     * @return list<ContainerSummary>|null
     */
    public function getContainers(): ?array
    {
        return $this->containers;
    }

    /**
     * @param list<ContainerSummary>|null $containers
     */
    public function setContainers(?array $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    /**
     * @return list<Volume>|null
     */
    public function getVolumes(): ?array
    {
        return $this->volumes;
    }

    /**
     * @param list<Volume>|null $volumes
     */
    public function setVolumes(?array $volumes): self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;

        return $this;
    }

    /**
     * @return list<BuildCache>|null
     */
    public function getBuildCache(): ?array
    {
        return $this->buildCache;
    }

    /**
     * @param list<BuildCache>|null $buildCache
     */
    public function setBuildCache(?array $buildCache): self
    {
        $this->initialized['buildCache'] = true;
        $this->buildCache = $buildCache;

        return $this;
    }
}
