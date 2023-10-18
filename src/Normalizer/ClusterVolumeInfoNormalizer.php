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

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\ClusterVolumeInfo' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ClusterVolumeInfo' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ClusterVolumeInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('CapacityBytes', $data) && null !== $data['CapacityBytes']) {
            $object->setCapacityBytes($data['CapacityBytes']);
            unset($data['CapacityBytes']);
        } elseif (\array_key_exists('CapacityBytes', $data) && null === $data['CapacityBytes']) {
            $object->setCapacityBytes(null);
        }
        if (\array_key_exists('VolumeContext', $data) && null !== $data['VolumeContext']) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['VolumeContext'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setVolumeContext($values);
            unset($data['VolumeContext']);
        } elseif (\array_key_exists('VolumeContext', $data) && null === $data['VolumeContext']) {
            $object->setVolumeContext(null);
        }
        if (\array_key_exists('VolumeID', $data) && null !== $data['VolumeID']) {
            $object->setVolumeID($data['VolumeID']);
            unset($data['VolumeID']);
        } elseif (\array_key_exists('VolumeID', $data) && null === $data['VolumeID']) {
            $object->setVolumeID(null);
        }
        if (\array_key_exists('AccessibleTopology', $data) && null !== $data['AccessibleTopology']) {
            $values_1 = [];
            foreach ($data['AccessibleTopology'] as $value_1) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($value_1 as $key_1 => $value_2) {
                    $values_2[$key_1] = $value_2;
                }
                $values_1[] = $values_2;
            }
            $object->setAccessibleTopology($values_1);
            unset($data['AccessibleTopology']);
        } elseif (\array_key_exists('AccessibleTopology', $data) && null === $data['AccessibleTopology']) {
            $object->setAccessibleTopology(null);
        }
        foreach ($data as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_3;
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
        if ($object->isInitialized('capacityBytes') && null !== $object->getCapacityBytes()) {
            $data['CapacityBytes'] = $object->getCapacityBytes();
        }
        if ($object->isInitialized('volumeContext') && null !== $object->getVolumeContext()) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($object->getVolumeContext() as $key => $value) {
                $values[$key] = $value;
            }
            $data['VolumeContext'] = $values;
        }
        if ($object->isInitialized('volumeID') && null !== $object->getVolumeID()) {
            $data['VolumeID'] = $object->getVolumeID();
        }
        if ($object->isInitialized('accessibleTopology') && null !== $object->getAccessibleTopology()) {
            $values_1 = [];
            foreach ($object->getAccessibleTopology() as $value_1) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($value_1 as $key_1 => $value_2) {
                    $values_2[$key_1] = $value_2;
                }
                $values_1[] = $values_2;
            }
            $data['AccessibleTopology'] = $values_1;
        }
        foreach ($object as $key_2 => $value_3) {
            if (preg_match('/.*/', (string) $key_2)) {
                $data[$key_2] = $value_3;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\ClusterVolumeInfo' => false];
    }
}
