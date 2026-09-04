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

class ClusterVolumeInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ClusterVolumeInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ClusterVolumeInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\ClusterVolumeInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('CapacityBytes', $data) && null !== $data['CapacityBytes']) {
            $object->setCapacityBytes($data['CapacityBytes']);
            unset($data['CapacityBytes']);
        } elseif (\array_key_exists('CapacityBytes', $data) && null === $data['CapacityBytes']) {
            $object->setCapacityBytes(null);
            unset($data['CapacityBytes']);
        }
        if (\array_key_exists('VolumeContext', $data) && null !== $data['VolumeContext']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['VolumeContext'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setVolumeContext($values);
            unset($data['VolumeContext']);
        } elseif (\array_key_exists('VolumeContext', $data) && null === $data['VolumeContext']) {
            $object->setVolumeContext(null);
            unset($data['VolumeContext']);
        }
        if (\array_key_exists('VolumeID', $data) && null !== $data['VolumeID']) {
            $object->setVolumeID($data['VolumeID']);
            unset($data['VolumeID']);
        } elseif (\array_key_exists('VolumeID', $data) && null === $data['VolumeID']) {
            $object->setVolumeID(null);
            unset($data['VolumeID']);
        }
        if (\array_key_exists('AccessibleTopology', $data) && null !== $data['AccessibleTopology']) {
            $values_1 = [];
            foreach ($data['AccessibleTopology'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\Topology::class, 'json', $context);
            }
            $object->setAccessibleTopology($values_1);
            unset($data['AccessibleTopology']);
        } elseif (\array_key_exists('AccessibleTopology', $data) && null === $data['AccessibleTopology']) {
            $object->setAccessibleTopology(null);
            unset($data['AccessibleTopology']);
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('capacityBytes') && null !== $data->getCapacityBytes()) {
            $dataArray['CapacityBytes'] = $data->getCapacityBytes();
        }
        if ($data->isInitialized('volumeContext') && null !== $data->getVolumeContext()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getVolumeContext() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['VolumeContext'] = $values;
        }
        if ($data->isInitialized('volumeID') && null !== $data->getVolumeID()) {
            $dataArray['VolumeID'] = $data->getVolumeID();
        }
        if ($data->isInitialized('accessibleTopology') && null !== $data->getAccessibleTopology()) {
            $values_1 = [];
            foreach ($data->getAccessibleTopology() as $value_1) {
                $values_1[] = null === $value_1 ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['AccessibleTopology'] = $values_1;
        }
        foreach ($data->additionalPropertyEntries() as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ClusterVolumeInfo::class => false];
    }
}
