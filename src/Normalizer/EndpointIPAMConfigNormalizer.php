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
    class EndpointIPAMConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\EndpointIPAMConfig' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\EndpointIPAMConfig' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\EndpointIPAMConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('IPv4Address', $data) && null !== $data['IPv4Address']) {
                $object->setIPv4Address($data['IPv4Address']);
                unset($data['IPv4Address']);
            } elseif (\array_key_exists('IPv4Address', $data) && null === $data['IPv4Address']) {
                $object->setIPv4Address(null);
            }
            if (\array_key_exists('IPv6Address', $data) && null !== $data['IPv6Address']) {
                $object->setIPv6Address($data['IPv6Address']);
                unset($data['IPv6Address']);
            } elseif (\array_key_exists('IPv6Address', $data) && null === $data['IPv6Address']) {
                $object->setIPv6Address(null);
            }
            if (\array_key_exists('LinkLocalIPs', $data) && null !== $data['LinkLocalIPs']) {
                $values = [];
                foreach ($data['LinkLocalIPs'] as $value) {
                    $values[] = $value;
                }
                $object->setLinkLocalIPs($values);
                unset($data['LinkLocalIPs']);
            } elseif (\array_key_exists('LinkLocalIPs', $data) && null === $data['LinkLocalIPs']) {
                $object->setLinkLocalIPs(null);
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
            if ($object->isInitialized('iPv4Address') && null !== $object->getIPv4Address()) {
                $data['IPv4Address'] = $object->getIPv4Address();
            }
            if ($object->isInitialized('iPv6Address') && null !== $object->getIPv6Address()) {
                $data['IPv6Address'] = $object->getIPv6Address();
            }
            if ($object->isInitialized('linkLocalIPs') && null !== $object->getLinkLocalIPs()) {
                $values = [];
                foreach ($object->getLinkLocalIPs() as $value) {
                    $values[] = $value;
                }
                $data['LinkLocalIPs'] = $values;
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
            return ['Docker\\API\\Model\\EndpointIPAMConfig' => false];
        }
    }
} else {
    class EndpointIPAMConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\EndpointIPAMConfig' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\EndpointIPAMConfig' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\EndpointIPAMConfig();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('IPv4Address', $data) && null !== $data['IPv4Address']) {
                $object->setIPv4Address($data['IPv4Address']);
                unset($data['IPv4Address']);
            } elseif (\array_key_exists('IPv4Address', $data) && null === $data['IPv4Address']) {
                $object->setIPv4Address(null);
            }
            if (\array_key_exists('IPv6Address', $data) && null !== $data['IPv6Address']) {
                $object->setIPv6Address($data['IPv6Address']);
                unset($data['IPv6Address']);
            } elseif (\array_key_exists('IPv6Address', $data) && null === $data['IPv6Address']) {
                $object->setIPv6Address(null);
            }
            if (\array_key_exists('LinkLocalIPs', $data) && null !== $data['LinkLocalIPs']) {
                $values = [];
                foreach ($data['LinkLocalIPs'] as $value) {
                    $values[] = $value;
                }
                $object->setLinkLocalIPs($values);
                unset($data['LinkLocalIPs']);
            } elseif (\array_key_exists('LinkLocalIPs', $data) && null === $data['LinkLocalIPs']) {
                $object->setLinkLocalIPs(null);
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
            if ($object->isInitialized('iPv4Address') && null !== $object->getIPv4Address()) {
                $data['IPv4Address'] = $object->getIPv4Address();
            }
            if ($object->isInitialized('iPv6Address') && null !== $object->getIPv6Address()) {
                $data['IPv6Address'] = $object->getIPv6Address();
            }
            if ($object->isInitialized('linkLocalIPs') && null !== $object->getLinkLocalIPs()) {
                $values = [];
                foreach ($object->getLinkLocalIPs() as $value) {
                    $values[] = $value;
                }
                $data['LinkLocalIPs'] = $values;
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
            return ['Docker\\API\\Model\\EndpointIPAMConfig' => false];
        }
    }
}
