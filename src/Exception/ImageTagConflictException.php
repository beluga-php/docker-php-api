<?php

declare(strict_types=1);

namespace Docker\API\Exception;

class ImageTagConflictException extends \RuntimeException implements ClientException
{
    private $errorResponse;

    public function __construct(\Docker\API\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Conflict', 409);
        $this->errorResponse = $errorResponse;
    }

    public function getErrorResponse()
    {
        return $this->errorResponse;
    }
}
