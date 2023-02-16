<?php

declare(strict_types=1);

namespace Docker\API\Model;

class PluginConfigUser extends \ArrayObject
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
    protected $uID;
    /**
     * @var int|null
     */
    protected $gID;

    public function getUID(): ?int
    {
        return $this->uID;
    }

    public function setUID(?int $uID): self
    {
        $this->initialized['uID'] = true;
        $this->uID = $uID;

        return $this;
    }

    public function getGID(): ?int
    {
        return $this->gID;
    }

    public function setGID(?int $gID): self
    {
        $this->initialized['gID'] = true;
        $this->gID = $gID;

        return $this;
    }
}
