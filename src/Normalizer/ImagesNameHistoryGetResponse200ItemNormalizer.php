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
    class ImagesNameHistoryGetResponse200ItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item' === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ImagesNameHistoryGetResponse200Item();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Id', $data) && null !== $data['Id']) {
                $object->setId($data['Id']);
                unset($data['Id']);
            } elseif (\array_key_exists('Id', $data) && null === $data['Id']) {
                $object->setId(null);
            }
            if (\array_key_exists('Created', $data) && null !== $data['Created']) {
                $object->setCreated($data['Created']);
                unset($data['Created']);
            } elseif (\array_key_exists('Created', $data) && null === $data['Created']) {
                $object->setCreated(null);
            }
            if (\array_key_exists('CreatedBy', $data) && null !== $data['CreatedBy']) {
                $object->setCreatedBy($data['CreatedBy']);
                unset($data['CreatedBy']);
            } elseif (\array_key_exists('CreatedBy', $data) && null === $data['CreatedBy']) {
                $object->setCreatedBy(null);
            }
            if (\array_key_exists('Tags', $data) && null !== $data['Tags']) {
                $values = [];
                foreach ($data['Tags'] as $value) {
                    $values[] = $value;
                }
                $object->setTags($values);
                unset($data['Tags']);
            } elseif (\array_key_exists('Tags', $data) && null === $data['Tags']) {
                $object->setTags(null);
            }
            if (\array_key_exists('Size', $data) && null !== $data['Size']) {
                $object->setSize($data['Size']);
                unset($data['Size']);
            } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('Comment', $data) && null !== $data['Comment']) {
                $object->setComment($data['Comment']);
                unset($data['Comment']);
            } elseif (\array_key_exists('Comment', $data) && null === $data['Comment']) {
                $object->setComment(null);
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
            $data['Id'] = $object->getId();
            $data['Created'] = $object->getCreated();
            $data['CreatedBy'] = $object->getCreatedBy();
            $values = [];
            foreach ($object->getTags() as $value) {
                $values[] = $value;
            }
            $data['Tags'] = $values;
            $data['Size'] = $object->getSize();
            $data['Comment'] = $object->getComment();
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item' => false];
        }
    }
} else {
    class ImagesNameHistoryGetResponse200ItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ImagesNameHistoryGetResponse200Item();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('Id', $data) && null !== $data['Id']) {
                $object->setId($data['Id']);
                unset($data['Id']);
            } elseif (\array_key_exists('Id', $data) && null === $data['Id']) {
                $object->setId(null);
            }
            if (\array_key_exists('Created', $data) && null !== $data['Created']) {
                $object->setCreated($data['Created']);
                unset($data['Created']);
            } elseif (\array_key_exists('Created', $data) && null === $data['Created']) {
                $object->setCreated(null);
            }
            if (\array_key_exists('CreatedBy', $data) && null !== $data['CreatedBy']) {
                $object->setCreatedBy($data['CreatedBy']);
                unset($data['CreatedBy']);
            } elseif (\array_key_exists('CreatedBy', $data) && null === $data['CreatedBy']) {
                $object->setCreatedBy(null);
            }
            if (\array_key_exists('Tags', $data) && null !== $data['Tags']) {
                $values = [];
                foreach ($data['Tags'] as $value) {
                    $values[] = $value;
                }
                $object->setTags($values);
                unset($data['Tags']);
            } elseif (\array_key_exists('Tags', $data) && null === $data['Tags']) {
                $object->setTags(null);
            }
            if (\array_key_exists('Size', $data) && null !== $data['Size']) {
                $object->setSize($data['Size']);
                unset($data['Size']);
            } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('Comment', $data) && null !== $data['Comment']) {
                $object->setComment($data['Comment']);
                unset($data['Comment']);
            } elseif (\array_key_exists('Comment', $data) && null === $data['Comment']) {
                $object->setComment(null);
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
            $data['Id'] = $object->getId();
            $data['Created'] = $object->getCreated();
            $data['CreatedBy'] = $object->getCreatedBy();
            $values = [];
            foreach ($object->getTags() as $value) {
                $values[] = $value;
            }
            $data['Tags'] = $values;
            $data['Size'] = $object->getSize();
            $data['Comment'] = $object->getComment();
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item' => false];
        }
    }
}
