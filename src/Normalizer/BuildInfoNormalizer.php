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

class BuildInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\BuildInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\BuildInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\BuildInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
        }
        if (\array_key_exists('stream', $data) && null !== $data['stream']) {
            $object->setStream($data['stream']);
            unset($data['stream']);
        } elseif (\array_key_exists('stream', $data) && null === $data['stream']) {
            $object->setStream(null);
        }
        if (\array_key_exists('error', $data) && null !== $data['error']) {
            $object->setError($data['error']);
            unset($data['error']);
        } elseif (\array_key_exists('error', $data) && null === $data['error']) {
            $object->setError(null);
        }
        if (\array_key_exists('errorDetail', $data) && null !== $data['errorDetail']) {
            $object->setErrorDetail($this->denormalizer->denormalize($data['errorDetail'], \Docker\API\Model\ErrorDetail::class, 'json', $context));
            unset($data['errorDetail']);
        } elseif (\array_key_exists('errorDetail', $data) && null === $data['errorDetail']) {
            $object->setErrorDetail(null);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
            unset($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
        }
        if (\array_key_exists('progress', $data) && null !== $data['progress']) {
            $object->setProgress($data['progress']);
            unset($data['progress']);
        } elseif (\array_key_exists('progress', $data) && null === $data['progress']) {
            $object->setProgress(null);
        }
        if (\array_key_exists('progressDetail', $data) && null !== $data['progressDetail']) {
            $object->setProgressDetail($this->denormalizer->denormalize($data['progressDetail'], \Docker\API\Model\ProgressDetail::class, 'json', $context));
            unset($data['progressDetail']);
        } elseif (\array_key_exists('progressDetail', $data) && null === $data['progressDetail']) {
            $object->setProgressDetail(null);
        }
        if (\array_key_exists('aux', $data) && null !== $data['aux']) {
            $object->setAux($this->denormalizer->denormalize($data['aux'], \Docker\API\Model\ImageID::class, 'json', $context));
            unset($data['aux']);
        } elseif (\array_key_exists('aux', $data) && null === $data['aux']) {
            $object->setAux(null);
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
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['id'] = $data->getId();
        }
        if ($data->isInitialized('stream') && null !== $data->getStream()) {
            $dataArray['stream'] = $data->getStream();
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['error'] = $data->getError();
        }
        if ($data->isInitialized('errorDetail') && null !== $data->getErrorDetail()) {
            $dataArray['errorDetail'] = $this->normalizer->normalize($data->getErrorDetail(), 'json', $context);
        }
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $dataArray['status'] = $data->getStatus();
        }
        if ($data->isInitialized('progress') && null !== $data->getProgress()) {
            $dataArray['progress'] = $data->getProgress();
        }
        if ($data->isInitialized('progressDetail') && null !== $data->getProgressDetail()) {
            $dataArray['progressDetail'] = $this->normalizer->normalize($data->getProgressDetail(), 'json', $context);
        }
        if ($data->isInitialized('aux') && null !== $data->getAux()) {
            $dataArray['aux'] = $this->normalizer->normalize($data->getAux(), 'json', $context);
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
        return [\Docker\API\Model\BuildInfo::class => false];
    }
}
