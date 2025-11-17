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

class VolumeListResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\VolumeListResponse::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\VolumeListResponse::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\VolumeListResponse();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Volumes', $data) && null !== $data['Volumes']) {
            $values = [];
            foreach ($data['Volumes'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\Volume::class, 'json', $context);
            }
            $object->setVolumes($values);
            unset($data['Volumes']);
        } elseif (\array_key_exists('Volumes', $data) && null === $data['Volumes']) {
            $object->setVolumes(null);
        }
        if (\array_key_exists('Warnings', $data) && null !== $data['Warnings']) {
            $values_1 = [];
            foreach ($data['Warnings'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setWarnings($values_1);
            unset($data['Warnings']);
        } elseif (\array_key_exists('Warnings', $data) && null === $data['Warnings']) {
            $object->setWarnings(null);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('volumes') && null !== $data->getVolumes()) {
            $values = [];
            foreach ($data->getVolumes() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Volumes'] = $values;
        }
        if ($data->isInitialized('warnings') && null !== $data->getWarnings()) {
            $values_1 = [];
            foreach ($data->getWarnings() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['Warnings'] = $values_1;
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\VolumeListResponse::class => false];
    }
}
