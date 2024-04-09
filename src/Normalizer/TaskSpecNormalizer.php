<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class TaskSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TaskSpec' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TaskSpec' === $data::class;
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
                $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], 'Docker\\API\\Model\\TaskSpecPluginSpec', 'json', $context));
                unset($data['PluginSpec']);
            } elseif (\array_key_exists('PluginSpec', $data) && null === $data['PluginSpec']) {
                $object->setPluginSpec(null);
            }
            if (\array_key_exists('ContainerSpec', $data) && null !== $data['ContainerSpec']) {
                $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], 'Docker\\API\\Model\\TaskSpecContainerSpec', 'json', $context));
                unset($data['ContainerSpec']);
            } elseif (\array_key_exists('ContainerSpec', $data) && null === $data['ContainerSpec']) {
                $object->setContainerSpec(null);
            }
            if (\array_key_exists('NetworkAttachmentSpec', $data) && null !== $data['NetworkAttachmentSpec']) {
                $object->setNetworkAttachmentSpec($this->denormalizer->denormalize($data['NetworkAttachmentSpec'], 'Docker\\API\\Model\\TaskSpecNetworkAttachmentSpec', 'json', $context));
                unset($data['NetworkAttachmentSpec']);
            } elseif (\array_key_exists('NetworkAttachmentSpec', $data) && null === $data['NetworkAttachmentSpec']) {
                $object->setNetworkAttachmentSpec(null);
            }
            if (\array_key_exists('Resources', $data) && null !== $data['Resources']) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Docker\\API\\Model\\TaskSpecResources', 'json', $context));
                unset($data['Resources']);
            } elseif (\array_key_exists('Resources', $data) && null === $data['Resources']) {
                $object->setResources(null);
            }
            if (\array_key_exists('RestartPolicy', $data) && null !== $data['RestartPolicy']) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\\API\\Model\\TaskSpecRestartPolicy', 'json', $context));
                unset($data['RestartPolicy']);
            } elseif (\array_key_exists('RestartPolicy', $data) && null === $data['RestartPolicy']) {
                $object->setRestartPolicy(null);
            }
            if (\array_key_exists('Placement', $data) && null !== $data['Placement']) {
                $object->setPlacement($this->denormalizer->denormalize($data['Placement'], 'Docker\\API\\Model\\TaskSpecPlacement', 'json', $context));
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
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\NetworkAttachmentConfig', 'json', $context);
                }
                $object->setNetworks($values);
                unset($data['Networks']);
            } elseif (\array_key_exists('Networks', $data) && null === $data['Networks']) {
                $object->setNetworks(null);
            }
            if (\array_key_exists('LogDriver', $data) && null !== $data['LogDriver']) {
                $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], 'Docker\\API\\Model\\TaskSpecLogDriver', 'json', $context));
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

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('pluginSpec') && null !== $object->getPluginSpec()) {
                $data['PluginSpec'] = $this->normalizer->normalize($object->getPluginSpec(), 'json', $context);
            }
            if ($object->isInitialized('containerSpec') && null !== $object->getContainerSpec()) {
                $data['ContainerSpec'] = $this->normalizer->normalize($object->getContainerSpec(), 'json', $context);
            }
            if ($object->isInitialized('networkAttachmentSpec') && null !== $object->getNetworkAttachmentSpec()) {
                $data['NetworkAttachmentSpec'] = $this->normalizer->normalize($object->getNetworkAttachmentSpec(), 'json', $context);
            }
            if ($object->isInitialized('resources') && null !== $object->getResources()) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('restartPolicy') && null !== $object->getRestartPolicy()) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            if ($object->isInitialized('placement') && null !== $object->getPlacement()) {
                $data['Placement'] = $this->normalizer->normalize($object->getPlacement(), 'json', $context);
            }
            if ($object->isInitialized('forceUpdate') && null !== $object->getForceUpdate()) {
                $data['ForceUpdate'] = $object->getForceUpdate();
            }
            if ($object->isInitialized('runtime') && null !== $object->getRuntime()) {
                $data['Runtime'] = $object->getRuntime();
            }
            if ($object->isInitialized('networks') && null !== $object->getNetworks()) {
                $values = [];
                foreach ($object->getNetworks() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Networks'] = $values;
            }
            if ($object->isInitialized('logDriver') && null !== $object->getLogDriver()) {
                $data['LogDriver'] = $this->normalizer->normalize($object->getLogDriver(), 'json', $context);
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\TaskSpec' => false];
        }
    }
} else {
    class TaskSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TaskSpec' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TaskSpec' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
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
                $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], 'Docker\\API\\Model\\TaskSpecPluginSpec', 'json', $context));
                unset($data['PluginSpec']);
            } elseif (\array_key_exists('PluginSpec', $data) && null === $data['PluginSpec']) {
                $object->setPluginSpec(null);
            }
            if (\array_key_exists('ContainerSpec', $data) && null !== $data['ContainerSpec']) {
                $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], 'Docker\\API\\Model\\TaskSpecContainerSpec', 'json', $context));
                unset($data['ContainerSpec']);
            } elseif (\array_key_exists('ContainerSpec', $data) && null === $data['ContainerSpec']) {
                $object->setContainerSpec(null);
            }
            if (\array_key_exists('NetworkAttachmentSpec', $data) && null !== $data['NetworkAttachmentSpec']) {
                $object->setNetworkAttachmentSpec($this->denormalizer->denormalize($data['NetworkAttachmentSpec'], 'Docker\\API\\Model\\TaskSpecNetworkAttachmentSpec', 'json', $context));
                unset($data['NetworkAttachmentSpec']);
            } elseif (\array_key_exists('NetworkAttachmentSpec', $data) && null === $data['NetworkAttachmentSpec']) {
                $object->setNetworkAttachmentSpec(null);
            }
            if (\array_key_exists('Resources', $data) && null !== $data['Resources']) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Docker\\API\\Model\\TaskSpecResources', 'json', $context));
                unset($data['Resources']);
            } elseif (\array_key_exists('Resources', $data) && null === $data['Resources']) {
                $object->setResources(null);
            }
            if (\array_key_exists('RestartPolicy', $data) && null !== $data['RestartPolicy']) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\\API\\Model\\TaskSpecRestartPolicy', 'json', $context));
                unset($data['RestartPolicy']);
            } elseif (\array_key_exists('RestartPolicy', $data) && null === $data['RestartPolicy']) {
                $object->setRestartPolicy(null);
            }
            if (\array_key_exists('Placement', $data) && null !== $data['Placement']) {
                $object->setPlacement($this->denormalizer->denormalize($data['Placement'], 'Docker\\API\\Model\\TaskSpecPlacement', 'json', $context));
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
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\NetworkAttachmentConfig', 'json', $context);
                }
                $object->setNetworks($values);
                unset($data['Networks']);
            } elseif (\array_key_exists('Networks', $data) && null === $data['Networks']) {
                $object->setNetworks(null);
            }
            if (\array_key_exists('LogDriver', $data) && null !== $data['LogDriver']) {
                $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], 'Docker\\API\\Model\\TaskSpecLogDriver', 'json', $context));
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

        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('pluginSpec') && null !== $object->getPluginSpec()) {
                $data['PluginSpec'] = $this->normalizer->normalize($object->getPluginSpec(), 'json', $context);
            }
            if ($object->isInitialized('containerSpec') && null !== $object->getContainerSpec()) {
                $data['ContainerSpec'] = $this->normalizer->normalize($object->getContainerSpec(), 'json', $context);
            }
            if ($object->isInitialized('networkAttachmentSpec') && null !== $object->getNetworkAttachmentSpec()) {
                $data['NetworkAttachmentSpec'] = $this->normalizer->normalize($object->getNetworkAttachmentSpec(), 'json', $context);
            }
            if ($object->isInitialized('resources') && null !== $object->getResources()) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('restartPolicy') && null !== $object->getRestartPolicy()) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            if ($object->isInitialized('placement') && null !== $object->getPlacement()) {
                $data['Placement'] = $this->normalizer->normalize($object->getPlacement(), 'json', $context);
            }
            if ($object->isInitialized('forceUpdate') && null !== $object->getForceUpdate()) {
                $data['ForceUpdate'] = $object->getForceUpdate();
            }
            if ($object->isInitialized('runtime') && null !== $object->getRuntime()) {
                $data['Runtime'] = $object->getRuntime();
            }
            if ($object->isInitialized('networks') && null !== $object->getNetworks()) {
                $values = [];
                foreach ($object->getNetworks() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Networks'] = $values;
            }
            if ($object->isInitialized('logDriver') && null !== $object->getLogDriver()) {
                $data['LogDriver'] = $this->normalizer->normalize($object->getLogDriver(), 'json', $context);
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\TaskSpec' => false];
        }
    }
}
