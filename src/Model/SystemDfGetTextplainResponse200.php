<?php

namespace Docker\API\Model;

class SystemDfGetTextplainResponse200 extends \ArrayObject
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
     * 
     *
     * @var int|null
     */
    protected $layersSize;
    /**
     * 
     *
     * @var ImageSummary[]|null
     */
    protected $images;
    /**
     * 
     *
     * @var ContainerSummaryItem[][]|null
     */
    protected $containers;
    /**
     * 
     *
     * @var Volume[]|null
     */
    protected $volumes;
    /**
     * 
     *
     * @var BuildCache[]|null
     */
    protected $buildCache;
    /**
     * 
     *
     * @return int|null
     */
    public function getLayersSize() : ?int
    {
        return $this->layersSize;
    }
    /**
     * 
     *
     * @param int|null $layersSize
     *
     * @return self
     */
    public function setLayersSize(?int $layersSize) : self
    {
        $this->initialized['layersSize'] = true;
        $this->layersSize = $layersSize;
        return $this;
    }
    /**
     * 
     *
     * @return ImageSummary[]|null
     */
    public function getImages() : ?array
    {
        return $this->images;
    }
    /**
     * 
     *
     * @param ImageSummary[]|null $images
     *
     * @return self
     */
    public function setImages(?array $images) : self
    {
        $this->initialized['images'] = true;
        $this->images = $images;
        return $this;
    }
    /**
     * 
     *
     * @return ContainerSummaryItem[][]|null
     */
    public function getContainers() : ?array
    {
        return $this->containers;
    }
    /**
     * 
     *
     * @param ContainerSummaryItem[][]|null $containers
     *
     * @return self
     */
    public function setContainers(?array $containers) : self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;
        return $this;
    }
    /**
     * 
     *
     * @return Volume[]|null
     */
    public function getVolumes() : ?array
    {
        return $this->volumes;
    }
    /**
     * 
     *
     * @param Volume[]|null $volumes
     *
     * @return self
     */
    public function setVolumes(?array $volumes) : self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;
        return $this;
    }
    /**
     * 
     *
     * @return BuildCache[]|null
     */
    public function getBuildCache() : ?array
    {
        return $this->buildCache;
    }
    /**
     * 
     *
     * @param BuildCache[]|null $buildCache
     *
     * @return self
     */
    public function setBuildCache(?array $buildCache) : self
    {
        $this->initialized['buildCache'] = true;
        $this->buildCache = $buildCache;
        return $this;
    }
}