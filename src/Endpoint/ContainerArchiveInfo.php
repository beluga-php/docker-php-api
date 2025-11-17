<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ContainerArchiveInfo extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;
    protected $accept;

    /**
     * A response header `X-Docker-Container-Path-Stat` is returned, containing
     * a base64 - encoded JSON object with some filesystem header information
     * about the path.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $path Resource in the container’s filesystem to archive.
     *             }
     *
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
        return 'HEAD';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/archive');
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
        $optionsResolver->setDefined(['path']);
        $optionsResolver->setRequired(['path']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('path', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ContainerArchiveInfoBadRequestException
     * @throws \Docker\API\Exception\ContainerArchiveInfoNotFoundException
     * @throws \Docker\API\Exception\ContainerArchiveInfoInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\ContainerArchiveInfoBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\ContainerArchiveInfoNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\ContainerArchiveInfoInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
