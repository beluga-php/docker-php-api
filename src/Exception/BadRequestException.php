<?php

declare(strict_types=1);

namespace Docker\API\Exception;

abstract class BadRequestException extends \RuntimeException implements ClientException, WithResponseInterface
{
    public function __construct(string $message)
    {
        parent::__construct($message, 400);
    }
}
