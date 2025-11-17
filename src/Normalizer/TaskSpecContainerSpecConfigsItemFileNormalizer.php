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

class TaskSpecContainerSpecConfigsItemFileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecContainerSpecConfigsItemFile::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecContainerSpecConfigsItemFile::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecContainerSpecConfigsItemFile();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('UID', $data) && null !== $data['UID']) {
            $object->setUID($data['UID']);
            unset($data['UID']);
        } elseif (\array_key_exists('UID', $data) && null === $data['UID']) {
            $object->setUID(null);
        }
        if (\array_key_exists('GID', $data) && null !== $data['GID']) {
            $object->setGID($data['GID']);
            unset($data['GID']);
        } elseif (\array_key_exists('GID', $data) && null === $data['GID']) {
            $object->setGID(null);
        }
        if (\array_key_exists('Mode', $data) && null !== $data['Mode']) {
            $object->setMode($data['Mode']);
            unset($data['Mode']);
        } elseif (\array_key_exists('Mode', $data) && null === $data['Mode']) {
            $object->setMode(null);
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
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('uID') && null !== $data->getUID()) {
            $dataArray['UID'] = $data->getUID();
        }
        if ($data->isInitialized('gID') && null !== $data->getGID()) {
            $dataArray['GID'] = $data->getGID();
        }
        if ($data->isInitialized('mode') && null !== $data->getMode()) {
            $dataArray['Mode'] = $data->getMode();
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
        return [\Docker\API\Model\TaskSpecContainerSpecConfigsItemFile::class => false];
    }
}
