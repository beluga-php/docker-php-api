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
    class ImageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ImageSummary' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ImageSummary' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ImageSummary();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Id', $data) && null !== $data['Id']) {
                $object->setId($data['Id']);
                unset($data['Id']);
            } elseif (\array_key_exists('Id', $data) && null === $data['Id']) {
                $object->setId(null);
            }
            if (\array_key_exists('ParentId', $data) && null !== $data['ParentId']) {
                $object->setParentId($data['ParentId']);
                unset($data['ParentId']);
            } elseif (\array_key_exists('ParentId', $data) && null === $data['ParentId']) {
                $object->setParentId(null);
            }
            if (\array_key_exists('RepoTags', $data) && null !== $data['RepoTags']) {
                $values = [];
                foreach ($data['RepoTags'] as $value) {
                    $values[] = $value;
                }
                $object->setRepoTags($values);
                unset($data['RepoTags']);
            } elseif (\array_key_exists('RepoTags', $data) && null === $data['RepoTags']) {
                $object->setRepoTags(null);
            }
            if (\array_key_exists('RepoDigests', $data) && null !== $data['RepoDigests']) {
                $values_1 = [];
                foreach ($data['RepoDigests'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setRepoDigests($values_1);
                unset($data['RepoDigests']);
            } elseif (\array_key_exists('RepoDigests', $data) && null === $data['RepoDigests']) {
                $object->setRepoDigests(null);
            }
            if (\array_key_exists('Created', $data) && null !== $data['Created']) {
                $object->setCreated($data['Created']);
                unset($data['Created']);
            } elseif (\array_key_exists('Created', $data) && null === $data['Created']) {
                $object->setCreated(null);
            }
            if (\array_key_exists('Size', $data) && null !== $data['Size']) {
                $object->setSize($data['Size']);
                unset($data['Size']);
            } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('SharedSize', $data) && null !== $data['SharedSize']) {
                $object->setSharedSize($data['SharedSize']);
                unset($data['SharedSize']);
            } elseif (\array_key_exists('SharedSize', $data) && null === $data['SharedSize']) {
                $object->setSharedSize(null);
            }
            if (\array_key_exists('VirtualSize', $data) && null !== $data['VirtualSize']) {
                $object->setVirtualSize($data['VirtualSize']);
                unset($data['VirtualSize']);
            } elseif (\array_key_exists('VirtualSize', $data) && null === $data['VirtualSize']) {
                $object->setVirtualSize(null);
            }
            if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $object->setLabels($values_2);
                unset($data['Labels']);
            } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
                $object->setLabels(null);
            }
            if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
                $object->setContainers($data['Containers']);
                unset($data['Containers']);
            } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
                $object->setContainers(null);
            }
            foreach ($data as $key_1 => $value_3) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_3;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['Id'] = $object->getId();
            $data['ParentId'] = $object->getParentId();
            $values = [];
            foreach ($object->getRepoTags() as $value) {
                $values[] = $value;
            }
            $data['RepoTags'] = $values;
            $values_1 = [];
            foreach ($object->getRepoDigests() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['RepoDigests'] = $values_1;
            $data['Created'] = $object->getCreated();
            $data['Size'] = $object->getSize();
            $data['SharedSize'] = $object->getSharedSize();
            if ($object->isInitialized('virtualSize') && null !== $object->getVirtualSize()) {
                $data['VirtualSize'] = $object->getVirtualSize();
            }
            $values_2 = [];
            foreach ($object->getLabels() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $data['Labels'] = $values_2;
            $data['Containers'] = $object->getContainers();
            foreach ($object as $key_1 => $value_3) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_3;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\ImageSummary' => false];
        }
    }
} else {
    class ImageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ImageSummary' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ImageSummary' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ImageSummary();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Id', $data) && null !== $data['Id']) {
                $object->setId($data['Id']);
                unset($data['Id']);
            } elseif (\array_key_exists('Id', $data) && null === $data['Id']) {
                $object->setId(null);
            }
            if (\array_key_exists('ParentId', $data) && null !== $data['ParentId']) {
                $object->setParentId($data['ParentId']);
                unset($data['ParentId']);
            } elseif (\array_key_exists('ParentId', $data) && null === $data['ParentId']) {
                $object->setParentId(null);
            }
            if (\array_key_exists('RepoTags', $data) && null !== $data['RepoTags']) {
                $values = [];
                foreach ($data['RepoTags'] as $value) {
                    $values[] = $value;
                }
                $object->setRepoTags($values);
                unset($data['RepoTags']);
            } elseif (\array_key_exists('RepoTags', $data) && null === $data['RepoTags']) {
                $object->setRepoTags(null);
            }
            if (\array_key_exists('RepoDigests', $data) && null !== $data['RepoDigests']) {
                $values_1 = [];
                foreach ($data['RepoDigests'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setRepoDigests($values_1);
                unset($data['RepoDigests']);
            } elseif (\array_key_exists('RepoDigests', $data) && null === $data['RepoDigests']) {
                $object->setRepoDigests(null);
            }
            if (\array_key_exists('Created', $data) && null !== $data['Created']) {
                $object->setCreated($data['Created']);
                unset($data['Created']);
            } elseif (\array_key_exists('Created', $data) && null === $data['Created']) {
                $object->setCreated(null);
            }
            if (\array_key_exists('Size', $data) && null !== $data['Size']) {
                $object->setSize($data['Size']);
                unset($data['Size']);
            } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('SharedSize', $data) && null !== $data['SharedSize']) {
                $object->setSharedSize($data['SharedSize']);
                unset($data['SharedSize']);
            } elseif (\array_key_exists('SharedSize', $data) && null === $data['SharedSize']) {
                $object->setSharedSize(null);
            }
            if (\array_key_exists('VirtualSize', $data) && null !== $data['VirtualSize']) {
                $object->setVirtualSize($data['VirtualSize']);
                unset($data['VirtualSize']);
            } elseif (\array_key_exists('VirtualSize', $data) && null === $data['VirtualSize']) {
                $object->setVirtualSize(null);
            }
            if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $object->setLabels($values_2);
                unset($data['Labels']);
            } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
                $object->setLabels(null);
            }
            if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
                $object->setContainers($data['Containers']);
                unset($data['Containers']);
            } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
                $object->setContainers(null);
            }
            foreach ($data as $key_1 => $value_3) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_3;
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
            $data['Id'] = $object->getId();
            $data['ParentId'] = $object->getParentId();
            $values = [];
            foreach ($object->getRepoTags() as $value) {
                $values[] = $value;
            }
            $data['RepoTags'] = $values;
            $values_1 = [];
            foreach ($object->getRepoDigests() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['RepoDigests'] = $values_1;
            $data['Created'] = $object->getCreated();
            $data['Size'] = $object->getSize();
            $data['SharedSize'] = $object->getSharedSize();
            if ($object->isInitialized('virtualSize') && null !== $object->getVirtualSize()) {
                $data['VirtualSize'] = $object->getVirtualSize();
            }
            $values_2 = [];
            foreach ($object->getLabels() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $data['Labels'] = $values_2;
            $data['Containers'] = $object->getContainers();
            foreach ($object as $key_1 => $value_3) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_3;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\ImageSummary' => false];
        }
    }
}
