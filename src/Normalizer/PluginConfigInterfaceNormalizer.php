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
    class PluginConfigInterfaceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\PluginConfigInterface' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\PluginConfigInterface' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\PluginConfigInterface();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Types', $data) && null !== $data['Types']) {
                $values = [];
                foreach ($data['Types'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\PluginInterfaceType', 'json', $context);
                }
                $object->setTypes($values);
                unset($data['Types']);
            } elseif (\array_key_exists('Types', $data) && null === $data['Types']) {
                $object->setTypes(null);
            }
            if (\array_key_exists('Socket', $data) && null !== $data['Socket']) {
                $object->setSocket($data['Socket']);
                unset($data['Socket']);
            } elseif (\array_key_exists('Socket', $data) && null === $data['Socket']) {
                $object->setSocket(null);
            }
            if (\array_key_exists('ProtocolScheme', $data) && null !== $data['ProtocolScheme']) {
                $object->setProtocolScheme($data['ProtocolScheme']);
                unset($data['ProtocolScheme']);
            } elseif (\array_key_exists('ProtocolScheme', $data) && null === $data['ProtocolScheme']) {
                $object->setProtocolScheme(null);
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
            $values = [];
            foreach ($object->getTypes() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Types'] = $values;
            $data['Socket'] = $object->getSocket();
            if ($object->isInitialized('protocolScheme') && null !== $object->getProtocolScheme()) {
                $data['ProtocolScheme'] = $object->getProtocolScheme();
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
            return ['Docker\\API\\Model\\PluginConfigInterface' => false];
        }
    }
} else {
    class PluginConfigInterfaceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\PluginConfigInterface' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\PluginConfigInterface' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\PluginConfigInterface();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Types', $data) && null !== $data['Types']) {
                $values = [];
                foreach ($data['Types'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\PluginInterfaceType', 'json', $context);
                }
                $object->setTypes($values);
                unset($data['Types']);
            } elseif (\array_key_exists('Types', $data) && null === $data['Types']) {
                $object->setTypes(null);
            }
            if (\array_key_exists('Socket', $data) && null !== $data['Socket']) {
                $object->setSocket($data['Socket']);
                unset($data['Socket']);
            } elseif (\array_key_exists('Socket', $data) && null === $data['Socket']) {
                $object->setSocket(null);
            }
            if (\array_key_exists('ProtocolScheme', $data) && null !== $data['ProtocolScheme']) {
                $object->setProtocolScheme($data['ProtocolScheme']);
                unset($data['ProtocolScheme']);
            } elseif (\array_key_exists('ProtocolScheme', $data) && null === $data['ProtocolScheme']) {
                $object->setProtocolScheme(null);
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
            $values = [];
            foreach ($object->getTypes() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Types'] = $values;
            $data['Socket'] = $object->getSocket();
            if ($object->isInitialized('protocolScheme') && null !== $object->getProtocolScheme()) {
                $data['ProtocolScheme'] = $object->getProtocolScheme();
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
            return ['Docker\\API\\Model\\PluginConfigInterface' => false];
        }
    }
}
