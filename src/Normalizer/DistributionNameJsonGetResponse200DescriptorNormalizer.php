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

class DistributionNameJsonGetResponse200DescriptorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\DistributionNameJsonGetResponse200Descriptor::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\DistributionNameJsonGetResponse200Descriptor::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\DistributionNameJsonGetResponse200Descriptor();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('MediaType', $data) && null !== $data['MediaType']) {
            $object->setMediaType($data['MediaType']);
            unset($data['MediaType']);
        } elseif (\array_key_exists('MediaType', $data) && null === $data['MediaType']) {
            $object->setMediaType(null);
            unset($data['MediaType']);
        }
        if (\array_key_exists('Size', $data) && null !== $data['Size']) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
            $object->setSize(null);
            unset($data['Size']);
        }
        if (\array_key_exists('Digest', $data) && null !== $data['Digest']) {
            $object->setDigest($data['Digest']);
            unset($data['Digest']);
        } elseif (\array_key_exists('Digest', $data) && null === $data['Digest']) {
            $object->setDigest(null);
            unset($data['Digest']);
        }
        if (\array_key_exists('URLs', $data) && null !== $data['URLs']) {
            $values = [];
            foreach ($data['URLs'] as $value) {
                $values[] = $value;
            }
            $object->setURLs($values);
            unset($data['URLs']);
        } elseif (\array_key_exists('URLs', $data) && null === $data['URLs']) {
            $object->setURLs(null);
            unset($data['URLs']);
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
        if ($data->isInitialized('mediaType') && null !== $data->getMediaType()) {
            $dataArray['MediaType'] = $data->getMediaType();
        }
        if ($data->isInitialized('size') && null !== $data->getSize()) {
            $dataArray['Size'] = $data->getSize();
        }
        if ($data->isInitialized('digest') && null !== $data->getDigest()) {
            $dataArray['Digest'] = $data->getDigest();
        }
        if ($data->isInitialized('uRLs') && null !== $data->getURLs()) {
            $values = [];
            foreach ($data->getURLs() as $value) {
                $values[] = $value;
            }
            $dataArray['URLs'] = $values;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\DistributionNameJsonGetResponse200Descriptor::class => false];
    }
}
