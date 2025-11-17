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

class ContainersPrunePostResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainersPrunePostResponse200::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainersPrunePostResponse200::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainersPrunePostResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ContainersDeleted', $data) && null !== $data['ContainersDeleted']) {
            $values = [];
            foreach ($data['ContainersDeleted'] as $value) {
                $values[] = $value;
            }
            $object->setContainersDeleted($values);
            unset($data['ContainersDeleted']);
        } elseif (\array_key_exists('ContainersDeleted', $data) && null === $data['ContainersDeleted']) {
            $object->setContainersDeleted(null);
        }
        if (\array_key_exists('SpaceReclaimed', $data) && null !== $data['SpaceReclaimed']) {
            $object->setSpaceReclaimed($data['SpaceReclaimed']);
            unset($data['SpaceReclaimed']);
        } elseif (\array_key_exists('SpaceReclaimed', $data) && null === $data['SpaceReclaimed']) {
            $object->setSpaceReclaimed(null);
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
        if ($data->isInitialized('containersDeleted') && null !== $data->getContainersDeleted()) {
            $values = [];
            foreach ($data->getContainersDeleted() as $value) {
                $values[] = $value;
            }
            $dataArray['ContainersDeleted'] = $values;
        }
        if ($data->isInitialized('spaceReclaimed') && null !== $data->getSpaceReclaimed()) {
            $dataArray['SpaceReclaimed'] = $data->getSpaceReclaimed();
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
        return [\Docker\API\Model\ContainersPrunePostResponse200::class => false];
    }
}
