<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class SwarmUpdate extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    /**
     * @param array $queryParameters {
     *
     *     @var int $version The version number of the swarm object being updated. This is
     *     @var bool $rotateWorkerToken rotate the worker join token
     *     @var bool $rotateManagerToken rotate the manager join token
     *     @var bool $rotateManagerUnlockKey Rotate the manager unlock key.
     * }
     */
    public function __construct(\Docker\API\Model\SwarmSpec $requestBody, array $queryParameters = [])
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }

    use \Docker\API\Runtime\Client\EndpointTrait;

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/swarm/update';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Docker\API\Model\SwarmSpec) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        if ($this->body instanceof \Docker\API\Model\SwarmSpec) {
            return [['Content-Type' => ['text/plain']], $this->body];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['version', 'rotateWorkerToken', 'rotateManagerToken', 'rotateManagerUnlockKey']);
        $optionsResolver->setRequired(['version']);
        $optionsResolver->setDefaults(['rotateWorkerToken' => false, 'rotateManagerToken' => false, 'rotateManagerUnlockKey' => false]);
        $optionsResolver->setAllowedTypes('version', ['int']);
        $optionsResolver->setAllowedTypes('rotateWorkerToken', ['bool']);
        $optionsResolver->setAllowedTypes('rotateManagerToken', ['bool']);
        $optionsResolver->setAllowedTypes('rotateManagerUnlockKey', ['bool']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\SwarmUpdateBadRequestException
     * @throws \Docker\API\Exception\SwarmUpdateInternalServerErrorException
     * @throws \Docker\API\Exception\SwarmUpdateServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
        }
        if (400 === $status && false !== \mb_strpos($contentType, 'application/json')) {
            throw new \Docker\API\Exception\SwarmUpdateBadRequestException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status && false !== \mb_strpos($contentType, 'application/json')) {
            throw new \Docker\API\Exception\SwarmUpdateInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status && false !== \mb_strpos($contentType, 'application/json')) {
            throw new \Docker\API\Exception\SwarmUpdateServiceUnavailableException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'));
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
