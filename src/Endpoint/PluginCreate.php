<?php

namespace Docker\API\Endpoint;

class PluginCreate extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    protected $accept;
    /**
    * 
    *
    * @param null|string|resource|\Psr\Http\Message\StreamInterface $requestBody 
    * @param array $queryParameters {
    *     @var string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * }
    * @param array $accept Accept content header application/json|text/plain
    */
    public function __construct($requestBody = null, array $queryParameters = array(), array $accept = array())
    {
        $this->body = $requestBody;
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Docker\API\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/plugins/create';
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
        if (empty($this->accept)) {
            return array('Accept' => array('application/json', 'text/plain'));
        }
        return $this->accept;
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('name'));
        $optionsResolver->setRequired(array('name'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('name', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\PluginCreateInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\PluginCreateInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}