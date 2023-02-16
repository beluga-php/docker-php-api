<?php

namespace Docker\API\Exception;

class ContainerArchiveInfoBadRequestException extends BadRequestException
{
    /**
     * @var \Docker\API\Model\ContainersIdArchiveHeadJsonResponse400
     */
    private $containersIdArchiveHeadJsonResponse400;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Docker\API\Model\ContainersIdArchiveHeadJsonResponse400 $containersIdArchiveHeadJsonResponse400, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Bad parameter');
        $this->containersIdArchiveHeadJsonResponse400 = $containersIdArchiveHeadJsonResponse400;
        $this->response = $response;
    }
    public function getContainersIdArchiveHeadJsonResponse400() : \Docker\API\Model\ContainersIdArchiveHeadJsonResponse400
    {
        return $this->containersIdArchiveHeadJsonResponse400;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}