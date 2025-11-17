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

class ContainerSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerSummary::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerSummary::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data) && null !== $data['Id']) {
            $object->setId($data['Id']);
            unset($data['Id']);
        } elseif (\array_key_exists('Id', $data) && null === $data['Id']) {
            $object->setId(null);
        }
        if (\array_key_exists('Names', $data) && null !== $data['Names']) {
            $values = [];
            foreach ($data['Names'] as $value) {
                $values[] = $value;
            }
            $object->setNames($values);
            unset($data['Names']);
        } elseif (\array_key_exists('Names', $data) && null === $data['Names']) {
            $object->setNames(null);
        }
        if (\array_key_exists('Image', $data) && null !== $data['Image']) {
            $object->setImage($data['Image']);
            unset($data['Image']);
        } elseif (\array_key_exists('Image', $data) && null === $data['Image']) {
            $object->setImage(null);
        }
        if (\array_key_exists('ImageID', $data) && null !== $data['ImageID']) {
            $object->setImageID($data['ImageID']);
            unset($data['ImageID']);
        } elseif (\array_key_exists('ImageID', $data) && null === $data['ImageID']) {
            $object->setImageID(null);
        }
        if (\array_key_exists('Command', $data) && null !== $data['Command']) {
            $object->setCommand($data['Command']);
            unset($data['Command']);
        } elseif (\array_key_exists('Command', $data) && null === $data['Command']) {
            $object->setCommand(null);
        }
        if (\array_key_exists('Created', $data) && null !== $data['Created']) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        } elseif (\array_key_exists('Created', $data) && null === $data['Created']) {
            $object->setCreated(null);
        }
        if (\array_key_exists('Ports', $data) && null !== $data['Ports']) {
            $values_1 = [];
            foreach ($data['Ports'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\Port::class, 'json', $context);
            }
            $object->setPorts($values_1);
            unset($data['Ports']);
        } elseif (\array_key_exists('Ports', $data) && null === $data['Ports']) {
            $object->setPorts(null);
        }
        if (\array_key_exists('SizeRw', $data) && null !== $data['SizeRw']) {
            $object->setSizeRw($data['SizeRw']);
            unset($data['SizeRw']);
        } elseif (\array_key_exists('SizeRw', $data) && null === $data['SizeRw']) {
            $object->setSizeRw(null);
        }
        if (\array_key_exists('SizeRootFs', $data) && null !== $data['SizeRootFs']) {
            $object->setSizeRootFs($data['SizeRootFs']);
            unset($data['SizeRootFs']);
        } elseif (\array_key_exists('SizeRootFs', $data) && null === $data['SizeRootFs']) {
            $object->setSizeRootFs(null);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
        }
        if (\array_key_exists('State', $data) && null !== $data['State']) {
            $object->setState($data['State']);
            unset($data['State']);
        } elseif (\array_key_exists('State', $data) && null === $data['State']) {
            $object->setState(null);
        }
        if (\array_key_exists('Status', $data) && null !== $data['Status']) {
            $object->setStatus($data['Status']);
            unset($data['Status']);
        } elseif (\array_key_exists('Status', $data) && null === $data['Status']) {
            $object->setStatus(null);
        }
        if (\array_key_exists('HostConfig', $data) && null !== $data['HostConfig']) {
            $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], \Docker\API\Model\ContainerSummaryHostConfig::class, 'json', $context));
            unset($data['HostConfig']);
        } elseif (\array_key_exists('HostConfig', $data) && null === $data['HostConfig']) {
            $object->setHostConfig(null);
        }
        if (\array_key_exists('NetworkSettings', $data) && null !== $data['NetworkSettings']) {
            $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], \Docker\API\Model\ContainerSummaryNetworkSettings::class, 'json', $context));
            unset($data['NetworkSettings']);
        } elseif (\array_key_exists('NetworkSettings', $data) && null === $data['NetworkSettings']) {
            $object->setNetworkSettings(null);
        }
        if (\array_key_exists('Mounts', $data) && null !== $data['Mounts']) {
            $values_3 = [];
            foreach ($data['Mounts'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\MountPoint::class, 'json', $context);
            }
            $object->setMounts($values_3);
            unset($data['Mounts']);
        } elseif (\array_key_exists('Mounts', $data) && null === $data['Mounts']) {
            $object->setMounts(null);
        }
        foreach ($data as $key_1 => $value_4) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_4;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['Id'] = $data->getId();
        }
        if ($data->isInitialized('names') && null !== $data->getNames()) {
            $values = [];
            foreach ($data->getNames() as $value) {
                $values[] = $value;
            }
            $dataArray['Names'] = $values;
        }
        if ($data->isInitialized('image') && null !== $data->getImage()) {
            $dataArray['Image'] = $data->getImage();
        }
        if ($data->isInitialized('imageID') && null !== $data->getImageID()) {
            $dataArray['ImageID'] = $data->getImageID();
        }
        if ($data->isInitialized('command') && null !== $data->getCommand()) {
            $dataArray['Command'] = $data->getCommand();
        }
        if ($data->isInitialized('created') && null !== $data->getCreated()) {
            $dataArray['Created'] = $data->getCreated();
        }
        if ($data->isInitialized('ports') && null !== $data->getPorts()) {
            $values_1 = [];
            foreach ($data->getPorts() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['Ports'] = $values_1;
        }
        if ($data->isInitialized('sizeRw') && null !== $data->getSizeRw()) {
            $dataArray['SizeRw'] = $data->getSizeRw();
        }
        if ($data->isInitialized('sizeRootFs') && null !== $data->getSizeRootFs()) {
            $dataArray['SizeRootFs'] = $data->getSizeRootFs();
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values_2 = [];
            foreach ($data->getLabels() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $dataArray['Labels'] = $values_2;
        }
        if ($data->isInitialized('state') && null !== $data->getState()) {
            $dataArray['State'] = $data->getState();
        }
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $dataArray['Status'] = $data->getStatus();
        }
        if ($data->isInitialized('hostConfig') && null !== $data->getHostConfig()) {
            $dataArray['HostConfig'] = $this->normalizer->normalize($data->getHostConfig(), 'json', $context);
        }
        if ($data->isInitialized('networkSettings') && null !== $data->getNetworkSettings()) {
            $dataArray['NetworkSettings'] = $this->normalizer->normalize($data->getNetworkSettings(), 'json', $context);
        }
        if ($data->isInitialized('mounts') && null !== $data->getMounts()) {
            $values_3 = [];
            foreach ($data->getMounts() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $dataArray['Mounts'] = $values_3;
        }
        foreach ($data as $key_1 => $value_4) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_4;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerSummary::class => false];
    }
}
