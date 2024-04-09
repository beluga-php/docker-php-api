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
    class HealthConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\HealthConfig' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\HealthConfig' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\HealthConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Test', $data) && null !== $data['Test']) {
                $values = [];
                foreach ($data['Test'] as $value) {
                    $values[] = $value;
                }
                $object->setTest($values);
                unset($data['Test']);
            } elseif (\array_key_exists('Test', $data) && null === $data['Test']) {
                $object->setTest(null);
            }
            if (\array_key_exists('Interval', $data) && null !== $data['Interval']) {
                $object->setInterval($data['Interval']);
                unset($data['Interval']);
            } elseif (\array_key_exists('Interval', $data) && null === $data['Interval']) {
                $object->setInterval(null);
            }
            if (\array_key_exists('Timeout', $data) && null !== $data['Timeout']) {
                $object->setTimeout($data['Timeout']);
                unset($data['Timeout']);
            } elseif (\array_key_exists('Timeout', $data) && null === $data['Timeout']) {
                $object->setTimeout(null);
            }
            if (\array_key_exists('Retries', $data) && null !== $data['Retries']) {
                $object->setRetries($data['Retries']);
                unset($data['Retries']);
            } elseif (\array_key_exists('Retries', $data) && null === $data['Retries']) {
                $object->setRetries(null);
            }
            if (\array_key_exists('StartPeriod', $data) && null !== $data['StartPeriod']) {
                $object->setStartPeriod($data['StartPeriod']);
                unset($data['StartPeriod']);
            } elseif (\array_key_exists('StartPeriod', $data) && null === $data['StartPeriod']) {
                $object->setStartPeriod(null);
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
            if ($object->isInitialized('test') && null !== $object->getTest()) {
                $values = [];
                foreach ($object->getTest() as $value) {
                    $values[] = $value;
                }
                $data['Test'] = $values;
            }
            if ($object->isInitialized('interval') && null !== $object->getInterval()) {
                $data['Interval'] = $object->getInterval();
            }
            if ($object->isInitialized('timeout') && null !== $object->getTimeout()) {
                $data['Timeout'] = $object->getTimeout();
            }
            if ($object->isInitialized('retries') && null !== $object->getRetries()) {
                $data['Retries'] = $object->getRetries();
            }
            if ($object->isInitialized('startPeriod') && null !== $object->getStartPeriod()) {
                $data['StartPeriod'] = $object->getStartPeriod();
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
            return ['Docker\\API\\Model\\HealthConfig' => false];
        }
    }
} else {
    class HealthConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\HealthConfig' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\HealthConfig' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\HealthConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Test', $data) && null !== $data['Test']) {
                $values = [];
                foreach ($data['Test'] as $value) {
                    $values[] = $value;
                }
                $object->setTest($values);
                unset($data['Test']);
            } elseif (\array_key_exists('Test', $data) && null === $data['Test']) {
                $object->setTest(null);
            }
            if (\array_key_exists('Interval', $data) && null !== $data['Interval']) {
                $object->setInterval($data['Interval']);
                unset($data['Interval']);
            } elseif (\array_key_exists('Interval', $data) && null === $data['Interval']) {
                $object->setInterval(null);
            }
            if (\array_key_exists('Timeout', $data) && null !== $data['Timeout']) {
                $object->setTimeout($data['Timeout']);
                unset($data['Timeout']);
            } elseif (\array_key_exists('Timeout', $data) && null === $data['Timeout']) {
                $object->setTimeout(null);
            }
            if (\array_key_exists('Retries', $data) && null !== $data['Retries']) {
                $object->setRetries($data['Retries']);
                unset($data['Retries']);
            } elseif (\array_key_exists('Retries', $data) && null === $data['Retries']) {
                $object->setRetries(null);
            }
            if (\array_key_exists('StartPeriod', $data) && null !== $data['StartPeriod']) {
                $object->setStartPeriod($data['StartPeriod']);
                unset($data['StartPeriod']);
            } elseif (\array_key_exists('StartPeriod', $data) && null === $data['StartPeriod']) {
                $object->setStartPeriod(null);
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
            if ($object->isInitialized('test') && null !== $object->getTest()) {
                $values = [];
                foreach ($object->getTest() as $value) {
                    $values[] = $value;
                }
                $data['Test'] = $values;
            }
            if ($object->isInitialized('interval') && null !== $object->getInterval()) {
                $data['Interval'] = $object->getInterval();
            }
            if ($object->isInitialized('timeout') && null !== $object->getTimeout()) {
                $data['Timeout'] = $object->getTimeout();
            }
            if ($object->isInitialized('retries') && null !== $object->getRetries()) {
                $data['Retries'] = $object->getRetries();
            }
            if ($object->isInitialized('startPeriod') && null !== $object->getStartPeriod()) {
                $data['StartPeriod'] = $object->getStartPeriod();
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
            return ['Docker\\API\\Model\\HealthConfig' => false];
        }
    }
}
