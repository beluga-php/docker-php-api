<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ClusterVolumeSpecAccessModeSecretsItem implements AdditionalPropertiesInterface
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
     * Key is the name of the key of the key-value pair passed to
     * the plugin.
     *
     * @var string|null
     */
    protected $key;
    /**
     * Secret is the swarm Secret object from which to read data.
     * This can be a Secret name or ID. The Secret data is
     * retrieved by swarm and used as the value of the key-value
     * pair passed to the plugin.
     *
     * @var string|null
     */
    protected $secret;

    /**
     * Key is the name of the key of the key-value pair passed to
     * the plugin.
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Key is the name of the key of the key-value pair passed to
     * the plugin.
     */
    public function setKey(?string $key): self
    {
        $this->initialized['key'] = true;
        $this->key = $key;

        return $this;
    }

    /**
     * Secret is the swarm Secret object from which to read data.
     * This can be a Secret name or ID. The Secret data is
     * retrieved by swarm and used as the value of the key-value
     * pair passed to the plugin.
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * Secret is the swarm Secret object from which to read data.
     * This can be a Secret name or ID. The Secret data is
     * retrieved by swarm and used as the value of the key-value
     * pair passed to the plugin.
     */
    public function setSecret(?string $secret): self
    {
        $this->initialized['secret'] = true;
        $this->secret = $secret;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['key' => ['Key', 'getKey', 'setKey'], 'secret' => ['Secret', 'getSecret', 'setSecret']];
    }
}
