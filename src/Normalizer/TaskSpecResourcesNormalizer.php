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
    class TaskSpecResourcesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TaskSpecResources' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TaskSpecResources' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\TaskSpecResources();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Limits', $data) && null !== $data['Limits']) {
                $object->setLimits($this->denormalizer->denormalize($data['Limits'], 'Docker\\API\\Model\\Limit', 'json', $context));
                unset($data['Limits']);
            } elseif (\array_key_exists('Limits', $data) && null === $data['Limits']) {
                $object->setLimits(null);
            }
            if (\array_key_exists('Reservations', $data) && null !== $data['Reservations']) {
                $object->setReservations($this->denormalizer->denormalize($data['Reservations'], 'Docker\\API\\Model\\ResourceObject', 'json', $context));
                unset($data['Reservations']);
            } elseif (\array_key_exists('Reservations', $data) && null === $data['Reservations']) {
                $object->setReservations(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('limits') && null !== $object->getLimits()) {
                $data['Limits'] = $this->normalizer->normalize($object->getLimits(), 'json', $context);
            }
            if ($object->isInitialized('reservations') && null !== $object->getReservations()) {
                $data['Reservations'] = $this->normalizer->normalize($object->getReservations(), 'json', $context);
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\TaskSpecResources' => false];
        }
    }
} else {
    class TaskSpecResourcesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TaskSpecResources' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TaskSpecResources' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\TaskSpecResources();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Limits', $data) && null !== $data['Limits']) {
                $object->setLimits($this->denormalizer->denormalize($data['Limits'], 'Docker\\API\\Model\\Limit', 'json', $context));
                unset($data['Limits']);
            } elseif (\array_key_exists('Limits', $data) && null === $data['Limits']) {
                $object->setLimits(null);
            }
            if (\array_key_exists('Reservations', $data) && null !== $data['Reservations']) {
                $object->setReservations($this->denormalizer->denormalize($data['Reservations'], 'Docker\\API\\Model\\ResourceObject', 'json', $context));
                unset($data['Reservations']);
            } elseif (\array_key_exists('Reservations', $data) && null === $data['Reservations']) {
                $object->setReservations(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
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
            if ($object->isInitialized('limits') && null !== $object->getLimits()) {
                $data['Limits'] = $this->normalizer->normalize($object->getLimits(), 'json', $context);
            }
            if ($object->isInitialized('reservations') && null !== $object->getReservations()) {
                $data['Reservations'] = $this->normalizer->normalize($object->getReservations(), 'json', $context);
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\TaskSpecResources' => false];
        }
    }
}
