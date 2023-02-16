<?php

namespace Docker\API\Model;

class EngineDescription extends \ArrayObject
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
     * @var string|null
     */
    protected $engineVersion;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $labels;
    /**
     * 
     *
     * @var EngineDescriptionPluginsItem[]|null
     */
    protected $plugins;
    /**
     * 
     *
     * @return string|null
     */
    public function getEngineVersion() : ?string
    {
        return $this->engineVersion;
    }
    /**
     * 
     *
     * @param string|null $engineVersion
     *
     * @return self
     */
    public function setEngineVersion(?string $engineVersion) : self
    {
        $this->initialized['engineVersion'] = true;
        $this->engineVersion = $engineVersion;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getLabels() : ?iterable
    {
        return $this->labels;
    }
    /**
     * 
     *
     * @param string[]|null $labels
     *
     * @return self
     */
    public function setLabels(?iterable $labels) : self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
    /**
     * 
     *
     * @return EngineDescriptionPluginsItem[]|null
     */
    public function getPlugins() : ?array
    {
        return $this->plugins;
    }
    /**
     * 
     *
     * @param EngineDescriptionPluginsItem[]|null $plugins
     *
     * @return self
     */
    public function setPlugins(?array $plugins) : self
    {
        $this->initialized['plugins'] = true;
        $this->plugins = $plugins;
        return $this;
    }
}