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

class SystemInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SystemInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SystemInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SystemInfo();
        if (\array_key_exists('MemoryLimit', $data) && \is_int($data['MemoryLimit'])) {
            $data['MemoryLimit'] = (bool) $data['MemoryLimit'];
        }
        if (\array_key_exists('SwapLimit', $data) && \is_int($data['SwapLimit'])) {
            $data['SwapLimit'] = (bool) $data['SwapLimit'];
        }
        if (\array_key_exists('KernelMemoryTCP', $data) && \is_int($data['KernelMemoryTCP'])) {
            $data['KernelMemoryTCP'] = (bool) $data['KernelMemoryTCP'];
        }
        if (\array_key_exists('CpuCfsPeriod', $data) && \is_int($data['CpuCfsPeriod'])) {
            $data['CpuCfsPeriod'] = (bool) $data['CpuCfsPeriod'];
        }
        if (\array_key_exists('CpuCfsQuota', $data) && \is_int($data['CpuCfsQuota'])) {
            $data['CpuCfsQuota'] = (bool) $data['CpuCfsQuota'];
        }
        if (\array_key_exists('CPUShares', $data) && \is_int($data['CPUShares'])) {
            $data['CPUShares'] = (bool) $data['CPUShares'];
        }
        if (\array_key_exists('CPUSet', $data) && \is_int($data['CPUSet'])) {
            $data['CPUSet'] = (bool) $data['CPUSet'];
        }
        if (\array_key_exists('PidsLimit', $data) && \is_int($data['PidsLimit'])) {
            $data['PidsLimit'] = (bool) $data['PidsLimit'];
        }
        if (\array_key_exists('OomKillDisable', $data) && \is_int($data['OomKillDisable'])) {
            $data['OomKillDisable'] = (bool) $data['OomKillDisable'];
        }
        if (\array_key_exists('IPv4Forwarding', $data) && \is_int($data['IPv4Forwarding'])) {
            $data['IPv4Forwarding'] = (bool) $data['IPv4Forwarding'];
        }
        if (\array_key_exists('BridgeNfIptables', $data) && \is_int($data['BridgeNfIptables'])) {
            $data['BridgeNfIptables'] = (bool) $data['BridgeNfIptables'];
        }
        if (\array_key_exists('BridgeNfIp6tables', $data) && \is_int($data['BridgeNfIp6tables'])) {
            $data['BridgeNfIp6tables'] = (bool) $data['BridgeNfIp6tables'];
        }
        if (\array_key_exists('Debug', $data) && \is_int($data['Debug'])) {
            $data['Debug'] = (bool) $data['Debug'];
        }
        if (\array_key_exists('ExperimentalBuild', $data) && \is_int($data['ExperimentalBuild'])) {
            $data['ExperimentalBuild'] = (bool) $data['ExperimentalBuild'];
        }
        if (\array_key_exists('LiveRestoreEnabled', $data) && \is_int($data['LiveRestoreEnabled'])) {
            $data['LiveRestoreEnabled'] = (bool) $data['LiveRestoreEnabled'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ID', $data) && null !== $data['ID']) {
            $object->setID($data['ID']);
            unset($data['ID']);
        } elseif (\array_key_exists('ID', $data) && null === $data['ID']) {
            $object->setID(null);
        }
        if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
            $object->setContainers($data['Containers']);
            unset($data['Containers']);
        } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
            $object->setContainers(null);
        }
        if (\array_key_exists('ContainersRunning', $data) && null !== $data['ContainersRunning']) {
            $object->setContainersRunning($data['ContainersRunning']);
            unset($data['ContainersRunning']);
        } elseif (\array_key_exists('ContainersRunning', $data) && null === $data['ContainersRunning']) {
            $object->setContainersRunning(null);
        }
        if (\array_key_exists('ContainersPaused', $data) && null !== $data['ContainersPaused']) {
            $object->setContainersPaused($data['ContainersPaused']);
            unset($data['ContainersPaused']);
        } elseif (\array_key_exists('ContainersPaused', $data) && null === $data['ContainersPaused']) {
            $object->setContainersPaused(null);
        }
        if (\array_key_exists('ContainersStopped', $data) && null !== $data['ContainersStopped']) {
            $object->setContainersStopped($data['ContainersStopped']);
            unset($data['ContainersStopped']);
        } elseif (\array_key_exists('ContainersStopped', $data) && null === $data['ContainersStopped']) {
            $object->setContainersStopped(null);
        }
        if (\array_key_exists('Images', $data) && null !== $data['Images']) {
            $object->setImages($data['Images']);
            unset($data['Images']);
        } elseif (\array_key_exists('Images', $data) && null === $data['Images']) {
            $object->setImages(null);
        }
        if (\array_key_exists('Driver', $data) && null !== $data['Driver']) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && null === $data['Driver']) {
            $object->setDriver(null);
        }
        if (\array_key_exists('DriverStatus', $data) && null !== $data['DriverStatus']) {
            $values = [];
            foreach ($data['DriverStatus'] as $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values[] = $values_1;
            }
            $object->setDriverStatus($values);
            unset($data['DriverStatus']);
        } elseif (\array_key_exists('DriverStatus', $data) && null === $data['DriverStatus']) {
            $object->setDriverStatus(null);
        }
        if (\array_key_exists('DockerRootDir', $data) && null !== $data['DockerRootDir']) {
            $object->setDockerRootDir($data['DockerRootDir']);
            unset($data['DockerRootDir']);
        } elseif (\array_key_exists('DockerRootDir', $data) && null === $data['DockerRootDir']) {
            $object->setDockerRootDir(null);
        }
        if (\array_key_exists('Plugins', $data) && null !== $data['Plugins']) {
            $object->setPlugins($this->denormalizer->denormalize($data['Plugins'], \Docker\API\Model\PluginsInfo::class, 'json', $context));
            unset($data['Plugins']);
        } elseif (\array_key_exists('Plugins', $data) && null === $data['Plugins']) {
            $object->setPlugins(null);
        }
        if (\array_key_exists('MemoryLimit', $data) && null !== $data['MemoryLimit']) {
            $object->setMemoryLimit($data['MemoryLimit']);
            unset($data['MemoryLimit']);
        } elseif (\array_key_exists('MemoryLimit', $data) && null === $data['MemoryLimit']) {
            $object->setMemoryLimit(null);
        }
        if (\array_key_exists('SwapLimit', $data) && null !== $data['SwapLimit']) {
            $object->setSwapLimit($data['SwapLimit']);
            unset($data['SwapLimit']);
        } elseif (\array_key_exists('SwapLimit', $data) && null === $data['SwapLimit']) {
            $object->setSwapLimit(null);
        }
        if (\array_key_exists('KernelMemoryTCP', $data) && null !== $data['KernelMemoryTCP']) {
            $object->setKernelMemoryTCP($data['KernelMemoryTCP']);
            unset($data['KernelMemoryTCP']);
        } elseif (\array_key_exists('KernelMemoryTCP', $data) && null === $data['KernelMemoryTCP']) {
            $object->setKernelMemoryTCP(null);
        }
        if (\array_key_exists('CpuCfsPeriod', $data) && null !== $data['CpuCfsPeriod']) {
            $object->setCpuCfsPeriod($data['CpuCfsPeriod']);
            unset($data['CpuCfsPeriod']);
        } elseif (\array_key_exists('CpuCfsPeriod', $data) && null === $data['CpuCfsPeriod']) {
            $object->setCpuCfsPeriod(null);
        }
        if (\array_key_exists('CpuCfsQuota', $data) && null !== $data['CpuCfsQuota']) {
            $object->setCpuCfsQuota($data['CpuCfsQuota']);
            unset($data['CpuCfsQuota']);
        } elseif (\array_key_exists('CpuCfsQuota', $data) && null === $data['CpuCfsQuota']) {
            $object->setCpuCfsQuota(null);
        }
        if (\array_key_exists('CPUShares', $data) && null !== $data['CPUShares']) {
            $object->setCPUShares($data['CPUShares']);
            unset($data['CPUShares']);
        } elseif (\array_key_exists('CPUShares', $data) && null === $data['CPUShares']) {
            $object->setCPUShares(null);
        }
        if (\array_key_exists('CPUSet', $data) && null !== $data['CPUSet']) {
            $object->setCPUSet($data['CPUSet']);
            unset($data['CPUSet']);
        } elseif (\array_key_exists('CPUSet', $data) && null === $data['CPUSet']) {
            $object->setCPUSet(null);
        }
        if (\array_key_exists('PidsLimit', $data) && null !== $data['PidsLimit']) {
            $object->setPidsLimit($data['PidsLimit']);
            unset($data['PidsLimit']);
        } elseif (\array_key_exists('PidsLimit', $data) && null === $data['PidsLimit']) {
            $object->setPidsLimit(null);
        }
        if (\array_key_exists('OomKillDisable', $data) && null !== $data['OomKillDisable']) {
            $object->setOomKillDisable($data['OomKillDisable']);
            unset($data['OomKillDisable']);
        } elseif (\array_key_exists('OomKillDisable', $data) && null === $data['OomKillDisable']) {
            $object->setOomKillDisable(null);
        }
        if (\array_key_exists('IPv4Forwarding', $data) && null !== $data['IPv4Forwarding']) {
            $object->setIPv4Forwarding($data['IPv4Forwarding']);
            unset($data['IPv4Forwarding']);
        } elseif (\array_key_exists('IPv4Forwarding', $data) && null === $data['IPv4Forwarding']) {
            $object->setIPv4Forwarding(null);
        }
        if (\array_key_exists('BridgeNfIptables', $data) && null !== $data['BridgeNfIptables']) {
            $object->setBridgeNfIptables($data['BridgeNfIptables']);
            unset($data['BridgeNfIptables']);
        } elseif (\array_key_exists('BridgeNfIptables', $data) && null === $data['BridgeNfIptables']) {
            $object->setBridgeNfIptables(null);
        }
        if (\array_key_exists('BridgeNfIp6tables', $data) && null !== $data['BridgeNfIp6tables']) {
            $object->setBridgeNfIp6tables($data['BridgeNfIp6tables']);
            unset($data['BridgeNfIp6tables']);
        } elseif (\array_key_exists('BridgeNfIp6tables', $data) && null === $data['BridgeNfIp6tables']) {
            $object->setBridgeNfIp6tables(null);
        }
        if (\array_key_exists('Debug', $data) && null !== $data['Debug']) {
            $object->setDebug($data['Debug']);
            unset($data['Debug']);
        } elseif (\array_key_exists('Debug', $data) && null === $data['Debug']) {
            $object->setDebug(null);
        }
        if (\array_key_exists('NFd', $data) && null !== $data['NFd']) {
            $object->setNFd($data['NFd']);
            unset($data['NFd']);
        } elseif (\array_key_exists('NFd', $data) && null === $data['NFd']) {
            $object->setNFd(null);
        }
        if (\array_key_exists('NGoroutines', $data) && null !== $data['NGoroutines']) {
            $object->setNGoroutines($data['NGoroutines']);
            unset($data['NGoroutines']);
        } elseif (\array_key_exists('NGoroutines', $data) && null === $data['NGoroutines']) {
            $object->setNGoroutines(null);
        }
        if (\array_key_exists('SystemTime', $data) && null !== $data['SystemTime']) {
            $object->setSystemTime($data['SystemTime']);
            unset($data['SystemTime']);
        } elseif (\array_key_exists('SystemTime', $data) && null === $data['SystemTime']) {
            $object->setSystemTime(null);
        }
        if (\array_key_exists('LoggingDriver', $data) && null !== $data['LoggingDriver']) {
            $object->setLoggingDriver($data['LoggingDriver']);
            unset($data['LoggingDriver']);
        } elseif (\array_key_exists('LoggingDriver', $data) && null === $data['LoggingDriver']) {
            $object->setLoggingDriver(null);
        }
        if (\array_key_exists('CgroupDriver', $data) && null !== $data['CgroupDriver']) {
            $object->setCgroupDriver($data['CgroupDriver']);
            unset($data['CgroupDriver']);
        } elseif (\array_key_exists('CgroupDriver', $data) && null === $data['CgroupDriver']) {
            $object->setCgroupDriver(null);
        }
        if (\array_key_exists('CgroupVersion', $data) && null !== $data['CgroupVersion']) {
            $object->setCgroupVersion($data['CgroupVersion']);
            unset($data['CgroupVersion']);
        } elseif (\array_key_exists('CgroupVersion', $data) && null === $data['CgroupVersion']) {
            $object->setCgroupVersion(null);
        }
        if (\array_key_exists('NEventsListener', $data) && null !== $data['NEventsListener']) {
            $object->setNEventsListener($data['NEventsListener']);
            unset($data['NEventsListener']);
        } elseif (\array_key_exists('NEventsListener', $data) && null === $data['NEventsListener']) {
            $object->setNEventsListener(null);
        }
        if (\array_key_exists('KernelVersion', $data) && null !== $data['KernelVersion']) {
            $object->setKernelVersion($data['KernelVersion']);
            unset($data['KernelVersion']);
        } elseif (\array_key_exists('KernelVersion', $data) && null === $data['KernelVersion']) {
            $object->setKernelVersion(null);
        }
        if (\array_key_exists('OperatingSystem', $data) && null !== $data['OperatingSystem']) {
            $object->setOperatingSystem($data['OperatingSystem']);
            unset($data['OperatingSystem']);
        } elseif (\array_key_exists('OperatingSystem', $data) && null === $data['OperatingSystem']) {
            $object->setOperatingSystem(null);
        }
        if (\array_key_exists('OSVersion', $data) && null !== $data['OSVersion']) {
            $object->setOSVersion($data['OSVersion']);
            unset($data['OSVersion']);
        } elseif (\array_key_exists('OSVersion', $data) && null === $data['OSVersion']) {
            $object->setOSVersion(null);
        }
        if (\array_key_exists('OSType', $data) && null !== $data['OSType']) {
            $object->setOSType($data['OSType']);
            unset($data['OSType']);
        } elseif (\array_key_exists('OSType', $data) && null === $data['OSType']) {
            $object->setOSType(null);
        }
        if (\array_key_exists('Architecture', $data) && null !== $data['Architecture']) {
            $object->setArchitecture($data['Architecture']);
            unset($data['Architecture']);
        } elseif (\array_key_exists('Architecture', $data) && null === $data['Architecture']) {
            $object->setArchitecture(null);
        }
        if (\array_key_exists('NCPU', $data) && null !== $data['NCPU']) {
            $object->setNCPU($data['NCPU']);
            unset($data['NCPU']);
        } elseif (\array_key_exists('NCPU', $data) && null === $data['NCPU']) {
            $object->setNCPU(null);
        }
        if (\array_key_exists('MemTotal', $data) && null !== $data['MemTotal']) {
            $object->setMemTotal($data['MemTotal']);
            unset($data['MemTotal']);
        } elseif (\array_key_exists('MemTotal', $data) && null === $data['MemTotal']) {
            $object->setMemTotal(null);
        }
        if (\array_key_exists('IndexServerAddress', $data) && null !== $data['IndexServerAddress']) {
            $object->setIndexServerAddress($data['IndexServerAddress']);
            unset($data['IndexServerAddress']);
        } elseif (\array_key_exists('IndexServerAddress', $data) && null === $data['IndexServerAddress']) {
            $object->setIndexServerAddress(null);
        }
        if (\array_key_exists('RegistryConfig', $data) && null !== $data['RegistryConfig']) {
            $object->setRegistryConfig($this->denormalizer->denormalize($data['RegistryConfig'], \Docker\API\Model\RegistryServiceConfig::class, 'json', $context));
            unset($data['RegistryConfig']);
        } elseif (\array_key_exists('RegistryConfig', $data) && null === $data['RegistryConfig']) {
            $object->setRegistryConfig(null);
        }
        if (\array_key_exists('GenericResources', $data) && null !== $data['GenericResources']) {
            $values_2 = [];
            foreach ($data['GenericResources'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\GenericResourcesItem::class, 'json', $context);
            }
            $object->setGenericResources($values_2);
            unset($data['GenericResources']);
        } elseif (\array_key_exists('GenericResources', $data) && null === $data['GenericResources']) {
            $object->setGenericResources(null);
        }
        if (\array_key_exists('HttpProxy', $data) && null !== $data['HttpProxy']) {
            $object->setHttpProxy($data['HttpProxy']);
            unset($data['HttpProxy']);
        } elseif (\array_key_exists('HttpProxy', $data) && null === $data['HttpProxy']) {
            $object->setHttpProxy(null);
        }
        if (\array_key_exists('HttpsProxy', $data) && null !== $data['HttpsProxy']) {
            $object->setHttpsProxy($data['HttpsProxy']);
            unset($data['HttpsProxy']);
        } elseif (\array_key_exists('HttpsProxy', $data) && null === $data['HttpsProxy']) {
            $object->setHttpsProxy(null);
        }
        if (\array_key_exists('NoProxy', $data) && null !== $data['NoProxy']) {
            $object->setNoProxy($data['NoProxy']);
            unset($data['NoProxy']);
        } elseif (\array_key_exists('NoProxy', $data) && null === $data['NoProxy']) {
            $object->setNoProxy(null);
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values_3 = [];
            foreach ($data['Labels'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setLabels($values_3);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
        }
        if (\array_key_exists('ExperimentalBuild', $data) && null !== $data['ExperimentalBuild']) {
            $object->setExperimentalBuild($data['ExperimentalBuild']);
            unset($data['ExperimentalBuild']);
        } elseif (\array_key_exists('ExperimentalBuild', $data) && null === $data['ExperimentalBuild']) {
            $object->setExperimentalBuild(null);
        }
        if (\array_key_exists('ServerVersion', $data) && null !== $data['ServerVersion']) {
            $object->setServerVersion($data['ServerVersion']);
            unset($data['ServerVersion']);
        } elseif (\array_key_exists('ServerVersion', $data) && null === $data['ServerVersion']) {
            $object->setServerVersion(null);
        }
        if (\array_key_exists('Runtimes', $data) && null !== $data['Runtimes']) {
            $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Runtimes'] as $key => $value_4) {
                $values_4[$key] = $this->denormalizer->denormalize($value_4, \Docker\API\Model\Runtime::class, 'json', $context);
            }
            $object->setRuntimes($values_4);
            unset($data['Runtimes']);
        } elseif (\array_key_exists('Runtimes', $data) && null === $data['Runtimes']) {
            $object->setRuntimes(null);
        }
        if (\array_key_exists('DefaultRuntime', $data) && null !== $data['DefaultRuntime']) {
            $object->setDefaultRuntime($data['DefaultRuntime']);
            unset($data['DefaultRuntime']);
        } elseif (\array_key_exists('DefaultRuntime', $data) && null === $data['DefaultRuntime']) {
            $object->setDefaultRuntime(null);
        }
        if (\array_key_exists('Swarm', $data) && null !== $data['Swarm']) {
            $object->setSwarm($this->denormalizer->denormalize($data['Swarm'], \Docker\API\Model\SwarmInfo::class, 'json', $context));
            unset($data['Swarm']);
        } elseif (\array_key_exists('Swarm', $data) && null === $data['Swarm']) {
            $object->setSwarm(null);
        }
        if (\array_key_exists('LiveRestoreEnabled', $data) && null !== $data['LiveRestoreEnabled']) {
            $object->setLiveRestoreEnabled($data['LiveRestoreEnabled']);
            unset($data['LiveRestoreEnabled']);
        } elseif (\array_key_exists('LiveRestoreEnabled', $data) && null === $data['LiveRestoreEnabled']) {
            $object->setLiveRestoreEnabled(null);
        }
        if (\array_key_exists('Isolation', $data) && null !== $data['Isolation']) {
            $object->setIsolation($data['Isolation']);
            unset($data['Isolation']);
        } elseif (\array_key_exists('Isolation', $data) && null === $data['Isolation']) {
            $object->setIsolation(null);
        }
        if (\array_key_exists('InitBinary', $data) && null !== $data['InitBinary']) {
            $object->setInitBinary($data['InitBinary']);
            unset($data['InitBinary']);
        } elseif (\array_key_exists('InitBinary', $data) && null === $data['InitBinary']) {
            $object->setInitBinary(null);
        }
        if (\array_key_exists('ContainerdCommit', $data) && null !== $data['ContainerdCommit']) {
            $object->setContainerdCommit($this->denormalizer->denormalize($data['ContainerdCommit'], \Docker\API\Model\Commit::class, 'json', $context));
            unset($data['ContainerdCommit']);
        } elseif (\array_key_exists('ContainerdCommit', $data) && null === $data['ContainerdCommit']) {
            $object->setContainerdCommit(null);
        }
        if (\array_key_exists('RuncCommit', $data) && null !== $data['RuncCommit']) {
            $object->setRuncCommit($this->denormalizer->denormalize($data['RuncCommit'], \Docker\API\Model\Commit::class, 'json', $context));
            unset($data['RuncCommit']);
        } elseif (\array_key_exists('RuncCommit', $data) && null === $data['RuncCommit']) {
            $object->setRuncCommit(null);
        }
        if (\array_key_exists('InitCommit', $data) && null !== $data['InitCommit']) {
            $object->setInitCommit($this->denormalizer->denormalize($data['InitCommit'], \Docker\API\Model\Commit::class, 'json', $context));
            unset($data['InitCommit']);
        } elseif (\array_key_exists('InitCommit', $data) && null === $data['InitCommit']) {
            $object->setInitCommit(null);
        }
        if (\array_key_exists('SecurityOptions', $data) && null !== $data['SecurityOptions']) {
            $values_5 = [];
            foreach ($data['SecurityOptions'] as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setSecurityOptions($values_5);
            unset($data['SecurityOptions']);
        } elseif (\array_key_exists('SecurityOptions', $data) && null === $data['SecurityOptions']) {
            $object->setSecurityOptions(null);
        }
        if (\array_key_exists('ProductLicense', $data) && null !== $data['ProductLicense']) {
            $object->setProductLicense($data['ProductLicense']);
            unset($data['ProductLicense']);
        } elseif (\array_key_exists('ProductLicense', $data) && null === $data['ProductLicense']) {
            $object->setProductLicense(null);
        }
        if (\array_key_exists('DefaultAddressPools', $data) && null !== $data['DefaultAddressPools']) {
            $values_6 = [];
            foreach ($data['DefaultAddressPools'] as $value_6) {
                $values_6[] = $this->denormalizer->denormalize($value_6, \Docker\API\Model\SystemInfoDefaultAddressPoolsItem::class, 'json', $context);
            }
            $object->setDefaultAddressPools($values_6);
            unset($data['DefaultAddressPools']);
        } elseif (\array_key_exists('DefaultAddressPools', $data) && null === $data['DefaultAddressPools']) {
            $object->setDefaultAddressPools(null);
        }
        if (\array_key_exists('Warnings', $data) && null !== $data['Warnings']) {
            $values_7 = [];
            foreach ($data['Warnings'] as $value_7) {
                $values_7[] = $value_7;
            }
            $object->setWarnings($values_7);
            unset($data['Warnings']);
        } elseif (\array_key_exists('Warnings', $data) && null === $data['Warnings']) {
            $object->setWarnings(null);
        }
        if (\array_key_exists('CDISpecDirs', $data) && null !== $data['CDISpecDirs']) {
            $values_8 = [];
            foreach ($data['CDISpecDirs'] as $value_8) {
                $values_8[] = $value_8;
            }
            $object->setCDISpecDirs($values_8);
            unset($data['CDISpecDirs']);
        } elseif (\array_key_exists('CDISpecDirs', $data) && null === $data['CDISpecDirs']) {
            $object->setCDISpecDirs(null);
        }
        foreach ($data as $key_1 => $value_9) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_9;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('iD') && null !== $data->getID()) {
            $dataArray['ID'] = $data->getID();
        }
        if ($data->isInitialized('containers') && null !== $data->getContainers()) {
            $dataArray['Containers'] = $data->getContainers();
        }
        if ($data->isInitialized('containersRunning') && null !== $data->getContainersRunning()) {
            $dataArray['ContainersRunning'] = $data->getContainersRunning();
        }
        if ($data->isInitialized('containersPaused') && null !== $data->getContainersPaused()) {
            $dataArray['ContainersPaused'] = $data->getContainersPaused();
        }
        if ($data->isInitialized('containersStopped') && null !== $data->getContainersStopped()) {
            $dataArray['ContainersStopped'] = $data->getContainersStopped();
        }
        if ($data->isInitialized('images') && null !== $data->getImages()) {
            $dataArray['Images'] = $data->getImages();
        }
        if ($data->isInitialized('driver') && null !== $data->getDriver()) {
            $dataArray['Driver'] = $data->getDriver();
        }
        if ($data->isInitialized('driverStatus') && null !== $data->getDriverStatus()) {
            $values = [];
            foreach ($data->getDriverStatus() as $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $value_1;
                }
                $values[] = $values_1;
            }
            $dataArray['DriverStatus'] = $values;
        }
        if ($data->isInitialized('dockerRootDir') && null !== $data->getDockerRootDir()) {
            $dataArray['DockerRootDir'] = $data->getDockerRootDir();
        }
        if ($data->isInitialized('plugins') && null !== $data->getPlugins()) {
            $dataArray['Plugins'] = $this->normalizer->normalize($data->getPlugins(), 'json', $context);
        }
        if ($data->isInitialized('memoryLimit') && null !== $data->getMemoryLimit()) {
            $dataArray['MemoryLimit'] = $data->getMemoryLimit();
        }
        if ($data->isInitialized('swapLimit') && null !== $data->getSwapLimit()) {
            $dataArray['SwapLimit'] = $data->getSwapLimit();
        }
        if ($data->isInitialized('kernelMemoryTCP') && null !== $data->getKernelMemoryTCP()) {
            $dataArray['KernelMemoryTCP'] = $data->getKernelMemoryTCP();
        }
        if ($data->isInitialized('cpuCfsPeriod') && null !== $data->getCpuCfsPeriod()) {
            $dataArray['CpuCfsPeriod'] = $data->getCpuCfsPeriod();
        }
        if ($data->isInitialized('cpuCfsQuota') && null !== $data->getCpuCfsQuota()) {
            $dataArray['CpuCfsQuota'] = $data->getCpuCfsQuota();
        }
        if ($data->isInitialized('cPUShares') && null !== $data->getCPUShares()) {
            $dataArray['CPUShares'] = $data->getCPUShares();
        }
        if ($data->isInitialized('cPUSet') && null !== $data->getCPUSet()) {
            $dataArray['CPUSet'] = $data->getCPUSet();
        }
        if ($data->isInitialized('pidsLimit') && null !== $data->getPidsLimit()) {
            $dataArray['PidsLimit'] = $data->getPidsLimit();
        }
        if ($data->isInitialized('oomKillDisable') && null !== $data->getOomKillDisable()) {
            $dataArray['OomKillDisable'] = $data->getOomKillDisable();
        }
        if ($data->isInitialized('iPv4Forwarding') && null !== $data->getIPv4Forwarding()) {
            $dataArray['IPv4Forwarding'] = $data->getIPv4Forwarding();
        }
        if ($data->isInitialized('bridgeNfIptables') && null !== $data->getBridgeNfIptables()) {
            $dataArray['BridgeNfIptables'] = $data->getBridgeNfIptables();
        }
        if ($data->isInitialized('bridgeNfIp6tables') && null !== $data->getBridgeNfIp6tables()) {
            $dataArray['BridgeNfIp6tables'] = $data->getBridgeNfIp6tables();
        }
        if ($data->isInitialized('debug') && null !== $data->getDebug()) {
            $dataArray['Debug'] = $data->getDebug();
        }
        if ($data->isInitialized('nFd') && null !== $data->getNFd()) {
            $dataArray['NFd'] = $data->getNFd();
        }
        if ($data->isInitialized('nGoroutines') && null !== $data->getNGoroutines()) {
            $dataArray['NGoroutines'] = $data->getNGoroutines();
        }
        if ($data->isInitialized('systemTime') && null !== $data->getSystemTime()) {
            $dataArray['SystemTime'] = $data->getSystemTime();
        }
        if ($data->isInitialized('loggingDriver') && null !== $data->getLoggingDriver()) {
            $dataArray['LoggingDriver'] = $data->getLoggingDriver();
        }
        if ($data->isInitialized('cgroupDriver') && null !== $data->getCgroupDriver()) {
            $dataArray['CgroupDriver'] = $data->getCgroupDriver();
        }
        if ($data->isInitialized('cgroupVersion') && null !== $data->getCgroupVersion()) {
            $dataArray['CgroupVersion'] = $data->getCgroupVersion();
        }
        if ($data->isInitialized('nEventsListener') && null !== $data->getNEventsListener()) {
            $dataArray['NEventsListener'] = $data->getNEventsListener();
        }
        if ($data->isInitialized('kernelVersion') && null !== $data->getKernelVersion()) {
            $dataArray['KernelVersion'] = $data->getKernelVersion();
        }
        if ($data->isInitialized('operatingSystem') && null !== $data->getOperatingSystem()) {
            $dataArray['OperatingSystem'] = $data->getOperatingSystem();
        }
        if ($data->isInitialized('oSVersion') && null !== $data->getOSVersion()) {
            $dataArray['OSVersion'] = $data->getOSVersion();
        }
        if ($data->isInitialized('oSType') && null !== $data->getOSType()) {
            $dataArray['OSType'] = $data->getOSType();
        }
        if ($data->isInitialized('architecture') && null !== $data->getArchitecture()) {
            $dataArray['Architecture'] = $data->getArchitecture();
        }
        if ($data->isInitialized('nCPU') && null !== $data->getNCPU()) {
            $dataArray['NCPU'] = $data->getNCPU();
        }
        if ($data->isInitialized('memTotal') && null !== $data->getMemTotal()) {
            $dataArray['MemTotal'] = $data->getMemTotal();
        }
        if ($data->isInitialized('indexServerAddress') && null !== $data->getIndexServerAddress()) {
            $dataArray['IndexServerAddress'] = $data->getIndexServerAddress();
        }
        if ($data->isInitialized('registryConfig') && null !== $data->getRegistryConfig()) {
            $dataArray['RegistryConfig'] = $this->normalizer->normalize($data->getRegistryConfig(), 'json', $context);
        }
        if ($data->isInitialized('genericResources') && null !== $data->getGenericResources()) {
            $values_2 = [];
            foreach ($data->getGenericResources() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['GenericResources'] = $values_2;
        }
        if ($data->isInitialized('httpProxy') && null !== $data->getHttpProxy()) {
            $dataArray['HttpProxy'] = $data->getHttpProxy();
        }
        if ($data->isInitialized('httpsProxy') && null !== $data->getHttpsProxy()) {
            $dataArray['HttpsProxy'] = $data->getHttpsProxy();
        }
        if ($data->isInitialized('noProxy') && null !== $data->getNoProxy()) {
            $dataArray['NoProxy'] = $data->getNoProxy();
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values_3 = [];
            foreach ($data->getLabels() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['Labels'] = $values_3;
        }
        if ($data->isInitialized('experimentalBuild') && null !== $data->getExperimentalBuild()) {
            $dataArray['ExperimentalBuild'] = $data->getExperimentalBuild();
        }
        if ($data->isInitialized('serverVersion') && null !== $data->getServerVersion()) {
            $dataArray['ServerVersion'] = $data->getServerVersion();
        }
        if ($data->isInitialized('runtimes') && null !== $data->getRuntimes()) {
            $values_4 = [];
            foreach ($data->getRuntimes() as $key => $value_4) {
                $values_4[$key] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $dataArray['Runtimes'] = $values_4;
        }
        if ($data->isInitialized('defaultRuntime') && null !== $data->getDefaultRuntime()) {
            $dataArray['DefaultRuntime'] = $data->getDefaultRuntime();
        }
        if ($data->isInitialized('swarm') && null !== $data->getSwarm()) {
            $dataArray['Swarm'] = $this->normalizer->normalize($data->getSwarm(), 'json', $context);
        }
        if ($data->isInitialized('liveRestoreEnabled') && null !== $data->getLiveRestoreEnabled()) {
            $dataArray['LiveRestoreEnabled'] = $data->getLiveRestoreEnabled();
        }
        if ($data->isInitialized('isolation') && null !== $data->getIsolation()) {
            $dataArray['Isolation'] = $data->getIsolation();
        }
        if ($data->isInitialized('initBinary') && null !== $data->getInitBinary()) {
            $dataArray['InitBinary'] = $data->getInitBinary();
        }
        if ($data->isInitialized('containerdCommit') && null !== $data->getContainerdCommit()) {
            $dataArray['ContainerdCommit'] = $this->normalizer->normalize($data->getContainerdCommit(), 'json', $context);
        }
        if ($data->isInitialized('runcCommit') && null !== $data->getRuncCommit()) {
            $dataArray['RuncCommit'] = $this->normalizer->normalize($data->getRuncCommit(), 'json', $context);
        }
        if ($data->isInitialized('initCommit') && null !== $data->getInitCommit()) {
            $dataArray['InitCommit'] = $this->normalizer->normalize($data->getInitCommit(), 'json', $context);
        }
        if ($data->isInitialized('securityOptions') && null !== $data->getSecurityOptions()) {
            $values_5 = [];
            foreach ($data->getSecurityOptions() as $value_5) {
                $values_5[] = $value_5;
            }
            $dataArray['SecurityOptions'] = $values_5;
        }
        if ($data->isInitialized('productLicense') && null !== $data->getProductLicense()) {
            $dataArray['ProductLicense'] = $data->getProductLicense();
        }
        if ($data->isInitialized('defaultAddressPools') && null !== $data->getDefaultAddressPools()) {
            $values_6 = [];
            foreach ($data->getDefaultAddressPools() as $value_6) {
                $values_6[] = $this->normalizer->normalize($value_6, 'json', $context);
            }
            $dataArray['DefaultAddressPools'] = $values_6;
        }
        if ($data->isInitialized('warnings') && null !== $data->getWarnings()) {
            $values_7 = [];
            foreach ($data->getWarnings() as $value_7) {
                $values_7[] = $value_7;
            }
            $dataArray['Warnings'] = $values_7;
        }
        if ($data->isInitialized('cDISpecDirs') && null !== $data->getCDISpecDirs()) {
            $values_8 = [];
            foreach ($data->getCDISpecDirs() as $value_8) {
                $values_8[] = $value_8;
            }
            $dataArray['CDISpecDirs'] = $values_8;
        }
        foreach ($data as $key_1 => $value_9) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_9;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SystemInfo::class => false];
    }
}
