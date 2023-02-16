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

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\BuildCache' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\BuildCache' === $data::class;
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
        $object = new \Docker\API\Model\BuildCache();
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
        if ($object->isInitialized('iD') && null !== $object->getID()) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('parent') && null !== $object->getParent()) {
            $data['Parent'] = $object->getParent();
        }
        if ($object->isInitialized('type') && null !== $object->getType()) {
            $data['Type'] = $object->getType();
        }
        if ($object->isInitialized('description') && null !== $object->getDescription()) {
            $data['Description'] = $object->getDescription();
        }
        if ($object->isInitialized('inUse') && null !== $object->getInUse()) {
            $data['InUse'] = $object->getInUse();
        }
        if ($object->isInitialized('shared') && null !== $object->getShared()) {
            $data['Shared'] = $object->getShared();
        }
        if ($object->isInitialized('size') && null !== $object->getSize()) {
            $data['Size'] = $object->getSize();
        }
        if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
            $data['CreatedAt'] = $object->getCreatedAt();
        }
        if ($object->isInitialized('lastUsedAt') && null !== $object->getLastUsedAt()) {
            $data['LastUsedAt'] = $object->getLastUsedAt();
        }
        if ($object->isInitialized('usageCount') && null !== $object->getUsageCount()) {
            $data['UsageCount'] = $object->getUsageCount();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
