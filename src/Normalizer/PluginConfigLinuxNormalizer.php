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

class PluginConfigLinuxNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\PluginConfigLinux::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\PluginConfigLinux::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\PluginConfigLinux();
        if (\array_key_exists('AllowAllDevices', $data) && \is_int($data['AllowAllDevices'])) {
            $data['AllowAllDevices'] = (bool) $data['AllowAllDevices'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Capabilities', $data) && null !== $data['Capabilities']) {
            $values = [];
            foreach ($data['Capabilities'] as $value) {
                $values[] = $value;
            }
            $object->setCapabilities($values);
            unset($data['Capabilities']);
        } elseif (\array_key_exists('Capabilities', $data) && null === $data['Capabilities']) {
            $object->setCapabilities(null);
        }
        if (\array_key_exists('AllowAllDevices', $data) && null !== $data['AllowAllDevices']) {
            $object->setAllowAllDevices($data['AllowAllDevices']);
            unset($data['AllowAllDevices']);
        } elseif (\array_key_exists('AllowAllDevices', $data) && null === $data['AllowAllDevices']) {
            $object->setAllowAllDevices(null);
        }
        if (\array_key_exists('Devices', $data) && null !== $data['Devices']) {
            $values_1 = [];
            foreach ($data['Devices'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\PluginDevice::class, 'json', $context);
            }
            $object->setDevices($values_1);
            unset($data['Devices']);
        } elseif (\array_key_exists('Devices', $data) && null === $data['Devices']) {
            $object->setDevices(null);
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
        $values = [];
        foreach ($data->getCapabilities() as $value) {
            $values[] = $value;
        }
        $dataArray['Capabilities'] = $values;
        $dataArray['AllowAllDevices'] = $data->getAllowAllDevices();
        $values_1 = [];
        foreach ($data->getDevices() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['Devices'] = $values_1;
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\PluginConfigLinux::class => false];
    }
}
