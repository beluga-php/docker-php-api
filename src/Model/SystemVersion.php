<?php

declare(strict_types=1);

namespace Docker\API\Model;

class SystemVersion extends \ArrayObject
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
     * @var SystemVersionPlatform|null
     */
    protected $platform;
    /**
     * Information about system components.
     *
     * @var SystemVersionComponentsItem[]|null
     */
    protected $components;
    /**
     * The version of the daemon.
     *
     * @var string|null
     */
    protected $version;
    /**
     * The default (and highest) API version that is supported by the daemon.
     *
     * @var string|null
     */
    protected $apiVersion;
    /**
     * The minimum API version that is supported by the daemon.
     *
     * @var string|null
     */
    protected $minAPIVersion;
    /**
     * The Git commit of the source code that was used to build the daemon.
     *
     * @var string|null
     */
    protected $gitCommit;
    /**
     * The version Go used to compile the daemon, and the version of the Go
     * runtime in use.
     *
     * @var string|null
     */
    protected $goVersion;
    /**
     * The operating system that the daemon is running on ("linux" or "windows").
     *
     * @var string|null
     */
    protected $os;
    /**
     * The architecture that the daemon is running on.
     *
     * @var string|null
     */
    protected $arch;
    /**
     * The kernel version (`uname -r`) that the daemon is running on.
     *
     * This field is omitted when empty.
     *
     * @var string|null
     */
    protected $kernelVersion;
    /**
     * Indicates if the daemon is started with experimental features enabled.
     *
     * This field is omitted when empty / false.
     *
     * @var bool|null
     */
    protected $experimental;
    /**
     * The date and time that the daemon was compiled.
     *
     * @var string|null
     */
    protected $buildTime;

    public function getPlatform(): ?SystemVersionPlatform
    {
        return $this->platform;
    }

    public function setPlatform(?SystemVersionPlatform $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;

        return $this;
    }

    /**
     * Information about system components.
     *
     * @return SystemVersionComponentsItem[]|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }

    /**
     * Information about system components.
     *
     * @param SystemVersionComponentsItem[]|null $components
     */
    public function setComponents(?array $components): self
    {
        $this->initialized['components'] = true;
        $this->components = $components;

        return $this;
    }

    /**
     * The version of the daemon.
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * The version of the daemon.
     */
    public function setVersion(?string $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    /**
     * The default (and highest) API version that is supported by the daemon.
     */
    public function getApiVersion(): ?string
    {
        return $this->apiVersion;
    }

    /**
     * The default (and highest) API version that is supported by the daemon.
     */
    public function setApiVersion(?string $apiVersion): self
    {
        $this->initialized['apiVersion'] = true;
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * The minimum API version that is supported by the daemon.
     */
    public function getMinAPIVersion(): ?string
    {
        return $this->minAPIVersion;
    }

    /**
     * The minimum API version that is supported by the daemon.
     */
    public function setMinAPIVersion(?string $minAPIVersion): self
    {
        $this->initialized['minAPIVersion'] = true;
        $this->minAPIVersion = $minAPIVersion;

        return $this;
    }

    /**
     * The Git commit of the source code that was used to build the daemon.
     */
    public function getGitCommit(): ?string
    {
        return $this->gitCommit;
    }

    /**
     * The Git commit of the source code that was used to build the daemon.
     */
    public function setGitCommit(?string $gitCommit): self
    {
        $this->initialized['gitCommit'] = true;
        $this->gitCommit = $gitCommit;

        return $this;
    }

    /**
     * The version Go used to compile the daemon, and the version of the Go
     * runtime in use.
     */
    public function getGoVersion(): ?string
    {
        return $this->goVersion;
    }

    /**
     * The version Go used to compile the daemon, and the version of the Go
     * runtime in use.
     */
    public function setGoVersion(?string $goVersion): self
    {
        $this->initialized['goVersion'] = true;
        $this->goVersion = $goVersion;

        return $this;
    }

    /**
     * The operating system that the daemon is running on ("linux" or "windows").
     */
    public function getOs(): ?string
    {
        return $this->os;
    }

    /**
     * The operating system that the daemon is running on ("linux" or "windows").
     */
    public function setOs(?string $os): self
    {
        $this->initialized['os'] = true;
        $this->os = $os;

        return $this;
    }

    /**
     * The architecture that the daemon is running on.
     */
    public function getArch(): ?string
    {
        return $this->arch;
    }

    /**
     * The architecture that the daemon is running on.
     */
    public function setArch(?string $arch): self
    {
        $this->initialized['arch'] = true;
        $this->arch = $arch;

        return $this;
    }

    /**
     * The kernel version (`uname -r`) that the daemon is running on.
     *
     * This field is omitted when empty.
     */
    public function getKernelVersion(): ?string
    {
        return $this->kernelVersion;
    }

    /**
     * The kernel version (`uname -r`) that the daemon is running on.
     *
     * This field is omitted when empty.
     */
    public function setKernelVersion(?string $kernelVersion): self
    {
        $this->initialized['kernelVersion'] = true;
        $this->kernelVersion = $kernelVersion;

        return $this;
    }

    /**
     * Indicates if the daemon is started with experimental features enabled.
     *
     * This field is omitted when empty / false.
     */
    public function getExperimental(): ?bool
    {
        return $this->experimental;
    }

    /**
     * Indicates if the daemon is started with experimental features enabled.
     *
     * This field is omitted when empty / false.
     */
    public function setExperimental(?bool $experimental): self
    {
        $this->initialized['experimental'] = true;
        $this->experimental = $experimental;

        return $this;
    }

    /**
     * The date and time that the daemon was compiled.
     */
    public function getBuildTime(): ?string
    {
        return $this->buildTime;
    }

    /**
     * The date and time that the daemon was compiled.
     */
    public function setBuildTime(?string $buildTime): self
    {
        $this->initialized['buildTime'] = true;
        $this->buildTime = $buildTime;

        return $this;
    }
}
