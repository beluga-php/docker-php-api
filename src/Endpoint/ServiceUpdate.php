<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ServiceUpdate extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * @param string $id              ID or name of service
     * @param array  $queryParameters {
     *
     *     @var int $version The version number of the service object being updated. This is
     * required to avoid conflicting writes.
     * This version number should be the value as currently set on the
     * service *before* the update. You can find the current version by
     * calling `GET /services/{id}`
     *     @var string $registryAuthFrom if the `X-Registry-Auth` header is not specified, this parameter
     * indicates where to find registry authorization credentials
     *     @var string $rollback Set to this parameter to `previous` to cause a server-side rollback
     * to the previous service spec. The supplied spec will be ignored in
     * this case.
     *
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
     * registries.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     *
     * }
     */
    public function __construct(string $id, ?\Docker\API\Model\ServicesIdUpdatePostBody $requestBody = null, array $queryParameters = [], array $headerParameters = [])
    {
        $this->id = $id;
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/services/{id}/update');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Docker\API\Model\ServicesIdUpdatePostBody) {
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
        $optionsResolver->setDefined(['version', 'registryAuthFrom', 'rollback']);
        $optionsResolver->setRequired(['version']);
        $optionsResolver->setDefaults(['registryAuthFrom' => 'spec']);
        $optionsResolver->addAllowedTypes('version', ['int']);
        $optionsResolver->addAllowedTypes('registryAuthFrom', ['string']);
        $optionsResolver->addAllowedTypes('rollback', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['X-Registry-Auth']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('X-Registry-Auth', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\ServiceUpdateBadRequestException
     * @throws \Docker\API\Exception\ServiceUpdateNotFoundException
     * @throws \Docker\API\Exception\ServiceUpdateInternalServerErrorException
     * @throws \Docker\API\Exception\ServiceUpdateServiceUnavailableException
     *
     * @return \Docker\API\Model\ServiceUpdateResponse|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Docker\\API\\Model\\ServiceUpdateResponse', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\ServiceUpdateBadRequestException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\ServiceUpdateNotFoundException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\ServiceUpdateInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
        if ((null === $contentType) === false && (503 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\ServiceUpdateServiceUnavailableException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
