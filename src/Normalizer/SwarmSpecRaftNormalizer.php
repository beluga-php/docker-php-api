<?php

namespace Docker\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class SwarmSpecRaftNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\SwarmSpecRaft';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\SwarmSpecRaft';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmSpecRaft();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('SnapshotInterval', $data) && $data['SnapshotInterval'] !== null) {
            $object->setSnapshotInterval($data['SnapshotInterval']);
            unset($data['SnapshotInterval']);
        }
        elseif (\array_key_exists('SnapshotInterval', $data) && $data['SnapshotInterval'] === null) {
            $object->setSnapshotInterval(null);
        }
        if (\array_key_exists('KeepOldSnapshots', $data) && $data['KeepOldSnapshots'] !== null) {
            $object->setKeepOldSnapshots($data['KeepOldSnapshots']);
            unset($data['KeepOldSnapshots']);
        }
        elseif (\array_key_exists('KeepOldSnapshots', $data) && $data['KeepOldSnapshots'] === null) {
            $object->setKeepOldSnapshots(null);
        }
        if (\array_key_exists('LogEntriesForSlowFollowers', $data) && $data['LogEntriesForSlowFollowers'] !== null) {
            $object->setLogEntriesForSlowFollowers($data['LogEntriesForSlowFollowers']);
            unset($data['LogEntriesForSlowFollowers']);
        }
        elseif (\array_key_exists('LogEntriesForSlowFollowers', $data) && $data['LogEntriesForSlowFollowers'] === null) {
            $object->setLogEntriesForSlowFollowers(null);
        }
        if (\array_key_exists('ElectionTick', $data) && $data['ElectionTick'] !== null) {
            $object->setElectionTick($data['ElectionTick']);
            unset($data['ElectionTick']);
        }
        elseif (\array_key_exists('ElectionTick', $data) && $data['ElectionTick'] === null) {
            $object->setElectionTick(null);
        }
        if (\array_key_exists('HeartbeatTick', $data) && $data['HeartbeatTick'] !== null) {
            $object->setHeartbeatTick($data['HeartbeatTick']);
            unset($data['HeartbeatTick']);
        }
        elseif (\array_key_exists('HeartbeatTick', $data) && $data['HeartbeatTick'] === null) {
            $object->setHeartbeatTick(null);
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('snapshotInterval') && null !== $object->getSnapshotInterval()) {
            $data['SnapshotInterval'] = $object->getSnapshotInterval();
        }
        if ($object->isInitialized('keepOldSnapshots') && null !== $object->getKeepOldSnapshots()) {
            $data['KeepOldSnapshots'] = $object->getKeepOldSnapshots();
        }
        if ($object->isInitialized('logEntriesForSlowFollowers') && null !== $object->getLogEntriesForSlowFollowers()) {
            $data['LogEntriesForSlowFollowers'] = $object->getLogEntriesForSlowFollowers();
        }
        if ($object->isInitialized('electionTick') && null !== $object->getElectionTick()) {
            $data['ElectionTick'] = $object->getElectionTick();
        }
        if ($object->isInitialized('heartbeatTick') && null !== $object->getHeartbeatTick()) {
            $data['HeartbeatTick'] = $object->getHeartbeatTick();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}