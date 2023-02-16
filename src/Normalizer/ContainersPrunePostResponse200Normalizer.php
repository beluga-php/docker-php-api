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

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\ContainersPrunePostResponse200' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ContainersPrunePostResponse200' === $data::class;
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

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('containersDeleted') && null !== $object->getContainersDeleted()) {
            $values = [];
            foreach ($object->getContainersDeleted() as $value) {
                $values[] = $value;
            }
            $data['ContainersDeleted'] = $values;
        }
        if ($object->isInitialized('spaceReclaimed') && null !== $object->getSpaceReclaimed()) {
            $data['SpaceReclaimed'] = $object->getSpaceReclaimed();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }
}
