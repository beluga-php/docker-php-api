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
    class ServiceUpdateStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ServiceUpdateStatus' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ServiceUpdateStatus' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ServiceUpdateStatus();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('State', $data) && null !== $data['State']) {
                $object->setState($data['State']);
                unset($data['State']);
            } elseif (\array_key_exists('State', $data) && null === $data['State']) {
                $object->setState(null);
            }
            if (\array_key_exists('StartedAt', $data) && null !== $data['StartedAt']) {
                $object->setStartedAt($data['StartedAt']);
                unset($data['StartedAt']);
            } elseif (\array_key_exists('StartedAt', $data) && null === $data['StartedAt']) {
                $object->setStartedAt(null);
            }
            if (\array_key_exists('CompletedAt', $data) && null !== $data['CompletedAt']) {
                $object->setCompletedAt($data['CompletedAt']);
                unset($data['CompletedAt']);
            } elseif (\array_key_exists('CompletedAt', $data) && null === $data['CompletedAt']) {
                $object->setCompletedAt(null);
            }
            if (\array_key_exists('Message', $data) && null !== $data['Message']) {
                $object->setMessage($data['Message']);
                unset($data['Message']);
            } elseif (\array_key_exists('Message', $data) && null === $data['Message']) {
                $object->setMessage(null);
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
            if ($object->isInitialized('state') && null !== $object->getState()) {
                $data['State'] = $object->getState();
            }
            if ($object->isInitialized('startedAt') && null !== $object->getStartedAt()) {
                $data['StartedAt'] = $object->getStartedAt();
            }
            if ($object->isInitialized('completedAt') && null !== $object->getCompletedAt()) {
                $data['CompletedAt'] = $object->getCompletedAt();
            }
            if ($object->isInitialized('message') && null !== $object->getMessage()) {
                $data['Message'] = $object->getMessage();
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
            return ['Docker\\API\\Model\\ServiceUpdateStatus' => false];
        }
    }
} else {
    class ServiceUpdateStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ServiceUpdateStatus' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ServiceUpdateStatus' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ServiceUpdateStatus();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('State', $data) && null !== $data['State']) {
                $object->setState($data['State']);
                unset($data['State']);
            } elseif (\array_key_exists('State', $data) && null === $data['State']) {
                $object->setState(null);
            }
            if (\array_key_exists('StartedAt', $data) && null !== $data['StartedAt']) {
                $object->setStartedAt($data['StartedAt']);
                unset($data['StartedAt']);
            } elseif (\array_key_exists('StartedAt', $data) && null === $data['StartedAt']) {
                $object->setStartedAt(null);
            }
            if (\array_key_exists('CompletedAt', $data) && null !== $data['CompletedAt']) {
                $object->setCompletedAt($data['CompletedAt']);
                unset($data['CompletedAt']);
            } elseif (\array_key_exists('CompletedAt', $data) && null === $data['CompletedAt']) {
                $object->setCompletedAt(null);
            }
            if (\array_key_exists('Message', $data) && null !== $data['Message']) {
                $object->setMessage($data['Message']);
                unset($data['Message']);
            } elseif (\array_key_exists('Message', $data) && null === $data['Message']) {
                $object->setMessage(null);
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
            if ($object->isInitialized('state') && null !== $object->getState()) {
                $data['State'] = $object->getState();
            }
            if ($object->isInitialized('startedAt') && null !== $object->getStartedAt()) {
                $data['StartedAt'] = $object->getStartedAt();
            }
            if ($object->isInitialized('completedAt') && null !== $object->getCompletedAt()) {
                $data['CompletedAt'] = $object->getCompletedAt();
            }
            if ($object->isInitialized('message') && null !== $object->getMessage()) {
                $data['Message'] = $object->getMessage();
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
            return ['Docker\\API\\Model\\ServiceUpdateStatus' => false];
        }
    }
}
