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
    class NetworksIdConnectPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\NetworksIdConnectPostBody' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\NetworksIdConnectPostBody' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\NetworksIdConnectPostBody();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Container', $data) && null !== $data['Container']) {
                $object->setContainer($data['Container']);
                unset($data['Container']);
            } elseif (\array_key_exists('Container', $data) && null === $data['Container']) {
                $object->setContainer(null);
            }
            if (\array_key_exists('EndpointConfig', $data) && null !== $data['EndpointConfig']) {
                $object->setEndpointConfig($this->denormalizer->denormalize($data['EndpointConfig'], 'Docker\\API\\Model\\EndpointSettings', 'json', $context));
                unset($data['EndpointConfig']);
            } elseif (\array_key_exists('EndpointConfig', $data) && null === $data['EndpointConfig']) {
                $object->setEndpointConfig(null);
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
            if ($object->isInitialized('container') && null !== $object->getContainer()) {
                $data['Container'] = $object->getContainer();
            }
            if ($object->isInitialized('endpointConfig') && null !== $object->getEndpointConfig()) {
                $data['EndpointConfig'] = $this->normalizer->normalize($object->getEndpointConfig(), 'json', $context);
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
            return ['Docker\\API\\Model\\NetworksIdConnectPostBody' => false];
        }
    }
} else {
    class NetworksIdConnectPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\NetworksIdConnectPostBody' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\NetworksIdConnectPostBody' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\NetworksIdConnectPostBody();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Container', $data) && null !== $data['Container']) {
                $object->setContainer($data['Container']);
                unset($data['Container']);
            } elseif (\array_key_exists('Container', $data) && null === $data['Container']) {
                $object->setContainer(null);
            }
            if (\array_key_exists('EndpointConfig', $data) && null !== $data['EndpointConfig']) {
                $object->setEndpointConfig($this->denormalizer->denormalize($data['EndpointConfig'], 'Docker\\API\\Model\\EndpointSettings', 'json', $context));
                unset($data['EndpointConfig']);
            } elseif (\array_key_exists('EndpointConfig', $data) && null === $data['EndpointConfig']) {
                $object->setEndpointConfig(null);
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
            if ($object->isInitialized('container') && null !== $object->getContainer()) {
                $data['Container'] = $object->getContainer();
            }
            if ($object->isInitialized('endpointConfig') && null !== $object->getEndpointConfig()) {
                $data['EndpointConfig'] = $this->normalizer->normalize($object->getEndpointConfig(), 'json', $context);
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
            return ['Docker\\API\\Model\\NetworksIdConnectPostBody' => false];
        }
    }
}
