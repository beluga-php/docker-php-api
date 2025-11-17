<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ClusterVolumeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ClusterVolume::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ClusterVolume::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ClusterVolume();
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
            $object->setVersion($this->denormalizer->denormalize($data['Version'], \Docker\API\Model\ObjectVersion::class, 'json', $context));
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
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], \Docker\API\Model\ClusterVolumeSpec::class, 'json', $context));
            unset($data['Spec']);
        } elseif (\array_key_exists('Spec', $data) && null === $data['Spec']) {
            $object->setSpec(null);
        }
        if (\array_key_exists('Info', $data) && null !== $data['Info']) {
            $object->setInfo($this->denormalizer->denormalize($data['Info'], \Docker\API\Model\ClusterVolumeInfo::class, 'json', $context));
            unset($data['Info']);
        } elseif (\array_key_exists('Info', $data) && null === $data['Info']) {
            $object->setInfo(null);
        }
        if (\array_key_exists('PublishStatus', $data) && null !== $data['PublishStatus']) {
            $values = [];
            foreach ($data['PublishStatus'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\ClusterVolumePublishStatusItem::class, 'json', $context);
            }
            $object->setPublishStatus($values);
            unset($data['PublishStatus']);
        } elseif (\array_key_exists('PublishStatus', $data) && null === $data['PublishStatus']) {
            $object->setPublishStatus(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('iD') && null !== $data->getID()) {
            $dataArray['ID'] = $data->getID();
        }
        if ($data->isInitialized('version') && null !== $data->getVersion()) {
            $dataArray['Version'] = $this->normalizer->normalize($data->getVersion(), 'json', $context);
        }
        if ($data->isInitialized('createdAt') && null !== $data->getCreatedAt()) {
            $dataArray['CreatedAt'] = $data->getCreatedAt();
        }
        if ($data->isInitialized('updatedAt') && null !== $data->getUpdatedAt()) {
            $dataArray['UpdatedAt'] = $data->getUpdatedAt();
        }
        if ($data->isInitialized('spec') && null !== $data->getSpec()) {
            $dataArray['Spec'] = $this->normalizer->normalize($data->getSpec(), 'json', $context);
        }
        if ($data->isInitialized('info') && null !== $data->getInfo()) {
            $dataArray['Info'] = $this->normalizer->normalize($data->getInfo(), 'json', $context);
        }
        if ($data->isInitialized('publishStatus') && null !== $data->getPublishStatus()) {
            $values = [];
            foreach ($data->getPublishStatus() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['PublishStatus'] = $values;
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ClusterVolume::class => false];
    }
}
