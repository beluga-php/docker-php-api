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

class EventMessageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\EventMessage::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\EventMessage::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\EventMessage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Type', $data) && null !== $data['Type']) {
            $object->setType($data['Type']);
            unset($data['Type']);
        } elseif (\array_key_exists('Type', $data) && null === $data['Type']) {
            $object->setType(null);
            unset($data['Type']);
        }
        if (\array_key_exists('Action', $data) && null !== $data['Action']) {
            $object->setAction($data['Action']);
            unset($data['Action']);
        } elseif (\array_key_exists('Action', $data) && null === $data['Action']) {
            $object->setAction(null);
            unset($data['Action']);
        }
        if (\array_key_exists('Actor', $data) && null !== $data['Actor']) {
            $object->setActor($this->denormalizer->denormalize($data['Actor'], \Docker\API\Model\EventActor::class, 'json', $context));
            unset($data['Actor']);
        } elseif (\array_key_exists('Actor', $data) && null === $data['Actor']) {
            $object->setActor(null);
            unset($data['Actor']);
        }
        if (\array_key_exists('scope', $data) && null !== $data['scope']) {
            $object->setScope($data['scope']);
            unset($data['scope']);
        } elseif (\array_key_exists('scope', $data) && null === $data['scope']) {
            $object->setScope(null);
            unset($data['scope']);
        }
        if (\array_key_exists('time', $data) && null !== $data['time']) {
            $object->setTime($data['time']);
            unset($data['time']);
        } elseif (\array_key_exists('time', $data) && null === $data['time']) {
            $object->setTime(null);
            unset($data['time']);
        }
        if (\array_key_exists('timeNano', $data) && null !== $data['timeNano']) {
            $object->setTimeNano($data['timeNano']);
            unset($data['timeNano']);
        } elseif (\array_key_exists('timeNano', $data) && null === $data['timeNano']) {
            $object->setTimeNano(null);
            unset($data['timeNano']);
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
        if ($data->isInitialized('type') && null !== $data->getType()) {
            $dataArray['Type'] = $data->getType();
        }
        if ($data->isInitialized('action') && null !== $data->getAction()) {
            $dataArray['Action'] = $data->getAction();
        }
        if ($data->isInitialized('actor') && null !== $data->getActor()) {
            $dataArray['Actor'] = null === $data->getActor() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getActor(), 'json', $context));
        }
        if ($data->isInitialized('scope') && null !== $data->getScope()) {
            $dataArray['scope'] = $data->getScope();
        }
        if ($data->isInitialized('time') && null !== $data->getTime()) {
            $dataArray['time'] = $data->getTime();
        }
        if ($data->isInitialized('timeNano') && null !== $data->getTimeNano()) {
            $dataArray['timeNano'] = $data->getTimeNano();
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
        return [\Docker\API\Model\EventMessage::class => false];
    }
}
