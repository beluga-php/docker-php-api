<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ErrorResponse extends \ArrayObject
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
     * The error message.
     *
     * @var string|null
     */
    protected $message;

    /**
     * The error message.
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * The error message.
     */
    public function setMessage(?string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }
}
