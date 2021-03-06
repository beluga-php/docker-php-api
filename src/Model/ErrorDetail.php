<?php

declare(strict_types=1);

namespace Docker\API\Model;

class ErrorDetail
{
    /**
     * @var int|null
     */
    protected $code;
    /**
     * @var string|null
     */
    protected $message;

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(?int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
