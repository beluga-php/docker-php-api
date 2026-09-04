<?php

declare(strict_types=1);

namespace Docker\API\Model;

use Docker\API\Runtime\AdditionalAndPatternProperties;
use Docker\API\Runtime\AdditionalPropertiesInterface;

class ContainersIdWaitPostResponse200Error implements AdditionalPropertiesInterface
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
     * Details of an error.
     *
     * @var string|null
     */
    protected $message;

    /**
     * Details of an error.
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Details of an error.
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['message' => ['Message', 'getMessage', 'setMessage']];
    }
}
