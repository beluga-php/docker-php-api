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

class SwarmSpecRaftNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SwarmSpecRaft::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SwarmSpecRaft::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\SwarmSpecRaft();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('SnapshotInterval', $data) && null !== $data['SnapshotInterval']) {
            $object->setSnapshotInterval($data['SnapshotInterval']);
            unset($data['SnapshotInterval']);
        } elseif (\array_key_exists('SnapshotInterval', $data) && null === $data['SnapshotInterval']) {
            $object->setSnapshotInterval(null);
            unset($data['SnapshotInterval']);
        }
        if (\array_key_exists('KeepOldSnapshots', $data) && null !== $data['KeepOldSnapshots']) {
            $object->setKeepOldSnapshots($data['KeepOldSnapshots']);
            unset($data['KeepOldSnapshots']);
        } elseif (\array_key_exists('KeepOldSnapshots', $data) && null === $data['KeepOldSnapshots']) {
            $object->setKeepOldSnapshots(null);
            unset($data['KeepOldSnapshots']);
        }
        if (\array_key_exists('LogEntriesForSlowFollowers', $data) && null !== $data['LogEntriesForSlowFollowers']) {
            $object->setLogEntriesForSlowFollowers($data['LogEntriesForSlowFollowers']);
            unset($data['LogEntriesForSlowFollowers']);
        } elseif (\array_key_exists('LogEntriesForSlowFollowers', $data) && null === $data['LogEntriesForSlowFollowers']) {
            $object->setLogEntriesForSlowFollowers(null);
            unset($data['LogEntriesForSlowFollowers']);
        }
        if (\array_key_exists('ElectionTick', $data) && null !== $data['ElectionTick']) {
            $object->setElectionTick($data['ElectionTick']);
            unset($data['ElectionTick']);
        } elseif (\array_key_exists('ElectionTick', $data) && null === $data['ElectionTick']) {
            $object->setElectionTick(null);
            unset($data['ElectionTick']);
        }
        if (\array_key_exists('HeartbeatTick', $data) && null !== $data['HeartbeatTick']) {
            $object->setHeartbeatTick($data['HeartbeatTick']);
            unset($data['HeartbeatTick']);
        } elseif (\array_key_exists('HeartbeatTick', $data) && null === $data['HeartbeatTick']) {
            $object->setHeartbeatTick(null);
            unset($data['HeartbeatTick']);
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
        if ($data->isInitialized('snapshotInterval') && null !== $data->getSnapshotInterval()) {
            $dataArray['SnapshotInterval'] = $data->getSnapshotInterval();
        }
        if ($data->isInitialized('keepOldSnapshots') && null !== $data->getKeepOldSnapshots()) {
            $dataArray['KeepOldSnapshots'] = $data->getKeepOldSnapshots();
        }
        if ($data->isInitialized('logEntriesForSlowFollowers') && null !== $data->getLogEntriesForSlowFollowers()) {
            $dataArray['LogEntriesForSlowFollowers'] = $data->getLogEntriesForSlowFollowers();
        }
        if ($data->isInitialized('electionTick') && null !== $data->getElectionTick()) {
            $dataArray['ElectionTick'] = $data->getElectionTick();
        }
        if ($data->isInitialized('heartbeatTick') && null !== $data->getHeartbeatTick()) {
            $dataArray['HeartbeatTick'] = $data->getHeartbeatTick();
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
        return [\Docker\API\Model\SwarmSpecRaft::class => false];
    }
}
