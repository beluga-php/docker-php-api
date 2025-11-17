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

class OCIPlatformNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\OCIPlatform::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\OCIPlatform::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\OCIPlatform();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('architecture', $data) && null !== $data['architecture']) {
            $object->setArchitecture($data['architecture']);
            unset($data['architecture']);
        } elseif (\array_key_exists('architecture', $data) && null === $data['architecture']) {
            $object->setArchitecture(null);
        }
        if (\array_key_exists('os', $data) && null !== $data['os']) {
            $object->setOs($data['os']);
            unset($data['os']);
        } elseif (\array_key_exists('os', $data) && null === $data['os']) {
            $object->setOs(null);
        }
        if (\array_key_exists('os.version', $data) && null !== $data['os.version']) {
            $object->setOsVersion($data['os.version']);
            unset($data['os.version']);
        } elseif (\array_key_exists('os.version', $data) && null === $data['os.version']) {
            $object->setOsVersion(null);
        }
        if (\array_key_exists('os.features', $data) && null !== $data['os.features']) {
            $values = [];
            foreach ($data['os.features'] as $value) {
                $values[] = $value;
            }
            $object->setOsFeatures($values);
            unset($data['os.features']);
        } elseif (\array_key_exists('os.features', $data) && null === $data['os.features']) {
            $object->setOsFeatures(null);
        }
        if (\array_key_exists('variant', $data) && null !== $data['variant']) {
            $object->setVariant($data['variant']);
            unset($data['variant']);
        } elseif (\array_key_exists('variant', $data) && null === $data['variant']) {
            $object->setVariant(null);
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
        if ($data->isInitialized('architecture') && null !== $data->getArchitecture()) {
            $dataArray['architecture'] = $data->getArchitecture();
        }
        if ($data->isInitialized('os') && null !== $data->getOs()) {
            $dataArray['os'] = $data->getOs();
        }
        if ($data->isInitialized('osVersion') && null !== $data->getOsVersion()) {
            $dataArray['os.version'] = $data->getOsVersion();
        }
        if ($data->isInitialized('osFeatures') && null !== $data->getOsFeatures()) {
            $values = [];
            foreach ($data->getOsFeatures() as $value) {
                $values[] = $value;
            }
            $dataArray['os.features'] = $values;
        }
        if ($data->isInitialized('variant') && null !== $data->getVariant()) {
            $dataArray['variant'] = $data->getVariant();
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
        return [\Docker\API\Model\OCIPlatform::class => false];
    }
}
