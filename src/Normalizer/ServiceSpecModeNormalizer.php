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

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ServiceSpecMode::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ServiceSpecMode::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
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
            $object->setReplicated($this->denormalizer->denormalize($data['Replicated'], \Docker\API\Model\ServiceSpecModeReplicated::class, 'json', $context));
            unset($data['Replicated']);
        } elseif (\array_key_exists('Replicated', $data) && null === $data['Replicated']) {
            $object->setReplicated(null);
        }
        if (\array_key_exists('Global', $data) && null !== $data['Global']) {
            $object->setGlobal($this->denormalizer->denormalize($data['Global'], \Docker\API\Model\ServiceSpecModeGlobal::class, 'json', $context));
            unset($data['Global']);
        } elseif (\array_key_exists('Global', $data) && null === $data['Global']) {
            $object->setGlobal(null);
        }
        if (\array_key_exists('ReplicatedJob', $data) && null !== $data['ReplicatedJob']) {
            $object->setReplicatedJob($this->denormalizer->denormalize($data['ReplicatedJob'], \Docker\API\Model\ServiceSpecModeReplicatedJob::class, 'json', $context));
            unset($data['ReplicatedJob']);
        } elseif (\array_key_exists('ReplicatedJob', $data) && null === $data['ReplicatedJob']) {
            $object->setReplicatedJob(null);
        }
        if (\array_key_exists('GlobalJob', $data) && null !== $data['GlobalJob']) {
            $object->setGlobalJob($this->denormalizer->denormalize($data['GlobalJob'], \Docker\API\Model\ServiceSpecModeGlobalJob::class, 'json', $context));
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

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('replicated') && null !== $data->getReplicated()) {
            $dataArray['Replicated'] = $this->normalizer->normalize($data->getReplicated(), 'json', $context);
        }
        if ($data->isInitialized('global') && null !== $data->getGlobal()) {
            $dataArray['Global'] = $this->normalizer->normalize($data->getGlobal(), 'json', $context);
        }
        if ($data->isInitialized('replicatedJob') && null !== $data->getReplicatedJob()) {
            $dataArray['ReplicatedJob'] = $this->normalizer->normalize($data->getReplicatedJob(), 'json', $context);
        }
        if ($data->isInitialized('globalJob') && null !== $data->getGlobalJob()) {
            $dataArray['GlobalJob'] = $this->normalizer->normalize($data->getGlobalJob(), 'json', $context);
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
        return [\Docker\API\Model\ServiceSpecMode::class => false];
    }
}
