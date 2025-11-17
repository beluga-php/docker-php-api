<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class VolumePrune extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune volumes with (or without, in case `label!=...` is used) the specified labels.
     * - `all` (`all=true`) - Consider all (local) volumes for pruning and not just anonymous volumes.
     *
     * }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/volumes/prune';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['filters']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('filters', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\VolumePruneInternalServerErrorException
     *
     * @return \Docker\API\Model\VolumesPrunePostResponse200|null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Docker\API\Model\VolumesPrunePostResponse200', 'json');
        }
        if ((null === $contentType) === false && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\VolumePruneInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
