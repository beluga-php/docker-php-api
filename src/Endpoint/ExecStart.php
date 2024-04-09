<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ExecStart extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;
    protected $accept;

    /**
     * Starts a previously set up exec instance. If detach is true, this endpoint
     * returns immediately after starting the command. Otherwise, it sets up an
     * interactive session with the command.
     *
     * @param string $id     Exec instance ID
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream
     */
    public function __construct(string $id, ?\Docker\API\Model\ExecIdStartPostBody $requestBody = null, array $accept = [])
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->accept = $accept;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/exec/{id}/start');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Docker\API\Model\ExecIdStartPostBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/vnd.docker.raw-stream', 'application/vnd.docker.multiplexed-stream']];
        }

        return $this->accept;
    }

    /**
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if (404 === $status) {
        }
        if (409 === $status) {
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
