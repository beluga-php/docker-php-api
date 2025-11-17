<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;
    protected $normalizers = [
        \Docker\API\Model\Port::class => PortNormalizer::class,

        \Docker\API\Model\MountPoint::class => MountPointNormalizer::class,

        \Docker\API\Model\DeviceMapping::class => DeviceMappingNormalizer::class,

        \Docker\API\Model\DeviceRequest::class => DeviceRequestNormalizer::class,

        \Docker\API\Model\ThrottleDevice::class => ThrottleDeviceNormalizer::class,

        \Docker\API\Model\Mount::class => MountNormalizer::class,

        \Docker\API\Model\MountBindOptions::class => MountBindOptionsNormalizer::class,

        \Docker\API\Model\MountVolumeOptions::class => MountVolumeOptionsNormalizer::class,

        \Docker\API\Model\MountVolumeOptionsDriverConfig::class => MountVolumeOptionsDriverConfigNormalizer::class,

        \Docker\API\Model\MountTmpfsOptions::class => MountTmpfsOptionsNormalizer::class,

        \Docker\API\Model\RestartPolicy::class => RestartPolicyNormalizer::class,

        \Docker\API\Model\Resources::class => ResourcesNormalizer::class,

        \Docker\API\Model\ResourcesBlkioWeightDeviceItem::class => ResourcesBlkioWeightDeviceItemNormalizer::class,

        \Docker\API\Model\ResourcesUlimitsItem::class => ResourcesUlimitsItemNormalizer::class,

        \Docker\API\Model\Limit::class => LimitNormalizer::class,

        \Docker\API\Model\ResourceObject::class => ResourceObjectNormalizer::class,

        \Docker\API\Model\GenericResourcesItem::class => GenericResourcesItemNormalizer::class,

        \Docker\API\Model\GenericResourcesItemNamedResourceSpec::class => GenericResourcesItemNamedResourceSpecNormalizer::class,

        \Docker\API\Model\GenericResourcesItemDiscreteResourceSpec::class => GenericResourcesItemDiscreteResourceSpecNormalizer::class,

        \Docker\API\Model\HealthConfig::class => HealthConfigNormalizer::class,

        \Docker\API\Model\Health::class => HealthNormalizer::class,

        \Docker\API\Model\HealthcheckResult::class => HealthcheckResultNormalizer::class,

        \Docker\API\Model\HostConfig::class => HostConfigNormalizer::class,

        \Docker\API\Model\HostConfigLogConfig::class => HostConfigLogConfigNormalizer::class,

        \Docker\API\Model\ContainerConfig::class => ContainerConfigNormalizer::class,

        \Docker\API\Model\ContainerConfigExposedPortsItem::class => ContainerConfigExposedPortsItemNormalizer::class,

        \Docker\API\Model\ContainerConfigVolumesItem::class => ContainerConfigVolumesItemNormalizer::class,

        \Docker\API\Model\NetworkingConfig::class => NetworkingConfigNormalizer::class,

        \Docker\API\Model\NetworkSettings::class => NetworkSettingsNormalizer::class,

        \Docker\API\Model\Address::class => AddressNormalizer::class,

        \Docker\API\Model\PortBinding::class => PortBindingNormalizer::class,

        \Docker\API\Model\GraphDriverData::class => GraphDriverDataNormalizer::class,

        \Docker\API\Model\FilesystemChange::class => FilesystemChangeNormalizer::class,

        \Docker\API\Model\ImageInspect::class => ImageInspectNormalizer::class,

        \Docker\API\Model\ImageInspectRootFS::class => ImageInspectRootFSNormalizer::class,

        \Docker\API\Model\ImageInspectMetadata::class => ImageInspectMetadataNormalizer::class,

        \Docker\API\Model\ImageSummary::class => ImageSummaryNormalizer::class,

        \Docker\API\Model\AuthConfig::class => AuthConfigNormalizer::class,

        \Docker\API\Model\ProcessConfig::class => ProcessConfigNormalizer::class,

        \Docker\API\Model\Volume::class => VolumeNormalizer::class,

        \Docker\API\Model\VolumeStatusItem::class => VolumeStatusItemNormalizer::class,

        \Docker\API\Model\VolumeUsageData::class => VolumeUsageDataNormalizer::class,

        \Docker\API\Model\VolumeCreateOptions::class => VolumeCreateOptionsNormalizer::class,

        \Docker\API\Model\VolumeListResponse::class => VolumeListResponseNormalizer::class,

        \Docker\API\Model\Network::class => NetworkNormalizer::class,

        \Docker\API\Model\IPAM::class => IPAMNormalizer::class,

        \Docker\API\Model\IPAMConfig::class => IPAMConfigNormalizer::class,

        \Docker\API\Model\NetworkContainer::class => NetworkContainerNormalizer::class,

        \Docker\API\Model\BuildInfo::class => BuildInfoNormalizer::class,

        \Docker\API\Model\BuildCache::class => BuildCacheNormalizer::class,

        \Docker\API\Model\ImageID::class => ImageIDNormalizer::class,

        \Docker\API\Model\CreateImageInfo::class => CreateImageInfoNormalizer::class,

        \Docker\API\Model\PushImageInfo::class => PushImageInfoNormalizer::class,

        \Docker\API\Model\ErrorDetail::class => ErrorDetailNormalizer::class,

        \Docker\API\Model\ProgressDetail::class => ProgressDetailNormalizer::class,

        \Docker\API\Model\ErrorResponse::class => ErrorResponseNormalizer::class,

        \Docker\API\Model\IdResponse::class => IdResponseNormalizer::class,

        \Docker\API\Model\EndpointSettings::class => EndpointSettingsNormalizer::class,

        \Docker\API\Model\EndpointIPAMConfig::class => EndpointIPAMConfigNormalizer::class,

        \Docker\API\Model\PluginMount::class => PluginMountNormalizer::class,

        \Docker\API\Model\PluginDevice::class => PluginDeviceNormalizer::class,

        \Docker\API\Model\PluginEnv::class => PluginEnvNormalizer::class,

        \Docker\API\Model\PluginInterfaceType::class => PluginInterfaceTypeNormalizer::class,

        \Docker\API\Model\PluginPrivilege::class => PluginPrivilegeNormalizer::class,

        \Docker\API\Model\Plugin::class => PluginNormalizer::class,

        \Docker\API\Model\PluginSettings::class => PluginSettingsNormalizer::class,

        \Docker\API\Model\PluginConfig::class => PluginConfigNormalizer::class,

        \Docker\API\Model\PluginConfigInterface::class => PluginConfigInterfaceNormalizer::class,

        \Docker\API\Model\PluginConfigUser::class => PluginConfigUserNormalizer::class,

        \Docker\API\Model\PluginConfigNetwork::class => PluginConfigNetworkNormalizer::class,

        \Docker\API\Model\PluginConfigLinux::class => PluginConfigLinuxNormalizer::class,

        \Docker\API\Model\PluginConfigArgs::class => PluginConfigArgsNormalizer::class,

        \Docker\API\Model\PluginConfigRootfs::class => PluginConfigRootfsNormalizer::class,

        \Docker\API\Model\ObjectVersion::class => ObjectVersionNormalizer::class,

        \Docker\API\Model\NodeSpec::class => NodeSpecNormalizer::class,

        \Docker\API\Model\Node::class => NodeNormalizer::class,

        \Docker\API\Model\NodeDescription::class => NodeDescriptionNormalizer::class,

        \Docker\API\Model\Platform::class => PlatformNormalizer::class,

        \Docker\API\Model\EngineDescription::class => EngineDescriptionNormalizer::class,

        \Docker\API\Model\EngineDescriptionPluginsItem::class => EngineDescriptionPluginsItemNormalizer::class,

        \Docker\API\Model\TLSInfo::class => TLSInfoNormalizer::class,

        \Docker\API\Model\NodeStatus::class => NodeStatusNormalizer::class,

        \Docker\API\Model\ManagerStatus::class => ManagerStatusNormalizer::class,

        \Docker\API\Model\SwarmSpec::class => SwarmSpecNormalizer::class,

        \Docker\API\Model\SwarmSpecOrchestration::class => SwarmSpecOrchestrationNormalizer::class,

        \Docker\API\Model\SwarmSpecRaft::class => SwarmSpecRaftNormalizer::class,

        \Docker\API\Model\SwarmSpecDispatcher::class => SwarmSpecDispatcherNormalizer::class,

        \Docker\API\Model\SwarmSpecCAConfig::class => SwarmSpecCAConfigNormalizer::class,

        \Docker\API\Model\SwarmSpecCAConfigExternalCAsItem::class => SwarmSpecCAConfigExternalCAsItemNormalizer::class,

        \Docker\API\Model\SwarmSpecEncryptionConfig::class => SwarmSpecEncryptionConfigNormalizer::class,

        \Docker\API\Model\SwarmSpecTaskDefaults::class => SwarmSpecTaskDefaultsNormalizer::class,

        \Docker\API\Model\SwarmSpecTaskDefaultsLogDriver::class => SwarmSpecTaskDefaultsLogDriverNormalizer::class,

        \Docker\API\Model\ClusterInfo::class => ClusterInfoNormalizer::class,

        \Docker\API\Model\JoinTokens::class => JoinTokensNormalizer::class,

        \Docker\API\Model\Swarm::class => SwarmNormalizer::class,

        \Docker\API\Model\TaskSpec::class => TaskSpecNormalizer::class,

        \Docker\API\Model\TaskSpecPluginSpec::class => TaskSpecPluginSpecNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpec::class => TaskSpecContainerSpecNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivileges::class => TaskSpecContainerSpecPrivilegesNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec::class => TaskSpecContainerSpecPrivilegesCredentialSpecNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext::class => TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivilegesSeccomp::class => TaskSpecContainerSpecPrivilegesSeccompNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecPrivilegesAppArmor::class => TaskSpecContainerSpecPrivilegesAppArmorNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecDNSConfig::class => TaskSpecContainerSpecDNSConfigNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecSecretsItem::class => TaskSpecContainerSpecSecretsItemNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecSecretsItemFile::class => TaskSpecContainerSpecSecretsItemFileNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecConfigsItem::class => TaskSpecContainerSpecConfigsItemNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecConfigsItemFile::class => TaskSpecContainerSpecConfigsItemFileNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecConfigsItemRuntime::class => TaskSpecContainerSpecConfigsItemRuntimeNormalizer::class,

        \Docker\API\Model\TaskSpecContainerSpecUlimitsItem::class => TaskSpecContainerSpecUlimitsItemNormalizer::class,

        \Docker\API\Model\TaskSpecNetworkAttachmentSpec::class => TaskSpecNetworkAttachmentSpecNormalizer::class,

        \Docker\API\Model\TaskSpecResources::class => TaskSpecResourcesNormalizer::class,

        \Docker\API\Model\TaskSpecRestartPolicy::class => TaskSpecRestartPolicyNormalizer::class,

        \Docker\API\Model\TaskSpecPlacement::class => TaskSpecPlacementNormalizer::class,

        \Docker\API\Model\TaskSpecPlacementPreferencesItem::class => TaskSpecPlacementPreferencesItemNormalizer::class,

        \Docker\API\Model\TaskSpecPlacementPreferencesItemSpread::class => TaskSpecPlacementPreferencesItemSpreadNormalizer::class,

        \Docker\API\Model\TaskSpecLogDriver::class => TaskSpecLogDriverNormalizer::class,

        \Docker\API\Model\ContainerStatus::class => ContainerStatusNormalizer::class,

        \Docker\API\Model\PortStatus::class => PortStatusNormalizer::class,

        \Docker\API\Model\TaskStatus::class => TaskStatusNormalizer::class,

        \Docker\API\Model\Task::class => TaskNormalizer::class,

        \Docker\API\Model\ServiceSpec::class => ServiceSpecNormalizer::class,

        \Docker\API\Model\ServiceSpecMode::class => ServiceSpecModeNormalizer::class,

        \Docker\API\Model\ServiceSpecModeReplicated::class => ServiceSpecModeReplicatedNormalizer::class,

        \Docker\API\Model\ServiceSpecModeGlobal::class => ServiceSpecModeGlobalNormalizer::class,

        \Docker\API\Model\ServiceSpecModeReplicatedJob::class => ServiceSpecModeReplicatedJobNormalizer::class,

        \Docker\API\Model\ServiceSpecModeGlobalJob::class => ServiceSpecModeGlobalJobNormalizer::class,

        \Docker\API\Model\ServiceSpecUpdateConfig::class => ServiceSpecUpdateConfigNormalizer::class,

        \Docker\API\Model\ServiceSpecRollbackConfig::class => ServiceSpecRollbackConfigNormalizer::class,

        \Docker\API\Model\EndpointPortConfig::class => EndpointPortConfigNormalizer::class,

        \Docker\API\Model\EndpointSpec::class => EndpointSpecNormalizer::class,

        \Docker\API\Model\Service::class => ServiceNormalizer::class,

        \Docker\API\Model\ServiceEndpoint::class => ServiceEndpointNormalizer::class,

        \Docker\API\Model\ServiceEndpointVirtualIPsItem::class => ServiceEndpointVirtualIPsItemNormalizer::class,

        \Docker\API\Model\ServiceUpdateStatus::class => ServiceUpdateStatusNormalizer::class,

        \Docker\API\Model\ServiceServiceStatus::class => ServiceServiceStatusNormalizer::class,

        \Docker\API\Model\ServiceJobStatus::class => ServiceJobStatusNormalizer::class,

        \Docker\API\Model\ImageDeleteResponseItem::class => ImageDeleteResponseItemNormalizer::class,

        \Docker\API\Model\ServiceCreateResponse::class => ServiceCreateResponseNormalizer::class,

        \Docker\API\Model\ServiceUpdateResponse::class => ServiceUpdateResponseNormalizer::class,

        \Docker\API\Model\ContainerSummary::class => ContainerSummaryNormalizer::class,

        \Docker\API\Model\ContainerSummaryHostConfig::class => ContainerSummaryHostConfigNormalizer::class,

        \Docker\API\Model\ContainerSummaryNetworkSettings::class => ContainerSummaryNetworkSettingsNormalizer::class,

        \Docker\API\Model\Driver::class => DriverNormalizer::class,

        \Docker\API\Model\SecretSpec::class => SecretSpecNormalizer::class,

        \Docker\API\Model\Secret::class => SecretNormalizer::class,

        \Docker\API\Model\ConfigSpec::class => ConfigSpecNormalizer::class,

        \Docker\API\Model\Config::class => ConfigNormalizer::class,

        \Docker\API\Model\ContainerState::class => ContainerStateNormalizer::class,

        \Docker\API\Model\ContainerCreateResponse::class => ContainerCreateResponseNormalizer::class,

        \Docker\API\Model\ContainerWaitResponse::class => ContainerWaitResponseNormalizer::class,

        \Docker\API\Model\ContainerWaitExitError::class => ContainerWaitExitErrorNormalizer::class,

        \Docker\API\Model\SystemVersion::class => SystemVersionNormalizer::class,

        \Docker\API\Model\SystemVersionPlatform::class => SystemVersionPlatformNormalizer::class,

        \Docker\API\Model\SystemVersionComponentsItem::class => SystemVersionComponentsItemNormalizer::class,

        \Docker\API\Model\SystemVersionComponentsItemDetails::class => SystemVersionComponentsItemDetailsNormalizer::class,

        \Docker\API\Model\SystemInfo::class => SystemInfoNormalizer::class,

        \Docker\API\Model\SystemInfoDefaultAddressPoolsItem::class => SystemInfoDefaultAddressPoolsItemNormalizer::class,

        \Docker\API\Model\PluginsInfo::class => PluginsInfoNormalizer::class,

        \Docker\API\Model\RegistryServiceConfig::class => RegistryServiceConfigNormalizer::class,

        \Docker\API\Model\IndexInfo::class => IndexInfoNormalizer::class,

        \Docker\API\Model\Runtime::class => RuntimeNormalizer::class,

        \Docker\API\Model\Commit::class => CommitNormalizer::class,

        \Docker\API\Model\SwarmInfo::class => SwarmInfoNormalizer::class,

        \Docker\API\Model\PeerNode::class => PeerNodeNormalizer::class,

        \Docker\API\Model\NetworkAttachmentConfig::class => NetworkAttachmentConfigNormalizer::class,

        \Docker\API\Model\EventActor::class => EventActorNormalizer::class,

        \Docker\API\Model\EventMessage::class => EventMessageNormalizer::class,

        \Docker\API\Model\OCIDescriptor::class => OCIDescriptorNormalizer::class,

        \Docker\API\Model\OCIPlatform::class => OCIPlatformNormalizer::class,

        \Docker\API\Model\DistributionInspect::class => DistributionInspectNormalizer::class,

        \Docker\API\Model\ClusterVolume::class => ClusterVolumeNormalizer::class,

        \Docker\API\Model\ClusterVolumeInfo::class => ClusterVolumeInfoNormalizer::class,

        \Docker\API\Model\ClusterVolumePublishStatusItem::class => ClusterVolumePublishStatusItemNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpec::class => ClusterVolumeSpecNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessMode::class => ClusterVolumeSpecAccessModeNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessModeMountVolume::class => ClusterVolumeSpecAccessModeMountVolumeNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessModeSecretsItem::class => ClusterVolumeSpecAccessModeSecretsItemNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessModeAccessibilityRequirements::class => ClusterVolumeSpecAccessModeAccessibilityRequirementsNormalizer::class,

        \Docker\API\Model\ClusterVolumeSpecAccessModeCapacityRange::class => ClusterVolumeSpecAccessModeCapacityRangeNormalizer::class,

        \Docker\API\Model\ContainersCreatePostBody::class => ContainersCreatePostBodyNormalizer::class,

        \Docker\API\Model\ContainersIdJsonGetResponse200::class => ContainersIdJsonGetResponse200Normalizer::class,

        \Docker\API\Model\ContainersIdTopGetJsonResponse200::class => ContainersIdTopGetJsonResponse200Normalizer::class,

        \Docker\API\Model\ContainersIdTopGetTextplainResponse200::class => ContainersIdTopGetTextplainResponse200Normalizer::class,

        \Docker\API\Model\ContainersIdUpdatePostBody::class => ContainersIdUpdatePostBodyNormalizer::class,

        \Docker\API\Model\ContainersIdUpdatePostResponse200::class => ContainersIdUpdatePostResponse200Normalizer::class,

        \Docker\API\Model\ContainersPrunePostResponse200::class => ContainersPrunePostResponse200Normalizer::class,

        \Docker\API\Model\BuildPrunePostResponse200::class => BuildPrunePostResponse200Normalizer::class,

        \Docker\API\Model\ImagesNameHistoryGetResponse200Item::class => ImagesNameHistoryGetResponse200ItemNormalizer::class,

        \Docker\API\Model\ImagesSearchGetResponse200Item::class => ImagesSearchGetResponse200ItemNormalizer::class,

        \Docker\API\Model\ImagesPrunePostResponse200::class => ImagesPrunePostResponse200Normalizer::class,

        \Docker\API\Model\AuthPostResponse200::class => AuthPostResponse200Normalizer::class,

        \Docker\API\Model\SystemDfGetJsonResponse200::class => SystemDfGetJsonResponse200Normalizer::class,

        \Docker\API\Model\SystemDfGetTextplainResponse200::class => SystemDfGetTextplainResponse200Normalizer::class,

        \Docker\API\Model\ContainersIdExecPostBody::class => ContainersIdExecPostBodyNormalizer::class,

        \Docker\API\Model\ExecIdStartPostBody::class => ExecIdStartPostBodyNormalizer::class,

        \Docker\API\Model\ExecIdJsonGetResponse200::class => ExecIdJsonGetResponse200Normalizer::class,

        \Docker\API\Model\VolumesNamePutBody::class => VolumesNamePutBodyNormalizer::class,

        \Docker\API\Model\VolumesPrunePostResponse200::class => VolumesPrunePostResponse200Normalizer::class,

        \Docker\API\Model\NetworksCreatePostBody::class => NetworksCreatePostBodyNormalizer::class,

        \Docker\API\Model\NetworksCreatePostResponse201::class => NetworksCreatePostResponse201Normalizer::class,

        \Docker\API\Model\NetworksIdConnectPostBody::class => NetworksIdConnectPostBodyNormalizer::class,

        \Docker\API\Model\NetworksIdDisconnectPostBody::class => NetworksIdDisconnectPostBodyNormalizer::class,

        \Docker\API\Model\NetworksPrunePostResponse200::class => NetworksPrunePostResponse200Normalizer::class,

        \Docker\API\Model\SwarmInitPostBody::class => SwarmInitPostBodyNormalizer::class,

        \Docker\API\Model\SwarmJoinPostBody::class => SwarmJoinPostBodyNormalizer::class,

        \Docker\API\Model\SwarmUnlockkeyGetJsonResponse200::class => SwarmUnlockkeyGetJsonResponse200Normalizer::class,

        \Docker\API\Model\SwarmUnlockkeyGetTextplainResponse200::class => SwarmUnlockkeyGetTextplainResponse200Normalizer::class,

        \Docker\API\Model\SwarmUnlockPostBody::class => SwarmUnlockPostBodyNormalizer::class,

        \Docker\API\Model\ServicesCreatePostBody::class => ServicesCreatePostBodyNormalizer::class,

        \Docker\API\Model\ServicesIdUpdatePostBody::class => ServicesIdUpdatePostBodyNormalizer::class,

        \Docker\API\Model\SecretsCreatePostBody::class => SecretsCreatePostBodyNormalizer::class,

        \Docker\API\Model\ConfigsCreatePostBody::class => ConfigsCreatePostBodyNormalizer::class,

        \Jane\Component\JsonSchemaRuntime\Reference::class => \Docker\API\Runtime\Normalizer\ReferenceNormalizer::class,
    ];
    protected $normalizersCache = [];

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \array_key_exists($type, $this->normalizers);
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \array_key_exists($data::class, $this->normalizers);
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $normalizerClass = $this->normalizers[$data::class];
        $normalizer = $this->getNormalizer($normalizerClass);

        return $normalizer->normalize($data, $format, $context);
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $denormalizerClass = $this->normalizers[$type];
        $denormalizer = $this->getNormalizer($denormalizerClass);

        return $denormalizer->denormalize($data, $type, $format, $context);
    }

    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }

    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;

        return $normalizer;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [
            \Docker\API\Model\Port::class => false,
            \Docker\API\Model\MountPoint::class => false,
            \Docker\API\Model\DeviceMapping::class => false,
            \Docker\API\Model\DeviceRequest::class => false,
            \Docker\API\Model\ThrottleDevice::class => false,
            \Docker\API\Model\Mount::class => false,
            \Docker\API\Model\MountBindOptions::class => false,
            \Docker\API\Model\MountVolumeOptions::class => false,
            \Docker\API\Model\MountVolumeOptionsDriverConfig::class => false,
            \Docker\API\Model\MountTmpfsOptions::class => false,
            \Docker\API\Model\RestartPolicy::class => false,
            \Docker\API\Model\Resources::class => false,
            \Docker\API\Model\ResourcesBlkioWeightDeviceItem::class => false,
            \Docker\API\Model\ResourcesUlimitsItem::class => false,
            \Docker\API\Model\Limit::class => false,
            \Docker\API\Model\ResourceObject::class => false,
            \Docker\API\Model\GenericResourcesItem::class => false,
            \Docker\API\Model\GenericResourcesItemNamedResourceSpec::class => false,
            \Docker\API\Model\GenericResourcesItemDiscreteResourceSpec::class => false,
            \Docker\API\Model\HealthConfig::class => false,
            \Docker\API\Model\Health::class => false,
            \Docker\API\Model\HealthcheckResult::class => false,
            \Docker\API\Model\HostConfig::class => false,
            \Docker\API\Model\HostConfigLogConfig::class => false,
            \Docker\API\Model\ContainerConfig::class => false,
            \Docker\API\Model\ContainerConfigExposedPortsItem::class => false,
            \Docker\API\Model\ContainerConfigVolumesItem::class => false,
            \Docker\API\Model\NetworkingConfig::class => false,
            \Docker\API\Model\NetworkSettings::class => false,
            \Docker\API\Model\Address::class => false,
            \Docker\API\Model\PortBinding::class => false,
            \Docker\API\Model\GraphDriverData::class => false,
            \Docker\API\Model\FilesystemChange::class => false,
            \Docker\API\Model\ImageInspect::class => false,
            \Docker\API\Model\ImageInspectRootFS::class => false,
            \Docker\API\Model\ImageInspectMetadata::class => false,
            \Docker\API\Model\ImageSummary::class => false,
            \Docker\API\Model\AuthConfig::class => false,
            \Docker\API\Model\ProcessConfig::class => false,
            \Docker\API\Model\Volume::class => false,
            \Docker\API\Model\VolumeStatusItem::class => false,
            \Docker\API\Model\VolumeUsageData::class => false,
            \Docker\API\Model\VolumeCreateOptions::class => false,
            \Docker\API\Model\VolumeListResponse::class => false,
            \Docker\API\Model\Network::class => false,
            \Docker\API\Model\IPAM::class => false,
            \Docker\API\Model\IPAMConfig::class => false,
            \Docker\API\Model\NetworkContainer::class => false,
            \Docker\API\Model\BuildInfo::class => false,
            \Docker\API\Model\BuildCache::class => false,
            \Docker\API\Model\ImageID::class => false,
            \Docker\API\Model\CreateImageInfo::class => false,
            \Docker\API\Model\PushImageInfo::class => false,
            \Docker\API\Model\ErrorDetail::class => false,
            \Docker\API\Model\ProgressDetail::class => false,
            \Docker\API\Model\ErrorResponse::class => false,
            \Docker\API\Model\IdResponse::class => false,
            \Docker\API\Model\EndpointSettings::class => false,
            \Docker\API\Model\EndpointIPAMConfig::class => false,
            \Docker\API\Model\PluginMount::class => false,
            \Docker\API\Model\PluginDevice::class => false,
            \Docker\API\Model\PluginEnv::class => false,
            \Docker\API\Model\PluginInterfaceType::class => false,
            \Docker\API\Model\PluginPrivilege::class => false,
            \Docker\API\Model\Plugin::class => false,
            \Docker\API\Model\PluginSettings::class => false,
            \Docker\API\Model\PluginConfig::class => false,
            \Docker\API\Model\PluginConfigInterface::class => false,
            \Docker\API\Model\PluginConfigUser::class => false,
            \Docker\API\Model\PluginConfigNetwork::class => false,
            \Docker\API\Model\PluginConfigLinux::class => false,
            \Docker\API\Model\PluginConfigArgs::class => false,
            \Docker\API\Model\PluginConfigRootfs::class => false,
            \Docker\API\Model\ObjectVersion::class => false,
            \Docker\API\Model\NodeSpec::class => false,
            \Docker\API\Model\Node::class => false,
            \Docker\API\Model\NodeDescription::class => false,
            \Docker\API\Model\Platform::class => false,
            \Docker\API\Model\EngineDescription::class => false,
            \Docker\API\Model\EngineDescriptionPluginsItem::class => false,
            \Docker\API\Model\TLSInfo::class => false,
            \Docker\API\Model\NodeStatus::class => false,
            \Docker\API\Model\ManagerStatus::class => false,
            \Docker\API\Model\SwarmSpec::class => false,
            \Docker\API\Model\SwarmSpecOrchestration::class => false,
            \Docker\API\Model\SwarmSpecRaft::class => false,
            \Docker\API\Model\SwarmSpecDispatcher::class => false,
            \Docker\API\Model\SwarmSpecCAConfig::class => false,
            \Docker\API\Model\SwarmSpecCAConfigExternalCAsItem::class => false,
            \Docker\API\Model\SwarmSpecEncryptionConfig::class => false,
            \Docker\API\Model\SwarmSpecTaskDefaults::class => false,
            \Docker\API\Model\SwarmSpecTaskDefaultsLogDriver::class => false,
            \Docker\API\Model\ClusterInfo::class => false,
            \Docker\API\Model\JoinTokens::class => false,
            \Docker\API\Model\Swarm::class => false,
            \Docker\API\Model\TaskSpec::class => false,
            \Docker\API\Model\TaskSpecPluginSpec::class => false,
            \Docker\API\Model\TaskSpecContainerSpec::class => false,
            \Docker\API\Model\TaskSpecContainerSpecPrivileges::class => false,
            \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec::class => false,
            \Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext::class => false,
            \Docker\API\Model\TaskSpecContainerSpecPrivilegesSeccomp::class => false,
            \Docker\API\Model\TaskSpecContainerSpecPrivilegesAppArmor::class => false,
            \Docker\API\Model\TaskSpecContainerSpecDNSConfig::class => false,
            \Docker\API\Model\TaskSpecContainerSpecSecretsItem::class => false,
            \Docker\API\Model\TaskSpecContainerSpecSecretsItemFile::class => false,
            \Docker\API\Model\TaskSpecContainerSpecConfigsItem::class => false,
            \Docker\API\Model\TaskSpecContainerSpecConfigsItemFile::class => false,
            \Docker\API\Model\TaskSpecContainerSpecConfigsItemRuntime::class => false,
            \Docker\API\Model\TaskSpecContainerSpecUlimitsItem::class => false,
            \Docker\API\Model\TaskSpecNetworkAttachmentSpec::class => false,
            \Docker\API\Model\TaskSpecResources::class => false,
            \Docker\API\Model\TaskSpecRestartPolicy::class => false,
            \Docker\API\Model\TaskSpecPlacement::class => false,
            \Docker\API\Model\TaskSpecPlacementPreferencesItem::class => false,
            \Docker\API\Model\TaskSpecPlacementPreferencesItemSpread::class => false,
            \Docker\API\Model\TaskSpecLogDriver::class => false,
            \Docker\API\Model\ContainerStatus::class => false,
            \Docker\API\Model\PortStatus::class => false,
            \Docker\API\Model\TaskStatus::class => false,
            \Docker\API\Model\Task::class => false,
            \Docker\API\Model\ServiceSpec::class => false,
            \Docker\API\Model\ServiceSpecMode::class => false,
            \Docker\API\Model\ServiceSpecModeReplicated::class => false,
            \Docker\API\Model\ServiceSpecModeGlobal::class => false,
            \Docker\API\Model\ServiceSpecModeReplicatedJob::class => false,
            \Docker\API\Model\ServiceSpecModeGlobalJob::class => false,
            \Docker\API\Model\ServiceSpecUpdateConfig::class => false,
            \Docker\API\Model\ServiceSpecRollbackConfig::class => false,
            \Docker\API\Model\EndpointPortConfig::class => false,
            \Docker\API\Model\EndpointSpec::class => false,
            \Docker\API\Model\Service::class => false,
            \Docker\API\Model\ServiceEndpoint::class => false,
            \Docker\API\Model\ServiceEndpointVirtualIPsItem::class => false,
            \Docker\API\Model\ServiceUpdateStatus::class => false,
            \Docker\API\Model\ServiceServiceStatus::class => false,
            \Docker\API\Model\ServiceJobStatus::class => false,
            \Docker\API\Model\ImageDeleteResponseItem::class => false,
            \Docker\API\Model\ServiceCreateResponse::class => false,
            \Docker\API\Model\ServiceUpdateResponse::class => false,
            \Docker\API\Model\ContainerSummary::class => false,
            \Docker\API\Model\ContainerSummaryHostConfig::class => false,
            \Docker\API\Model\ContainerSummaryNetworkSettings::class => false,
            \Docker\API\Model\Driver::class => false,
            \Docker\API\Model\SecretSpec::class => false,
            \Docker\API\Model\Secret::class => false,
            \Docker\API\Model\ConfigSpec::class => false,
            \Docker\API\Model\Config::class => false,
            \Docker\API\Model\ContainerState::class => false,
            \Docker\API\Model\ContainerCreateResponse::class => false,
            \Docker\API\Model\ContainerWaitResponse::class => false,
            \Docker\API\Model\ContainerWaitExitError::class => false,
            \Docker\API\Model\SystemVersion::class => false,
            \Docker\API\Model\SystemVersionPlatform::class => false,
            \Docker\API\Model\SystemVersionComponentsItem::class => false,
            \Docker\API\Model\SystemVersionComponentsItemDetails::class => false,
            \Docker\API\Model\SystemInfo::class => false,
            \Docker\API\Model\SystemInfoDefaultAddressPoolsItem::class => false,
            \Docker\API\Model\PluginsInfo::class => false,
            \Docker\API\Model\RegistryServiceConfig::class => false,
            \Docker\API\Model\IndexInfo::class => false,
            \Docker\API\Model\Runtime::class => false,
            \Docker\API\Model\Commit::class => false,
            \Docker\API\Model\SwarmInfo::class => false,
            \Docker\API\Model\PeerNode::class => false,
            \Docker\API\Model\NetworkAttachmentConfig::class => false,
            \Docker\API\Model\EventActor::class => false,
            \Docker\API\Model\EventMessage::class => false,
            \Docker\API\Model\OCIDescriptor::class => false,
            \Docker\API\Model\OCIPlatform::class => false,
            \Docker\API\Model\DistributionInspect::class => false,
            \Docker\API\Model\ClusterVolume::class => false,
            \Docker\API\Model\ClusterVolumeInfo::class => false,
            \Docker\API\Model\ClusterVolumePublishStatusItem::class => false,
            \Docker\API\Model\ClusterVolumeSpec::class => false,
            \Docker\API\Model\ClusterVolumeSpecAccessMode::class => false,
            \Docker\API\Model\ClusterVolumeSpecAccessModeMountVolume::class => false,
            \Docker\API\Model\ClusterVolumeSpecAccessModeSecretsItem::class => false,
            \Docker\API\Model\ClusterVolumeSpecAccessModeAccessibilityRequirements::class => false,
            \Docker\API\Model\ClusterVolumeSpecAccessModeCapacityRange::class => false,
            \Docker\API\Model\ContainersCreatePostBody::class => false,
            \Docker\API\Model\ContainersIdJsonGetResponse200::class => false,
            \Docker\API\Model\ContainersIdTopGetJsonResponse200::class => false,
            \Docker\API\Model\ContainersIdTopGetTextplainResponse200::class => false,
            \Docker\API\Model\ContainersIdUpdatePostBody::class => false,
            \Docker\API\Model\ContainersIdUpdatePostResponse200::class => false,
            \Docker\API\Model\ContainersPrunePostResponse200::class => false,
            \Docker\API\Model\BuildPrunePostResponse200::class => false,
            \Docker\API\Model\ImagesNameHistoryGetResponse200Item::class => false,
            \Docker\API\Model\ImagesSearchGetResponse200Item::class => false,
            \Docker\API\Model\ImagesPrunePostResponse200::class => false,
            \Docker\API\Model\AuthPostResponse200::class => false,
            \Docker\API\Model\SystemDfGetJsonResponse200::class => false,
            \Docker\API\Model\SystemDfGetTextplainResponse200::class => false,
            \Docker\API\Model\ContainersIdExecPostBody::class => false,
            \Docker\API\Model\ExecIdStartPostBody::class => false,
            \Docker\API\Model\ExecIdJsonGetResponse200::class => false,
            \Docker\API\Model\VolumesNamePutBody::class => false,
            \Docker\API\Model\VolumesPrunePostResponse200::class => false,
            \Docker\API\Model\NetworksCreatePostBody::class => false,
            \Docker\API\Model\NetworksCreatePostResponse201::class => false,
            \Docker\API\Model\NetworksIdConnectPostBody::class => false,
            \Docker\API\Model\NetworksIdDisconnectPostBody::class => false,
            \Docker\API\Model\NetworksPrunePostResponse200::class => false,
            \Docker\API\Model\SwarmInitPostBody::class => false,
            \Docker\API\Model\SwarmJoinPostBody::class => false,
            \Docker\API\Model\SwarmUnlockkeyGetJsonResponse200::class => false,
            \Docker\API\Model\SwarmUnlockkeyGetTextplainResponse200::class => false,
            \Docker\API\Model\SwarmUnlockPostBody::class => false,
            \Docker\API\Model\ServicesCreatePostBody::class => false,
            \Docker\API\Model\ServicesIdUpdatePostBody::class => false,
            \Docker\API\Model\SecretsCreatePostBody::class => false,
            \Docker\API\Model\ConfigsCreatePostBody::class => false,
            \Jane\Component\JsonSchemaRuntime\Reference::class => false,
        ];
    }
}
