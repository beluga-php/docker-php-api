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
    class TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Disable', $data) && null !== $data['Disable']) {
                $object->setDisable($data['Disable']);
                unset($data['Disable']);
            } elseif (\array_key_exists('Disable', $data) && null === $data['Disable']) {
                $object->setDisable(null);
            }
            if (\array_key_exists('User', $data) && null !== $data['User']) {
                $object->setUser($data['User']);
                unset($data['User']);
            } elseif (\array_key_exists('User', $data) && null === $data['User']) {
                $object->setUser(null);
            }
            if (\array_key_exists('Role', $data) && null !== $data['Role']) {
                $object->setRole($data['Role']);
                unset($data['Role']);
            } elseif (\array_key_exists('Role', $data) && null === $data['Role']) {
                $object->setRole(null);
            }
            if (\array_key_exists('Type', $data) && null !== $data['Type']) {
                $object->setType($data['Type']);
                unset($data['Type']);
            } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
                $object->setType(null);
            }
            if (\array_key_exists('Level', $data) && null !== $data['Level']) {
                $object->setLevel($data['Level']);
                unset($data['Level']);
            } elseif (\array_key_exists('Level', $data) && null === $data['Level']) {
                $object->setLevel(null);
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
            if ($object->isInitialized('disable') && null !== $object->getDisable()) {
                $data['Disable'] = $object->getDisable();
            }
            if ($object->isInitialized('user') && null !== $object->getUser()) {
                $data['User'] = $object->getUser();
            }
            if ($object->isInitialized('role') && null !== $object->getRole()) {
                $data['Role'] = $object->getRole();
            }
            if ($object->isInitialized('type') && null !== $object->getType()) {
                $data['Type'] = $object->getType();
            }
            if ($object->isInitialized('level') && null !== $object->getLevel()) {
                $data['Level'] = $object->getLevel();
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
            return ['Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext' => false];
        }
    }
} else {
    class TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Disable', $data) && null !== $data['Disable']) {
                $object->setDisable($data['Disable']);
                unset($data['Disable']);
            } elseif (\array_key_exists('Disable', $data) && null === $data['Disable']) {
                $object->setDisable(null);
            }
            if (\array_key_exists('User', $data) && null !== $data['User']) {
                $object->setUser($data['User']);
                unset($data['User']);
            } elseif (\array_key_exists('User', $data) && null === $data['User']) {
                $object->setUser(null);
            }
            if (\array_key_exists('Role', $data) && null !== $data['Role']) {
                $object->setRole($data['Role']);
                unset($data['Role']);
            } elseif (\array_key_exists('Role', $data) && null === $data['Role']) {
                $object->setRole(null);
            }
            if (\array_key_exists('Type', $data) && null !== $data['Type']) {
                $object->setType($data['Type']);
                unset($data['Type']);
            } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
                $object->setType(null);
            }
            if (\array_key_exists('Level', $data) && null !== $data['Level']) {
                $object->setLevel($data['Level']);
                unset($data['Level']);
            } elseif (\array_key_exists('Level', $data) && null === $data['Level']) {
                $object->setLevel(null);
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
            if ($object->isInitialized('disable') && null !== $object->getDisable()) {
                $data['Disable'] = $object->getDisable();
            }
            if ($object->isInitialized('user') && null !== $object->getUser()) {
                $data['User'] = $object->getUser();
            }
            if ($object->isInitialized('role') && null !== $object->getRole()) {
                $data['Role'] = $object->getRole();
            }
            if ($object->isInitialized('type') && null !== $object->getType()) {
                $data['Type'] = $object->getType();
            }
            if ($object->isInitialized('level') && null !== $object->getLevel()) {
                $data['Level'] = $object->getLevel();
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
            return ['Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext' => false];
        }
    }
}
