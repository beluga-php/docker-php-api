<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ExecIdStartPostBody implements AdditionalPropertiesInterface
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
     * Detach from the command.
     *
     * @var bool|null
     */
    protected $detach;
    /**
     * Allocate a pseudo-TTY.
     *
     * @var bool|null
     */
    protected $tty;

    /**
     * Detach from the command.
     */
    public function getDetach(): ?bool
    {
        return $this->detach;
    }

    /**
     * Detach from the command.
     */
    public function setDetach(?bool $detach): self
    {
        $this->initialized['detach'] = true;
        $this->detach = $detach;

        return $this;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function getTty(): ?bool
    {
        return $this->tty;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function setTty(?bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['detach' => ['Detach', 'getDetach', 'setDetach'], 'tty' => ['Tty', 'getTty', 'setTty']];
    }
}
