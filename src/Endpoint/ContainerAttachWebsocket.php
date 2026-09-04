<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ContainerAttachWebsocket extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;
    protected $accept;

    /**
     * @param string $id ID or name of the container
     * @param array{
     *    "detachKeys"?: string, //Override the key sequence for detaching a container.Format is a single
     * character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
     * `@`, `^`, `[`, `,`, or `_`.
     *    "logs"?: bool, //Return logs
     *    "stream"?: bool, //Return stream
     *    "stdin"?: bool, //Attach to `stdin`
     *    "stdout"?: bool, //Attach to `stdout`
     *    "stderr"?: bool, //Attach to `stderr`
     * } $queryParameters
     * @param array $accept Accept content header application/json|text/plain
     */
    public function __construct(string $id, array $queryParameters = [], array $accept = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [rawurlencode($this->id)], '/containers/{id}/attach/ws');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/json', 'text/plain']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['detachKeys', 'logs', 'stream', 'stdin', 'stdout', 'stderr']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['logs' => false, 'stream' => false, 'stdin' => false, 'stdout' => false, 'stderr' => false]);
        $optionsResolver->addAllowedTypes('detachKeys', ['string']);
        $optionsResolver->addAllowedTypes('logs', ['bool']);
        $optionsResolver->addAllowedTypes('stream', ['bool']);
        $optionsResolver->addAllowedTypes('stdin', ['bool']);
        $optionsResolver->addAllowedTypes('stdout', ['bool']);
        $optionsResolver->addAllowedTypes('stderr', ['bool']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ContainerAttachWebsocketBadRequestException
     * @throws \Docker\API\Exception\ContainerAttachWebsocketNotFoundException
     * @throws \Docker\API\Exception\ContainerAttachWebsocketInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (101 === $status) {
            return null;
        }
        if (200 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ContainerAttachWebsocketBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ContainerAttachWebsocketNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new \Docker\API\Exception\ContainerAttachWebsocketInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
