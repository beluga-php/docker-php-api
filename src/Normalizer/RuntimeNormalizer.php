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

class RuntimeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Runtime::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Runtime::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Runtime();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('path', $data) && null !== $data['path']) {
            $object->setPath($data['path']);
            unset($data['path']);
        } elseif (\array_key_exists('path', $data) && null === $data['path']) {
            $object->setPath(null);
        }
        if (\array_key_exists('runtimeArgs', $data) && null !== $data['runtimeArgs']) {
            $values = [];
            foreach ($data['runtimeArgs'] as $value) {
                $values[] = $value;
            }
            $object->setRuntimeArgs($values);
            unset($data['runtimeArgs']);
        } elseif (\array_key_exists('runtimeArgs', $data) && null === $data['runtimeArgs']) {
            $object->setRuntimeArgs(null);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['status'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setStatus($values_1);
            unset($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
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
        if ($data->isInitialized('path') && null !== $data->getPath()) {
            $dataArray['path'] = $data->getPath();
        }
        if ($data->isInitialized('runtimeArgs') && null !== $data->getRuntimeArgs()) {
            $values = [];
            foreach ($data->getRuntimeArgs() as $value) {
                $values[] = $value;
            }
            $dataArray['runtimeArgs'] = $values;
        }
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $values_1 = [];
            foreach ($data->getStatus() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['status'] = $values_1;
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
        return [\Docker\API\Model\Runtime::class => false];
    }
}
