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

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\SystemDfGetJsonResponse200' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\SystemDfGetJsonResponse200' === $data::class;
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
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
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\ImageSummary', 'json', $context);
            }
            $object->setImages($values);
            unset($data['Images']);
        } elseif (\array_key_exists('Images', $data) && null === $data['Images']) {
            $object->setImages(null);
        }
        if (\array_key_exists('Containers', $data) && null !== $data['Containers']) {
            $values_1 = [];
            foreach ($data['Containers'] as $value_1) {
                $values_2 = [];
                foreach ($value_1 as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\\API\\Model\\ContainerSummaryItem', 'json', $context);
                }
                $values_1[] = $values_2;
            }
            $object->setContainers($values_1);
            unset($data['Containers']);
        } elseif (\array_key_exists('Containers', $data) && null === $data['Containers']) {
            $object->setContainers(null);
        }
        if (\array_key_exists('Volumes', $data) && null !== $data['Volumes']) {
            $values_3 = [];
            foreach ($data['Volumes'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\\API\\Model\\Volume', 'json', $context);
            }
            $object->setVolumes($values_3);
            unset($data['Volumes']);
        } elseif (\array_key_exists('Volumes', $data) && null === $data['Volumes']) {
            $object->setVolumes(null);
        }
        if (\array_key_exists('BuildCache', $data) && null !== $data['BuildCache']) {
            $values_4 = [];
            foreach ($data['BuildCache'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, 'Docker\\API\\Model\\BuildCache', 'json', $context);
            }
            $object->setBuildCache($values_4);
            unset($data['BuildCache']);
        } elseif (\array_key_exists('BuildCache', $data) && null === $data['BuildCache']) {
            $object->setBuildCache(null);
        }
        foreach ($data as $key => $value_5) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_5;
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
        if ($object->isInitialized('layersSize') && null !== $object->getLayersSize()) {
            $data['LayersSize'] = $object->getLayersSize();
        }
        if ($object->isInitialized('images') && null !== $object->getImages()) {
            $values = [];
            foreach ($object->getImages() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Images'] = $values;
        }
        if ($object->isInitialized('containers') && null !== $object->getContainers()) {
            $values_1 = [];
            foreach ($object->getContainers() as $value_1) {
                $values_2 = [];
                foreach ($value_1 as $value_2) {
                    $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
                }
                $values_1[] = $values_2;
            }
            $data['Containers'] = $values_1;
        }
        if ($object->isInitialized('volumes') && null !== $object->getVolumes()) {
            $values_3 = [];
            foreach ($object->getVolumes() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Volumes'] = $values_3;
        }
        if ($object->isInitialized('buildCache') && null !== $object->getBuildCache()) {
            $values_4 = [];
            foreach ($object->getBuildCache() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['BuildCache'] = $values_4;
        }
        foreach ($object as $key => $value_5) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_5;
            }
        }

        return $data;
    }
}
