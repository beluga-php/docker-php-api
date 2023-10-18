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

class PluginConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\PluginConfig' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\PluginConfig' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
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
        if (\array_key_exists('DockerVersion', $data) && null !== $data['DockerVersion']) {
            $object->setDockerVersion($data['DockerVersion']);
            unset($data['DockerVersion']);
        } elseif (\array_key_exists('DockerVersion', $data) && null === $data['DockerVersion']) {
            $object->setDockerVersion(null);
        }
        if (\array_key_exists('Description', $data) && null !== $data['Description']) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        } elseif (\array_key_exists('Description', $data) && null === $data['Description']) {
            $object->setDescription(null);
        }
        if (\array_key_exists('Documentation', $data) && null !== $data['Documentation']) {
            $object->setDocumentation($data['Documentation']);
            unset($data['Documentation']);
        } elseif (\array_key_exists('Documentation', $data) && null === $data['Documentation']) {
            $object->setDocumentation(null);
        }
        if (\array_key_exists('Interface', $data) && null !== $data['Interface']) {
            $object->setInterface($this->denormalizer->denormalize($data['Interface'], 'Docker\\API\\Model\\PluginConfigInterface', 'json', $context));
            unset($data['Interface']);
        } elseif (\array_key_exists('Interface', $data) && null === $data['Interface']) {
            $object->setInterface(null);
        }
        if (\array_key_exists('Entrypoint', $data) && null !== $data['Entrypoint']) {
            $values = [];
            foreach ($data['Entrypoint'] as $value) {
                $values[] = $value;
            }
            $object->setEntrypoint($values);
            unset($data['Entrypoint']);
        } elseif (\array_key_exists('Entrypoint', $data) && null === $data['Entrypoint']) {
            $object->setEntrypoint(null);
        }
        if (\array_key_exists('WorkDir', $data) && null !== $data['WorkDir']) {
            $object->setWorkDir($data['WorkDir']);
            unset($data['WorkDir']);
        } elseif (\array_key_exists('WorkDir', $data) && null === $data['WorkDir']) {
            $object->setWorkDir(null);
        }
        if (\array_key_exists('User', $data) && null !== $data['User']) {
            $object->setUser($this->denormalizer->denormalize($data['User'], 'Docker\\API\\Model\\PluginConfigUser', 'json', $context));
            unset($data['User']);
        } elseif (\array_key_exists('User', $data) && null === $data['User']) {
            $object->setUser(null);
        }
        if (\array_key_exists('Network', $data) && null !== $data['Network']) {
            $object->setNetwork($this->denormalizer->denormalize($data['Network'], 'Docker\\API\\Model\\PluginConfigNetwork', 'json', $context));
            unset($data['Network']);
        } elseif (\array_key_exists('Network', $data) && null === $data['Network']) {
            $object->setNetwork(null);
        }
        if (\array_key_exists('Linux', $data) && null !== $data['Linux']) {
            $object->setLinux($this->denormalizer->denormalize($data['Linux'], 'Docker\\API\\Model\\PluginConfigLinux', 'json', $context));
            unset($data['Linux']);
        } elseif (\array_key_exists('Linux', $data) && null === $data['Linux']) {
            $object->setLinux(null);
        }
        if (\array_key_exists('PropagatedMount', $data) && null !== $data['PropagatedMount']) {
            $object->setPropagatedMount($data['PropagatedMount']);
            unset($data['PropagatedMount']);
        } elseif (\array_key_exists('PropagatedMount', $data) && null === $data['PropagatedMount']) {
            $object->setPropagatedMount(null);
        }
        if (\array_key_exists('IpcHost', $data) && null !== $data['IpcHost']) {
            $object->setIpcHost($data['IpcHost']);
            unset($data['IpcHost']);
        } elseif (\array_key_exists('IpcHost', $data) && null === $data['IpcHost']) {
            $object->setIpcHost(null);
        }
        if (\array_key_exists('PidHost', $data) && null !== $data['PidHost']) {
            $object->setPidHost($data['PidHost']);
            unset($data['PidHost']);
        } elseif (\array_key_exists('PidHost', $data) && null === $data['PidHost']) {
            $object->setPidHost(null);
        }
        if (\array_key_exists('Mounts', $data) && null !== $data['Mounts']) {
            $values_1 = [];
            foreach ($data['Mounts'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\PluginMount', 'json', $context);
            }
            $object->setMounts($values_1);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && null === $data['Mounts']) {
            $object->setMounts(null);
        }
        if (\array_key_exists('Env', $data) && null !== $data['Env']) {
            $values_2 = [];
            foreach ($data['Env'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\PluginEnv', 'json', $context);
            }
            $object->setEnv($values_2);
            unset($data['Env']);
        } elseif (\array_key_exists('Env', $data) && null === $data['Env']) {
            $object->setEnv(null);
        }
        if (\array_key_exists('Args', $data) && null !== $data['Args']) {
            $object->setArgs($this->denormalizer->denormalize($data['Args'], 'Docker\\API\\Model\\PluginConfigArgs', 'json', $context));
            unset($data['Args']);
        } elseif (\array_key_exists('Args', $data) && null === $data['Args']) {
            $object->setArgs(null);
        }
        if (\array_key_exists('rootfs', $data) && null !== $data['rootfs']) {
            $object->setRootfs($this->denormalizer->denormalize($data['rootfs'], 'Docker\\API\\Model\\PluginConfigRootfs', 'json', $context));
            unset($data['rootfs']);
        } elseif (\array_key_exists('rootfs', $data) && null === $data['rootfs']) {
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
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('dockerVersion') && null !== $object->getDockerVersion()) {
            $data['DockerVersion'] = $object->getDockerVersion();
        }
        $data['Description'] = $object->getDescription();
        $data['Documentation'] = $object->getDocumentation();
        $data['Interface'] = null === $object->getInterface() ? null : new \ArrayObject($this->normalizer->normalize($object->getInterface(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        $values = [];
        foreach ($object->getEntrypoint() as $value) {
            $values[] = $value;
        }
        $data['Entrypoint'] = $values;
        $data['WorkDir'] = $object->getWorkDir();
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $data['User'] = null === $object->getUser() ? null : new \ArrayObject($this->normalizer->normalize($object->getUser(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        $data['Network'] = null === $object->getNetwork() ? null : new \ArrayObject($this->normalizer->normalize($object->getNetwork(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        $data['Linux'] = null === $object->getLinux() ? null : new \ArrayObject($this->normalizer->normalize($object->getLinux(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        $data['PropagatedMount'] = $object->getPropagatedMount();
        $data['IpcHost'] = $object->getIpcHost();
        $data['PidHost'] = $object->getPidHost();
        $values_1 = [];
        foreach ($object->getMounts() as $value_1) {
            $values_1[] = null === $value_1 ? null : new \ArrayObject($this->normalizer->normalize($value_1, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        $data['Mounts'] = $values_1;
        $values_2 = [];
        foreach ($object->getEnv() as $value_2) {
            $values_2[] = null === $value_2 ? null : new \ArrayObject($this->normalizer->normalize($value_2, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        $data['Env'] = $values_2;
        $data['Args'] = null === $object->getArgs() ? null : new \ArrayObject($this->normalizer->normalize($object->getArgs(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        if ($object->isInitialized('rootfs') && null !== $object->getRootfs()) {
            $data['rootfs'] = null === $object->getRootfs() ? null : new \ArrayObject($this->normalizer->normalize($object->getRootfs(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_3;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\PluginConfig' => false];
    }
}
