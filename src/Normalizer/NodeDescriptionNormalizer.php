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
    class NodeDescriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\NodeDescription' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\NodeDescription' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\NodeDescription();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Hostname', $data) && null !== $data['Hostname']) {
                $object->setHostname($data['Hostname']);
                unset($data['Hostname']);
            } elseif (\array_key_exists('Hostname', $data) && null === $data['Hostname']) {
                $object->setHostname(null);
            }
            if (\array_key_exists('Platform', $data) && null !== $data['Platform']) {
                $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Docker\\API\\Model\\Platform', 'json', $context));
                unset($data['Platform']);
            } elseif (\array_key_exists('Platform', $data) && null === $data['Platform']) {
                $object->setPlatform(null);
            }
            if (\array_key_exists('Resources', $data) && null !== $data['Resources']) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Docker\\API\\Model\\ResourceObject', 'json', $context));
                unset($data['Resources']);
            } elseif (\array_key_exists('Resources', $data) && null === $data['Resources']) {
                $object->setResources(null);
            }
            if (\array_key_exists('Engine', $data) && null !== $data['Engine']) {
                $object->setEngine($this->denormalizer->denormalize($data['Engine'], 'Docker\\API\\Model\\EngineDescription', 'json', $context));
                unset($data['Engine']);
            } elseif (\array_key_exists('Engine', $data) && null === $data['Engine']) {
                $object->setEngine(null);
            }
            if (\array_key_exists('TLSInfo', $data) && null !== $data['TLSInfo']) {
                $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], 'Docker\\API\\Model\\TLSInfo', 'json', $context));
                unset($data['TLSInfo']);
            } elseif (\array_key_exists('TLSInfo', $data) && null === $data['TLSInfo']) {
                $object->setTLSInfo(null);
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
            if ($object->isInitialized('hostname') && null !== $object->getHostname()) {
                $data['Hostname'] = $object->getHostname();
            }
            if ($object->isInitialized('platform') && null !== $object->getPlatform()) {
                $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
            }
            if ($object->isInitialized('resources') && null !== $object->getResources()) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('engine') && null !== $object->getEngine()) {
                $data['Engine'] = $this->normalizer->normalize($object->getEngine(), 'json', $context);
            }
            if ($object->isInitialized('tLSInfo') && null !== $object->getTLSInfo()) {
                $data['TLSInfo'] = $this->normalizer->normalize($object->getTLSInfo(), 'json', $context);
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
            return ['Docker\\API\\Model\\NodeDescription' => false];
        }
    }
} else {
    class NodeDescriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\NodeDescription' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\NodeDescription' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\NodeDescription();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Hostname', $data) && null !== $data['Hostname']) {
                $object->setHostname($data['Hostname']);
                unset($data['Hostname']);
            } elseif (\array_key_exists('Hostname', $data) && null === $data['Hostname']) {
                $object->setHostname(null);
            }
            if (\array_key_exists('Platform', $data) && null !== $data['Platform']) {
                $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Docker\\API\\Model\\Platform', 'json', $context));
                unset($data['Platform']);
            } elseif (\array_key_exists('Platform', $data) && null === $data['Platform']) {
                $object->setPlatform(null);
            }
            if (\array_key_exists('Resources', $data) && null !== $data['Resources']) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Docker\\API\\Model\\ResourceObject', 'json', $context));
                unset($data['Resources']);
            } elseif (\array_key_exists('Resources', $data) && null === $data['Resources']) {
                $object->setResources(null);
            }
            if (\array_key_exists('Engine', $data) && null !== $data['Engine']) {
                $object->setEngine($this->denormalizer->denormalize($data['Engine'], 'Docker\\API\\Model\\EngineDescription', 'json', $context));
                unset($data['Engine']);
            } elseif (\array_key_exists('Engine', $data) && null === $data['Engine']) {
                $object->setEngine(null);
            }
            if (\array_key_exists('TLSInfo', $data) && null !== $data['TLSInfo']) {
                $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], 'Docker\\API\\Model\\TLSInfo', 'json', $context));
                unset($data['TLSInfo']);
            } elseif (\array_key_exists('TLSInfo', $data) && null === $data['TLSInfo']) {
                $object->setTLSInfo(null);
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
            if ($object->isInitialized('hostname') && null !== $object->getHostname()) {
                $data['Hostname'] = $object->getHostname();
            }
            if ($object->isInitialized('platform') && null !== $object->getPlatform()) {
                $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
            }
            if ($object->isInitialized('resources') && null !== $object->getResources()) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('engine') && null !== $object->getEngine()) {
                $data['Engine'] = $this->normalizer->normalize($object->getEngine(), 'json', $context);
            }
            if ($object->isInitialized('tLSInfo') && null !== $object->getTLSInfo()) {
                $data['TLSInfo'] = $this->normalizer->normalize($object->getTLSInfo(), 'json', $context);
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
            return ['Docker\\API\\Model\\NodeDescription' => false];
        }
    }
}
