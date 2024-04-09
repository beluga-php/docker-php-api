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
    class MountVolumeOptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\MountVolumeOptions' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\MountVolumeOptions' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\MountVolumeOptions();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('NoCopy', $data) && null !== $data['NoCopy']) {
                $object->setNoCopy($data['NoCopy']);
                unset($data['NoCopy']);
            } elseif (\array_key_exists('NoCopy', $data) && null === $data['NoCopy']) {
                $object->setNoCopy(null);
            }
            if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setLabels($values);
                unset($data['Labels']);
            } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
                $object->setLabels(null);
            }
            if (\array_key_exists('DriverConfig', $data) && null !== $data['DriverConfig']) {
                $object->setDriverConfig($this->denormalizer->denormalize($data['DriverConfig'], 'Docker\\API\\Model\\MountVolumeOptionsDriverConfig', 'json', $context));
                unset($data['DriverConfig']);
            } elseif (\array_key_exists('DriverConfig', $data) && null === $data['DriverConfig']) {
                $object->setDriverConfig(null);
            }
            foreach ($data as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_1;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('noCopy') && null !== $object->getNoCopy()) {
                $data['NoCopy'] = $object->getNoCopy();
            }
            if ($object->isInitialized('labels') && null !== $object->getLabels()) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('driverConfig') && null !== $object->getDriverConfig()) {
                $data['DriverConfig'] = $this->normalizer->normalize($object->getDriverConfig(), 'json', $context);
            }
            foreach ($object as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\MountVolumeOptions' => false];
        }
    }
} else {
    class MountVolumeOptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\MountVolumeOptions' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\MountVolumeOptions' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\MountVolumeOptions();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('NoCopy', $data) && null !== $data['NoCopy']) {
                $object->setNoCopy($data['NoCopy']);
                unset($data['NoCopy']);
            } elseif (\array_key_exists('NoCopy', $data) && null === $data['NoCopy']) {
                $object->setNoCopy(null);
            }
            if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setLabels($values);
                unset($data['Labels']);
            } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
                $object->setLabels(null);
            }
            if (\array_key_exists('DriverConfig', $data) && null !== $data['DriverConfig']) {
                $object->setDriverConfig($this->denormalizer->denormalize($data['DriverConfig'], 'Docker\\API\\Model\\MountVolumeOptionsDriverConfig', 'json', $context));
                unset($data['DriverConfig']);
            } elseif (\array_key_exists('DriverConfig', $data) && null === $data['DriverConfig']) {
                $object->setDriverConfig(null);
            }
            foreach ($data as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_1;
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
            if ($object->isInitialized('noCopy') && null !== $object->getNoCopy()) {
                $data['NoCopy'] = $object->getNoCopy();
            }
            if ($object->isInitialized('labels') && null !== $object->getLabels()) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('driverConfig') && null !== $object->getDriverConfig()) {
                $data['DriverConfig'] = $this->normalizer->normalize($object->getDriverConfig(), 'json', $context);
            }
            foreach ($object as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\MountVolumeOptions' => false];
        }
    }
}
