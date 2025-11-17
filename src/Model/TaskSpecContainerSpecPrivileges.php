<?php

declare(strict_types=1);

namespace Docker\API\Model;

class TaskSpecContainerSpecPrivileges extends \ArrayObject
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
     * CredentialSpec for managed service account (Windows only).
     *
     * @var TaskSpecContainerSpecPrivilegesCredentialSpec|null
     */
    protected $credentialSpec;
    /**
     * SELinux labels of the container.
     *
     * @var TaskSpecContainerSpecPrivilegesSELinuxContext|null
     */
    protected $sELinuxContext;
    /**
     * Options for configuring seccomp on the container.
     *
     * @var TaskSpecContainerSpecPrivilegesSeccomp|null
     */
    protected $seccomp;
    /**
     * Options for configuring AppArmor on the container.
     *
     * @var TaskSpecContainerSpecPrivilegesAppArmor|null
     */
    protected $appArmor;
    /**
     * Configuration of the no_new_privs bit in the container.
     *
     * @var bool|null
     */
    protected $noNewPrivileges;

    /**
     * CredentialSpec for managed service account (Windows only).
     */
    public function getCredentialSpec(): ?TaskSpecContainerSpecPrivilegesCredentialSpec
    {
        return $this->credentialSpec;
    }

    /**
     * CredentialSpec for managed service account (Windows only).
     */
    public function setCredentialSpec(?TaskSpecContainerSpecPrivilegesCredentialSpec $credentialSpec): self
    {
        $this->initialized['credentialSpec'] = true;
        $this->credentialSpec = $credentialSpec;

        return $this;
    }

    /**
     * SELinux labels of the container.
     */
    public function getSELinuxContext(): ?TaskSpecContainerSpecPrivilegesSELinuxContext
    {
        return $this->sELinuxContext;
    }

    /**
     * SELinux labels of the container.
     */
    public function setSELinuxContext(?TaskSpecContainerSpecPrivilegesSELinuxContext $sELinuxContext): self
    {
        $this->initialized['sELinuxContext'] = true;
        $this->sELinuxContext = $sELinuxContext;

        return $this;
    }

    /**
     * Options for configuring seccomp on the container.
     */
    public function getSeccomp(): ?TaskSpecContainerSpecPrivilegesSeccomp
    {
        return $this->seccomp;
    }

    /**
     * Options for configuring seccomp on the container.
     */
    public function setSeccomp(?TaskSpecContainerSpecPrivilegesSeccomp $seccomp): self
    {
        $this->initialized['seccomp'] = true;
        $this->seccomp = $seccomp;

        return $this;
    }

    /**
     * Options for configuring AppArmor on the container.
     */
    public function getAppArmor(): ?TaskSpecContainerSpecPrivilegesAppArmor
    {
        return $this->appArmor;
    }

    /**
     * Options for configuring AppArmor on the container.
     */
    public function setAppArmor(?TaskSpecContainerSpecPrivilegesAppArmor $appArmor): self
    {
        $this->initialized['appArmor'] = true;
        $this->appArmor = $appArmor;

        return $this;
    }

    /**
     * Configuration of the no_new_privs bit in the container.
     */
    public function getNoNewPrivileges(): ?bool
    {
        return $this->noNewPrivileges;
    }

    /**
     * Configuration of the no_new_privs bit in the container.
     */
    public function setNoNewPrivileges(?bool $noNewPrivileges): self
    {
        $this->initialized['noNewPrivileges'] = true;
        $this->noNewPrivileges = $noNewPrivileges;

        return $this;
    }
}
