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

class NetworkAttachmentConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\NetworkAttachmentConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\NetworkAttachmentConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\NetworkAttachmentConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Target', $data) && null !== $data['Target']) {
            $object->setTarget($data['Target']);
            unset($data['Target']);
        } elseif (\array_key_exists('Target', $data) && null === $data['Target']) {
            $object->setTarget(null);
        }
        if (\array_key_exists('Aliases', $data) && null !== $data['Aliases']) {
            $values = [];
            foreach ($data['Aliases'] as $value) {
                $values[] = $value;
            }
            $object->setAliases($values);
            unset($data['Aliases']);
        } elseif (\array_key_exists('Aliases', $data) && null === $data['Aliases']) {
            $object->setAliases(null);
        }
        if (\array_key_exists('DriverOpts', $data) && null !== $data['DriverOpts']) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['DriverOpts'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setDriverOpts($values_1);
            unset($data['DriverOpts']);
        } elseif (\array_key_exists('DriverOpts', $data) && null === $data['DriverOpts']) {
            $object->setDriverOpts(null);
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
        if ($data->isInitialized('target') && null !== $data->getTarget()) {
            $dataArray['Target'] = $data->getTarget();
        }
        if ($data->isInitialized('aliases') && null !== $data->getAliases()) {
            $values = [];
            foreach ($data->getAliases() as $value) {
                $values[] = $value;
            }
            $dataArray['Aliases'] = $values;
        }
        if ($data->isInitialized('driverOpts') && null !== $data->getDriverOpts()) {
            $values_1 = [];
            foreach ($data->getDriverOpts() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['DriverOpts'] = $values_1;
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
        return [\Docker\API\Model\NetworkAttachmentConfig::class => false];
    }
}
