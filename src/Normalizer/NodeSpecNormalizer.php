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
    class NodeSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\NodeSpec' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\NodeSpec' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\NodeSpec();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Name', $data) && null !== $data['Name']) {
                $object->setName($data['Name']);
                unset($data['Name']);
            } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
                $object->setName(null);
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
            if (\array_key_exists('Role', $data) && null !== $data['Role']) {
                $object->setRole($data['Role']);
                unset($data['Role']);
            } elseif (\array_key_exists('Role', $data) && null === $data['Role']) {
                $object->setRole(null);
            }
            if (\array_key_exists('Availability', $data) && null !== $data['Availability']) {
                $object->setAvailability($data['Availability']);
                unset($data['Availability']);
            } elseif (\array_key_exists('Availability', $data) && null === $data['Availability']) {
                $object->setAvailability(null);
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
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('labels') && null !== $object->getLabels()) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('role') && null !== $object->getRole()) {
                $data['Role'] = $object->getRole();
            }
            if ($object->isInitialized('availability') && null !== $object->getAvailability()) {
                $data['Availability'] = $object->getAvailability();
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
            return ['Docker\\API\\Model\\NodeSpec' => false];
        }
    }
} else {
    class NodeSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\NodeSpec' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\NodeSpec' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\NodeSpec();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Name', $data) && null !== $data['Name']) {
                $object->setName($data['Name']);
                unset($data['Name']);
            } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
                $object->setName(null);
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
            if (\array_key_exists('Role', $data) && null !== $data['Role']) {
                $object->setRole($data['Role']);
                unset($data['Role']);
            } elseif (\array_key_exists('Role', $data) && null === $data['Role']) {
                $object->setRole(null);
            }
            if (\array_key_exists('Availability', $data) && null !== $data['Availability']) {
                $object->setAvailability($data['Availability']);
                unset($data['Availability']);
            } elseif (\array_key_exists('Availability', $data) && null === $data['Availability']) {
                $object->setAvailability(null);
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
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('labels') && null !== $object->getLabels()) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('role') && null !== $object->getRole()) {
                $data['Role'] = $object->getRole();
            }
            if ($object->isInitialized('availability') && null !== $object->getAvailability()) {
                $data['Availability'] = $object->getAvailability();
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
            return ['Docker\\API\\Model\\NodeSpec' => false];
        }
    }
}
