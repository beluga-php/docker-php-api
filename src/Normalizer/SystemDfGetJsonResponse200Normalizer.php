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

class SystemDfGetJsonResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SystemDfGetJsonResponse200::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SystemDfGetJsonResponse200::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SystemDfGetJsonResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('LayersSize', $data) && null !== $data['LayersSize']) {
            $object->setLayersSize($data['LayersSize']);
            unset($data['LayersSize']);
        } elseif (\array_key_exists('LayersSize', $data) && null === $data['LayersSize']) {
            $object->setLayersSize(null);
        }
        if (\array_key_exists('Images', $data) && null !== $data['Images']) {
            $values = [];
            foreach ($data['Images'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\ImageSummary::class, 'json', $context);
            }
            $object->setImages($values);
            unset($data['Images']);
        } elseif (\array_key_exists('Images', $data) && null === $data['Images']) {
            $object->setImages(null);
        }
        if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
            $values_1 = [];
            foreach ($data['Containers'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\ContainerSummary::class, 'json', $context);
            }
            $object->setContainers($values_1);
            unset($data['Containers']);
        } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
            $object->setContainers(null);
        }
        if (\array_key_exists('Volumes', $data) && null !== $data['Volumes']) {
            $values_2 = [];
            foreach ($data['Volumes'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\Volume::class, 'json', $context);
            }
            $object->setVolumes($values_2);
            unset($data['Volumes']);
        } elseif (\array_key_exists('Volumes', $data) && null === $data['Volumes']) {
            $object->setVolumes(null);
        }
        if (\array_key_exists('BuildCache', $data) && null !== $data['BuildCache']) {
            $values_3 = [];
            foreach ($data['BuildCache'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\BuildCache::class, 'json', $context);
            }
            $object->setBuildCache($values_3);
            unset($data['BuildCache']);
        } elseif (\array_key_exists('BuildCache', $data) && null === $data['BuildCache']) {
            $object->setBuildCache(null);
        }
        foreach ($data as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_4;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('layersSize') && null !== $data->getLayersSize()) {
            $dataArray['LayersSize'] = $data->getLayersSize();
        }
        if ($data->isInitialized('images') && null !== $data->getImages()) {
            $values = [];
            foreach ($data->getImages() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Images'] = $values;
        }
        if ($data->isInitialized('containers') && null !== $data->getContainers()) {
            $values_1 = [];
            foreach ($data->getContainers() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['Containers'] = $values_1;
        }
        if ($data->isInitialized('volumes') && null !== $data->getVolumes()) {
            $values_2 = [];
            foreach ($data->getVolumes() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['Volumes'] = $values_2;
        }
        if ($data->isInitialized('buildCache') && null !== $data->getBuildCache()) {
            $values_3 = [];
            foreach ($data->getBuildCache() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $dataArray['BuildCache'] = $values_3;
        }
        foreach ($data as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_4;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SystemDfGetJsonResponse200::class => false];
    }
}
