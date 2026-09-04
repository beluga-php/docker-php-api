<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class Image implements AdditionalPropertiesInterface
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
    protected $id;
    /**
     * @var list<string>|null
     */
    protected $repoTags;
    /**
     * @var list<string>|null
     */
    protected $repoDigests;
    /**
     * @var string|null
     */
    protected $parent;
    /**
     * @var string|null
     */
    protected $comment;
    /**
     * @var string|null
     */
    protected $created;
    /**
     * @var string|null
     */
    protected $container;
    /**
     * Configuration for a container that is portable between hosts.
     *
     * @var ContainerConfig|null
     */
    protected $containerConfig;
    /**
     * @var string|null
     */
    protected $dockerVersion;
    /**
     * @var string|null
     */
    protected $author;
    /**
     * Configuration for a container that is portable between hosts.
     *
     * @var ContainerConfig|null
     */
    protected $config;
    /**
     * @var string|null
     */
    protected $architecture;
    /**
     * @var string|null
     */
    protected $os;
    /**
     * @var string|null
     */
    protected $osVersion;
    /**
     * @var int|null
     */
    protected $size;
    /**
     * @var int|null
     */
    protected $virtualSize;
    /**
     * Information about a container's graph driver.
     *
     * @var GraphDriverData|null
     */
    protected $graphDriver;
    /**
     * @var ImageRootFS|null
     */
    protected $rootFS;
    /**
     * @var ImageMetadata|null
     */
    protected $metadata;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getRepoTags(): ?array
    {
        return $this->repoTags;
    }

    /**
     * @param list<string>|null $repoTags
     */
    public function setRepoTags(?array $repoTags): self
    {
        $this->initialized['repoTags'] = true;
        $this->repoTags = $repoTags;

        return $this;
    }

    /**
     * @return list<string>|null
     */
    public function getRepoDigests(): ?array
    {
        return $this->repoDigests;
    }

    /**
     * @param list<string>|null $repoDigests
     */
    public function setRepoDigests(?array $repoDigests): self
    {
        $this->initialized['repoDigests'] = true;
        $this->repoDigests = $repoDigests;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->initialized['parent'] = true;
        $this->parent = $parent;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;

        return $this;
    }

    public function getCreated(): ?string
    {
        return $this->created;
    }

    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    public function getContainer(): ?string
    {
        return $this->container;
    }

    public function setContainer(?string $container): self
    {
        $this->initialized['container'] = true;
        $this->container = $container;

        return $this;
    }

    /**
     * Configuration for a container that is portable between hosts.
     */
    public function getContainerConfig(): ?ContainerConfig
    {
        return $this->containerConfig;
    }

    /**
     * Configuration for a container that is portable between hosts.
     */
    public function setContainerConfig(?ContainerConfig $containerConfig): self
    {
        $this->initialized['containerConfig'] = true;
        $this->containerConfig = $containerConfig;

        return $this;
    }

    public function getDockerVersion(): ?string
    {
        return $this->dockerVersion;
    }

    public function setDockerVersion(?string $dockerVersion): self
    {
        $this->initialized['dockerVersion'] = true;
        $this->dockerVersion = $dockerVersion;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->initialized['author'] = true;
        $this->author = $author;

        return $this;
    }

    /**
     * Configuration for a container that is portable between hosts.
     */
    public function getConfig(): ?ContainerConfig
    {
        return $this->config;
    }

    /**
     * Configuration for a container that is portable between hosts.
     */
    public function setConfig(?ContainerConfig $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    public function getArchitecture(): ?string
    {
        return $this->architecture;
    }

    public function setArchitecture(?string $architecture): self
    {
        $this->initialized['architecture'] = true;
        $this->architecture = $architecture;

        return $this;
    }

    public function getOs(): ?string
    {
        return $this->os;
    }

    public function setOs(?string $os): self
    {
        $this->initialized['os'] = true;
        $this->os = $os;

        return $this;
    }

    public function getOsVersion(): ?string
    {
        return $this->osVersion;
    }

    public function setOsVersion(?string $osVersion): self
    {
        $this->initialized['osVersion'] = true;
        $this->osVersion = $osVersion;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    public function getVirtualSize(): ?int
    {
        return $this->virtualSize;
    }

    public function setVirtualSize(?int $virtualSize): self
    {
        $this->initialized['virtualSize'] = true;
        $this->virtualSize = $virtualSize;

        return $this;
    }

    /**
     * Information about a container's graph driver.
     */
    public function getGraphDriver(): ?GraphDriverData
    {
        return $this->graphDriver;
    }

    /**
     * Information about a container's graph driver.
     */
    public function setGraphDriver(?GraphDriverData $graphDriver): self
    {
        $this->initialized['graphDriver'] = true;
        $this->graphDriver = $graphDriver;

        return $this;
    }

    public function getRootFS(): ?ImageRootFS
    {
        return $this->rootFS;
    }

    public function setRootFS(?ImageRootFS $rootFS): self
    {
        $this->initialized['rootFS'] = true;
        $this->rootFS = $rootFS;

        return $this;
    }

    public function getMetadata(): ?ImageMetadata
    {
        return $this->metadata;
    }

    public function setMetadata(?ImageMetadata $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['Id', 'getId', 'setId'], 'repoTags' => ['RepoTags', 'getRepoTags', 'setRepoTags'], 'repoDigests' => ['RepoDigests', 'getRepoDigests', 'setRepoDigests'], 'parent' => ['Parent', 'getParent', 'setParent'], 'comment' => ['Comment', 'getComment', 'setComment'], 'created' => ['Created', 'getCreated', 'setCreated'], 'container' => ['Container', 'getContainer', 'setContainer'], 'containerConfig' => ['ContainerConfig', 'getContainerConfig', 'setContainerConfig'], 'dockerVersion' => ['DockerVersion', 'getDockerVersion', 'setDockerVersion'], 'author' => ['Author', 'getAuthor', 'setAuthor'], 'config' => ['Config', 'getConfig', 'setConfig'], 'architecture' => ['Architecture', 'getArchitecture', 'setArchitecture'], 'os' => ['Os', 'getOs', 'setOs'], 'osVersion' => ['OsVersion', 'getOsVersion', 'setOsVersion'], 'size' => ['Size', 'getSize', 'setSize'], 'virtualSize' => ['VirtualSize', 'getVirtualSize', 'setVirtualSize'], 'graphDriver' => ['GraphDriver', 'getGraphDriver', 'setGraphDriver'], 'rootFS' => ['RootFS', 'getRootFS', 'setRootFS'], 'metadata' => ['Metadata', 'getMetadata', 'setMetadata']];
    }
}
