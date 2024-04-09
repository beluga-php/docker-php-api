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
    class ServiceEndpointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ServiceEndpoint' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ServiceEndpoint' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ServiceEndpoint();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Spec', $data) && null !== $data['Spec']) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\\API\\Model\\EndpointSpec', 'json', $context));
                unset($data['Spec']);
            } elseif (\array_key_exists('Spec', $data) && null === $data['Spec']) {
                $object->setSpec(null);
            }
            if (\array_key_exists('Ports', $data) && null !== $data['Ports']) {
                $values = [];
                foreach ($data['Ports'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\EndpointPortConfig', 'json', $context);
                }
                $object->setPorts($values);
                unset($data['Ports']);
            } elseif (\array_key_exists('Ports', $data) && null === $data['Ports']) {
                $object->setPorts(null);
            }
            if (\array_key_exists('VirtualIPs', $data) && null !== $data['VirtualIPs']) {
                $values_1 = [];
                foreach ($data['VirtualIPs'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\ServiceEndpointVirtualIPsItem', 'json', $context);
                }
                $object->setVirtualIPs($values_1);
                unset($data['VirtualIPs']);
            } elseif (\array_key_exists('VirtualIPs', $data) && null === $data['VirtualIPs']) {
                $object->setVirtualIPs(null);
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
            if ($object->isInitialized('spec') && null !== $object->getSpec()) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('ports') && null !== $object->getPorts()) {
                $values = [];
                foreach ($object->getPorts() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Ports'] = $values;
            }
            if ($object->isInitialized('virtualIPs') && null !== $object->getVirtualIPs()) {
                $values_1 = [];
                foreach ($object->getVirtualIPs() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['VirtualIPs'] = $values_1;
            }
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\ServiceEndpoint' => false];
        }
    }
} else {
    class ServiceEndpointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ServiceEndpoint' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ServiceEndpoint' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ServiceEndpoint();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Spec', $data) && null !== $data['Spec']) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\\API\\Model\\EndpointSpec', 'json', $context));
                unset($data['Spec']);
            } elseif (\array_key_exists('Spec', $data) && null === $data['Spec']) {
                $object->setSpec(null);
            }
            if (\array_key_exists('Ports', $data) && null !== $data['Ports']) {
                $values = [];
                foreach ($data['Ports'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\EndpointPortConfig', 'json', $context);
                }
                $object->setPorts($values);
                unset($data['Ports']);
            } elseif (\array_key_exists('Ports', $data) && null === $data['Ports']) {
                $object->setPorts(null);
            }
            if (\array_key_exists('VirtualIPs', $data) && null !== $data['VirtualIPs']) {
                $values_1 = [];
                foreach ($data['VirtualIPs'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\ServiceEndpointVirtualIPsItem', 'json', $context);
                }
                $object->setVirtualIPs($values_1);
                unset($data['VirtualIPs']);
            } elseif (\array_key_exists('VirtualIPs', $data) && null === $data['VirtualIPs']) {
                $object->setVirtualIPs(null);
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
            if ($object->isInitialized('spec') && null !== $object->getSpec()) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('ports') && null !== $object->getPorts()) {
                $values = [];
                foreach ($object->getPorts() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Ports'] = $values;
            }
            if ($object->isInitialized('virtualIPs') && null !== $object->getVirtualIPs()) {
                $values_1 = [];
                foreach ($object->getVirtualIPs() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['VirtualIPs'] = $values_1;
            }
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\ServiceEndpoint' => false];
        }
    }
}
