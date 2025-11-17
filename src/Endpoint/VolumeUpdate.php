<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class VolumeUpdate extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $name;

    /**
     * @param string $name            The name or ID of the volume
     * @param array  $queryParameters {
     *
     * @var int $version The version number of the volume being updated. This is required to
     *          avoid conflicting writes. Found in the volume's `ClusterVolume`
     *          field.
     *
     * }
     */
    public function __construct(string $name, ?\Docker\API\Model\VolumesNamePutBody $requestBody = null, array $queryParameters = [])
    {
        $this->name = $name;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [$this->name], '/volumes/{name}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Docker\API\Model\VolumesNamePutBody) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
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
        $optionsResolver->setDefined(['version']);
        $optionsResolver->setRequired(['version']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('version', ['int']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\VolumeUpdateBadRequestException
     * @throws \Docker\API\Exception\VolumeUpdateNotFoundException
     * @throws \Docker\API\Exception\VolumeUpdateInternalServerErrorException
     * @throws \Docker\API\Exception\VolumeUpdateServiceUnavailableException
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
            throw new \Docker\API\Exception\VolumeUpdateBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\VolumeUpdateNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\VolumeUpdateInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (503 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\VolumeUpdateServiceUnavailableException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
