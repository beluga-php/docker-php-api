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

class DistributionNameJsonGetResponse200PlatformsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Architecture', $data) && null !== $data['Architecture']) {
            $object->setArchitecture($data['Architecture']);
            unset($data['Architecture']);
        } elseif (\array_key_exists('Architecture', $data) && null === $data['Architecture']) {
            $object->setArchitecture(null);
            unset($data['Architecture']);
        }
        if (\array_key_exists('OS', $data) && null !== $data['OS']) {
            $object->setOS($data['OS']);
            unset($data['OS']);
        } elseif (\array_key_exists('OS', $data) && null === $data['OS']) {
            $object->setOS(null);
            unset($data['OS']);
        }
        if (\array_key_exists('OSVersion', $data) && null !== $data['OSVersion']) {
            $object->setOSVersion($data['OSVersion']);
            unset($data['OSVersion']);
        } elseif (\array_key_exists('OSVersion', $data) && null === $data['OSVersion']) {
            $object->setOSVersion(null);
            unset($data['OSVersion']);
        }
        if (\array_key_exists('OSFeatures', $data) && null !== $data['OSFeatures']) {
            $values = [];
            foreach ($data['OSFeatures'] as $value) {
                $values[] = $value;
            }
            $object->setOSFeatures($values);
            unset($data['OSFeatures']);
        } elseif (\array_key_exists('OSFeatures', $data) && null === $data['OSFeatures']) {
            $object->setOSFeatures(null);
            unset($data['OSFeatures']);
        }
        if (\array_key_exists('Variant', $data) && null !== $data['Variant']) {
            $object->setVariant($data['Variant']);
            unset($data['Variant']);
        } elseif (\array_key_exists('Variant', $data) && null === $data['Variant']) {
            $object->setVariant(null);
            unset($data['Variant']);
        }
        if (\array_key_exists('Features', $data) && null !== $data['Features']) {
            $values_1 = [];
            foreach ($data['Features'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setFeatures($values_1);
            unset($data['Features']);
        } elseif (\array_key_exists('Features', $data) && null === $data['Features']) {
            $object->setFeatures(null);
            unset($data['Features']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('architecture') && null !== $data->getArchitecture()) {
            $dataArray['Architecture'] = $data->getArchitecture();
        }
        if ($data->isInitialized('oS') && null !== $data->getOS()) {
            $dataArray['OS'] = $data->getOS();
        }
        if ($data->isInitialized('oSVersion') && null !== $data->getOSVersion()) {
            $dataArray['OSVersion'] = $data->getOSVersion();
        }
        if ($data->isInitialized('oSFeatures') && null !== $data->getOSFeatures()) {
            $values = [];
            foreach ($data->getOSFeatures() as $value) {
                $values[] = $value;
            }
            $dataArray['OSFeatures'] = $values;
        }
        if ($data->isInitialized('variant') && null !== $data->getVariant()) {
            $dataArray['Variant'] = $data->getVariant();
        }
        if ($data->isInitialized('features') && null !== $data->getFeatures()) {
            $values_1 = [];
            foreach ($data->getFeatures() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['Features'] = $values_1;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem::class => false];
    }
}
