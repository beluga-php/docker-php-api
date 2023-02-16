<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SwarmInfo extends \ArrayObject
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
     * Unique identifier of for this node in the swarm.
     *
     * @var string|null
     */
    protected $nodeID = '';
    /**
     * IP address at which this node can be reached by other nodes in the
     * swarm.
     *
     * @var string|null
     */
    protected $nodeAddr = '';
    /**
     * Current local status of this node.
     *
     * @var string|null
     */
    protected $localNodeState = '';
    /**
     * @var bool|null
     */
    protected $controlAvailable = false;
    /**
     * @var string|null
     */
    protected $error = '';
    /**
     * List of ID's and addresses of other managers in the swarm.
     *
     * @var PeerNode[]|null
     */
    protected $remoteManagers;
    /**
     * Total number of nodes in the swarm.
     *
     * @var int|null
     */
    protected $nodes;
    /**
     * Total number of managers in the swarm.
     *
     * @var int|null
     */
    protected $managers;
    /**
     * ClusterInfo represents information about the swarm as is returned by the
     * "/info" endpoint. Join-tokens are not included.
     *
     * @var ClusterInfo|null
     */
    protected $cluster;

    /**
     * Unique identifier of for this node in the swarm.
     */
    public function getNodeID(): ?string
    {
        return $this->nodeID;
    }

    /**
     * Unique identifier of for this node in the swarm.
     */
    public function setNodeID(?string $nodeID): self
    {
        $this->initialized['nodeID'] = true;
        $this->nodeID = $nodeID;

        return $this;
    }

    /**
     * IP address at which this node can be reached by other nodes in the
     * swarm.
     */
    public function getNodeAddr(): ?string
    {
        return $this->nodeAddr;
    }

    /**
     * IP address at which this node can be reached by other nodes in the
     * swarm.
     */
    public function setNodeAddr(?string $nodeAddr): self
    {
        $this->initialized['nodeAddr'] = true;
        $this->nodeAddr = $nodeAddr;

        return $this;
    }

    /**
     * Current local status of this node.
     */
    public function getLocalNodeState(): ?string
    {
        return $this->localNodeState;
    }

    /**
     * Current local status of this node.
     */
    public function setLocalNodeState(?string $localNodeState): self
    {
        $this->initialized['localNodeState'] = true;
        $this->localNodeState = $localNodeState;

        return $this;
    }

    public function getControlAvailable(): ?bool
    {
        return $this->controlAvailable;
    }

    public function setControlAvailable(?bool $controlAvailable): self
    {
        $this->initialized['controlAvailable'] = true;
        $this->controlAvailable = $controlAvailable;

        return $this;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function setError(?string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;

        return $this;
    }

    /**
     * List of ID's and addresses of other managers in the swarm.
     *
     * @return PeerNode[]|null
     */
    public function getRemoteManagers(): ?array
    {
        return $this->remoteManagers;
    }

    /**
     * List of ID's and addresses of other managers in the swarm.
     *
     * @param PeerNode[]|null $remoteManagers
     */
    public function setRemoteManagers(?array $remoteManagers): self
    {
        $this->initialized['remoteManagers'] = true;
        $this->remoteManagers = $remoteManagers;

        return $this;
    }

    /**
     * Total number of nodes in the swarm.
     */
    public function getNodes(): ?int
    {
        return $this->nodes;
    }

    /**
     * Total number of nodes in the swarm.
     */
    public function setNodes(?int $nodes): self
    {
        $this->initialized['nodes'] = true;
        $this->nodes = $nodes;

        return $this;
    }

    /**
     * Total number of managers in the swarm.
     */
    public function getManagers(): ?int
    {
        return $this->managers;
    }

    /**
     * Total number of managers in the swarm.
     */
    public function setManagers(?int $managers): self
    {
        $this->initialized['managers'] = true;
        $this->managers = $managers;

        return $this;
    }

    /**
     * ClusterInfo represents information about the swarm as is returned by the
     * "/info" endpoint. Join-tokens are not included.
     */
    public function getCluster(): ?ClusterInfo
    {
        return $this->cluster;
    }

    /**
     * ClusterInfo represents information about the swarm as is returned by the
     * "/info" endpoint. Join-tokens are not included.
     */
    public function setCluster(?ClusterInfo $cluster): self
    {
        $this->initialized['cluster'] = true;
        $this->cluster = $cluster;

        return $this;
    }
}
