<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class PluginConfigRootfs implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $type;
    /**
     * @var list<string>|null
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
     * @return list<string>|null
     */
    public function getDiffIds(): ?array
    {
        return $this->diffIds;
    }

    /**
     * @param list<string>|null $diffIds
     */
    public function setDiffIds(?array $diffIds): self
    {
        $this->initialized['diffIds'] = true;
        $this->diffIds = $diffIds;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['type', 'getType', 'setType'], 'diffIds' => ['diff_ids', 'getDiffIds', 'setDiffIds']];
    }
}
