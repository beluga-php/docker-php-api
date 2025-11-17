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
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Timestamp', $data) && null !== $data['Timestamp']) {
            $object->setTimestamp($data['Timestamp']);
            unset($data['Timestamp']);
        } elseif (\array_key_exists('Timestamp', $data) && null === $data['Timestamp']) {
            $object->setTimestamp(null);
        }
        if (\array_key_exists('State', $data) && null !== $data['State']) {
            $object->setState($data['State']);
            unset($data['State']);
        } elseif (\array_key_exists('State', $data) && null === $data['State']) {
            $object->setState(null);
        }
        if (\array_key_exists('Message', $data) && null !== $data['Message']) {
            $object->setMessage($data['Message']);
            unset($data['Message']);
        } elseif (\array_key_exists('Message', $data) && null === $data['Message']) {
            $object->setMessage(null);
        }
        if (\array_key_exists('Err', $data) && null !== $data['Err']) {
            $object->setErr($data['Err']);
            unset($data['Err']);
        } elseif (\array_key_exists('Err', $data) && null === $data['Err']) {
            $object->setErr(null);
        }
        if (\array_key_exists('ContainerStatus', $data) && null !== $data['ContainerStatus']) {
            $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], \Docker\API\Model\ContainerStatus::class, 'json', $context));
            unset($data['ContainerStatus']);
        } elseif (\array_key_exists('ContainerStatus', $data) && null === $data['ContainerStatus']) {
            $object->setContainerStatus(null);
        }
        if (\array_key_exists('PortStatus', $data) && null !== $data['PortStatus']) {
            $object->setPortStatus($this->denormalizer->denormalize($data['PortStatus'], \Docker\API\Model\PortStatus::class, 'json', $context));
            unset($data['PortStatus']);
        } elseif (\array_key_exists('PortStatus', $data) && null === $data['PortStatus']) {
            $object->setPortStatus(null);
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
            $dataArray['ContainerStatus'] = $this->normalizer->normalize($data->getContainerStatus(), 'json', $context);
        }
        if ($data->isInitialized('portStatus') && null !== $data->getPortStatus()) {
            $dataArray['PortStatus'] = $this->normalizer->normalize($data->getPortStatus(), 'json', $context);
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
        return [\Docker\API\Model\TaskStatus::class => false];
    }
}
