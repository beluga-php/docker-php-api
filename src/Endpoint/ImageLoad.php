<?php

namespace Docker\API\Endpoint;

class ImageLoad extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    /**
    * Load a set of images and tags into a repository.
    
    For details on the format, see the [export image endpoint](#operation/ImageGet).
    
    *
    * @param null|string|resource|\Psr\Http\Message\StreamInterface $requestBody 
    * @param array $queryParameters {
    *     @var bool $quiet Suppress progress details during load.
    * }
    */
    public function __construct($requestBody = null, array $queryParameters = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
    }
    use \Docker\API\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/images/load';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        if (is_string($this->body) or is_resource($this->body) or $this->body instanceof \Psr\Http\Message\StreamInterface) {
            return array(array('Content-Type' => array('application/x-tar')), $this->body);
        }
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('quiet'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('quiet' => false));
        $optionsResolver->addAllowedTypes('quiet', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\ImageLoadInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\ImageLoadInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}