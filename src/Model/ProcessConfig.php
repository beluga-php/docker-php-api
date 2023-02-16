<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ProcessConfig extends \ArrayObject
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
     * @var bool|null
     */
    protected $privileged;
    /**
     * @var string|null
     */
    protected $user;
    /**
     * @var bool|null
     */
    protected $tty;
    /**
     * @var string|null
     */
    protected $entrypoint;
    /**
     * @var string[]|null
     */
    protected $arguments;

    public function getPrivileged(): ?bool
    {
        return $this->privileged;
    }

    public function setPrivileged(?bool $privileged): self
    {
        $this->initialized['privileged'] = true;
        $this->privileged = $privileged;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    public function getTty(): ?bool
    {
        return $this->tty;
    }

    public function setTty(?bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;

        return $this;
    }

    public function getEntrypoint(): ?string
    {
        return $this->entrypoint;
    }

    public function setEntrypoint(?string $entrypoint): self
    {
        $this->initialized['entrypoint'] = true;
        $this->entrypoint = $entrypoint;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getArguments(): ?array
    {
        return $this->arguments;
    }

    /**
     * @param string[]|null $arguments
     */
    public function setArguments(?array $arguments): self
    {
        $this->initialized['arguments'] = true;
        $this->arguments = $arguments;

        return $this;
    }
}
