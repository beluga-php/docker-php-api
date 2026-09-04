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

class TaskStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskStatus::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskStatus::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\TaskStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Timestamp', $data) && null !== $data['Timestamp']) {
            $object->setTimestamp($data['Timestamp']);
            unset($data['Timestamp']);
        } elseif (\array_key_exists('Timestamp', $data) && null === $data['Timestamp']) {
            $object->setTimestamp(null);
            unset($data['Timestamp']);
        }
        if (\array_key_exists('State', $data) && null !== $data['State']) {
            $object->setState($data['State']);
            unset($data['State']);
        } elseif (\array_key_exists('State', $data) && null === $data['State']) {
            $object->setState(null);
            unset($data['State']);
        }
        if (\array_key_exists('Message', $data) && null !== $data['Message']) {
            $object->setMessage($data['Message']);
            unset($data['Message']);
        } elseif (\array_key_exists('Message', $data) && null === $data['Message']) {
            $object->setMessage(null);
            unset($data['Message']);
        }
        if (\array_key_exists('Err', $data) && null !== $data['Err']) {
            $object->setErr($data['Err']);
            unset($data['Err']);
        } elseif (\array_key_exists('Err', $data) && null === $data['Err']) {
            $object->setErr(null);
            unset($data['Err']);
        }
        if (\array_key_exists('ContainerStatus', $data) && null !== $data['ContainerStatus']) {
            $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], \Docker\API\Model\TaskStatusContainerStatus::class, 'json', $context));
            unset($data['ContainerStatus']);
        } elseif (\array_key_exists('ContainerStatus', $data) && null === $data['ContainerStatus']) {
            $object->setContainerStatus(null);
            unset($data['ContainerStatus']);
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
        if ($data->isInitialized('timestamp') && null !== $data->getTimestamp()) {
            $dataArray['Timestamp'] = $data->getTimestamp();
        }
        if ($data->isInitialized('state') && null !== $data->getState()) {
            $dataArray['State'] = $data->getState();
        }
        if ($data->isInitialized('message') && null !== $data->getMessage()) {
            $dataArray['Message'] = $data->getMessage();
        }
        if ($data->isInitialized('err') && null !== $data->getErr()) {
            $dataArray['Err'] = $data->getErr();
        }
        if ($data->isInitialized('containerStatus') && null !== $data->getContainerStatus()) {
            $dataArray['ContainerStatus'] = null === $data->getContainerStatus() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getContainerStatus(), 'json', $context));
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskStatus::class => false];
    }
}
