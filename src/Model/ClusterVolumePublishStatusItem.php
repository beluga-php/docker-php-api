<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ClusterVolumePublishStatusItem implements AdditionalPropertiesInterface
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
     * The ID of the Swarm node the volume is published on.
     *
     * @var string|null
     */
    protected $nodeID;
    /**
     * The published state of the volume.
     * * `pending-publish` The volume should be published to this node, but the call to the controller plugin to do so has not yet been successfully completed.
     * * `published` The volume is published successfully to the node.
     * * `pending-node-unpublish` The volume should be unpublished from the node, and the manager is awaiting confirmation from the worker that it has done so.
     * * `pending-controller-unpublish` The volume is successfully unpublished from the node, but has not yet been successfully unpublished on the controller.
     *
     * @var string|null
     */
    protected $state;
    /**
     * A map of strings to strings returned by the CSI controller
     * plugin when a volume is published.
     *
     * @var array<string, string>|null
     */
    protected $publishContext;

    /**
     * The ID of the Swarm node the volume is published on.
     */
    public function getNodeID(): ?string
    {
        return $this->nodeID;
    }

    /**
     * The ID of the Swarm node the volume is published on.
     */
    public function setNodeID(?string $nodeID): self
    {
        $this->initialized['nodeID'] = true;
        $this->nodeID = $nodeID;

        return $this;
    }

    /**
     * The published state of the volume.
     * * `pending-publish` The volume should be published to this node, but the call to the controller plugin to do so has not yet been successfully completed.
     * * `published` The volume is published successfully to the node.
     * * `pending-node-unpublish` The volume should be unpublished from the node, and the manager is awaiting confirmation from the worker that it has done so.
     * * `pending-controller-unpublish` The volume is successfully unpublished from the node, but has not yet been successfully unpublished on the controller.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * The published state of the volume.
     * `pending-publish` The volume should be published to this node, but the call to the controller plugin to do so has not yet been successfully completed.
     * `published` The volume is published successfully to the node.
     * `pending-node-unpublish` The volume should be unpublished from the node, and the manager is awaiting confirmation from the worker that it has done so.
     * `pending-controller-unpublish` The volume is successfully unpublished from the node, but has not yet been successfully unpublished on the controller.
     */
    public function setState(?string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    /**
     * A map of strings to strings returned by the CSI controller
     * plugin when a volume is published.
     *
     * @return array<string, string>|null
     */
    public function getPublishContext(): ?iterable
    {
        return $this->publishContext;
    }

    /**
     * A map of strings to strings returned by the CSI controller
     * plugin when a volume is published.
     *
     * @param array<string, string>|null $publishContext
     */
    public function setPublishContext(?iterable $publishContext): self
    {
        $this->initialized['publishContext'] = true;
        $this->publishContext = $publishContext;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['nodeID' => ['NodeID', 'getNodeID', 'setNodeID'], 'state' => ['State', 'getState', 'setState'], 'publishContext' => ['PublishContext', 'getPublishContext', 'setPublishContext']];
    }
}
