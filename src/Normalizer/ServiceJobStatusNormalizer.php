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

class ServiceJobStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ServiceJobStatus::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ServiceJobStatus::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceJobStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('JobIteration', $data) && null !== $data['JobIteration']) {
            $object->setJobIteration($this->denormalizer->denormalize($data['JobIteration'], \Docker\API\Model\ObjectVersion::class, 'json', $context));
            unset($data['JobIteration']);
        } elseif (\array_key_exists('JobIteration', $data) && null === $data['JobIteration']) {
            $object->setJobIteration(null);
        }
        if (\array_key_exists('LastExecution', $data) && null !== $data['LastExecution']) {
            $object->setLastExecution($data['LastExecution']);
            unset($data['LastExecution']);
        } elseif (\array_key_exists('LastExecution', $data) && null === $data['LastExecution']) {
            $object->setLastExecution(null);
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
        if ($data->isInitialized('jobIteration') && null !== $data->getJobIteration()) {
            $dataArray['JobIteration'] = $this->normalizer->normalize($data->getJobIteration(), 'json', $context);
        }
        if ($data->isInitialized('lastExecution') && null !== $data->getLastExecution()) {
            $dataArray['LastExecution'] = $data->getLastExecution();
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
        return [\Docker\API\Model\ServiceJobStatus::class => false];
    }
}
