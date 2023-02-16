<?php

declare(strict_types=1);

namespace Docker\API\Model;

class EndpointPortConfig extends \ArrayObject
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
     * @var string|null
     */
    protected $name;
    /**
     * @var string|null
     */
    protected $protocol;
    /**
     * The port inside the container.
     *
     * @var int|null
     */
    protected $targetPort;
    /**
     * The port on the swarm hosts.
     *
     * @var int|null
     */
    protected $publishedPort;
    /**
     * The mode in which port is published.
     *
     * <p><br /></p>
     *
     * - "ingress" makes the target port accessible on every node,
     * regardless of whether there is a task for the service running on
     * that node or not.
     * - "host" bypasses the routing mesh and publish the port directly on
     * the swarm node where that service is running.
     *
     * @var string|null
     */
    protected $publishMode = 'ingress';

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getProtocol(): ?string
    {
        return $this->protocol;
    }

    public function setProtocol(?string $protocol): self
    {
        $this->initialized['protocol'] = true;
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * The port inside the container.
     */
    public function getTargetPort(): ?int
    {
        return $this->targetPort;
    }

    /**
     * The port inside the container.
     */
    public function setTargetPort(?int $targetPort): self
    {
        $this->initialized['targetPort'] = true;
        $this->targetPort = $targetPort;

        return $this;
    }

    /**
     * The port on the swarm hosts.
     */
    public function getPublishedPort(): ?int
    {
        return $this->publishedPort;
    }

    /**
     * The port on the swarm hosts.
     */
    public function setPublishedPort(?int $publishedPort): self
    {
        $this->initialized['publishedPort'] = true;
        $this->publishedPort = $publishedPort;

        return $this;
    }

    /**
     * The mode in which port is published.
     *
     * <p><br /></p>
     *
     * - "ingress" makes the target port accessible on every node,
     * regardless of whether there is a task for the service running on
     * that node or not.
     * - "host" bypasses the routing mesh and publish the port directly on
     * the swarm node where that service is running.
     */
    public function getPublishMode(): ?string
    {
        return $this->publishMode;
    }

    /**
     * The mode in which port is published.
     *
     * <p><br /></p>
     *
     * - "ingress" makes the target port accessible on every node,
     * regardless of whether there is a task for the service running on
     * that node or not.
     * - "host" bypasses the routing mesh and publish the port directly on
     * the swarm node where that service is running.
     */
    public function setPublishMode(?string $publishMode): self
    {
        $this->initialized['publishMode'] = true;
        $this->publishMode = $publishMode;

        return $this;
    }
}
