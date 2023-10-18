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

class ServiceSpecModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\ServiceSpecMode' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ServiceSpecMode' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceSpecMode();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Replicated', $data) && null !== $data['Replicated']) {
            $object->setReplicated($this->denormalizer->denormalize($data['Replicated'], 'Docker\\API\\Model\\ServiceSpecModeReplicated', 'json', $context));
            unset($data['Replicated']);
        } elseif (\array_key_exists('Replicated', $data) && null === $data['Replicated']) {
            $object->setReplicated(null);
        }
        if (\array_key_exists('Global', $data) && null !== $data['Global']) {
            $object->setGlobal($this->denormalizer->denormalize($data['Global'], 'Docker\\API\\Model\\ServiceSpecModeGlobal', 'json', $context));
            unset($data['Global']);
        } elseif (\array_key_exists('Global', $data) && null === $data['Global']) {
            $object->setGlobal(null);
        }
        if (\array_key_exists('ReplicatedJob', $data) && null !== $data['ReplicatedJob']) {
            $object->setReplicatedJob($this->denormalizer->denormalize($data['ReplicatedJob'], 'Docker\\API\\Model\\ServiceSpecModeReplicatedJob', 'json', $context));
            unset($data['ReplicatedJob']);
        } elseif (\array_key_exists('ReplicatedJob', $data) && null === $data['ReplicatedJob']) {
            $object->setReplicatedJob(null);
        }
        if (\array_key_exists('GlobalJob', $data) && null !== $data['GlobalJob']) {
            $object->setGlobalJob($this->denormalizer->denormalize($data['GlobalJob'], 'Docker\\API\\Model\\ServiceSpecModeGlobalJob', 'json', $context));
            unset($data['GlobalJob']);
        } elseif (\array_key_exists('GlobalJob', $data) && null === $data['GlobalJob']) {
            $object->setGlobalJob(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
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
        if ($object->isInitialized('replicated') && null !== $object->getReplicated()) {
            $data['Replicated'] = null === $object->getReplicated() ? null : new \ArrayObject($this->normalizer->normalize($object->getReplicated(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('global') && null !== $object->getGlobal()) {
            $data['Global'] = null === $object->getGlobal() ? null : new \ArrayObject($this->normalizer->normalize($object->getGlobal(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('replicatedJob') && null !== $object->getReplicatedJob()) {
            $data['ReplicatedJob'] = null === $object->getReplicatedJob() ? null : new \ArrayObject($this->normalizer->normalize($object->getReplicatedJob(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('globalJob') && null !== $object->getGlobalJob()) {
            $data['GlobalJob'] = null === $object->getGlobalJob() ? null : new \ArrayObject($this->normalizer->normalize($object->getGlobalJob(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\ServiceSpecMode' => false];
    }
}
