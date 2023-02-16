<?php

declare(strict_types=1);

namespace Docker\API\Exception;

class ConflictException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 409);
    }
}
