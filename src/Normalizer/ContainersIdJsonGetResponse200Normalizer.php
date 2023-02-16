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
class ContainersIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\ContainersIdJsonGetResponse200';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ContainersIdJsonGetResponse200';
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
        $object = new \Docker\API\Model\ContainersIdJsonGetResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data) && $data['Id'] !== null) {
            $object->setId($data['Id']);
            unset($data['Id']);
        }
        elseif (\array_key_exists('Id', $data) && $data['Id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('Created', $data) && $data['Created'] !== null) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        elseif (\array_key_exists('Created', $data) && $data['Created'] === null) {
            $object->setCreated(null);
        }
        if (\array_key_exists('Path', $data) && $data['Path'] !== null) {
            $object->setPath($data['Path']);
            unset($data['Path']);
        }
        elseif (\array_key_exists('Path', $data) && $data['Path'] === null) {
            $object->setPath(null);
        }
        if (\array_key_exists('Args', $data) && $data['Args'] !== null) {
            $values = array();
            foreach ($data['Args'] as $value) {
                $values[] = $value;
            }
            $object->setArgs($values);
            unset($data['Args']);
        }
        elseif (\array_key_exists('Args', $data) && $data['Args'] === null) {
            $object->setArgs(null);
        }
        if (\array_key_exists('State', $data) && $data['State'] !== null) {
            $object->setState($this->denormalizer->denormalize($data['State'], 'Docker\\API\\Model\\ContainerState', 'json', $context));
            unset($data['State']);
        }
        elseif (\array_key_exists('State', $data) && $data['State'] === null) {
            $object->setState(null);
        }
        if (\array_key_exists('Image', $data) && $data['Image'] !== null) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        }
        elseif (\array_key_exists('Image', $data) && $data['Image'] === null) {
            $object->setImage(null);
        }
        if (\array_key_exists('ResolvConfPath', $data) && $data['ResolvConfPath'] !== null) {
            $object->setResolvConfPath($data['ResolvConfPath']);
            unset($data['ResolvConfPath']);
        }
        elseif (\array_key_exists('ResolvConfPath', $data) && $data['ResolvConfPath'] === null) {
            $object->setResolvConfPath(null);
        }
        if (\array_key_exists('HostnamePath', $data) && $data['HostnamePath'] !== null) {
            $object->setHostnamePath($data['HostnamePath']);
            unset($data['HostnamePath']);
        }
        elseif (\array_key_exists('HostnamePath', $data) && $data['HostnamePath'] === null) {
            $object->setHostnamePath(null);
        }
        if (\array_key_exists('HostsPath', $data) && $data['HostsPath'] !== null) {
            $object->setHostsPath($data['HostsPath']);
            unset($data['HostsPath']);
        }
        elseif (\array_key_exists('HostsPath', $data) && $data['HostsPath'] === null) {
            $object->setHostsPath(null);
        }
        if (\array_key_exists('LogPath', $data) && $data['LogPath'] !== null) {
            $object->setLogPath($data['LogPath']);
            unset($data['LogPath']);
        }
        elseif (\array_key_exists('LogPath', $data) && $data['LogPath'] === null) {
            $object->setLogPath(null);
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('RestartCount', $data) && $data['RestartCount'] !== null) {
            $object->setRestartCount($data['RestartCount']);
            unset($data['RestartCount']);
        }
        elseif (\array_key_exists('RestartCount', $data) && $data['RestartCount'] === null) {
            $object->setRestartCount(null);
        }
        if (\array_key_exists('Driver', $data) && $data['Driver'] !== null) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        }
        elseif (\array_key_exists('Driver', $data) && $data['Driver'] === null) {
            $object->setDriver(null);
        }
        if (\array_key_exists('Platform', $data) && $data['Platform'] !== null) {
            $object->setPlatform($data['Platform']);
            unset($data['Platform']);
        }
        elseif (\array_key_exists('Platform', $data) && $data['Platform'] === null) {
            $object->setPlatform(null);
        }
        if (\array_key_exists('MountLabel', $data) && $data['MountLabel'] !== null) {
            $object->setMountLabel($data['MountLabel']);
            unset($data['MountLabel']);
        }
        elseif (\array_key_exists('MountLabel', $data) && $data['MountLabel'] === null) {
            $object->setMountLabel(null);
        }
        if (\array_key_exists('ProcessLabel', $data) && $data['ProcessLabel'] !== null) {
            $object->setProcessLabel($data['ProcessLabel']);
            unset($data['ProcessLabel']);
        }
        elseif (\array_key_exists('ProcessLabel', $data) && $data['ProcessLabel'] === null) {
            $object->setProcessLabel(null);
        }
        if (\array_key_exists('AppArmorProfile', $data) && $data['AppArmorProfile'] !== null) {
            $object->setAppArmorProfile($data['AppArmorProfile']);
            unset($data['AppArmorProfile']);
        }
        elseif (\array_key_exists('AppArmorProfile', $data) && $data['AppArmorProfile'] === null) {
            $object->setAppArmorProfile(null);
        }
        if (\array_key_exists('ExecIDs', $data) && $data['ExecIDs'] !== null) {
            $values_1 = array();
            foreach ($data['ExecIDs'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExecIDs($values_1);
            unset($data['ExecIDs']);
        }
        elseif (\array_key_exists('ExecIDs', $data) && $data['ExecIDs'] === null) {
            $object->setExecIDs(null);
        }
        if (\array_key_exists('HostConfig', $data) && $data['HostConfig'] !== null) {
            $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\\API\\Model\\HostConfig', 'json', $context));
            unset($data['HostConfig']);
        }
        elseif (\array_key_exists('HostConfig', $data) && $data['HostConfig'] === null) {
            $object->setHostConfig(null);
        }
        if (\array_key_exists('GraphDriver', $data) && $data['GraphDriver'] !== null) {
            $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], 'Docker\\API\\Model\\GraphDriverData', 'json', $context));
            unset($data['GraphDriver']);
        }
        elseif (\array_key_exists('GraphDriver', $data) && $data['GraphDriver'] === null) {
            $object->setGraphDriver(null);
        }
        if (\array_key_exists('SizeRw', $data) && $data['SizeRw'] !== null) {
            $object->setSizeRw($data['SizeRw']);
            unset($data['SizeRw']);
        }
        elseif (\array_key_exists('SizeRw', $data) && $data['SizeRw'] === null) {
            $object->setSizeRw(null);
        }
        if (\array_key_exists('SizeRootFs', $data) && $data['SizeRootFs'] !== null) {
            $object->setSizeRootFs($data['SizeRootFs']);
            unset($data['SizeRootFs']);
        }
        elseif (\array_key_exists('SizeRootFs', $data) && $data['SizeRootFs'] === null) {
            $object->setSizeRootFs(null);
        }
        if (\array_key_exists('Mounts', $data) && $data['Mounts'] !== null) {
            $values_2 = array();
            foreach ($data['Mounts'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\MountPoint', 'json', $context);
            }
            $object->setMounts($values_2);
            unset($data['Mounts']);
        }
        elseif (\array_key_exists('Mounts', $data) && $data['Mounts'] === null) {
            $object->setMounts(null);
        }
        if (\array_key_exists('Config', $data) && $data['Config'] !== null) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Docker\\API\\Model\\ContainerConfig', 'json', $context));
            unset($data['Config']);
        }
        elseif (\array_key_exists('Config', $data) && $data['Config'] === null) {
            $object->setConfig(null);
        }
        if (\array_key_exists('NetworkSettings', $data) && $data['NetworkSettings'] !== null) {
            $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Docker\\API\\Model\\NetworkSettings', 'json', $context));
            unset($data['NetworkSettings']);
        }
        elseif (\array_key_exists('NetworkSettings', $data) && $data['NetworkSettings'] === null) {
            $object->setNetworkSettings(null);
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
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['Id'] = $object->getId();
        }
        if ($object->isInitialized('created') && null !== $object->getCreated()) {
            $data['Created'] = $object->getCreated();
        }
        if ($object->isInitialized('path') && null !== $object->getPath()) {
            $data['Path'] = $object->getPath();
        }
        if ($object->isInitialized('args') && null !== $object->getArgs()) {
            $values = array();
            foreach ($object->getArgs() as $value) {
                $values[] = $value;
            }
            $data['Args'] = $values;
        }
        if ($object->isInitialized('state') && null !== $object->getState()) {
            $data['State'] = $this->normalizer->normalize($object->getState(), 'json', $context);
        }
        if ($object->isInitialized('image') && null !== $object->getImage()) {
            $data['Image'] = $object->getImage();
        }
        if ($object->isInitialized('resolvConfPath') && null !== $object->getResolvConfPath()) {
            $data['ResolvConfPath'] = $object->getResolvConfPath();
        }
        if ($object->isInitialized('hostnamePath') && null !== $object->getHostnamePath()) {
            $data['HostnamePath'] = $object->getHostnamePath();
        }
        if ($object->isInitialized('hostsPath') && null !== $object->getHostsPath()) {
            $data['HostsPath'] = $object->getHostsPath();
        }
        if ($object->isInitialized('logPath') && null !== $object->getLogPath()) {
            $data['LogPath'] = $object->getLogPath();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('restartCount') && null !== $object->getRestartCount()) {
            $data['RestartCount'] = $object->getRestartCount();
        }
        if ($object->isInitialized('driver') && null !== $object->getDriver()) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('platform') && null !== $object->getPlatform()) {
            $data['Platform'] = $object->getPlatform();
        }
        if ($object->isInitialized('mountLabel') && null !== $object->getMountLabel()) {
            $data['MountLabel'] = $object->getMountLabel();
        }
        if ($object->isInitialized('processLabel') && null !== $object->getProcessLabel()) {
            $data['ProcessLabel'] = $object->getProcessLabel();
        }
        if ($object->isInitialized('appArmorProfile') && null !== $object->getAppArmorProfile()) {
            $data['AppArmorProfile'] = $object->getAppArmorProfile();
        }
        if ($object->isInitialized('execIDs') && null !== $object->getExecIDs()) {
            $values_1 = array();
            foreach ($object->getExecIDs() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['ExecIDs'] = $values_1;
        }
        if ($object->isInitialized('hostConfig') && null !== $object->getHostConfig()) {
            $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
        }
        if ($object->isInitialized('graphDriver') && null !== $object->getGraphDriver()) {
            $data['GraphDriver'] = $this->normalizer->normalize($object->getGraphDriver(), 'json', $context);
        }
        if ($object->isInitialized('sizeRw') && null !== $object->getSizeRw()) {
            $data['SizeRw'] = $object->getSizeRw();
        }
        if ($object->isInitialized('sizeRootFs') && null !== $object->getSizeRootFs()) {
            $data['SizeRootFs'] = $object->getSizeRootFs();
        }
        if ($object->isInitialized('mounts') && null !== $object->getMounts()) {
            $values_2 = array();
            foreach ($object->getMounts() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['Mounts'] = $values_2;
        }
        if ($object->isInitialized('config') && null !== $object->getConfig()) {
            $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
        }
        if ($object->isInitialized('networkSettings') && null !== $object->getNetworkSettings()) {
            $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
        }
        foreach ($object as $key => $value_3) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_3;
            }
        }
        return $data;
    }
}