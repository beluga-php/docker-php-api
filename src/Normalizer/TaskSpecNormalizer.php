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

class TaskSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpec::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpec::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\TaskSpec();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('PluginSpec', $data) && null !== $data['PluginSpec']) {
            $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], \Docker\API\Model\TaskSpecPluginSpec::class, 'json', $context));
            unset($data['PluginSpec']);
        } elseif (\array_key_exists('PluginSpec', $data) && null === $data['PluginSpec']) {
            $object->setPluginSpec(null);
            unset($data['PluginSpec']);
        }
        if (\array_key_exists('ContainerSpec', $data) && null !== $data['ContainerSpec']) {
            $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], \Docker\API\Model\TaskSpecContainerSpec::class, 'json', $context));
            unset($data['ContainerSpec']);
        } elseif (\array_key_exists('ContainerSpec', $data) && null === $data['ContainerSpec']) {
            $object->setContainerSpec(null);
            unset($data['ContainerSpec']);
        }
        if (\array_key_exists('NetworkAttachmentSpec', $data) && null !== $data['NetworkAttachmentSpec']) {
            $object->setNetworkAttachmentSpec($this->denormalizer->denormalize($data['NetworkAttachmentSpec'], \Docker\API\Model\TaskSpecNetworkAttachmentSpec::class, 'json', $context));
            unset($data['NetworkAttachmentSpec']);
        } elseif (\array_key_exists('NetworkAttachmentSpec', $data) && null === $data['NetworkAttachmentSpec']) {
            $object->setNetworkAttachmentSpec(null);
            unset($data['NetworkAttachmentSpec']);
        }
        if (\array_key_exists('Resources', $data) && null !== $data['Resources']) {
            $object->setResources($this->denormalizer->denormalize($data['Resources'], \Docker\API\Model\TaskSpecResources::class, 'json', $context));
            unset($data['Resources']);
        } elseif (\array_key_exists('Resources', $data) && null === $data['Resources']) {
            $object->setResources(null);
            unset($data['Resources']);
        }
        if (\array_key_exists('RestartPolicy', $data) && null !== $data['RestartPolicy']) {
            $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], \Docker\API\Model\TaskSpecRestartPolicy::class, 'json', $context));
            unset($data['RestartPolicy']);
        } elseif (\array_key_exists('RestartPolicy', $data) && null === $data['RestartPolicy']) {
            $object->setRestartPolicy(null);
            unset($data['RestartPolicy']);
        }
        if (\array_key_exists('Placement', $data) && null !== $data['Placement']) {
            $object->setPlacement($this->denormalizer->denormalize($data['Placement'], \Docker\API\Model\TaskSpecPlacement::class, 'json', $context));
            unset($data['Placement']);
        } elseif (\array_key_exists('Placement', $data) && null === $data['Placement']) {
            $object->setPlacement(null);
            unset($data['Placement']);
        }
        if (\array_key_exists('ForceUpdate', $data) && null !== $data['ForceUpdate']) {
            $object->setForceUpdate($data['ForceUpdate']);
            unset($data['ForceUpdate']);
        } elseif (\array_key_exists('ForceUpdate', $data) && null === $data['ForceUpdate']) {
            $object->setForceUpdate(null);
            unset($data['ForceUpdate']);
        }
        if (\array_key_exists('Runtime', $data) && null !== $data['Runtime']) {
            $object->setRuntime($data['Runtime']);
            unset($data['Runtime']);
        } elseif (\array_key_exists('Runtime', $data) && null === $data['Runtime']) {
            $object->setRuntime(null);
            unset($data['Runtime']);
        }
        if (\array_key_exists('Networks', $data) && null !== $data['Networks']) {
            $values = [];
            foreach ($data['Networks'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\NetworkAttachmentConfig::class, 'json', $context);
            }
            $object->setNetworks($values);
            unset($data['Networks']);
        } elseif (\array_key_exists('Networks', $data) && null === $data['Networks']) {
            $object->setNetworks(null);
            unset($data['Networks']);
        }
        if (\array_key_exists('LogDriver', $data) && null !== $data['LogDriver']) {
            $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], \Docker\API\Model\TaskSpecLogDriver::class, 'json', $context));
            unset($data['LogDriver']);
        } elseif (\array_key_exists('LogDriver', $data) && null === $data['LogDriver']) {
            $object->setLogDriver(null);
            unset($data['LogDriver']);
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
        if ($data->isInitialized('pluginSpec') && null !== $data->getPluginSpec()) {
            $dataArray['PluginSpec'] = null === $data->getPluginSpec() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getPluginSpec(), 'json', $context));
        }
        if ($data->isInitialized('containerSpec') && null !== $data->getContainerSpec()) {
            $dataArray['ContainerSpec'] = null === $data->getContainerSpec() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getContainerSpec(), 'json', $context));
        }
        if ($data->isInitialized('networkAttachmentSpec') && null !== $data->getNetworkAttachmentSpec()) {
            $dataArray['NetworkAttachmentSpec'] = null === $data->getNetworkAttachmentSpec() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getNetworkAttachmentSpec(), 'json', $context));
        }
        if ($data->isInitialized('resources') && null !== $data->getResources()) {
            $dataArray['Resources'] = null === $data->getResources() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getResources(), 'json', $context));
        }
        if ($data->isInitialized('restartPolicy') && null !== $data->getRestartPolicy()) {
            $dataArray['RestartPolicy'] = null === $data->getRestartPolicy() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getRestartPolicy(), 'json', $context));
        }
        if ($data->isInitialized('placement') && null !== $data->getPlacement()) {
            $dataArray['Placement'] = null === $data->getPlacement() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getPlacement(), 'json', $context));
        }
        if ($data->isInitialized('forceUpdate') && null !== $data->getForceUpdate()) {
            $dataArray['ForceUpdate'] = $data->getForceUpdate();
        }
        if ($data->isInitialized('runtime') && null !== $data->getRuntime()) {
            $dataArray['Runtime'] = $data->getRuntime();
        }
        if ($data->isInitialized('networks') && null !== $data->getNetworks()) {
            $values = [];
            foreach ($data->getNetworks() as $value) {
                $values[] = null === $value ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['Networks'] = $values;
        }
        if ($data->isInitialized('logDriver') && null !== $data->getLogDriver()) {
            $dataArray['LogDriver'] = null === $data->getLogDriver() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getLogDriver(), 'json', $context));
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskSpec::class => false];
    }
}
