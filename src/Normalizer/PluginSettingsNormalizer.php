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
    class PluginSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\PluginSettings' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\PluginSettings' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\PluginSettings();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Mounts', $data) && null !== $data['Mounts']) {
                $values = [];
                foreach ($data['Mounts'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\PluginMount', 'json', $context);
                }
                $object->setMounts($values);
                unset($data['Mounts']);
            } elseif (\array_key_exists('Mounts', $data) && null === $data['Mounts']) {
                $object->setMounts(null);
            }
            if (\array_key_exists('Env', $data) && null !== $data['Env']) {
                $values_1 = [];
                foreach ($data['Env'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setEnv($values_1);
                unset($data['Env']);
            } elseif (\array_key_exists('Env', $data) && null === $data['Env']) {
                $object->setEnv(null);
            }
            if (\array_key_exists('Args', $data) && null !== $data['Args']) {
                $values_2 = [];
                foreach ($data['Args'] as $value_2) {
                    $values_2[] = $value_2;
                }
                $object->setArgs($values_2);
                unset($data['Args']);
            } elseif (\array_key_exists('Args', $data) && null === $data['Args']) {
                $object->setArgs(null);
            }
            if (\array_key_exists('Devices', $data) && null !== $data['Devices']) {
                $values_3 = [];
                foreach ($data['Devices'] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\PluginDevice', 'json', $context);
                }
                $object->setDevices($values_3);
                unset($data['Devices']);
            } elseif (\array_key_exists('Devices', $data) && null === $data['Devices']) {
                $object->setDevices(null);
            }
            foreach ($data as $key => $value_4) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_4;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $values = [];
            foreach ($object->getMounts() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Mounts'] = $values;
            $values_1 = [];
            foreach ($object->getEnv() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Env'] = $values_1;
            $values_2 = [];
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
            $values_3 = [];
            foreach ($object->getDevices() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Devices'] = $values_3;
            foreach ($object as $key => $value_4) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_4;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\PluginSettings' => false];
        }
    }
} else {
    class PluginSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\PluginSettings' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\PluginSettings' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\PluginSettings();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Mounts', $data) && null !== $data['Mounts']) {
                $values = [];
                foreach ($data['Mounts'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\PluginMount', 'json', $context);
                }
                $object->setMounts($values);
                unset($data['Mounts']);
            } elseif (\array_key_exists('Mounts', $data) && null === $data['Mounts']) {
                $object->setMounts(null);
            }
            if (\array_key_exists('Env', $data) && null !== $data['Env']) {
                $values_1 = [];
                foreach ($data['Env'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setEnv($values_1);
                unset($data['Env']);
            } elseif (\array_key_exists('Env', $data) && null === $data['Env']) {
                $object->setEnv(null);
            }
            if (\array_key_exists('Args', $data) && null !== $data['Args']) {
                $values_2 = [];
                foreach ($data['Args'] as $value_2) {
                    $values_2[] = $value_2;
                }
                $object->setArgs($values_2);
                unset($data['Args']);
            } elseif (\array_key_exists('Args', $data) && null === $data['Args']) {
                $object->setArgs(null);
            }
            if (\array_key_exists('Devices', $data) && null !== $data['Devices']) {
                $values_3 = [];
                foreach ($data['Devices'] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\PluginDevice', 'json', $context);
                }
                $object->setDevices($values_3);
                unset($data['Devices']);
            } elseif (\array_key_exists('Devices', $data) && null === $data['Devices']) {
                $object->setDevices(null);
            }
            foreach ($data as $key => $value_4) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_4;
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
            $values = [];
            foreach ($object->getMounts() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Mounts'] = $values;
            $values_1 = [];
            foreach ($object->getEnv() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Env'] = $values_1;
            $values_2 = [];
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
            $values_3 = [];
            foreach ($object->getDevices() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Devices'] = $values_3;
            foreach ($object as $key => $value_4) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_4;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\PluginSettings' => false];
        }
    }
}
