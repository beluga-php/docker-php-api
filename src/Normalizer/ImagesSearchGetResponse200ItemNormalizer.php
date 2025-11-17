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

class ImagesSearchGetResponse200ItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ImagesSearchGetResponse200Item::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ImagesSearchGetResponse200Item::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ImagesSearchGetResponse200Item();
        if (\array_key_exists('is_official', $data) && \is_int($data['is_official'])) {
            $data['is_official'] = (bool) $data['is_official'];
        }
        if (\array_key_exists('is_automated', $data) && \is_int($data['is_automated'])) {
            $data['is_automated'] = (bool) $data['is_automated'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('description', $data) && null !== $data['description']) {
            $object->setDescription($data['description']);
            unset($data['description']);
        } elseif (\array_key_exists('description', $data) && null === $data['description']) {
            $object->setDescription(null);
        }
        if (\array_key_exists('is_official', $data) && null !== $data['is_official']) {
            $object->setIsOfficial($data['is_official']);
            unset($data['is_official']);
        } elseif (\array_key_exists('is_official', $data) && null === $data['is_official']) {
            $object->setIsOfficial(null);
        }
        if (\array_key_exists('is_automated', $data) && null !== $data['is_automated']) {
            $object->setIsAutomated($data['is_automated']);
            unset($data['is_automated']);
        } elseif (\array_key_exists('is_automated', $data) && null === $data['is_automated']) {
            $object->setIsAutomated(null);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
        }
        if (\array_key_exists('star_count', $data) && null !== $data['star_count']) {
            $object->setStarCount($data['star_count']);
            unset($data['star_count']);
        } elseif (\array_key_exists('star_count', $data) && null === $data['star_count']) {
            $object->setStarCount(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('description') && null !== $data->getDescription()) {
            $dataArray['description'] = $data->getDescription();
        }
        if ($data->isInitialized('isOfficial') && null !== $data->getIsOfficial()) {
            $dataArray['is_official'] = $data->getIsOfficial();
        }
        if ($data->isInitialized('isAutomated') && null !== $data->getIsAutomated()) {
            $dataArray['is_automated'] = $data->getIsAutomated();
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('starCount') && null !== $data->getStarCount()) {
            $dataArray['star_count'] = $data->getStarCount();
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ImagesSearchGetResponse200Item::class => false];
    }
}
