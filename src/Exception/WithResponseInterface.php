<?php

declare(strict_types=1);

namespace Docker\API\Exception;

interface WithResponseInterface
{
    public function getResponse(): ?\Psr\Http\Message\ResponseInterface;
}
