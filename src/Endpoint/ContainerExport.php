<?php

namespace Docker\API\Endpoint;

class ContainerExport extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    protected $id;
    protected $accept;
    /**
     * Export the contents of a container as a tarball.
     *
     * @param string $id ID or name of the container
     * @param array $accept Accept content header application/octet-stream|application/json
     */
    public function __construct(string $id, array $accept = array())
    {
        $this->id = $id;
        $this->accept = $accept;
    }
    use \Docker\API\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/containers/{id}/export');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        if (empty($this->accept)) {
            return array('Accept' => array('application/octet-stream', 'application/json'));
        }
        return $this->accept;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\ContainerExportNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if (is_null($contentType) === false && (404 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\ContainerExportNotFoundException($response);
        }
        if (500 === $status) {
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}