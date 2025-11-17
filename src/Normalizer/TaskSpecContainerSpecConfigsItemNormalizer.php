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

class TaskSpecContainerSpecConfigsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecContainerSpecConfigsItem::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecContainerSpecConfigsItem::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecContainerSpecConfigsItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('File', $data) && null !== $data['File']) {
            $object->setFile($this->denormalizer->denormalize($data['File'], \Docker\API\Model\TaskSpecContainerSpecConfigsItemFile::class, 'json', $context));
            unset($data['File']);
        } elseif (\array_key_exists('File', $data) && null === $data['File']) {
            $object->setFile(null);
        }
        if (\array_key_exists('Runtime', $data) && null !== $data['Runtime']) {
            $object->setRuntime($this->denormalizer->denormalize($data['Runtime'], \Docker\API\Model\TaskSpecContainerSpecConfigsItemRuntime::class, 'json', $context));
            unset($data['Runtime']);
        } elseif (\array_key_exists('Runtime', $data) && null === $data['Runtime']) {
            $object->setRuntime(null);
        }
        if (\array_key_exists('ConfigID', $data) && null !== $data['ConfigID']) {
            $object->setConfigID($data['ConfigID']);
            unset($data['ConfigID']);
        } elseif (\array_key_exists('ConfigID', $data) && null === $data['ConfigID']) {
            $object->setConfigID(null);
        }
        if (\array_key_exists('ConfigName', $data) && null !== $data['ConfigName']) {
            $object->setConfigName($data['ConfigName']);
            unset($data['ConfigName']);
        } elseif (\array_key_exists('ConfigName', $data) && null === $data['ConfigName']) {
            $object->setConfigName(null);
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
        if ($data->isInitialized('file') && null !== $data->getFile()) {
            $dataArray['File'] = $this->normalizer->normalize($data->getFile(), 'json', $context);
        }
        if ($data->isInitialized('runtime') && null !== $data->getRuntime()) {
            $dataArray['Runtime'] = $this->normalizer->normalize($data->getRuntime(), 'json', $context);
        }
        if ($data->isInitialized('configID') && null !== $data->getConfigID()) {
            $dataArray['ConfigID'] = $data->getConfigID();
        }
        if ($data->isInitialized('configName') && null !== $data->getConfigName()) {
            $dataArray['ConfigName'] = $data->getConfigName();
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
        return [\Docker\API\Model\TaskSpecContainerSpecConfigsItem::class => false];
    }
}
