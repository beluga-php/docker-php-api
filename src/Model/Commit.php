<?php

declare(strict_types=1);

namespace Docker\API\Model;

class Commit extends \ArrayObject
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
     * Actual commit ID of external tool.
     *
     * @var string|null
     */
    protected $iD;
    /**
     * Commit ID of external tool expected by dockerd as set at build time.
     *
     * @var string|null
     */
    protected $expected;

    /**
     * Actual commit ID of external tool.
     */
    public function getID(): ?string
    {
        return $this->iD;
    }

    /**
     * Actual commit ID of external tool.
     */
    public function setID(?string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * Commit ID of external tool expected by dockerd as set at build time.
     */
    public function getExpected(): ?string
    {
        return $this->expected;
    }

    /**
     * Commit ID of external tool expected by dockerd as set at build time.
     */
    public function setExpected(?string $expected): self
    {
        $this->initialized['expected'] = true;
        $this->expected = $expected;

        return $this;
    }
}
