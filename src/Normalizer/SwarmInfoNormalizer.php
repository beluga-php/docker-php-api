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
class SwarmInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\SwarmInfo';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\SwarmInfo';
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
        $object = new \Docker\API\Model\SwarmInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NodeID', $data) && $data['NodeID'] !== null) {
            $object->setNodeID($data['NodeID']);
            unset($data['NodeID']);
        }
        elseif (\array_key_exists('NodeID', $data) && $data['NodeID'] === null) {
            $object->setNodeID(null);
        }
        if (\array_key_exists('NodeAddr', $data) && $data['NodeAddr'] !== null) {
            $object->setNodeAddr($data['NodeAddr']);
            unset($data['NodeAddr']);
        }
        elseif (\array_key_exists('NodeAddr', $data) && $data['NodeAddr'] === null) {
            $object->setNodeAddr(null);
        }
        if (\array_key_exists('LocalNodeState', $data) && $data['LocalNodeState'] !== null) {
            $object->setLocalNodeState($data['LocalNodeState']);
            unset($data['LocalNodeState']);
        }
        elseif (\array_key_exists('LocalNodeState', $data) && $data['LocalNodeState'] === null) {
            $object->setLocalNodeState(null);
        }
        if (\array_key_exists('ControlAvailable', $data) && $data['ControlAvailable'] !== null) {
            $object->setControlAvailable($data['ControlAvailable']);
            unset($data['ControlAvailable']);
        }
        elseif (\array_key_exists('ControlAvailable', $data) && $data['ControlAvailable'] === null) {
            $object->setControlAvailable(null);
        }
        if (\array_key_exists('Error', $data) && $data['Error'] !== null) {
            $object->setError($data['Error']);
            unset($data['Error']);
        }
        elseif (\array_key_exists('Error', $data) && $data['Error'] === null) {
            $object->setError(null);
        }
        if (\array_key_exists('RemoteManagers', $data) && $data['RemoteManagers'] !== null) {
            $values = array();
            foreach ($data['RemoteManagers'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\PeerNode', 'json', $context);
            }
            $object->setRemoteManagers($values);
            unset($data['RemoteManagers']);
        }
        elseif (\array_key_exists('RemoteManagers', $data) && $data['RemoteManagers'] === null) {
            $object->setRemoteManagers(null);
        }
        if (\array_key_exists('Nodes', $data) && $data['Nodes'] !== null) {
            $object->setNodes($data['Nodes']);
            unset($data['Nodes']);
        }
        elseif (\array_key_exists('Nodes', $data) && $data['Nodes'] === null) {
            $object->setNodes(null);
        }
        if (\array_key_exists('Managers', $data) && $data['Managers'] !== null) {
            $object->setManagers($data['Managers']);
            unset($data['Managers']);
        }
        elseif (\array_key_exists('Managers', $data) && $data['Managers'] === null) {
            $object->setManagers(null);
        }
        if (\array_key_exists('Cluster', $data) && $data['Cluster'] !== null) {
            $object->setCluster($this->denormalizer->denormalize($data['Cluster'], 'Docker\\API\\Model\\ClusterInfo', 'json', $context));
            unset($data['Cluster']);
        }
        elseif (\array_key_exists('Cluster', $data) && $data['Cluster'] === null) {
            $object->setCluster(null);
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('nodeID') && null !== $object->getNodeID()) {
            $data['NodeID'] = $object->getNodeID();
        }
        if ($object->isInitialized('nodeAddr') && null !== $object->getNodeAddr()) {
            $data['NodeAddr'] = $object->getNodeAddr();
        }
        if ($object->isInitialized('localNodeState') && null !== $object->getLocalNodeState()) {
            $data['LocalNodeState'] = $object->getLocalNodeState();
        }
        if ($object->isInitialized('controlAvailable') && null !== $object->getControlAvailable()) {
            $data['ControlAvailable'] = $object->getControlAvailable();
        }
        if ($object->isInitialized('error') && null !== $object->getError()) {
            $data['Error'] = $object->getError();
        }
        if ($object->isInitialized('remoteManagers') && null !== $object->getRemoteManagers()) {
            $values = array();
            foreach ($object->getRemoteManagers() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['RemoteManagers'] = $values;
        }
        if ($object->isInitialized('nodes') && null !== $object->getNodes()) {
            $data['Nodes'] = $object->getNodes();
        }
        if ($object->isInitialized('managers') && null !== $object->getManagers()) {
            $data['Managers'] = $object->getManagers();
        }
        if ($object->isInitialized('cluster') && null !== $object->getCluster()) {
            $data['Cluster'] = $this->normalizer->normalize($object->getCluster(), 'json', $context);
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}