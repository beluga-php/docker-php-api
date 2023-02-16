<?php

declare(strict_types=1);

namespace Docker\API\Model;

class AuthConfig extends \ArrayObject
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
    protected $username;
    /**
     * @var string|null
     */
    protected $password;
    /**
     * @var string|null
     */
    protected $email;
    /**
     * @var string|null
     */
    protected $serveraddress;

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->initialized['username'] = true;
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->initialized['password'] = true;
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    public function getServeraddress(): ?string
    {
        return $this->serveraddress;
    }

    public function setServeraddress(?string $serveraddress): self
    {
        $this->initialized['serveraddress'] = true;
        $this->serveraddress = $serveraddress;

        return $this;
    }
}
