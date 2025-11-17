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

class DeviceMappingNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\DeviceMapping::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\DeviceMapping::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\DeviceMapping();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('PathOnHost', $data) && null !== $data['PathOnHost']) {
            $object->setPathOnHost($data['PathOnHost']);
            unset($data['PathOnHost']);
        } elseif (\array_key_exists('PathOnHost', $data) && null === $data['PathOnHost']) {
            $object->setPathOnHost(null);
        }
        if (\array_key_exists('PathInContainer', $data) && null !== $data['PathInContainer']) {
            $object->setPathInContainer($data['PathInContainer']);
            unset($data['PathInContainer']);
        } elseif (\array_key_exists('PathInContainer', $data) && null === $data['PathInContainer']) {
            $object->setPathInContainer(null);
        }
        if (\array_key_exists('CgroupPermissions', $data) && null !== $data['CgroupPermissions']) {
            $object->setCgroupPermissions($data['CgroupPermissions']);
            unset($data['CgroupPermissions']);
        } elseif (\array_key_exists('CgroupPermissions', $data) && null === $data['CgroupPermissions']) {
            $object->setCgroupPermissions(null);
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
        if ($data->isInitialized('pathOnHost') && null !== $data->getPathOnHost()) {
            $dataArray['PathOnHost'] = $data->getPathOnHost();
        }
        if ($data->isInitialized('pathInContainer') && null !== $data->getPathInContainer()) {
            $dataArray['PathInContainer'] = $data->getPathInContainer();
        }
        if ($data->isInitialized('cgroupPermissions') && null !== $data->getCgroupPermissions()) {
            $dataArray['CgroupPermissions'] = $data->getCgroupPermissions();
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\DeviceMapping::class => false];
    }
}
