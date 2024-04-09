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
    class PluginMountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\PluginMount' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\PluginMount' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\PluginMount();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Name', $data) && null !== $data['Name']) {
                $object->setName($data['Name']);
                unset($data['Name']);
            } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
                $object->setName(null);
            }
            if (\array_key_exists('Description', $data) && null !== $data['Description']) {
                $object->setDescription($data['Description']);
                unset($data['Description']);
            } elseif (\array_key_exists('Description', $data) && null === $data['Description']) {
                $object->setDescription(null);
            }
            if (\array_key_exists('Settable', $data) && null !== $data['Settable']) {
                $values = [];
                foreach ($data['Settable'] as $value) {
                    $values[] = $value;
                }
                $object->setSettable($values);
                unset($data['Settable']);
            } elseif (\array_key_exists('Settable', $data) && null === $data['Settable']) {
                $object->setSettable(null);
            }
            if (\array_key_exists('Source', $data) && null !== $data['Source']) {
                $object->setSource($data['Source']);
                unset($data['Source']);
            } elseif (\array_key_exists('Source', $data) && null === $data['Source']) {
                $object->setSource(null);
            }
            if (\array_key_exists('Destination', $data) && null !== $data['Destination']) {
                $object->setDestination($data['Destination']);
                unset($data['Destination']);
            } elseif (\array_key_exists('Destination', $data) && null === $data['Destination']) {
                $object->setDestination(null);
            }
            if (\array_key_exists('Type', $data) && null !== $data['Type']) {
                $object->setType($data['Type']);
                unset($data['Type']);
            } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
                $object->setType(null);
            }
            if (\array_key_exists('Options', $data) && null !== $data['Options']) {
                $values_1 = [];
                foreach ($data['Options'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setOptions($values_1);
                unset($data['Options']);
            } elseif (\array_key_exists('Options', $data) && null === $data['Options']) {
                $object->setOptions(null);
            }
            foreach ($data as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_2;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['Name'] = $object->getName();
            $data['Description'] = $object->getDescription();
            $values = [];
            foreach ($object->getSettable() as $value) {
                $values[] = $value;
            }
            $data['Settable'] = $values;
            $data['Source'] = $object->getSource();
            $data['Destination'] = $object->getDestination();
            $data['Type'] = $object->getType();
            $values_1 = [];
            foreach ($object->getOptions() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Options'] = $values_1;
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\PluginMount' => false];
        }
    }
} else {
    class PluginMountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\PluginMount' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\PluginMount' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\PluginMount();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Name', $data) && null !== $data['Name']) {
                $object->setName($data['Name']);
                unset($data['Name']);
            } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
                $object->setName(null);
            }
            if (\array_key_exists('Description', $data) && null !== $data['Description']) {
                $object->setDescription($data['Description']);
                unset($data['Description']);
            } elseif (\array_key_exists('Description', $data) && null === $data['Description']) {
                $object->setDescription(null);
            }
            if (\array_key_exists('Settable', $data) && null !== $data['Settable']) {
                $values = [];
                foreach ($data['Settable'] as $value) {
                    $values[] = $value;
                }
                $object->setSettable($values);
                unset($data['Settable']);
            } elseif (\array_key_exists('Settable', $data) && null === $data['Settable']) {
                $object->setSettable(null);
            }
            if (\array_key_exists('Source', $data) && null !== $data['Source']) {
                $object->setSource($data['Source']);
                unset($data['Source']);
            } elseif (\array_key_exists('Source', $data) && null === $data['Source']) {
                $object->setSource(null);
            }
            if (\array_key_exists('Destination', $data) && null !== $data['Destination']) {
                $object->setDestination($data['Destination']);
                unset($data['Destination']);
            } elseif (\array_key_exists('Destination', $data) && null === $data['Destination']) {
                $object->setDestination(null);
            }
            if (\array_key_exists('Type', $data) && null !== $data['Type']) {
                $object->setType($data['Type']);
                unset($data['Type']);
            } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
                $object->setType(null);
            }
            if (\array_key_exists('Options', $data) && null !== $data['Options']) {
                $values_1 = [];
                foreach ($data['Options'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setOptions($values_1);
                unset($data['Options']);
            } elseif (\array_key_exists('Options', $data) && null === $data['Options']) {
                $object->setOptions(null);
            }
            foreach ($data as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_2;
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
            $data['Name'] = $object->getName();
            $data['Description'] = $object->getDescription();
            $values = [];
            foreach ($object->getSettable() as $value) {
                $values[] = $value;
            }
            $data['Settable'] = $values;
            $data['Source'] = $object->getSource();
            $data['Destination'] = $object->getDestination();
            $data['Type'] = $object->getType();
            $values_1 = [];
            foreach ($object->getOptions() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Options'] = $values_1;
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\PluginMount' => false];
        }
    }
}
