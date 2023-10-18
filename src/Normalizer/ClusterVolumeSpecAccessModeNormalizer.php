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

class ClusterVolumeSpecAccessModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\ClusterVolumeSpecAccessMode' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ClusterVolumeSpecAccessMode' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ClusterVolumeSpecAccessMode();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Scope', $data) && null !== $data['Scope']) {
            $object->setScope($data['Scope']);
            unset($data['Scope']);
        } elseif (\array_key_exists('Scope', $data) && null === $data['Scope']) {
            $object->setScope(null);
        }
        if (\array_key_exists('Sharing', $data) && null !== $data['Sharing']) {
            $object->setSharing($data['Sharing']);
            unset($data['Sharing']);
        } elseif (\array_key_exists('Sharing', $data) && null === $data['Sharing']) {
            $object->setSharing(null);
        }
        if (\array_key_exists('MountVolume', $data) && null !== $data['MountVolume']) {
            $object->setMountVolume($this->denormalizer->denormalize($data['MountVolume'], 'Docker\\API\\Model\\ClusterVolumeSpecAccessModeMountVolume', 'json', $context));
            unset($data['MountVolume']);
        } elseif (\array_key_exists('MountVolume', $data) && null === $data['MountVolume']) {
            $object->setMountVolume(null);
        }
        if (\array_key_exists('Secrets', $data) && null !== $data['Secrets']) {
            $values = [];
            foreach ($data['Secrets'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\ClusterVolumeSpecAccessModeSecretsItem', 'json', $context);
            }
            $object->setSecrets($values);
            unset($data['Secrets']);
        } elseif (\array_key_exists('Secrets', $data) && null === $data['Secrets']) {
            $object->setSecrets(null);
        }
        if (\array_key_exists('AccessibilityRequirements', $data) && null !== $data['AccessibilityRequirements']) {
            $object->setAccessibilityRequirements($this->denormalizer->denormalize($data['AccessibilityRequirements'], 'Docker\\API\\Model\\ClusterVolumeSpecAccessModeAccessibilityRequirements', 'json', $context));
            unset($data['AccessibilityRequirements']);
        } elseif (\array_key_exists('AccessibilityRequirements', $data) && null === $data['AccessibilityRequirements']) {
            $object->setAccessibilityRequirements(null);
        }
        if (\array_key_exists('CapacityRange', $data) && null !== $data['CapacityRange']) {
            $object->setCapacityRange($this->denormalizer->denormalize($data['CapacityRange'], 'Docker\\API\\Model\\ClusterVolumeSpecAccessModeCapacityRange', 'json', $context));
            unset($data['CapacityRange']);
        } elseif (\array_key_exists('CapacityRange', $data) && null === $data['CapacityRange']) {
            $object->setCapacityRange(null);
        }
        if (\array_key_exists('Availability', $data) && null !== $data['Availability']) {
            $object->setAvailability($data['Availability']);
            unset($data['Availability']);
        } elseif (\array_key_exists('Availability', $data) && null === $data['Availability']) {
            $object->setAvailability(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('scope') && null !== $object->getScope()) {
            $data['Scope'] = $object->getScope();
        }
        if ($object->isInitialized('sharing') && null !== $object->getSharing()) {
            $data['Sharing'] = $object->getSharing();
        }
        if ($object->isInitialized('mountVolume') && null !== $object->getMountVolume()) {
            $data['MountVolume'] = null === $object->getMountVolume() ? null : new \ArrayObject($this->normalizer->normalize($object->getMountVolume(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('secrets') && null !== $object->getSecrets()) {
            $values = [];
            foreach ($object->getSecrets() as $value) {
                $values[] = null === $value ? null : new \ArrayObject($this->normalizer->normalize($value, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
            }
            $data['Secrets'] = $values;
        }
        if ($object->isInitialized('accessibilityRequirements') && null !== $object->getAccessibilityRequirements()) {
            $data['AccessibilityRequirements'] = null === $object->getAccessibilityRequirements() ? null : new \ArrayObject($this->normalizer->normalize($object->getAccessibilityRequirements(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('capacityRange') && null !== $object->getCapacityRange()) {
            $data['CapacityRange'] = null === $object->getCapacityRange() ? null : new \ArrayObject($this->normalizer->normalize($object->getCapacityRange(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('availability') && null !== $object->getAvailability()) {
            $data['Availability'] = $object->getAvailability();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\ClusterVolumeSpecAccessMode' => false];
    }
}
