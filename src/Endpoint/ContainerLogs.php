<?php

declare(strict_types=1);

namespace Docker\API\Endpoint;

class ContainerLogs extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;
    protected $accept;

    /**
     * Get `stdout` and `stderr` logs from a container.
     *
     * Note: This endpoint works only for containers with the `json-file` or
     * `journald` logging driver.
     *
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var bool   $follow keep connection after returning logs
     * @var bool   $stdout Return logs from `stdout`
     * @var bool   $stderr Return logs from `stderr`
     * @var int    $since Only return logs since this time, as a UNIX timestamp
     * @var int    $until Only return logs before this time, as a UNIX timestamp
     * @var bool   $timestamps Add timestamps to every log line
     * @var string $tail Only return this number of log lines from the end of the logs.
     *             Specify as an integer or `all` to output all log lines.
     *
     * }
     *
     * @param array $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
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
        return str_replace(['{id}'], [$this->id], '/containers/{id}/logs');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/vnd.docker.raw-stream', 'application/vnd.docker.multiplexed-stream', 'application/json']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['follow', 'stdout', 'stderr', 'since', 'until', 'timestamps', 'tail']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['follow' => false, 'stdout' => false, 'stderr' => false, 'since' => 0, 'until' => 0, 'timestamps' => false, 'tail' => 'all']);
        $optionsResolver->addAllowedTypes('follow', ['bool']);
        $optionsResolver->addAllowedTypes('stdout', ['bool']);
        $optionsResolver->addAllowedTypes('stderr', ['bool']);
        $optionsResolver->addAllowedTypes('since', ['int']);
        $optionsResolver->addAllowedTypes('until', ['int']);
        $optionsResolver->addAllowedTypes('timestamps', ['bool']);
        $optionsResolver->addAllowedTypes('tail', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ContainerLogsNotFoundException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if ((null === $contentType) === false && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new \Docker\API\Exception\ContainerLogsNotFoundException($response);
        }
        if (500 === $status) {
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
