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
    class ImageInspectRootFSNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ImageInspectRootFS' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ImageInspectRootFS' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ImageInspectRootFS();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Type', $data) && null !== $data['Type']) {
                $object->setType($data['Type']);
                unset($data['Type']);
            } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
                $object->setType(null);
            }
            if (\array_key_exists('Layers', $data) && null !== $data['Layers']) {
                $values = [];
                foreach ($data['Layers'] as $value) {
                    $values[] = $value;
                }
                $object->setLayers($values);
                unset($data['Layers']);
            } elseif (\array_key_exists('Layers', $data) && null === $data['Layers']) {
                $object->setLayers(null);
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
            $data['Type'] = $object->getType();
            if ($object->isInitialized('layers') && null !== $object->getLayers()) {
                $values = [];
                foreach ($object->getLayers() as $value) {
                    $values[] = $value;
                }
                $data['Layers'] = $values;
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
            return ['Docker\\API\\Model\\ImageInspectRootFS' => false];
        }
    }
} else {
    class ImageInspectRootFSNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ImageInspectRootFS' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ImageInspectRootFS' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ImageInspectRootFS();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Type', $data) && null !== $data['Type']) {
                $object->setType($data['Type']);
                unset($data['Type']);
            } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
                $object->setType(null);
            }
            if (\array_key_exists('Layers', $data) && null !== $data['Layers']) {
                $values = [];
                foreach ($data['Layers'] as $value) {
                    $values[] = $value;
                }
                $object->setLayers($values);
                unset($data['Layers']);
            } elseif (\array_key_exists('Layers', $data) && null === $data['Layers']) {
                $object->setLayers(null);
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
            $data['Type'] = $object->getType();
            if ($object->isInitialized('layers') && null !== $object->getLayers()) {
                $values = [];
                foreach ($object->getLayers() as $value) {
                    $values[] = $value;
                }
                $data['Layers'] = $values;
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
            return ['Docker\\API\\Model\\ImageInspectRootFS' => false];
        }
    }
}
