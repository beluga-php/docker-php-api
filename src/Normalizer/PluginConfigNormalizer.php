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
class PluginConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\PluginConfig';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\PluginConfig';
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
        $object = new \Docker\API\Model\PluginConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('DockerVersion', $data) && $data['DockerVersion'] !== null) {
            $object->setDockerVersion($data['DockerVersion']);
            unset($data['DockerVersion']);
        }
        elseif (\array_key_exists('DockerVersion', $data) && $data['DockerVersion'] === null) {
            $object->setDockerVersion(null);
        }
        if (\array_key_exists('Description', $data) && $data['Description'] !== null) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        }
        elseif (\array_key_exists('Description', $data) && $data['Description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('Documentation', $data) && $data['Documentation'] !== null) {
            $object->setDocumentation($data['Documentation']);
            unset($data['Documentation']);
        }
        elseif (\array_key_exists('Documentation', $data) && $data['Documentation'] === null) {
            $object->setDocumentation(null);
        }
        if (\array_key_exists('Interface', $data) && $data['Interface'] !== null) {
            $object->setInterface($this->denormalizer->denormalize($data['Interface'], 'Docker\\API\\Model\\PluginConfigInterface', 'json', $context));
            unset($data['Interface']);
        }
        elseif (\array_key_exists('Interface', $data) && $data['Interface'] === null) {
            $object->setInterface(null);
        }
        if (\array_key_exists('Entrypoint', $data) && $data['Entrypoint'] !== null) {
            $values = array();
            foreach ($data['Entrypoint'] as $value) {
                $values[] = $value;
            }
            $object->setEntrypoint($values);
            unset($data['Entrypoint']);
        }
        elseif (\array_key_exists('Entrypoint', $data) && $data['Entrypoint'] === null) {
            $object->setEntrypoint(null);
        }
        if (\array_key_exists('WorkDir', $data) && $data['WorkDir'] !== null) {
            $object->setWorkDir($data['WorkDir']);
            unset($data['WorkDir']);
        }
        elseif (\array_key_exists('WorkDir', $data) && $data['WorkDir'] === null) {
            $object->setWorkDir(null);
        }
        if (\array_key_exists('User', $data) && $data['User'] !== null) {
            $object->setUser($this->denormalizer->denormalize($data['User'], 'Docker\\API\\Model\\PluginConfigUser', 'json', $context));
            unset($data['User']);
        }
        elseif (\array_key_exists('User', $data) && $data['User'] === null) {
            $object->setUser(null);
        }
        if (\array_key_exists('Network', $data) && $data['Network'] !== null) {
            $object->setNetwork($this->denormalizer->denormalize($data['Network'], 'Docker\\API\\Model\\PluginConfigNetwork', 'json', $context));
            unset($data['Network']);
        }
        elseif (\array_key_exists('Network', $data) && $data['Network'] === null) {
            $object->setNetwork(null);
        }
        if (\array_key_exists('Linux', $data) && $data['Linux'] !== null) {
            $object->setLinux($this->denormalizer->denormalize($data['Linux'], 'Docker\\API\\Model\\PluginConfigLinux', 'json', $context));
            unset($data['Linux']);
        }
        elseif (\array_key_exists('Linux', $data) && $data['Linux'] === null) {
            $object->setLinux(null);
        }
        if (\array_key_exists('PropagatedMount', $data) && $data['PropagatedMount'] !== null) {
            $object->setPropagatedMount($data['PropagatedMount']);
            unset($data['PropagatedMount']);
        }
        elseif (\array_key_exists('PropagatedMount', $data) && $data['PropagatedMount'] === null) {
            $object->setPropagatedMount(null);
        }
        if (\array_key_exists('IpcHost', $data) && $data['IpcHost'] !== null) {
            $object->setIpcHost($data['IpcHost']);
            unset($data['IpcHost']);
        }
        elseif (\array_key_exists('IpcHost', $data) && $data['IpcHost'] === null) {
            $object->setIpcHost(null);
        }
        if (\array_key_exists('PidHost', $data) && $data['PidHost'] !== null) {
            $object->setPidHost($data['PidHost']);
            unset($data['PidHost']);
        }
        elseif (\array_key_exists('PidHost', $data) && $data['PidHost'] === null) {
            $object->setPidHost(null);
        }
        if (\array_key_exists('Mounts', $data) && $data['Mounts'] !== null) {
            $values_1 = array();
            foreach ($data['Mounts'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\PluginMount', 'json', $context);
            }
            $object->setMounts($values_1);
            unset($data['Mounts']);
        }
        elseif (\array_key_exists('Mounts', $data) && $data['Mounts'] === null) {
            $object->setMounts(null);
        }
        if (\array_key_exists('Env', $data) && $data['Env'] !== null) {
            $values_2 = array();
            foreach ($data['Env'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\PluginEnv', 'json', $context);
            }
            $object->setEnv($values_2);
            unset($data['Env']);
        }
        elseif (\array_key_exists('Env', $data) && $data['Env'] === null) {
            $object->setEnv(null);
        }
        if (\array_key_exists('Args', $data) && $data['Args'] !== null) {
            $object->setArgs($this->denormalizer->denormalize($data['Args'], 'Docker\\API\\Model\\PluginConfigArgs', 'json', $context));
            unset($data['Args']);
        }
        elseif (\array_key_exists('Args', $data) && $data['Args'] === null) {
            $object->setArgs(null);
        }
        if (\array_key_exists('rootfs', $data) && $data['rootfs'] !== null) {
            $object->setRootfs($this->denormalizer->denormalize($data['rootfs'], 'Docker\\API\\Model\\PluginConfigRootfs', 'json', $context));
            unset($data['rootfs']);
        }
        elseif (\array_key_exists('rootfs', $data) && $data['rootfs'] === null) {
            $object->setRootfs(null);
        }
        foreach ($data as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_3;
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
        if ($object->isInitialized('dockerVersion') && null !== $object->getDockerVersion()) {
            $data['DockerVersion'] = $object->getDockerVersion();
        }
        $data['Description'] = $object->getDescription();
        $data['Documentation'] = $object->getDocumentation();
        $data['Interface'] = $this->normalizer->normalize($object->getInterface(), 'json', $context);
        $values = array();
        foreach ($object->getEntrypoint() as $value) {
            $values[] = $value;
        }
        $data['Entrypoint'] = $values;
        $data['WorkDir'] = $object->getWorkDir();
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $data['User'] = $this->normalizer->normalize($object->getUser(), 'json', $context);
        }
        $data['Network'] = $this->normalizer->normalize($object->getNetwork(), 'json', $context);
        $data['Linux'] = $this->normalizer->normalize($object->getLinux(), 'json', $context);
        $data['PropagatedMount'] = $object->getPropagatedMount();
        $data['IpcHost'] = $object->getIpcHost();
        $data['PidHost'] = $object->getPidHost();
        $values_1 = array();
        foreach ($object->getMounts() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $data['Mounts'] = $values_1;
        $values_2 = array();
        foreach ($object->getEnv() as $value_2) {
            $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
        }
        $data['Env'] = $values_2;
        $data['Args'] = $this->normalizer->normalize($object->getArgs(), 'json', $context);
        if ($object->isInitialized('rootfs') && null !== $object->getRootfs()) {
            $data['rootfs'] = $this->normalizer->normalize($object->getRootfs(), 'json', $context);
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_3;
            }
        }
        return $data;
    }
}