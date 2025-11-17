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
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpec();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('PluginSpec', $data) && null !== $data['PluginSpec']) {
            $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], \Docker\API\Model\TaskSpecPluginSpec::class, 'json', $context));
            unset($data['PluginSpec']);
        } elseif (\array_key_exists('PluginSpec', $data) && null === $data['PluginSpec']) {
            $object->setPluginSpec(null);
        }
        if (\array_key_exists('ContainerSpec', $data) && null !== $data['ContainerSpec']) {
            $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], \Docker\API\Model\TaskSpecContainerSpec::class, 'json', $context));
            unset($data['ContainerSpec']);
        } elseif (\array_key_exists('ContainerSpec', $data) && null === $data['ContainerSpec']) {
            $object->setContainerSpec(null);
        }
        if (\array_key_exists('NetworkAttachmentSpec', $data) && null !== $data['NetworkAttachmentSpec']) {
            $object->setNetworkAttachmentSpec($this->denormalizer->denormalize($data['NetworkAttachmentSpec'], \Docker\API\Model\TaskSpecNetworkAttachmentSpec::class, 'json', $context));
            unset($data['NetworkAttachmentSpec']);
        } elseif (\array_key_exists('NetworkAttachmentSpec', $data) && null === $data['NetworkAttachmentSpec']) {
            $object->setNetworkAttachmentSpec(null);
        }
        if (\array_key_exists('Resources', $data) && null !== $data['Resources']) {
            $object->setResources($this->denormalizer->denormalize($data['Resources'], \Docker\API\Model\TaskSpecResources::class, 'json', $context));
            unset($data['Resources']);
        } elseif (\array_key_exists('Resources', $data) && null === $data['Resources']) {
            $object->setResources(null);
        }
        if (\array_key_exists('RestartPolicy', $data) && null !== $data['RestartPolicy']) {
            $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], \Docker\API\Model\TaskSpecRestartPolicy::class, 'json', $context));
            unset($data['RestartPolicy']);
        } elseif (\array_key_exists('RestartPolicy', $data) && null === $data['RestartPolicy']) {
            $object->setRestartPolicy(null);
        }
        if (\array_key_exists('Placement', $data) && null !== $data['Placement']) {
            $object->setPlacement($this->denormalizer->denormalize($data['Placement'], \Docker\API\Model\TaskSpecPlacement::class, 'json', $context));
            unset($data['Placement']);
        } elseif (\array_key_exists('Placement', $data) && null === $data['Placement']) {
            $object->setPlacement(null);
        }
        if (\array_key_exists('ForceUpdate', $data) && null !== $data['ForceUpdate']) {
            $object->setForceUpdate($data['ForceUpdate']);
            unset($data['ForceUpdate']);
        } elseif (\array_key_exists('ForceUpdate', $data) && null === $data['ForceUpdate']) {
            $object->setForceUpdate(null);
        }
        if (\array_key_exists('Runtime', $data) && null !== $data['Runtime']) {
            $object->setRuntime($data['Runtime']);
            unset($data['Runtime']);
        } elseif (\array_key_exists('Runtime', $data) && null === $data['Runtime']) {
            $object->setRuntime(null);
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
        }
        if (\array_key_exists('LogDriver', $data) && null !== $data['LogDriver']) {
            $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], \Docker\API\Model\TaskSpecLogDriver::class, 'json', $context));
            unset($data['LogDriver']);
        } elseif (\array_key_exists('LogDriver', $data) && null === $data['LogDriver']) {
            $object->setLogDriver(null);
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
            $dataArray['PluginSpec'] = $this->normalizer->normalize($data->getPluginSpec(), 'json', $context);
        }
        if ($data->isInitialized('containerSpec') && null !== $data->getContainerSpec()) {
            $dataArray['ContainerSpec'] = $this->normalizer->normalize($data->getContainerSpec(), 'json', $context);
        }
        if ($data->isInitialized('networkAttachmentSpec') && null !== $data->getNetworkAttachmentSpec()) {
            $dataArray['NetworkAttachmentSpec'] = $this->normalizer->normalize($data->getNetworkAttachmentSpec(), 'json', $context);
        }
        if ($data->isInitialized('resources') && null !== $data->getResources()) {
            $dataArray['Resources'] = $this->normalizer->normalize($data->getResources(), 'json', $context);
        }
        if ($data->isInitialized('restartPolicy') && null !== $data->getRestartPolicy()) {
            $dataArray['RestartPolicy'] = $this->normalizer->normalize($data->getRestartPolicy(), 'json', $context);
        }
        if ($data->isInitialized('placement') && null !== $data->getPlacement()) {
            $dataArray['Placement'] = $this->normalizer->normalize($data->getPlacement(), 'json', $context);
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
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Networks'] = $values;
        }
        if ($data->isInitialized('logDriver') && null !== $data->getLogDriver()) {
            $dataArray['LogDriver'] = $this->normalizer->normalize($data->getLogDriver(), 'json', $context);
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
        return [\Docker\API\Model\TaskSpec::class => false];
    }
}
