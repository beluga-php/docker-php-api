<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ClusterVolumeSpecAccessModeAccessibilityRequirements implements AdditionalPropertiesInterface
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
     * A list of required topologies, at least one of which the
     * volume must be accessible from.
     *
     * @var list<Topology>|null
     */
    protected $requisite;
    /**
     * A list of topologies that the volume should attempt to be
     * provisioned in.
     *
     * @var list<Topology>|null
     */
    protected $preferred;

    /**
     * A list of required topologies, at least one of which the
     * volume must be accessible from.
     *
     * @return list<Topology>|null
     */
    public function getRequisite(): ?array
    {
        return $this->requisite;
    }

    /**
     * A list of required topologies, at least one of which the
     * volume must be accessible from.
     *
     * @param list<Topology>|null $requisite
     */
    public function setRequisite(?array $requisite): self
    {
        $this->initialized['requisite'] = true;
        $this->requisite = $requisite;

        return $this;
    }

    /**
     * A list of topologies that the volume should attempt to be
     * provisioned in.
     *
     * @return list<Topology>|null
     */
    public function getPreferred(): ?array
    {
        return $this->preferred;
    }

    /**
     * A list of topologies that the volume should attempt to be
     * provisioned in.
     *
     * @param list<Topology>|null $preferred
     */
    public function setPreferred(?array $preferred): self
    {
        $this->initialized['preferred'] = true;
        $this->preferred = $preferred;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['requisite' => ['Requisite', 'getRequisite', 'setRequisite'], 'preferred' => ['Preferred', 'getPreferred', 'setPreferred']];
    }
}
