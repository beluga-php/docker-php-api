<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PluginConfigRootfs extends \ArrayObject
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
    protected $type;
    /**
     * @var string[]|null
     */
    protected $diffIds;

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

    /**
     * @return string[]|null
     */
    public function getDiffIds(): ?array
    {
        return $this->diffIds;
    }

    /**
     * @param string[]|null $diffIds
     */
    public function setDiffIds(?array $diffIds): self
    {
        $this->initialized['diffIds'] = true;
        $this->diffIds = $diffIds;

        return $this;
    }
}
