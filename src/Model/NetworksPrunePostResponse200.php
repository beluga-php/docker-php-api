<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class NetworksPrunePostResponse200 implements AdditionalPropertiesInterface
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
     * Networks that were deleted.
     *
     * @var list<string>|null
     */
    protected $networksDeleted;

    /**
     * Networks that were deleted.
     *
     * @return list<string>|null
     */
    public function getNetworksDeleted(): ?array
    {
        return $this->networksDeleted;
    }

    /**
     * Networks that were deleted.
     *
     * @param list<string>|null $networksDeleted
     */
    public function setNetworksDeleted(?array $networksDeleted): self
    {
        $this->initialized['networksDeleted'] = true;
        $this->networksDeleted = $networksDeleted;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['networksDeleted' => ['NetworksDeleted', 'getNetworksDeleted', 'setNetworksDeleted']];
    }
}
