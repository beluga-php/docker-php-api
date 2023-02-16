<?php

namespace Docker\API\Endpoint;

class GetPluginPrivileges extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    protected $accept;
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $remote The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * }
    * @param array $accept Accept content header application/json|text/plain
    */
    public function __construct(array $queryParameters = array(), array $accept = array())
    {
        $this->queryParameters = $queryParameters;
        $this->accept = $accept;
    }
    use \Docker\API\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/plugins/privileges';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
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
        $optionsResolver->setDefined(array('remote'));
        $optionsResolver->setRequired(array('remote'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('remote', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Docker\API\Exception\GetPluginPrivilegesInternalServerErrorException
     *
     * @return null|\Docker\API\Model\PluginsPrivilegesGetJsonResponse200Item[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (is_null($contentType) === false && (200 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            return $serializer->deserialize($body, 'Docker\\API\\Model\\PluginsPrivilegesGetJsonResponse200Item[]', 'json');
        }
        if (is_null($contentType) === false && (500 === $status && mb_strpos($contentType, 'application/json') !== false)) {
            throw new \Docker\API\Exception\GetPluginPrivilegesInternalServerErrorException($serializer->deserialize($body, 'Docker\\API\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}