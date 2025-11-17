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

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Port::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Port::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
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

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('iP') && null !== $data->getIP()) {
            $dataArray['IP'] = $data->getIP();
        }
        $dataArray['PrivatePort'] = $data->getPrivatePort();
        if ($data->isInitialized('publicPort') && null !== $data->getPublicPort()) {
            $dataArray['PublicPort'] = $data->getPublicPort();
        }
        $dataArray['Type'] = $data->getType();
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\Port::class => false];
    }
}
