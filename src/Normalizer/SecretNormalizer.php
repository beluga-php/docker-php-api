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
    class SecretNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\Secret' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\Secret' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\Secret();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('ID', $data) && null !== $data['ID']) {
                $object->setID($data['ID']);
                unset($data['ID']);
            } elseif (\array_key_exists('ID', $data) && null === $data['ID']) {
                $object->setID(null);
            }
            if (\array_key_exists('Version', $data) && null !== $data['Version']) {
                $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Docker\\API\\Model\\ObjectVersion', 'json', $context));
                unset($data['Version']);
            } elseif (\array_key_exists('Version', $data) && null === $data['Version']) {
                $object->setVersion(null);
            }
            if (\array_key_exists('CreatedAt', $data) && null !== $data['CreatedAt']) {
                $object->setCreatedAt($data['CreatedAt']);
                unset($data['CreatedAt']);
            } elseif (\array_key_exists('CreatedAt', $data) && null === $data['CreatedAt']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('UpdatedAt', $data) && null !== $data['UpdatedAt']) {
                $object->setUpdatedAt($data['UpdatedAt']);
                unset($data['UpdatedAt']);
            } elseif (\array_key_exists('UpdatedAt', $data) && null === $data['UpdatedAt']) {
                $object->setUpdatedAt(null);
            }
            if (\array_key_exists('Spec', $data) && null !== $data['Spec']) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\\API\\Model\\SecretSpec', 'json', $context));
                unset($data['Spec']);
            } elseif (\array_key_exists('Spec', $data) && null === $data['Spec']) {
                $object->setSpec(null);
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
            if ($object->isInitialized('iD') && null !== $object->getID()) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('version') && null !== $object->getVersion()) {
                $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
            }
            if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
                $data['UpdatedAt'] = $object->getUpdatedAt();
            }
            if ($object->isInitialized('spec') && null !== $object->getSpec()) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
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
            return ['Docker\\API\\Model\\Secret' => false];
        }
    }
} else {
    class SecretNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\Secret' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\Secret' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\Secret();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('ID', $data) && null !== $data['ID']) {
                $object->setID($data['ID']);
                unset($data['ID']);
            } elseif (\array_key_exists('ID', $data) && null === $data['ID']) {
                $object->setID(null);
            }
            if (\array_key_exists('Version', $data) && null !== $data['Version']) {
                $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Docker\\API\\Model\\ObjectVersion', 'json', $context));
                unset($data['Version']);
            } elseif (\array_key_exists('Version', $data) && null === $data['Version']) {
                $object->setVersion(null);
            }
            if (\array_key_exists('CreatedAt', $data) && null !== $data['CreatedAt']) {
                $object->setCreatedAt($data['CreatedAt']);
                unset($data['CreatedAt']);
            } elseif (\array_key_exists('CreatedAt', $data) && null === $data['CreatedAt']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('UpdatedAt', $data) && null !== $data['UpdatedAt']) {
                $object->setUpdatedAt($data['UpdatedAt']);
                unset($data['UpdatedAt']);
            } elseif (\array_key_exists('UpdatedAt', $data) && null === $data['UpdatedAt']) {
                $object->setUpdatedAt(null);
            }
            if (\array_key_exists('Spec', $data) && null !== $data['Spec']) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\\API\\Model\\SecretSpec', 'json', $context));
                unset($data['Spec']);
            } elseif (\array_key_exists('Spec', $data) && null === $data['Spec']) {
                $object->setSpec(null);
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
            if ($object->isInitialized('iD') && null !== $object->getID()) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('version') && null !== $object->getVersion()) {
                $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
            }
            if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
                $data['UpdatedAt'] = $object->getUpdatedAt();
            }
            if ($object->isInitialized('spec') && null !== $object->getSpec()) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
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
            return ['Docker\\API\\Model\\Secret' => false];
        }
    }
}
