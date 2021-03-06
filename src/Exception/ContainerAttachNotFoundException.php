<?php

declare(strict_types=1);

namespace Docker\API\Exception;

class ContainerAttachNotFoundException extends \RuntimeException implements ClientException
{
    public function __construct()
    {
        parent::__construct('no such container', 404);
    }
}
