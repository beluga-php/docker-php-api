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

class IPAMNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\IPAM::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\IPAM::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\IPAM();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Driver', $data) && null !== $data['Driver']) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && null === $data['Driver']) {
            $object->setDriver(null);
        }
        if (\array_key_exists('Config', $data) && null !== $data['Config']) {
            $values = [];
            foreach ($data['Config'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\IPAMConfig::class, 'json', $context);
            }
            $object->setConfig($values);
            unset($data['Config']);
        } elseif (\array_key_exists('Config', $data) && null === $data['Config']) {
            $object->setConfig(null);
        }
        if (\array_key_exists('Options', $data) && null !== $data['Options']) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setOptions($values_1);
            unset($data['Options']);
        } elseif (\array_key_exists('Options', $data) && null === $data['Options']) {
            $object->setOptions(null);
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
        if ($data->isInitialized('driver') && null !== $data->getDriver()) {
            $dataArray['Driver'] = $data->getDriver();
        }
        if ($data->isInitialized('config') && null !== $data->getConfig()) {
            $values = [];
            foreach ($data->getConfig() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Config'] = $values;
        }
        if ($data->isInitialized('options') && null !== $data->getOptions()) {
            $values_1 = [];
            foreach ($data->getOptions() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['Options'] = $values_1;
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\IPAM::class => false];
    }
}
