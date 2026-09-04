<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class VolumesNamePutBody implements AdditionalPropertiesInterface
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
     * Cluster-specific options used to create the volume.
     *
     * @var ClusterVolumeSpec|null
     */
    protected $spec;

    /**
     * Cluster-specific options used to create the volume.
     */
    public function getSpec(): ?ClusterVolumeSpec
    {
        return $this->spec;
    }

    /**
     * Cluster-specific options used to create the volume.
     */
    public function setSpec(?ClusterVolumeSpec $spec): self
    {
        $this->initialized['spec'] = true;
        $this->spec = $spec;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['spec' => ['Spec', 'getSpec', 'setSpec']];
    }
}
