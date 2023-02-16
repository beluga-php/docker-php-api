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

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\DistributionNameJsonGetResponse200PlatformsItem' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\DistributionNameJsonGetResponse200PlatformsItem' === $data::class;
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
        $object = new \Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Architecture', $data) && null !== $data['Architecture']) {
            $object->setArchitecture($data['Architecture']);
            unset($data['Architecture']);
        } elseif (\array_key_exists('Architecture', $data) && null === $data['Architecture']) {
            $object->setArchitecture(null);
        }
        if (\array_key_exists('OS', $data) && null !== $data['OS']) {
            $object->setOS($data['OS']);
            unset($data['OS']);
        } elseif (\array_key_exists('OS', $data) && null === $data['OS']) {
            $object->setOS(null);
        }
        if (\array_key_exists('OSVersion', $data) && null !== $data['OSVersion']) {
            $object->setOSVersion($data['OSVersion']);
            unset($data['OSVersion']);
        } elseif (\array_key_exists('OSVersion', $data) && null === $data['OSVersion']) {
            $object->setOSVersion(null);
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
        }
        if (\array_key_exists('Variant', $data) && null !== $data['Variant']) {
            $object->setVariant($data['Variant']);
            unset($data['Variant']);
        } elseif (\array_key_exists('Variant', $data) && null === $data['Variant']) {
            $object->setVariant(null);
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
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
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
        if ($object->isInitialized('architecture') && null !== $object->getArchitecture()) {
            $data['Architecture'] = $object->getArchitecture();
        }
        if ($object->isInitialized('oS') && null !== $object->getOS()) {
            $data['OS'] = $object->getOS();
        }
        if ($object->isInitialized('oSVersion') && null !== $object->getOSVersion()) {
            $data['OSVersion'] = $object->getOSVersion();
        }
        if ($object->isInitialized('oSFeatures') && null !== $object->getOSFeatures()) {
            $values = [];
            foreach ($object->getOSFeatures() as $value) {
                $values[] = $value;
            }
            $data['OSFeatures'] = $values;
        }
        if ($object->isInitialized('variant') && null !== $object->getVariant()) {
            $data['Variant'] = $object->getVariant();
        }
        if ($object->isInitialized('features') && null !== $object->getFeatures()) {
            $values_1 = [];
            foreach ($object->getFeatures() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Features'] = $values_1;
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }

        return $data;
    }
}
