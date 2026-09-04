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

class MountPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\MountPoint::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\MountPoint::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\MountPoint();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('RW', $data) && \is_int($data['RW'])) {
            $data['RW'] = (bool) $data['RW'];
        }
        if (\array_key_exists('Type', $data) && null !== $data['Type']) {
            $object->setType($data['Type']);
            unset($data['Type']);
        } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
            $object->setType(null);
            unset($data['Type']);
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
            unset($data['Name']);
        }
        if (\array_key_exists('Source', $data) && null !== $data['Source']) {
            $object->setSource($data['Source']);
            unset($data['Source']);
        } elseif (\array_key_exists('Source', $data) && null === $data['Source']) {
            $object->setSource(null);
            unset($data['Source']);
        }
        if (\array_key_exists('Destination', $data) && null !== $data['Destination']) {
            $object->setDestination($data['Destination']);
            unset($data['Destination']);
        } elseif (\array_key_exists('Destination', $data) && null === $data['Destination']) {
            $object->setDestination(null);
            unset($data['Destination']);
        }
        if (\array_key_exists('Driver', $data) && null !== $data['Driver']) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && null === $data['Driver']) {
            $object->setDriver(null);
            unset($data['Driver']);
        }
        if (\array_key_exists('Mode', $data) && null !== $data['Mode']) {
            $object->setMode($data['Mode']);
            unset($data['Mode']);
        } elseif (\array_key_exists('Mode', $data) && null === $data['Mode']) {
            $object->setMode(null);
            unset($data['Mode']);
        }
        if (\array_key_exists('RW', $data) && null !== $data['RW']) {
            $object->setRW($data['RW']);
            unset($data['RW']);
        } elseif (\array_key_exists('RW', $data) && null === $data['RW']) {
            $object->setRW(null);
            unset($data['RW']);
        }
        if (\array_key_exists('Propagation', $data) && null !== $data['Propagation']) {
            $object->setPropagation($data['Propagation']);
            unset($data['Propagation']);
        } elseif (\array_key_exists('Propagation', $data) && null === $data['Propagation']) {
            $object->setPropagation(null);
            unset($data['Propagation']);
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
        if ($data->isInitialized('type') && null !== $data->getType()) {
            $dataArray['Type'] = $data->getType();
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('source') && null !== $data->getSource()) {
            $dataArray['Source'] = $data->getSource();
        }
        if ($data->isInitialized('destination') && null !== $data->getDestination()) {
            $dataArray['Destination'] = $data->getDestination();
        }
        if ($data->isInitialized('driver') && null !== $data->getDriver()) {
            $dataArray['Driver'] = $data->getDriver();
        }
        if ($data->isInitialized('mode') && null !== $data->getMode()) {
            $dataArray['Mode'] = $data->getMode();
        }
        if ($data->isInitialized('rW') && null !== $data->getRW()) {
            $dataArray['RW'] = $data->getRW();
        }
        if ($data->isInitialized('propagation') && null !== $data->getPropagation()) {
            $dataArray['Propagation'] = $data->getPropagation();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\MountPoint::class => false];
    }
}
