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
    class TaskSpecContainerSpecPrivilegesCredentialSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Config', $data) && null !== $data['Config']) {
                $object->setConfig($data['Config']);
                unset($data['Config']);
            } elseif (\array_key_exists('Config', $data) && null === $data['Config']) {
                $object->setConfig(null);
            }
            if (\array_key_exists('File', $data) && null !== $data['File']) {
                $object->setFile($data['File']);
                unset($data['File']);
            } elseif (\array_key_exists('File', $data) && null === $data['File']) {
                $object->setFile(null);
            }
            if (\array_key_exists('Registry', $data) && null !== $data['Registry']) {
                $object->setRegistry($data['Registry']);
                unset($data['Registry']);
            } elseif (\array_key_exists('Registry', $data) && null === $data['Registry']) {
                $object->setRegistry(null);
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
            if ($object->isInitialized('config') && null !== $object->getConfig()) {
                $data['Config'] = $object->getConfig();
            }
            if ($object->isInitialized('file') && null !== $object->getFile()) {
                $data['File'] = $object->getFile();
            }
            if ($object->isInitialized('registry') && null !== $object->getRegistry()) {
                $data['Registry'] = $object->getRegistry();
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
            return ['Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec' => false];
        }
    }
} else {
    class TaskSpecContainerSpecPrivilegesCredentialSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Config', $data) && null !== $data['Config']) {
                $object->setConfig($data['Config']);
                unset($data['Config']);
            } elseif (\array_key_exists('Config', $data) && null === $data['Config']) {
                $object->setConfig(null);
            }
            if (\array_key_exists('File', $data) && null !== $data['File']) {
                $object->setFile($data['File']);
                unset($data['File']);
            } elseif (\array_key_exists('File', $data) && null === $data['File']) {
                $object->setFile(null);
            }
            if (\array_key_exists('Registry', $data) && null !== $data['Registry']) {
                $object->setRegistry($data['Registry']);
                unset($data['Registry']);
            } elseif (\array_key_exists('Registry', $data) && null === $data['Registry']) {
                $object->setRegistry(null);
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
            if ($object->isInitialized('config') && null !== $object->getConfig()) {
                $data['Config'] = $object->getConfig();
            }
            if ($object->isInitialized('file') && null !== $object->getFile()) {
                $data['File'] = $object->getFile();
            }
            if ($object->isInitialized('registry') && null !== $object->getRegistry()) {
                $data['Registry'] = $object->getRegistry();
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
            return ['Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec' => false];
        }
    }
}
