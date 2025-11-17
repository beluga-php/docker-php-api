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

class MountVolumeOptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\MountVolumeOptions::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\MountVolumeOptions::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\MountVolumeOptions();
        if (\array_key_exists('NoCopy', $data) && \is_int($data['NoCopy'])) {
            $data['NoCopy'] = (bool) $data['NoCopy'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NoCopy', $data) && null !== $data['NoCopy']) {
            $object->setNoCopy($data['NoCopy']);
            unset($data['NoCopy']);
        } elseif (\array_key_exists('NoCopy', $data) && null === $data['NoCopy']) {
            $object->setNoCopy(null);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
        }
        if (\array_key_exists('DriverConfig', $data) && null !== $data['DriverConfig']) {
            $object->setDriverConfig($this->denormalizer->denormalize($data['DriverConfig'], \Docker\API\Model\MountVolumeOptionsDriverConfig::class, 'json', $context));
            unset($data['DriverConfig']);
        } elseif (\array_key_exists('DriverConfig', $data) && null === $data['DriverConfig']) {
            $object->setDriverConfig(null);
        }
        if (\array_key_exists('Subpath', $data) && null !== $data['Subpath']) {
            $object->setSubpath($data['Subpath']);
            unset($data['Subpath']);
        } elseif (\array_key_exists('Subpath', $data) && null === $data['Subpath']) {
            $object->setSubpath(null);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('noCopy') && null !== $data->getNoCopy()) {
            $dataArray['NoCopy'] = $data->getNoCopy();
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values = [];
            foreach ($data->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['Labels'] = $values;
        }
        if ($data->isInitialized('driverConfig') && null !== $data->getDriverConfig()) {
            $dataArray['DriverConfig'] = $this->normalizer->normalize($data->getDriverConfig(), 'json', $context);
        }
        if ($data->isInitialized('subpath') && null !== $data->getSubpath()) {
            $dataArray['Subpath'] = $data->getSubpath();
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\MountVolumeOptions::class => false];
    }
}
