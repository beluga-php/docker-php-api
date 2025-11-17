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

class MountBindOptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\MountBindOptions::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\MountBindOptions::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\MountBindOptions();
        if (\array_key_exists('NonRecursive', $data) && \is_int($data['NonRecursive'])) {
            $data['NonRecursive'] = (bool) $data['NonRecursive'];
        }
        if (\array_key_exists('CreateMountpoint', $data) && \is_int($data['CreateMountpoint'])) {
            $data['CreateMountpoint'] = (bool) $data['CreateMountpoint'];
        }
        if (\array_key_exists('ReadOnlyNonRecursive', $data) && \is_int($data['ReadOnlyNonRecursive'])) {
            $data['ReadOnlyNonRecursive'] = (bool) $data['ReadOnlyNonRecursive'];
        }
        if (\array_key_exists('ReadOnlyForceRecursive', $data) && \is_int($data['ReadOnlyForceRecursive'])) {
            $data['ReadOnlyForceRecursive'] = (bool) $data['ReadOnlyForceRecursive'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Propagation', $data) && null !== $data['Propagation']) {
            $object->setPropagation($data['Propagation']);
            unset($data['Propagation']);
        } elseif (\array_key_exists('Propagation', $data) && null === $data['Propagation']) {
            $object->setPropagation(null);
        }
        if (\array_key_exists('NonRecursive', $data) && null !== $data['NonRecursive']) {
            $object->setNonRecursive($data['NonRecursive']);
            unset($data['NonRecursive']);
        } elseif (\array_key_exists('NonRecursive', $data) && null === $data['NonRecursive']) {
            $object->setNonRecursive(null);
        }
        if (\array_key_exists('CreateMountpoint', $data) && null !== $data['CreateMountpoint']) {
            $object->setCreateMountpoint($data['CreateMountpoint']);
            unset($data['CreateMountpoint']);
        } elseif (\array_key_exists('CreateMountpoint', $data) && null === $data['CreateMountpoint']) {
            $object->setCreateMountpoint(null);
        }
        if (\array_key_exists('ReadOnlyNonRecursive', $data) && null !== $data['ReadOnlyNonRecursive']) {
            $object->setReadOnlyNonRecursive($data['ReadOnlyNonRecursive']);
            unset($data['ReadOnlyNonRecursive']);
        } elseif (\array_key_exists('ReadOnlyNonRecursive', $data) && null === $data['ReadOnlyNonRecursive']) {
            $object->setReadOnlyNonRecursive(null);
        }
        if (\array_key_exists('ReadOnlyForceRecursive', $data) && null !== $data['ReadOnlyForceRecursive']) {
            $object->setReadOnlyForceRecursive($data['ReadOnlyForceRecursive']);
            unset($data['ReadOnlyForceRecursive']);
        } elseif (\array_key_exists('ReadOnlyForceRecursive', $data) && null === $data['ReadOnlyForceRecursive']) {
            $object->setReadOnlyForceRecursive(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('propagation') && null !== $data->getPropagation()) {
            $dataArray['Propagation'] = $data->getPropagation();
        }
        if ($data->isInitialized('nonRecursive') && null !== $data->getNonRecursive()) {
            $dataArray['NonRecursive'] = $data->getNonRecursive();
        }
        if ($data->isInitialized('createMountpoint') && null !== $data->getCreateMountpoint()) {
            $dataArray['CreateMountpoint'] = $data->getCreateMountpoint();
        }
        if ($data->isInitialized('readOnlyNonRecursive') && null !== $data->getReadOnlyNonRecursive()) {
            $dataArray['ReadOnlyNonRecursive'] = $data->getReadOnlyNonRecursive();
        }
        if ($data->isInitialized('readOnlyForceRecursive') && null !== $data->getReadOnlyForceRecursive()) {
            $dataArray['ReadOnlyForceRecursive'] = $data->getReadOnlyForceRecursive();
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\MountBindOptions::class => false];
    }
}
