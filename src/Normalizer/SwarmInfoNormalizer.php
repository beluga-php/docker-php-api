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

class SwarmInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SwarmInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SwarmInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmInfo();
        if (\array_key_exists('ControlAvailable', $data) && \is_int($data['ControlAvailable'])) {
            $data['ControlAvailable'] = (bool) $data['ControlAvailable'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NodeID', $data) && null !== $data['NodeID']) {
            $object->setNodeID($data['NodeID']);
            unset($data['NodeID']);
        } elseif (\array_key_exists('NodeID', $data) && null === $data['NodeID']) {
            $object->setNodeID(null);
        }
        if (\array_key_exists('NodeAddr', $data) && null !== $data['NodeAddr']) {
            $object->setNodeAddr($data['NodeAddr']);
            unset($data['NodeAddr']);
        } elseif (\array_key_exists('NodeAddr', $data) && null === $data['NodeAddr']) {
            $object->setNodeAddr(null);
        }
        if (\array_key_exists('LocalNodeState', $data) && null !== $data['LocalNodeState']) {
            $object->setLocalNodeState($data['LocalNodeState']);
            unset($data['LocalNodeState']);
        } elseif (\array_key_exists('LocalNodeState', $data) && null === $data['LocalNodeState']) {
            $object->setLocalNodeState(null);
        }
        if (\array_key_exists('ControlAvailable', $data) && null !== $data['ControlAvailable']) {
            $object->setControlAvailable($data['ControlAvailable']);
            unset($data['ControlAvailable']);
        } elseif (\array_key_exists('ControlAvailable', $data) && null === $data['ControlAvailable']) {
            $object->setControlAvailable(null);
        }
        if (\array_key_exists('Error', $data) && null !== $data['Error']) {
            $object->setError($data['Error']);
            unset($data['Error']);
        } elseif (\array_key_exists('Error', $data) && null === $data['Error']) {
            $object->setError(null);
        }
        if (\array_key_exists('RemoteManagers', $data) && null !== $data['RemoteManagers']) {
            $values = [];
            foreach ($data['RemoteManagers'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\PeerNode::class, 'json', $context);
            }
            $object->setRemoteManagers($values);
            unset($data['RemoteManagers']);
        } elseif (\array_key_exists('RemoteManagers', $data) && null === $data['RemoteManagers']) {
            $object->setRemoteManagers(null);
        }
        if (\array_key_exists('Nodes', $data) && null !== $data['Nodes']) {
            $object->setNodes($data['Nodes']);
            unset($data['Nodes']);
        } elseif (\array_key_exists('Nodes', $data) && null === $data['Nodes']) {
            $object->setNodes(null);
        }
        if (\array_key_exists('Managers', $data) && null !== $data['Managers']) {
            $object->setManagers($data['Managers']);
            unset($data['Managers']);
        } elseif (\array_key_exists('Managers', $data) && null === $data['Managers']) {
            $object->setManagers(null);
        }
        if (\array_key_exists('Cluster', $data) && null !== $data['Cluster']) {
            $object->setCluster($this->denormalizer->denormalize($data['Cluster'], \Docker\API\Model\ClusterInfo::class, 'json', $context));
            unset($data['Cluster']);
        } elseif (\array_key_exists('Cluster', $data) && null === $data['Cluster']) {
            $object->setCluster(null);
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
        if ($data->isInitialized('nodeID') && null !== $data->getNodeID()) {
            $dataArray['NodeID'] = $data->getNodeID();
        }
        if ($data->isInitialized('nodeAddr') && null !== $data->getNodeAddr()) {
            $dataArray['NodeAddr'] = $data->getNodeAddr();
        }
        if ($data->isInitialized('localNodeState') && null !== $data->getLocalNodeState()) {
            $dataArray['LocalNodeState'] = $data->getLocalNodeState();
        }
        if ($data->isInitialized('controlAvailable') && null !== $data->getControlAvailable()) {
            $dataArray['ControlAvailable'] = $data->getControlAvailable();
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['Error'] = $data->getError();
        }
        if ($data->isInitialized('remoteManagers') && null !== $data->getRemoteManagers()) {
            $values = [];
            foreach ($data->getRemoteManagers() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['RemoteManagers'] = $values;
        }
        if ($data->isInitialized('nodes') && null !== $data->getNodes()) {
            $dataArray['Nodes'] = $data->getNodes();
        }
        if ($data->isInitialized('managers') && null !== $data->getManagers()) {
            $dataArray['Managers'] = $data->getManagers();
        }
        if ($data->isInitialized('cluster') && null !== $data->getCluster()) {
            $dataArray['Cluster'] = $this->normalizer->normalize($data->getCluster(), 'json', $context);
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
        return [\Docker\API\Model\SwarmInfo::class => false];
    }
}
