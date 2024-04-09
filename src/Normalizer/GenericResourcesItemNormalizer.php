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
    class GenericResourcesItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\GenericResourcesItem' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\GenericResourcesItem' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\GenericResourcesItem();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('NamedResourceSpec', $data) && null !== $data['NamedResourceSpec']) {
                $object->setNamedResourceSpec($this->denormalizer->denormalize($data['NamedResourceSpec'], 'Docker\\API\\Model\\GenericResourcesItemNamedResourceSpec', 'json', $context));
                unset($data['NamedResourceSpec']);
            } elseif (\array_key_exists('NamedResourceSpec', $data) && null === $data['NamedResourceSpec']) {
                $object->setNamedResourceSpec(null);
            }
            if (\array_key_exists('DiscreteResourceSpec', $data) && null !== $data['DiscreteResourceSpec']) {
                $object->setDiscreteResourceSpec($this->denormalizer->denormalize($data['DiscreteResourceSpec'], 'Docker\\API\\Model\\GenericResourcesItemDiscreteResourceSpec', 'json', $context));
                unset($data['DiscreteResourceSpec']);
            } elseif (\array_key_exists('DiscreteResourceSpec', $data) && null === $data['DiscreteResourceSpec']) {
                $object->setDiscreteResourceSpec(null);
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
            if ($object->isInitialized('namedResourceSpec') && null !== $object->getNamedResourceSpec()) {
                $data['NamedResourceSpec'] = $this->normalizer->normalize($object->getNamedResourceSpec(), 'json', $context);
            }
            if ($object->isInitialized('discreteResourceSpec') && null !== $object->getDiscreteResourceSpec()) {
                $data['DiscreteResourceSpec'] = $this->normalizer->normalize($object->getDiscreteResourceSpec(), 'json', $context);
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
            return ['Docker\\API\\Model\\GenericResourcesItem' => false];
        }
    }
} else {
    class GenericResourcesItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\GenericResourcesItem' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\GenericResourcesItem' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\GenericResourcesItem();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('NamedResourceSpec', $data) && null !== $data['NamedResourceSpec']) {
                $object->setNamedResourceSpec($this->denormalizer->denormalize($data['NamedResourceSpec'], 'Docker\\API\\Model\\GenericResourcesItemNamedResourceSpec', 'json', $context));
                unset($data['NamedResourceSpec']);
            } elseif (\array_key_exists('NamedResourceSpec', $data) && null === $data['NamedResourceSpec']) {
                $object->setNamedResourceSpec(null);
            }
            if (\array_key_exists('DiscreteResourceSpec', $data) && null !== $data['DiscreteResourceSpec']) {
                $object->setDiscreteResourceSpec($this->denormalizer->denormalize($data['DiscreteResourceSpec'], 'Docker\\API\\Model\\GenericResourcesItemDiscreteResourceSpec', 'json', $context));
                unset($data['DiscreteResourceSpec']);
            } elseif (\array_key_exists('DiscreteResourceSpec', $data) && null === $data['DiscreteResourceSpec']) {
                $object->setDiscreteResourceSpec(null);
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
            if ($object->isInitialized('namedResourceSpec') && null !== $object->getNamedResourceSpec()) {
                $data['NamedResourceSpec'] = $this->normalizer->normalize($object->getNamedResourceSpec(), 'json', $context);
            }
            if ($object->isInitialized('discreteResourceSpec') && null !== $object->getDiscreteResourceSpec()) {
                $data['DiscreteResourceSpec'] = $this->normalizer->normalize($object->getDiscreteResourceSpec(), 'json', $context);
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
            return ['Docker\\API\\Model\\GenericResourcesItem' => false];
        }
    }
}
