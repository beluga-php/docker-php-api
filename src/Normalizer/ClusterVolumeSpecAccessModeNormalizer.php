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

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ClusterVolumeSpecAccessMode::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ClusterVolumeSpecAccessMode::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
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
            $object->setMountVolume($this->denormalizer->denormalize($data['MountVolume'], \Docker\API\Model\ClusterVolumeSpecAccessModeMountVolume::class, 'json', $context));
            unset($data['MountVolume']);
        } elseif (\array_key_exists('MountVolume', $data) && null === $data['MountVolume']) {
            $object->setMountVolume(null);
        }
        if (\array_key_exists('Secrets', $data) && null !== $data['Secrets']) {
            $values = [];
            foreach ($data['Secrets'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\ClusterVolumeSpecAccessModeSecretsItem::class, 'json', $context);
            }
            $object->setSecrets($values);
            unset($data['Secrets']);
        } elseif (\array_key_exists('Secrets', $data) && null === $data['Secrets']) {
            $object->setSecrets(null);
        }
        if (\array_key_exists('AccessibilityRequirements', $data) && null !== $data['AccessibilityRequirements']) {
            $object->setAccessibilityRequirements($this->denormalizer->denormalize($data['AccessibilityRequirements'], \Docker\API\Model\ClusterVolumeSpecAccessModeAccessibilityRequirements::class, 'json', $context));
            unset($data['AccessibilityRequirements']);
        } elseif (\array_key_exists('AccessibilityRequirements', $data) && null === $data['AccessibilityRequirements']) {
            $object->setAccessibilityRequirements(null);
        }
        if (\array_key_exists('CapacityRange', $data) && null !== $data['CapacityRange']) {
            $object->setCapacityRange($this->denormalizer->denormalize($data['CapacityRange'], \Docker\API\Model\ClusterVolumeSpecAccessModeCapacityRange::class, 'json', $context));
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

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('scope') && null !== $data->getScope()) {
            $dataArray['Scope'] = $data->getScope();
        }
        if ($data->isInitialized('sharing') && null !== $data->getSharing()) {
            $dataArray['Sharing'] = $data->getSharing();
        }
        if ($data->isInitialized('mountVolume') && null !== $data->getMountVolume()) {
            $dataArray['MountVolume'] = $this->normalizer->normalize($data->getMountVolume(), 'json', $context);
        }
        if ($data->isInitialized('secrets') && null !== $data->getSecrets()) {
            $values = [];
            foreach ($data->getSecrets() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Secrets'] = $values;
        }
        if ($data->isInitialized('accessibilityRequirements') && null !== $data->getAccessibilityRequirements()) {
            $dataArray['AccessibilityRequirements'] = $this->normalizer->normalize($data->getAccessibilityRequirements(), 'json', $context);
        }
        if ($data->isInitialized('capacityRange') && null !== $data->getCapacityRange()) {
            $dataArray['CapacityRange'] = $this->normalizer->normalize($data->getCapacityRange(), 'json', $context);
        }
        if ($data->isInitialized('availability') && null !== $data->getAvailability()) {
            $dataArray['Availability'] = $data->getAvailability();
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ClusterVolumeSpecAccessMode::class => false];
    }
}
