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

class PortNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\Port' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\Port' === $data::class;
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
        $object = new \Docker\API\Model\Port();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('IP', $data) && null !== $data['IP']) {
            $object->setIP($data['IP']);
            unset($data['IP']);
        } elseif (\array_key_exists('IP', $data) && null === $data['IP']) {
            $object->setIP(null);
        }
        if (\array_key_exists('PrivatePort', $data) && null !== $data['PrivatePort']) {
            $object->setPrivatePort($data['PrivatePort']);
            unset($data['PrivatePort']);
        } elseif (\array_key_exists('PrivatePort', $data) && null === $data['PrivatePort']) {
            $object->setPrivatePort(null);
        }
        if (\array_key_exists('PublicPort', $data) && null !== $data['PublicPort']) {
            $object->setPublicPort($data['PublicPort']);
            unset($data['PublicPort']);
        } elseif (\array_key_exists('PublicPort', $data) && null === $data['PublicPort']) {
            $object->setPublicPort(null);
        }
        if (\array_key_exists('Type', $data) && null !== $data['Type']) {
            $object->setType($data['Type']);
            unset($data['Type']);
        } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
            $object->setType(null);
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
        if ($object->isInitialized('iP') && null !== $object->getIP()) {
            $data['IP'] = $object->getIP();
        }
        $data['PrivatePort'] = $object->getPrivatePort();
        if ($object->isInitialized('publicPort') && null !== $object->getPublicPort()) {
            $data['PublicPort'] = $object->getPublicPort();
        }
        $data['Type'] = $object->getType();
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
