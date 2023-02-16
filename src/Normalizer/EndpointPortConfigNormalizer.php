<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EndpointPortConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\EndpointPortConfig' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\EndpointPortConfig' === $data::class;
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\EndpointPortConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('Protocol', $data) && null !== $data['Protocol']) {
            $object->setProtocol($data['Protocol']);
            unset($data['Protocol']);
        } elseif (\array_key_exists('Protocol', $data) && null === $data['Protocol']) {
            $object->setProtocol(null);
        }
        if (\array_key_exists('TargetPort', $data) && null !== $data['TargetPort']) {
            $object->setTargetPort($data['TargetPort']);
            unset($data['TargetPort']);
        } elseif (\array_key_exists('TargetPort', $data) && null === $data['TargetPort']) {
            $object->setTargetPort(null);
        }
        if (\array_key_exists('PublishedPort', $data) && null !== $data['PublishedPort']) {
            $object->setPublishedPort($data['PublishedPort']);
            unset($data['PublishedPort']);
        } elseif (\array_key_exists('PublishedPort', $data) && null === $data['PublishedPort']) {
            $object->setPublishedPort(null);
        }
        if (\array_key_exists('PublishMode', $data) && null !== $data['PublishMode']) {
            $object->setPublishMode($data['PublishMode']);
            unset($data['PublishMode']);
        } elseif (\array_key_exists('PublishMode', $data) && null === $data['PublishMode']) {
            $object->setPublishMode(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('protocol') && null !== $object->getProtocol()) {
            $data['Protocol'] = $object->getProtocol();
        }
        if ($object->isInitialized('targetPort') && null !== $object->getTargetPort()) {
            $data['TargetPort'] = $object->getTargetPort();
        }
        if ($object->isInitialized('publishedPort') && null !== $object->getPublishedPort()) {
            $data['PublishedPort'] = $object->getPublishedPort();
        }
        if ($object->isInitialized('publishMode') && null !== $object->getPublishMode()) {
            $data['PublishMode'] = $object->getPublishMode();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
