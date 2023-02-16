<?php

declare(strict_types=1);

namespace Docker\API\Model;

class DeviceMapping extends \ArrayObject
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
    protected $pathOnHost;
    /**
     * @var string|null
     */
    protected $pathInContainer;
    /**
     * @var string|null
     */
    protected $cgroupPermissions;

    public function getPathOnHost(): ?string
    {
        return $this->pathOnHost;
    }

    public function setPathOnHost(?string $pathOnHost): self
    {
        $this->initialized['pathOnHost'] = true;
        $this->pathOnHost = $pathOnHost;

        return $this;
    }

    public function getPathInContainer(): ?string
    {
        return $this->pathInContainer;
    }

    public function setPathInContainer(?string $pathInContainer): self
    {
        $this->initialized['pathInContainer'] = true;
        $this->pathInContainer = $pathInContainer;

        return $this;
    }

    public function getCgroupPermissions(): ?string
    {
        return $this->cgroupPermissions;
    }

    public function setCgroupPermissions(?string $cgroupPermissions): self
    {
        $this->initialized['cgroupPermissions'] = true;
        $this->cgroupPermissions = $cgroupPermissions;

        return $this;
    }
}
