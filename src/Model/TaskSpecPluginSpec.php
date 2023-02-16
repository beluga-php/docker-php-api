<?php

declare(strict_types=1);

namespace Docker\API\Model;

class TaskSpecPluginSpec extends \ArrayObject
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
     * The name or 'alias' to use for the plugin.
     *
     * @var string|null
     */
    protected $name;
    /**
     * The plugin image reference to use.
     *
     * @var string|null
     */
    protected $remote;
    /**
     * Disable the plugin once scheduled.
     *
     * @var bool|null
     */
    protected $disabled;
    /**
     * @var TaskSpecPluginSpecPluginPrivilegeItem[]|null
     */
    protected $pluginPrivilege;

    /**
     * The name or 'alias' to use for the plugin.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * The name or 'alias' to use for the plugin.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The plugin image reference to use.
     */
    public function getRemote(): ?string
    {
        return $this->remote;
    }

    /**
     * The plugin image reference to use.
     */
    public function setRemote(?string $remote): self
    {
        $this->initialized['remote'] = true;
        $this->remote = $remote;

        return $this;
    }

    /**
     * Disable the plugin once scheduled.
     */
    public function getDisabled(): ?bool
    {
        return $this->disabled;
    }

    /**
     * Disable the plugin once scheduled.
     */
    public function setDisabled(?bool $disabled): self
    {
        $this->initialized['disabled'] = true;
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * @return TaskSpecPluginSpecPluginPrivilegeItem[]|null
     */
    public function getPluginPrivilege(): ?array
    {
        return $this->pluginPrivilege;
    }

    /**
     * @param TaskSpecPluginSpecPluginPrivilegeItem[]|null $pluginPrivilege
     */
    public function setPluginPrivilege(?array $pluginPrivilege): self
    {
        $this->initialized['pluginPrivilege'] = true;
        $this->pluginPrivilege = $pluginPrivilege;

        return $this;
    }
}
