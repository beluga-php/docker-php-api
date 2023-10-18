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

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\TaskStatus' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\TaskStatus' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
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
            $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], 'Docker\\API\\Model\\TaskStatusContainerStatus', 'json', $context));
            unset($data['ContainerStatus']);
        } elseif (\array_key_exists('ContainerStatus', $data) && null === $data['ContainerStatus']) {
            $object->setContainerStatus(null);
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
        if ($object->isInitialized('timestamp') && null !== $object->getTimestamp()) {
            $data['Timestamp'] = $object->getTimestamp();
        }
        if ($object->isInitialized('state') && null !== $object->getState()) {
            $data['State'] = $object->getState();
        }
        if ($object->isInitialized('message') && null !== $object->getMessage()) {
            $data['Message'] = $object->getMessage();
        }
        if ($object->isInitialized('err') && null !== $object->getErr()) {
            $data['Err'] = $object->getErr();
        }
        if ($object->isInitialized('containerStatus') && null !== $object->getContainerStatus()) {
            $data['ContainerStatus'] = null === $object->getContainerStatus() ? null : new \ArrayObject($this->normalizer->normalize($object->getContainerStatus(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\TaskStatus' => false];
    }
}
