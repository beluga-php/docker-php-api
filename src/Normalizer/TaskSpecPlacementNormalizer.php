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

class TaskSpecPlacementNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecPlacement::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecPlacement::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecPlacement();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Constraints', $data) && null !== $data['Constraints']) {
            $values = [];
            foreach ($data['Constraints'] as $value) {
                $values[] = $value;
            }
            $object->setConstraints($values);
            unset($data['Constraints']);
        } elseif (\array_key_exists('Constraints', $data) && null === $data['Constraints']) {
            $object->setConstraints(null);
        }
        if (\array_key_exists('Preferences', $data) && null !== $data['Preferences']) {
            $values_1 = [];
            foreach ($data['Preferences'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\TaskSpecPlacementPreferencesItem::class, 'json', $context);
            }
            $object->setPreferences($values_1);
            unset($data['Preferences']);
        } elseif (\array_key_exists('Preferences', $data) && null === $data['Preferences']) {
            $object->setPreferences(null);
        }
        if (\array_key_exists('MaxReplicas', $data) && null !== $data['MaxReplicas']) {
            $object->setMaxReplicas($data['MaxReplicas']);
            unset($data['MaxReplicas']);
        } elseif (\array_key_exists('MaxReplicas', $data) && null === $data['MaxReplicas']) {
            $object->setMaxReplicas(null);
        }
        if (\array_key_exists('Platforms', $data) && null !== $data['Platforms']) {
            $values_2 = [];
            foreach ($data['Platforms'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\Platform::class, 'json', $context);
            }
            $object->setPlatforms($values_2);
            unset($data['Platforms']);
        } elseif (\array_key_exists('Platforms', $data) && null === $data['Platforms']) {
            $object->setPlatforms(null);
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_3;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('constraints') && null !== $data->getConstraints()) {
            $values = [];
            foreach ($data->getConstraints() as $value) {
                $values[] = $value;
            }
            $dataArray['Constraints'] = $values;
        }
        if ($data->isInitialized('preferences') && null !== $data->getPreferences()) {
            $values_1 = [];
            foreach ($data->getPreferences() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['Preferences'] = $values_1;
        }
        if ($data->isInitialized('maxReplicas') && null !== $data->getMaxReplicas()) {
            $dataArray['MaxReplicas'] = $data->getMaxReplicas();
        }
        if ($data->isInitialized('platforms') && null !== $data->getPlatforms()) {
            $values_2 = [];
            foreach ($data->getPlatforms() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['Platforms'] = $values_2;
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_3;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskSpecPlacement::class => false];
    }
}
