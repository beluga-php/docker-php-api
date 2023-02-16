<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ContainersIdChangesGetResponse200Item extends \ArrayObject
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
     * Path to file that has changed.
     *
     * @var string|null
     */
    protected $path;
    /**
     * Kind of change.
     *
     * @var int|null
     */
    protected $kind;

    /**
     * Path to file that has changed.
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * Path to file that has changed.
     */
    public function setPath(?string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;

        return $this;
    }

    /**
     * Kind of change.
     */
    public function getKind(): ?int
    {
        return $this->kind;
    }

    /**
     * Kind of change.
     */
    public function setKind(?int $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;

        return $this;
    }
}
