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

class BuildCacheNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\BuildCache::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\BuildCache::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\BuildCache();
        if (\array_key_exists('InUse', $data) && \is_int($data['InUse'])) {
            $data['InUse'] = (bool) $data['InUse'];
        }
        if (\array_key_exists('Shared', $data) && \is_int($data['Shared'])) {
            $data['Shared'] = (bool) $data['Shared'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ID', $data) && null !== $data['ID']) {
            $object->setID($data['ID']);
            unset($data['ID']);
        } elseif (\array_key_exists('ID', $data) && null === $data['ID']) {
            $object->setID(null);
        }
        if (\array_key_exists('Parent', $data) && null !== $data['Parent']) {
            $object->setParent($data['Parent']);
            unset($data['Parent']);
        } elseif (\array_key_exists('Parent', $data) && null === $data['Parent']) {
            $object->setParent(null);
        }
        if (\array_key_exists('Parents', $data) && null !== $data['Parents']) {
            $values = [];
            foreach ($data['Parents'] as $value) {
                $values[] = $value;
            }
            $object->setParents($values);
            unset($data['Parents']);
        } elseif (\array_key_exists('Parents', $data) && null === $data['Parents']) {
            $object->setParents(null);
        }
        if (\array_key_exists('Type', $data) && null !== $data['Type']) {
            $object->setType($data['Type']);
            unset($data['Type']);
        } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
            $object->setType(null);
        }
        if (\array_key_exists('Description', $data) && null !== $data['Description']) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        } elseif (\array_key_exists('Description', $data) && null === $data['Description']) {
            $object->setDescription(null);
        }
        if (\array_key_exists('InUse', $data) && null !== $data['InUse']) {
            $object->setInUse($data['InUse']);
            unset($data['InUse']);
        } elseif (\array_key_exists('InUse', $data) && null === $data['InUse']) {
            $object->setInUse(null);
        }
        if (\array_key_exists('Shared', $data) && null !== $data['Shared']) {
            $object->setShared($data['Shared']);
            unset($data['Shared']);
        } elseif (\array_key_exists('Shared', $data) && null === $data['Shared']) {
            $object->setShared(null);
        }
        if (\array_key_exists('Size', $data) && null !== $data['Size']) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        } elseif (\array_key_exists('Size', $data) && null === $data['Size']) {
            $object->setSize(null);
        }
        if (\array_key_exists('CreatedAt', $data) && null !== $data['CreatedAt']) {
            $object->setCreatedAt($data['CreatedAt']);
            unset($data['CreatedAt']);
        } elseif (\array_key_exists('CreatedAt', $data) && null === $data['CreatedAt']) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('LastUsedAt', $data) && null !== $data['LastUsedAt']) {
            $object->setLastUsedAt($data['LastUsedAt']);
            unset($data['LastUsedAt']);
        } elseif (\array_key_exists('LastUsedAt', $data) && null === $data['LastUsedAt']) {
            $object->setLastUsedAt(null);
        }
        if (\array_key_exists('UsageCount', $data) && null !== $data['UsageCount']) {
            $object->setUsageCount($data['UsageCount']);
            unset($data['UsageCount']);
        } elseif (\array_key_exists('UsageCount', $data) && null === $data['UsageCount']) {
            $object->setUsageCount(null);
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
        if ($data->isInitialized('parent') && null !== $data->getParent()) {
            $dataArray['Parent'] = $data->getParent();
        }
        if ($data->isInitialized('parents') && null !== $data->getParents()) {
            $values = [];
            foreach ($data->getParents() as $value) {
                $values[] = $value;
            }
            $dataArray['Parents'] = $values;
        }
        if ($data->isInitialized('type') && null !== $data->getType()) {
            $dataArray['Type'] = $data->getType();
        }
        if ($data->isInitialized('description') && null !== $data->getDescription()) {
            $dataArray['Description'] = $data->getDescription();
        }
        if ($data->isInitialized('inUse') && null !== $data->getInUse()) {
            $dataArray['InUse'] = $data->getInUse();
        }
        if ($data->isInitialized('shared') && null !== $data->getShared()) {
            $dataArray['Shared'] = $data->getShared();
        }
        if ($data->isInitialized('size') && null !== $data->getSize()) {
            $dataArray['Size'] = $data->getSize();
        }
        if ($data->isInitialized('createdAt') && null !== $data->getCreatedAt()) {
            $dataArray['CreatedAt'] = $data->getCreatedAt();
        }
        if ($data->isInitialized('lastUsedAt') && null !== $data->getLastUsedAt()) {
            $dataArray['LastUsedAt'] = $data->getLastUsedAt();
        }
        if ($data->isInitialized('usageCount') && null !== $data->getUsageCount()) {
            $dataArray['UsageCount'] = $data->getUsageCount();
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
        return [\Docker\API\Model\BuildCache::class => false];
    }
}
