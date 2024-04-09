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
    class DistributionInspectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\DistributionInspect' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\DistributionInspect' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\DistributionInspect();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Descriptor', $data) && null !== $data['Descriptor']) {
                $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Docker\\API\\Model\\OCIDescriptor', 'json', $context));
                unset($data['Descriptor']);
            } elseif (\array_key_exists('Descriptor', $data) && null === $data['Descriptor']) {
                $object->setDescriptor(null);
            }
            if (\array_key_exists('Platforms', $data) && null !== $data['Platforms']) {
                $values = [];
                foreach ($data['Platforms'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\OCIPlatform', 'json', $context);
                }
                $object->setPlatforms($values);
                unset($data['Platforms']);
            } elseif (\array_key_exists('Platforms', $data) && null === $data['Platforms']) {
                $object->setPlatforms(null);
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
            $data['Descriptor'] = $this->normalizer->normalize($object->getDescriptor(), 'json', $context);
            $values = [];
            foreach ($object->getPlatforms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Platforms'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\DistributionInspect' => false];
        }
    }
} else {
    class DistributionInspectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\DistributionInspect' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\DistributionInspect' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\DistributionInspect();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Descriptor', $data) && null !== $data['Descriptor']) {
                $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Docker\\API\\Model\\OCIDescriptor', 'json', $context));
                unset($data['Descriptor']);
            } elseif (\array_key_exists('Descriptor', $data) && null === $data['Descriptor']) {
                $object->setDescriptor(null);
            }
            if (\array_key_exists('Platforms', $data) && null !== $data['Platforms']) {
                $values = [];
                foreach ($data['Platforms'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\OCIPlatform', 'json', $context);
                }
                $object->setPlatforms($values);
                unset($data['Platforms']);
            } elseif (\array_key_exists('Platforms', $data) && null === $data['Platforms']) {
                $object->setPlatforms(null);
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
            $data['Descriptor'] = $this->normalizer->normalize($object->getDescriptor(), 'json', $context);
            $values = [];
            foreach ($object->getPlatforms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Platforms'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\DistributionInspect' => false];
        }
    }
}
