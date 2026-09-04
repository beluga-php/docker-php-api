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

class VolumeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Volume::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Volume::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\Volume();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
            unset($data['Name']);
        }
        if (\array_key_exists('Driver', $data) && null !== $data['Driver']) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        } elseif (\array_key_exists('Driver', $data) && null === $data['Driver']) {
            $object->setDriver(null);
            unset($data['Driver']);
        }
        if (\array_key_exists('Mountpoint', $data) && null !== $data['Mountpoint']) {
            $object->setMountpoint($data['Mountpoint']);
            unset($data['Mountpoint']);
        } elseif (\array_key_exists('Mountpoint', $data) && null === $data['Mountpoint']) {
            $object->setMountpoint(null);
            unset($data['Mountpoint']);
        }
        if (\array_key_exists('CreatedAt', $data) && null !== $data['CreatedAt']) {
            $object->setCreatedAt($data['CreatedAt']);
            unset($data['CreatedAt']);
        } elseif (\array_key_exists('CreatedAt', $data) && null === $data['CreatedAt']) {
            $object->setCreatedAt(null);
            unset($data['CreatedAt']);
        }
        if (\array_key_exists('Status', $data) && null !== $data['Status']) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Status'] as $key => $value) {
                $values_1 = new \Docker\API\Runtime\JsonObject();
                foreach ($value as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $values[$key] = $values_1;
            }
            $object->setStatus($values);
            unset($data['Status']);
        } elseif (\array_key_exists('Status', $data) && null === $data['Status']) {
            $object->setStatus(null);
            unset($data['Status']);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values_2 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Labels'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
            unset($data['Labels']);
        }
        if (\array_key_exists('Scope', $data) && null !== $data['Scope']) {
            $object->setScope($data['Scope']);
            unset($data['Scope']);
        } elseif (\array_key_exists('Scope', $data) && null === $data['Scope']) {
            $object->setScope(null);
            unset($data['Scope']);
        }
        if (\array_key_exists('ClusterVolume', $data) && null !== $data['ClusterVolume']) {
            $object->setClusterVolume($this->denormalizer->denormalize($data['ClusterVolume'], \Docker\API\Model\ClusterVolume::class, 'json', $context));
            unset($data['ClusterVolume']);
        } elseif (\array_key_exists('ClusterVolume', $data) && null === $data['ClusterVolume']) {
            $object->setClusterVolume(null);
            unset($data['ClusterVolume']);
        }
        if (\array_key_exists('Options', $data) && null !== $data['Options']) {
            $values_3 = new \Docker\API\Runtime\JsonObject();
            foreach ($data['Options'] as $key_3 => $value_3) {
                $values_3[$key_3] = $value_3;
            }
            $object->setOptions($values_3);
            unset($data['Options']);
        } elseif (\array_key_exists('Options', $data) && null === $data['Options']) {
            $object->setOptions(null);
            unset($data['Options']);
        }
        if (\array_key_exists('UsageData', $data) && null !== $data['UsageData']) {
            $object->setUsageData($this->denormalizer->denormalize($data['UsageData'], \Docker\API\Model\VolumeUsageData::class, 'json', $context));
            unset($data['UsageData']);
        } elseif (\array_key_exists('UsageData', $data) && null === $data['UsageData']) {
            $object->setUsageData(null);
            unset($data['UsageData']);
        }
        foreach ($data as $key_4 => $value_4) {
            if (preg_match('/.*/', (string) $key_4)) {
                $object[$key_4] = $value_4;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['Name'] = $data->getName();
        $dataArray['Driver'] = $data->getDriver();
        $dataArray['Mountpoint'] = $data->getMountpoint();
        if ($data->isInitialized('createdAt') && null !== $data->getCreatedAt()) {
            $dataArray['CreatedAt'] = $data->getCreatedAt();
        }
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $values = new \Docker\API\Runtime\JsonObject();
            foreach ($data->getStatus() as $key => $value) {
                $values_1 = new \Docker\API\Runtime\JsonObject();
                foreach ($value as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $values[$key] = $values_1;
            }
            $dataArray['Status'] = $values;
        }
        $values_2 = new \Docker\API\Runtime\JsonObject();
        foreach ($data->getLabels() as $key_2 => $value_2) {
            $values_2[$key_2] = $value_2;
        }
        $dataArray['Labels'] = $values_2;
        $dataArray['Scope'] = $data->getScope();
        if ($data->isInitialized('clusterVolume') && null !== $data->getClusterVolume()) {
            $dataArray['ClusterVolume'] = null === $data->getClusterVolume() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getClusterVolume(), 'json', $context));
        }
        $values_3 = new \Docker\API\Runtime\JsonObject();
        foreach ($data->getOptions() as $key_3 => $value_3) {
            $values_3[$key_3] = $value_3;
        }
        $dataArray['Options'] = $values_3;
        if ($data->isInitialized('usageData') && null !== $data->getUsageData()) {
            $dataArray['UsageData'] = null === $data->getUsageData() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getUsageData(), 'json', $context));
        }
        foreach ($data->additionalPropertyEntries() as $key_4 => $value_4) {
            if (preg_match('/.*/', (string) $key_4)) {
                $dataArray[$key_4] = $value_4;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\Volume::class => false];
    }
}
