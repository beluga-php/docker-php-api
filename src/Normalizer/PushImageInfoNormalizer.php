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

class PushImageInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\PushImageInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\PushImageInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\PushImageInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('error', $data) && null !== $data['error']) {
            $object->setError($data['error']);
            unset($data['error']);
        } elseif (\array_key_exists('error', $data) && null === $data['error']) {
            $object->setError(null);
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
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['error'] = $data->getError();
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
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\PushImageInfo::class => false];
    }
}
