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
class SystemInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\SystemInfo';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\SystemInfo';
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
        $object = new \Docker\API\Model\SystemInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ID', $data) && $data['ID'] !== null) {
            $object->setID($data['ID']);
            unset($data['ID']);
        }
        elseif (\array_key_exists('ID', $data) && $data['ID'] === null) {
            $object->setID(null);
        }
        if (\array_key_exists('Containers', $data) && $data['Containers'] !== null) {
            $object->setContainers($data['Containers']);
            unset($data['Containers']);
        }
        elseif (\array_key_exists('Containers', $data) && $data['Containers'] === null) {
            $object->setContainers(null);
        }
        if (\array_key_exists('ContainersRunning', $data) && $data['ContainersRunning'] !== null) {
            $object->setContainersRunning($data['ContainersRunning']);
            unset($data['ContainersRunning']);
        }
        elseif (\array_key_exists('ContainersRunning', $data) && $data['ContainersRunning'] === null) {
            $object->setContainersRunning(null);
        }
        if (\array_key_exists('ContainersPaused', $data) && $data['ContainersPaused'] !== null) {
            $object->setContainersPaused($data['ContainersPaused']);
            unset($data['ContainersPaused']);
        }
        elseif (\array_key_exists('ContainersPaused', $data) && $data['ContainersPaused'] === null) {
            $object->setContainersPaused(null);
        }
        if (\array_key_exists('ContainersStopped', $data) && $data['ContainersStopped'] !== null) {
            $object->setContainersStopped($data['ContainersStopped']);
            unset($data['ContainersStopped']);
        }
        elseif (\array_key_exists('ContainersStopped', $data) && $data['ContainersStopped'] === null) {
            $object->setContainersStopped(null);
        }
        if (\array_key_exists('Images', $data) && $data['Images'] !== null) {
            $object->setImages($data['Images']);
            unset($data['Images']);
        }
        elseif (\array_key_exists('Images', $data) && $data['Images'] === null) {
            $object->setImages(null);
        }
        if (\array_key_exists('Driver', $data) && $data['Driver'] !== null) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        }
        elseif (\array_key_exists('Driver', $data) && $data['Driver'] === null) {
            $object->setDriver(null);
        }
        if (\array_key_exists('DriverStatus', $data) && $data['DriverStatus'] !== null) {
            $values = array();
            foreach ($data['DriverStatus'] as $value) {
                $values_1 = array();
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values[] = $values_1;
            }
            $object->setDriverStatus($values);
            unset($data['DriverStatus']);
        }
        elseif (\array_key_exists('DriverStatus', $data) && $data['DriverStatus'] === null) {
            $object->setDriverStatus(null);
        }
        if (\array_key_exists('DockerRootDir', $data) && $data['DockerRootDir'] !== null) {
            $object->setDockerRootDir($data['DockerRootDir']);
            unset($data['DockerRootDir']);
        }
        elseif (\array_key_exists('DockerRootDir', $data) && $data['DockerRootDir'] === null) {
            $object->setDockerRootDir(null);
        }
        if (\array_key_exists('Plugins', $data) && $data['Plugins'] !== null) {
            $object->setPlugins($this->denormalizer->denormalize($data['Plugins'], 'Docker\\API\\Model\\PluginsInfo', 'json', $context));
            unset($data['Plugins']);
        }
        elseif (\array_key_exists('Plugins', $data) && $data['Plugins'] === null) {
            $object->setPlugins(null);
        }
        if (\array_key_exists('MemoryLimit', $data) && $data['MemoryLimit'] !== null) {
            $object->setMemoryLimit($data['MemoryLimit']);
            unset($data['MemoryLimit']);
        }
        elseif (\array_key_exists('MemoryLimit', $data) && $data['MemoryLimit'] === null) {
            $object->setMemoryLimit(null);
        }
        if (\array_key_exists('SwapLimit', $data) && $data['SwapLimit'] !== null) {
            $object->setSwapLimit($data['SwapLimit']);
            unset($data['SwapLimit']);
        }
        elseif (\array_key_exists('SwapLimit', $data) && $data['SwapLimit'] === null) {
            $object->setSwapLimit(null);
        }
        if (\array_key_exists('KernelMemory', $data) && $data['KernelMemory'] !== null) {
            $object->setKernelMemory($data['KernelMemory']);
            unset($data['KernelMemory']);
        }
        elseif (\array_key_exists('KernelMemory', $data) && $data['KernelMemory'] === null) {
            $object->setKernelMemory(null);
        }
        if (\array_key_exists('CpuCfsPeriod', $data) && $data['CpuCfsPeriod'] !== null) {
            $object->setCpuCfsPeriod($data['CpuCfsPeriod']);
            unset($data['CpuCfsPeriod']);
        }
        elseif (\array_key_exists('CpuCfsPeriod', $data) && $data['CpuCfsPeriod'] === null) {
            $object->setCpuCfsPeriod(null);
        }
        if (\array_key_exists('CpuCfsQuota', $data) && $data['CpuCfsQuota'] !== null) {
            $object->setCpuCfsQuota($data['CpuCfsQuota']);
            unset($data['CpuCfsQuota']);
        }
        elseif (\array_key_exists('CpuCfsQuota', $data) && $data['CpuCfsQuota'] === null) {
            $object->setCpuCfsQuota(null);
        }
        if (\array_key_exists('CPUShares', $data) && $data['CPUShares'] !== null) {
            $object->setCPUShares($data['CPUShares']);
            unset($data['CPUShares']);
        }
        elseif (\array_key_exists('CPUShares', $data) && $data['CPUShares'] === null) {
            $object->setCPUShares(null);
        }
        if (\array_key_exists('CPUSet', $data) && $data['CPUSet'] !== null) {
            $object->setCPUSet($data['CPUSet']);
            unset($data['CPUSet']);
        }
        elseif (\array_key_exists('CPUSet', $data) && $data['CPUSet'] === null) {
            $object->setCPUSet(null);
        }
        if (\array_key_exists('PidsLimit', $data) && $data['PidsLimit'] !== null) {
            $object->setPidsLimit($data['PidsLimit']);
            unset($data['PidsLimit']);
        }
        elseif (\array_key_exists('PidsLimit', $data) && $data['PidsLimit'] === null) {
            $object->setPidsLimit(null);
        }
        if (\array_key_exists('OomKillDisable', $data) && $data['OomKillDisable'] !== null) {
            $object->setOomKillDisable($data['OomKillDisable']);
            unset($data['OomKillDisable']);
        }
        elseif (\array_key_exists('OomKillDisable', $data) && $data['OomKillDisable'] === null) {
            $object->setOomKillDisable(null);
        }
        if (\array_key_exists('IPv4Forwarding', $data) && $data['IPv4Forwarding'] !== null) {
            $object->setIPv4Forwarding($data['IPv4Forwarding']);
            unset($data['IPv4Forwarding']);
        }
        elseif (\array_key_exists('IPv4Forwarding', $data) && $data['IPv4Forwarding'] === null) {
            $object->setIPv4Forwarding(null);
        }
        if (\array_key_exists('BridgeNfIptables', $data) && $data['BridgeNfIptables'] !== null) {
            $object->setBridgeNfIptables($data['BridgeNfIptables']);
            unset($data['BridgeNfIptables']);
        }
        elseif (\array_key_exists('BridgeNfIptables', $data) && $data['BridgeNfIptables'] === null) {
            $object->setBridgeNfIptables(null);
        }
        if (\array_key_exists('BridgeNfIp6tables', $data) && $data['BridgeNfIp6tables'] !== null) {
            $object->setBridgeNfIp6tables($data['BridgeNfIp6tables']);
            unset($data['BridgeNfIp6tables']);
        }
        elseif (\array_key_exists('BridgeNfIp6tables', $data) && $data['BridgeNfIp6tables'] === null) {
            $object->setBridgeNfIp6tables(null);
        }
        if (\array_key_exists('Debug', $data) && $data['Debug'] !== null) {
            $object->setDebug($data['Debug']);
            unset($data['Debug']);
        }
        elseif (\array_key_exists('Debug', $data) && $data['Debug'] === null) {
            $object->setDebug(null);
        }
        if (\array_key_exists('NFd', $data) && $data['NFd'] !== null) {
            $object->setNFd($data['NFd']);
            unset($data['NFd']);
        }
        elseif (\array_key_exists('NFd', $data) && $data['NFd'] === null) {
            $object->setNFd(null);
        }
        if (\array_key_exists('NGoroutines', $data) && $data['NGoroutines'] !== null) {
            $object->setNGoroutines($data['NGoroutines']);
            unset($data['NGoroutines']);
        }
        elseif (\array_key_exists('NGoroutines', $data) && $data['NGoroutines'] === null) {
            $object->setNGoroutines(null);
        }
        if (\array_key_exists('SystemTime', $data) && $data['SystemTime'] !== null) {
            $object->setSystemTime($data['SystemTime']);
            unset($data['SystemTime']);
        }
        elseif (\array_key_exists('SystemTime', $data) && $data['SystemTime'] === null) {
            $object->setSystemTime(null);
        }
        if (\array_key_exists('LoggingDriver', $data) && $data['LoggingDriver'] !== null) {
            $object->setLoggingDriver($data['LoggingDriver']);
            unset($data['LoggingDriver']);
        }
        elseif (\array_key_exists('LoggingDriver', $data) && $data['LoggingDriver'] === null) {
            $object->setLoggingDriver(null);
        }
        if (\array_key_exists('CgroupDriver', $data) && $data['CgroupDriver'] !== null) {
            $object->setCgroupDriver($data['CgroupDriver']);
            unset($data['CgroupDriver']);
        }
        elseif (\array_key_exists('CgroupDriver', $data) && $data['CgroupDriver'] === null) {
            $object->setCgroupDriver(null);
        }
        if (\array_key_exists('CgroupVersion', $data) && $data['CgroupVersion'] !== null) {
            $object->setCgroupVersion($data['CgroupVersion']);
            unset($data['CgroupVersion']);
        }
        elseif (\array_key_exists('CgroupVersion', $data) && $data['CgroupVersion'] === null) {
            $object->setCgroupVersion(null);
        }
        if (\array_key_exists('NEventsListener', $data) && $data['NEventsListener'] !== null) {
            $object->setNEventsListener($data['NEventsListener']);
            unset($data['NEventsListener']);
        }
        elseif (\array_key_exists('NEventsListener', $data) && $data['NEventsListener'] === null) {
            $object->setNEventsListener(null);
        }
        if (\array_key_exists('KernelVersion', $data) && $data['KernelVersion'] !== null) {
            $object->setKernelVersion($data['KernelVersion']);
            unset($data['KernelVersion']);
        }
        elseif (\array_key_exists('KernelVersion', $data) && $data['KernelVersion'] === null) {
            $object->setKernelVersion(null);
        }
        if (\array_key_exists('OperatingSystem', $data) && $data['OperatingSystem'] !== null) {
            $object->setOperatingSystem($data['OperatingSystem']);
            unset($data['OperatingSystem']);
        }
        elseif (\array_key_exists('OperatingSystem', $data) && $data['OperatingSystem'] === null) {
            $object->setOperatingSystem(null);
        }
        if (\array_key_exists('OSVersion', $data) && $data['OSVersion'] !== null) {
            $object->setOSVersion($data['OSVersion']);
            unset($data['OSVersion']);
        }
        elseif (\array_key_exists('OSVersion', $data) && $data['OSVersion'] === null) {
            $object->setOSVersion(null);
        }
        if (\array_key_exists('OSType', $data) && $data['OSType'] !== null) {
            $object->setOSType($data['OSType']);
            unset($data['OSType']);
        }
        elseif (\array_key_exists('OSType', $data) && $data['OSType'] === null) {
            $object->setOSType(null);
        }
        if (\array_key_exists('Architecture', $data) && $data['Architecture'] !== null) {
            $object->setArchitecture($data['Architecture']);
            unset($data['Architecture']);
        }
        elseif (\array_key_exists('Architecture', $data) && $data['Architecture'] === null) {
            $object->setArchitecture(null);
        }
        if (\array_key_exists('NCPU', $data) && $data['NCPU'] !== null) {
            $object->setNCPU($data['NCPU']);
            unset($data['NCPU']);
        }
        elseif (\array_key_exists('NCPU', $data) && $data['NCPU'] === null) {
            $object->setNCPU(null);
        }
        if (\array_key_exists('MemTotal', $data) && $data['MemTotal'] !== null) {
            $object->setMemTotal($data['MemTotal']);
            unset($data['MemTotal']);
        }
        elseif (\array_key_exists('MemTotal', $data) && $data['MemTotal'] === null) {
            $object->setMemTotal(null);
        }
        if (\array_key_exists('IndexServerAddress', $data) && $data['IndexServerAddress'] !== null) {
            $object->setIndexServerAddress($data['IndexServerAddress']);
            unset($data['IndexServerAddress']);
        }
        elseif (\array_key_exists('IndexServerAddress', $data) && $data['IndexServerAddress'] === null) {
            $object->setIndexServerAddress(null);
        }
        if (\array_key_exists('RegistryConfig', $data) && $data['RegistryConfig'] !== null) {
            $object->setRegistryConfig($this->denormalizer->denormalize($data['RegistryConfig'], 'Docker\\API\\Model\\RegistryServiceConfig', 'json', $context));
            unset($data['RegistryConfig']);
        }
        elseif (\array_key_exists('RegistryConfig', $data) && $data['RegistryConfig'] === null) {
            $object->setRegistryConfig(null);
        }
        if (\array_key_exists('GenericResources', $data) && $data['GenericResources'] !== null) {
            $values_2 = array();
            foreach ($data['GenericResources'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\GenericResourcesItem', 'json', $context);
            }
            $object->setGenericResources($values_2);
            unset($data['GenericResources']);
        }
        elseif (\array_key_exists('GenericResources', $data) && $data['GenericResources'] === null) {
            $object->setGenericResources(null);
        }
        if (\array_key_exists('HttpProxy', $data) && $data['HttpProxy'] !== null) {
            $object->setHttpProxy($data['HttpProxy']);
            unset($data['HttpProxy']);
        }
        elseif (\array_key_exists('HttpProxy', $data) && $data['HttpProxy'] === null) {
            $object->setHttpProxy(null);
        }
        if (\array_key_exists('HttpsProxy', $data) && $data['HttpsProxy'] !== null) {
            $object->setHttpsProxy($data['HttpsProxy']);
            unset($data['HttpsProxy']);
        }
        elseif (\array_key_exists('HttpsProxy', $data) && $data['HttpsProxy'] === null) {
            $object->setHttpsProxy(null);
        }
        if (\array_key_exists('NoProxy', $data) && $data['NoProxy'] !== null) {
            $object->setNoProxy($data['NoProxy']);
            unset($data['NoProxy']);
        }
        elseif (\array_key_exists('NoProxy', $data) && $data['NoProxy'] === null) {
            $object->setNoProxy(null);
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
            $values_3 = array();
            foreach ($data['Labels'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setLabels($values_3);
            unset($data['Labels']);
        }
        elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('ExperimentalBuild', $data) && $data['ExperimentalBuild'] !== null) {
            $object->setExperimentalBuild($data['ExperimentalBuild']);
            unset($data['ExperimentalBuild']);
        }
        elseif (\array_key_exists('ExperimentalBuild', $data) && $data['ExperimentalBuild'] === null) {
            $object->setExperimentalBuild(null);
        }
        if (\array_key_exists('ServerVersion', $data) && $data['ServerVersion'] !== null) {
            $object->setServerVersion($data['ServerVersion']);
            unset($data['ServerVersion']);
        }
        elseif (\array_key_exists('ServerVersion', $data) && $data['ServerVersion'] === null) {
            $object->setServerVersion(null);
        }
        if (\array_key_exists('ClusterStore', $data) && $data['ClusterStore'] !== null) {
            $object->setClusterStore($data['ClusterStore']);
            unset($data['ClusterStore']);
        }
        elseif (\array_key_exists('ClusterStore', $data) && $data['ClusterStore'] === null) {
            $object->setClusterStore(null);
        }
        if (\array_key_exists('ClusterAdvertise', $data) && $data['ClusterAdvertise'] !== null) {
            $object->setClusterAdvertise($data['ClusterAdvertise']);
            unset($data['ClusterAdvertise']);
        }
        elseif (\array_key_exists('ClusterAdvertise', $data) && $data['ClusterAdvertise'] === null) {
            $object->setClusterAdvertise(null);
        }
        if (\array_key_exists('Runtimes', $data) && $data['Runtimes'] !== null) {
            $values_4 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Runtimes'] as $key => $value_4) {
                $values_4[$key] = $this->denormalizer->denormalize($value_4, 'Docker\\API\\Model\\Runtime', 'json', $context);
            }
            $object->setRuntimes($values_4);
            unset($data['Runtimes']);
        }
        elseif (\array_key_exists('Runtimes', $data) && $data['Runtimes'] === null) {
            $object->setRuntimes(null);
        }
        if (\array_key_exists('DefaultRuntime', $data) && $data['DefaultRuntime'] !== null) {
            $object->setDefaultRuntime($data['DefaultRuntime']);
            unset($data['DefaultRuntime']);
        }
        elseif (\array_key_exists('DefaultRuntime', $data) && $data['DefaultRuntime'] === null) {
            $object->setDefaultRuntime(null);
        }
        if (\array_key_exists('Swarm', $data) && $data['Swarm'] !== null) {
            $object->setSwarm($this->denormalizer->denormalize($data['Swarm'], 'Docker\\API\\Model\\SwarmInfo', 'json', $context));
            unset($data['Swarm']);
        }
        elseif (\array_key_exists('Swarm', $data) && $data['Swarm'] === null) {
            $object->setSwarm(null);
        }
        if (\array_key_exists('LiveRestoreEnabled', $data) && $data['LiveRestoreEnabled'] !== null) {
            $object->setLiveRestoreEnabled($data['LiveRestoreEnabled']);
            unset($data['LiveRestoreEnabled']);
        }
        elseif (\array_key_exists('LiveRestoreEnabled', $data) && $data['LiveRestoreEnabled'] === null) {
            $object->setLiveRestoreEnabled(null);
        }
        if (\array_key_exists('Isolation', $data) && $data['Isolation'] !== null) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        }
        elseif (\array_key_exists('Isolation', $data) && $data['Isolation'] === null) {
            $object->setIsolation(null);
        }
        if (\array_key_exists('InitBinary', $data) && $data['InitBinary'] !== null) {
            $object->setInitBinary($data['InitBinary']);
            unset($data['InitBinary']);
        }
        elseif (\array_key_exists('InitBinary', $data) && $data['InitBinary'] === null) {
            $object->setInitBinary(null);
        }
        if (\array_key_exists('ContainerdCommit', $data) && $data['ContainerdCommit'] !== null) {
            $object->setContainerdCommit($this->denormalizer->denormalize($data['ContainerdCommit'], 'Docker\\API\\Model\\Commit', 'json', $context));
            unset($data['ContainerdCommit']);
        }
        elseif (\array_key_exists('ContainerdCommit', $data) && $data['ContainerdCommit'] === null) {
            $object->setContainerdCommit(null);
        }
        if (\array_key_exists('RuncCommit', $data) && $data['RuncCommit'] !== null) {
            $object->setRuncCommit($this->denormalizer->denormalize($data['RuncCommit'], 'Docker\\API\\Model\\Commit', 'json', $context));
            unset($data['RuncCommit']);
        }
        elseif (\array_key_exists('RuncCommit', $data) && $data['RuncCommit'] === null) {
            $object->setRuncCommit(null);
        }
        if (\array_key_exists('InitCommit', $data) && $data['InitCommit'] !== null) {
            $object->setInitCommit($this->denormalizer->denormalize($data['InitCommit'], 'Docker\\API\\Model\\Commit', 'json', $context));
            unset($data['InitCommit']);
        }
        elseif (\array_key_exists('InitCommit', $data) && $data['InitCommit'] === null) {
            $object->setInitCommit(null);
        }
        if (\array_key_exists('SecurityOptions', $data) && $data['SecurityOptions'] !== null) {
            $values_5 = array();
            foreach ($data['SecurityOptions'] as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setSecurityOptions($values_5);
            unset($data['SecurityOptions']);
        }
        elseif (\array_key_exists('SecurityOptions', $data) && $data['SecurityOptions'] === null) {
            $object->setSecurityOptions(null);
        }
        if (\array_key_exists('ProductLicense', $data) && $data['ProductLicense'] !== null) {
            $object->setProductLicense($data['ProductLicense']);
            unset($data['ProductLicense']);
        }
        elseif (\array_key_exists('ProductLicense', $data) && $data['ProductLicense'] === null) {
            $object->setProductLicense(null);
        }
        if (\array_key_exists('DefaultAddressPools', $data) && $data['DefaultAddressPools'] !== null) {
            $values_6 = array();
            foreach ($data['DefaultAddressPools'] as $value_6) {
                $values_6[] = $this->denormalizer->denormalize($value_6, 'Docker\\API\\Model\\SystemInfoDefaultAddressPoolsItem', 'json', $context);
            }
            $object->setDefaultAddressPools($values_6);
            unset($data['DefaultAddressPools']);
        }
        elseif (\array_key_exists('DefaultAddressPools', $data) && $data['DefaultAddressPools'] === null) {
            $object->setDefaultAddressPools(null);
        }
        if (\array_key_exists('Warnings', $data) && $data['Warnings'] !== null) {
            $values_7 = array();
            foreach ($data['Warnings'] as $value_7) {
                $values_7[] = $value_7;
            }
            $object->setWarnings($values_7);
            unset($data['Warnings']);
        }
        elseif (\array_key_exists('Warnings', $data) && $data['Warnings'] === null) {
            $object->setWarnings(null);
        }
        foreach ($data as $key_1 => $value_8) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_8;
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
        if ($object->isInitialized('iD') && null !== $object->getID()) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('containers') && null !== $object->getContainers()) {
            $data['Containers'] = $object->getContainers();
        }
        if ($object->isInitialized('containersRunning') && null !== $object->getContainersRunning()) {
            $data['ContainersRunning'] = $object->getContainersRunning();
        }
        if ($object->isInitialized('containersPaused') && null !== $object->getContainersPaused()) {
            $data['ContainersPaused'] = $object->getContainersPaused();
        }
        if ($object->isInitialized('containersStopped') && null !== $object->getContainersStopped()) {
            $data['ContainersStopped'] = $object->getContainersStopped();
        }
        if ($object->isInitialized('images') && null !== $object->getImages()) {
            $data['Images'] = $object->getImages();
        }
        if ($object->isInitialized('driver') && null !== $object->getDriver()) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('driverStatus') && null !== $object->getDriverStatus()) {
            $values = array();
            foreach ($object->getDriverStatus() as $value) {
                $values_1 = array();
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values[] = $values_1;
            }
            $data['DriverStatus'] = $values;
        }
        if ($object->isInitialized('dockerRootDir') && null !== $object->getDockerRootDir()) {
            $data['DockerRootDir'] = $object->getDockerRootDir();
        }
        if ($object->isInitialized('plugins') && null !== $object->getPlugins()) {
            $data['Plugins'] = $this->normalizer->normalize($object->getPlugins(), 'json', $context);
        }
        if ($object->isInitialized('memoryLimit') && null !== $object->getMemoryLimit()) {
            $data['MemoryLimit'] = $object->getMemoryLimit();
        }
        if ($object->isInitialized('swapLimit') && null !== $object->getSwapLimit()) {
            $data['SwapLimit'] = $object->getSwapLimit();
        }
        if ($object->isInitialized('kernelMemory') && null !== $object->getKernelMemory()) {
            $data['KernelMemory'] = $object->getKernelMemory();
        }
        if ($object->isInitialized('cpuCfsPeriod') && null !== $object->getCpuCfsPeriod()) {
            $data['CpuCfsPeriod'] = $object->getCpuCfsPeriod();
        }
        if ($object->isInitialized('cpuCfsQuota') && null !== $object->getCpuCfsQuota()) {
            $data['CpuCfsQuota'] = $object->getCpuCfsQuota();
        }
        if ($object->isInitialized('cPUShares') && null !== $object->getCPUShares()) {
            $data['CPUShares'] = $object->getCPUShares();
        }
        if ($object->isInitialized('cPUSet') && null !== $object->getCPUSet()) {
            $data['CPUSet'] = $object->getCPUSet();
        }
        if ($object->isInitialized('pidsLimit') && null !== $object->getPidsLimit()) {
            $data['PidsLimit'] = $object->getPidsLimit();
        }
        if ($object->isInitialized('oomKillDisable') && null !== $object->getOomKillDisable()) {
            $data['OomKillDisable'] = $object->getOomKillDisable();
        }
        if ($object->isInitialized('iPv4Forwarding') && null !== $object->getIPv4Forwarding()) {
            $data['IPv4Forwarding'] = $object->getIPv4Forwarding();
        }
        if ($object->isInitialized('bridgeNfIptables') && null !== $object->getBridgeNfIptables()) {
            $data['BridgeNfIptables'] = $object->getBridgeNfIptables();
        }
        if ($object->isInitialized('bridgeNfIp6tables') && null !== $object->getBridgeNfIp6tables()) {
            $data['BridgeNfIp6tables'] = $object->getBridgeNfIp6tables();
        }
        if ($object->isInitialized('debug') && null !== $object->getDebug()) {
            $data['Debug'] = $object->getDebug();
        }
        if ($object->isInitialized('nFd') && null !== $object->getNFd()) {
            $data['NFd'] = $object->getNFd();
        }
        if ($object->isInitialized('nGoroutines') && null !== $object->getNGoroutines()) {
            $data['NGoroutines'] = $object->getNGoroutines();
        }
        if ($object->isInitialized('systemTime') && null !== $object->getSystemTime()) {
            $data['SystemTime'] = $object->getSystemTime();
        }
        if ($object->isInitialized('loggingDriver') && null !== $object->getLoggingDriver()) {
            $data['LoggingDriver'] = $object->getLoggingDriver();
        }
        if ($object->isInitialized('cgroupDriver') && null !== $object->getCgroupDriver()) {
            $data['CgroupDriver'] = $object->getCgroupDriver();
        }
        if ($object->isInitialized('cgroupVersion') && null !== $object->getCgroupVersion()) {
            $data['CgroupVersion'] = $object->getCgroupVersion();
        }
        if ($object->isInitialized('nEventsListener') && null !== $object->getNEventsListener()) {
            $data['NEventsListener'] = $object->getNEventsListener();
        }
        if ($object->isInitialized('kernelVersion') && null !== $object->getKernelVersion()) {
            $data['KernelVersion'] = $object->getKernelVersion();
        }
        if ($object->isInitialized('operatingSystem') && null !== $object->getOperatingSystem()) {
            $data['OperatingSystem'] = $object->getOperatingSystem();
        }
        if ($object->isInitialized('oSVersion') && null !== $object->getOSVersion()) {
            $data['OSVersion'] = $object->getOSVersion();
        }
        if ($object->isInitialized('oSType') && null !== $object->getOSType()) {
            $data['OSType'] = $object->getOSType();
        }
        if ($object->isInitialized('architecture') && null !== $object->getArchitecture()) {
            $data['Architecture'] = $object->getArchitecture();
        }
        if ($object->isInitialized('nCPU') && null !== $object->getNCPU()) {
            $data['NCPU'] = $object->getNCPU();
        }
        if ($object->isInitialized('memTotal') && null !== $object->getMemTotal()) {
            $data['MemTotal'] = $object->getMemTotal();
        }
        if ($object->isInitialized('indexServerAddress') && null !== $object->getIndexServerAddress()) {
            $data['IndexServerAddress'] = $object->getIndexServerAddress();
        }
        if ($object->isInitialized('registryConfig') && null !== $object->getRegistryConfig()) {
            $data['RegistryConfig'] = $this->normalizer->normalize($object->getRegistryConfig(), 'json', $context);
        }
        if ($object->isInitialized('genericResources') && null !== $object->getGenericResources()) {
            $values_2 = array();
            foreach ($object->getGenericResources() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['GenericResources'] = $values_2;
        }
        if ($object->isInitialized('httpProxy') && null !== $object->getHttpProxy()) {
            $data['HttpProxy'] = $object->getHttpProxy();
        }
        if ($object->isInitialized('httpsProxy') && null !== $object->getHttpsProxy()) {
            $data['HttpsProxy'] = $object->getHttpsProxy();
        }
        if ($object->isInitialized('noProxy') && null !== $object->getNoProxy()) {
            $data['NoProxy'] = $object->getNoProxy();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('labels') && null !== $object->getLabels()) {
            $values_3 = array();
            foreach ($object->getLabels() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['Labels'] = $values_3;
        }
        if ($object->isInitialized('experimentalBuild') && null !== $object->getExperimentalBuild()) {
            $data['ExperimentalBuild'] = $object->getExperimentalBuild();
        }
        if ($object->isInitialized('serverVersion') && null !== $object->getServerVersion()) {
            $data['ServerVersion'] = $object->getServerVersion();
        }
        if ($object->isInitialized('clusterStore') && null !== $object->getClusterStore()) {
            $data['ClusterStore'] = $object->getClusterStore();
        }
        if ($object->isInitialized('clusterAdvertise') && null !== $object->getClusterAdvertise()) {
            $data['ClusterAdvertise'] = $object->getClusterAdvertise();
        }
        if ($object->isInitialized('runtimes') && null !== $object->getRuntimes()) {
            $values_4 = array();
            foreach ($object->getRuntimes() as $key => $value_4) {
                $values_4[$key] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['Runtimes'] = $values_4;
        }
        if ($object->isInitialized('defaultRuntime') && null !== $object->getDefaultRuntime()) {
            $data['DefaultRuntime'] = $object->getDefaultRuntime();
        }
        if ($object->isInitialized('swarm') && null !== $object->getSwarm()) {
            $data['Swarm'] = $this->normalizer->normalize($object->getSwarm(), 'json', $context);
        }
        if ($object->isInitialized('liveRestoreEnabled') && null !== $object->getLiveRestoreEnabled()) {
            $data['LiveRestoreEnabled'] = $object->getLiveRestoreEnabled();
        }
        if ($object->isInitialized('isolation') && null !== $object->getIsolation()) {
            $data['Isolation'] = $object->getIsolation();
        }
        if ($object->isInitialized('initBinary') && null !== $object->getInitBinary()) {
            $data['InitBinary'] = $object->getInitBinary();
        }
        if ($object->isInitialized('containerdCommit') && null !== $object->getContainerdCommit()) {
            $data['ContainerdCommit'] = $this->normalizer->normalize($object->getContainerdCommit(), 'json', $context);
        }
        if ($object->isInitialized('runcCommit') && null !== $object->getRuncCommit()) {
            $data['RuncCommit'] = $this->normalizer->normalize($object->getRuncCommit(), 'json', $context);
        }
        if ($object->isInitialized('initCommit') && null !== $object->getInitCommit()) {
            $data['InitCommit'] = $this->normalizer->normalize($object->getInitCommit(), 'json', $context);
        }
        if ($object->isInitialized('securityOptions') && null !== $object->getSecurityOptions()) {
            $values_5 = array();
            foreach ($object->getSecurityOptions() as $value_5) {
                $values_5[] = $value_5;
            }
            $data['SecurityOptions'] = $values_5;
        }
        if ($object->isInitialized('productLicense') && null !== $object->getProductLicense()) {
            $data['ProductLicense'] = $object->getProductLicense();
        }
        if ($object->isInitialized('defaultAddressPools') && null !== $object->getDefaultAddressPools()) {
            $values_6 = array();
            foreach ($object->getDefaultAddressPools() as $value_6) {
                $values_6[] = $this->normalizer->normalize($value_6, 'json', $context);
            }
            $data['DefaultAddressPools'] = $values_6;
        }
        if ($object->isInitialized('warnings') && null !== $object->getWarnings()) {
            $values_7 = array();
            foreach ($object->getWarnings() as $value_7) {
                $values_7[] = $value_7;
            }
            $data['Warnings'] = $values_7;
        }
        foreach ($object as $key_1 => $value_8) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_8;
            }
        }
        return $data;
    }
}