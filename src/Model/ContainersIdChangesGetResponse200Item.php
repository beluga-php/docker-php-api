<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainersIdChangesGetResponse200Item implements AdditionalPropertiesInterface
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

    public function definedProperties(): array
    {
        return ['path' => ['Path', 'getPath', 'setPath'], 'kind' => ['Kind', 'getKind', 'setKind']];
    }
}
