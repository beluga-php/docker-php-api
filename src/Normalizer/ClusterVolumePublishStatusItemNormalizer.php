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

class ClusterVolumePublishStatusItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ClusterVolumePublishStatusItem::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ClusterVolumePublishStatusItem::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ClusterVolumePublishStatusItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NodeID', $data) && null !== $data['NodeID']) {
            $object->setNodeID($data['NodeID']);
            unset($data['NodeID']);
        } elseif (\array_key_exists('NodeID', $data) && null === $data['NodeID']) {
            $object->setNodeID(null);
        }
        if (\array_key_exists('State', $data) && null !== $data['State']) {
            $object->setState($data['State']);
            unset($data['State']);
        } elseif (\array_key_exists('State', $data) && null === $data['State']) {
            $object->setState(null);
        }
        if (\array_key_exists('PublishContext', $data) && null !== $data['PublishContext']) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['PublishContext'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setPublishContext($values);
            unset($data['PublishContext']);
        } elseif (\array_key_exists('PublishContext', $data) && null === $data['PublishContext']) {
            $object->setPublishContext(null);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('nodeID') && null !== $data->getNodeID()) {
            $dataArray['NodeID'] = $data->getNodeID();
        }
        if ($data->isInitialized('state') && null !== $data->getState()) {
            $dataArray['State'] = $data->getState();
        }
        if ($data->isInitialized('publishContext') && null !== $data->getPublishContext()) {
            $values = [];
            foreach ($data->getPublishContext() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['PublishContext'] = $values;
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ClusterVolumePublishStatusItem::class => false];
    }
}
