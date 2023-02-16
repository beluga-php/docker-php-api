<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ContainersIdExecPostBody extends \ArrayObject
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
     * Attach to `stdin` of the exec command.
     *
     * @var bool|null
     */
    protected $attachStdin;
    /**
     * Attach to `stdout` of the exec command.
     *
     * @var bool|null
     */
    protected $attachStdout;
    /**
     * Attach to `stderr` of the exec command.
     *
     * @var bool|null
     */
    protected $attachStderr;
    /**
     * Override the key sequence for detaching a container. Format is
     * a single character `[a-Z]` or `ctrl-<value>` where `<value>`
     * is one of: `a-z`, `@`, `^`, `[`, `,` or `_`.
     *
     * @var string|null
     */
    protected $detachKeys;
    /**
     * Allocate a pseudo-TTY.
     *
     * @var bool|null
     */
    protected $tty;
    /**
     * A list of environment variables in the form `["VAR=value", ...]`.
     *
     * @var string[]|null
     */
    protected $env;
    /**
     * Command to run, as a string or array of strings.
     *
     * @var string[]|null
     */
    protected $cmd;
    /**
     * Runs the exec process with extended privileges.
     *
     * @var bool|null
     */
    protected $privileged = false;
    /**
     * The user, and optionally, group to run the exec process inside
     * the container. Format is one of: `user`, `user:group`, `uid`,
     * or `uid:gid`.
     *
     * @var string|null
     */
    protected $user;
    /**
     * The working directory for the exec process inside the container.
     *
     * @var string|null
     */
    protected $workingDir;

    /**
     * Attach to `stdin` of the exec command.
     */
    public function getAttachStdin(): ?bool
    {
        return $this->attachStdin;
    }

    /**
     * Attach to `stdin` of the exec command.
     */
    public function setAttachStdin(?bool $attachStdin): self
    {
        $this->initialized['attachStdin'] = true;
        $this->attachStdin = $attachStdin;

        return $this;
    }

    /**
     * Attach to `stdout` of the exec command.
     */
    public function getAttachStdout(): ?bool
    {
        return $this->attachStdout;
    }

    /**
     * Attach to `stdout` of the exec command.
     */
    public function setAttachStdout(?bool $attachStdout): self
    {
        $this->initialized['attachStdout'] = true;
        $this->attachStdout = $attachStdout;

        return $this;
    }

    /**
     * Attach to `stderr` of the exec command.
     */
    public function getAttachStderr(): ?bool
    {
        return $this->attachStderr;
    }

    /**
     * Attach to `stderr` of the exec command.
     */
    public function setAttachStderr(?bool $attachStderr): self
    {
        $this->initialized['attachStderr'] = true;
        $this->attachStderr = $attachStderr;

        return $this;
    }

    /**
     * Override the key sequence for detaching a container. Format is
     * a single character `[a-Z]` or `ctrl-<value>` where `<value>`
     * is one of: `a-z`, `@`, `^`, `[`, `,` or `_`.
     */
    public function getDetachKeys(): ?string
    {
        return $this->detachKeys;
    }

    /**
     * Override the key sequence for detaching a container. Format is
     * a single character `[a-Z]` or `ctrl-<value>` where `<value>`
     * is one of: `a-z`, `@`, `^`, `[`, `,` or `_`.
     */
    public function setDetachKeys(?string $detachKeys): self
    {
        $this->initialized['detachKeys'] = true;
        $this->detachKeys = $detachKeys;

        return $this;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function getTty(): ?bool
    {
        return $this->tty;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function setTty(?bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;

        return $this;
    }

    /**
     * A list of environment variables in the form `["VAR=value", ...]`.
     *
     * @return string[]|null
     */
    public function getEnv(): ?array
    {
        return $this->env;
    }

    /**
     * A list of environment variables in the form `["VAR=value", ...]`.
     *
     * @param string[]|null $env
     */
    public function setEnv(?array $env): self
    {
        $this->initialized['env'] = true;
        $this->env = $env;

        return $this;
    }

    /**
     * Command to run, as a string or array of strings.
     *
     * @return string[]|null
     */
    public function getCmd(): ?array
    {
        return $this->cmd;
    }

    /**
     * Command to run, as a string or array of strings.
     *
     * @param string[]|null $cmd
     */
    public function setCmd(?array $cmd): self
    {
        $this->initialized['cmd'] = true;
        $this->cmd = $cmd;

        return $this;
    }

    /**
     * Runs the exec process with extended privileges.
     */
    public function getPrivileged(): ?bool
    {
        return $this->privileged;
    }

    /**
     * Runs the exec process with extended privileges.
     */
    public function setPrivileged(?bool $privileged): self
    {
        $this->initialized['privileged'] = true;
        $this->privileged = $privileged;

        return $this;
    }

    /**
     * The user, and optionally, group to run the exec process inside
     * the container. Format is one of: `user`, `user:group`, `uid`,
     * or `uid:gid`.
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * The user, and optionally, group to run the exec process inside
     * the container. Format is one of: `user`, `user:group`, `uid`,
     * or `uid:gid`.
     */
    public function setUser(?string $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    /**
     * The working directory for the exec process inside the container.
     */
    public function getWorkingDir(): ?string
    {
        return $this->workingDir;
    }

    /**
     * The working directory for the exec process inside the container.
     */
    public function setWorkingDir(?string $workingDir): self
    {
        $this->initialized['workingDir'] = true;
        $this->workingDir = $workingDir;

        return $this;
    }
}
