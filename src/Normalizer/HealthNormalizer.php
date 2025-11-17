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

class HealthNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Health::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Health::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Health();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Status', $data) && null !== $data['Status']) {
            $object->setStatus($data['Status']);
            unset($data['Status']);
        } elseif (\array_key_exists('Status', $data) && null === $data['Status']) {
            $object->setStatus(null);
        }
        if (\array_key_exists('FailingStreak', $data) && null !== $data['FailingStreak']) {
            $object->setFailingStreak($data['FailingStreak']);
            unset($data['FailingStreak']);
        } elseif (\array_key_exists('FailingStreak', $data) && null === $data['FailingStreak']) {
            $object->setFailingStreak(null);
        }
        if (\array_key_exists('Log', $data) && null !== $data['Log']) {
            $values = [];
            foreach ($data['Log'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\HealthcheckResult::class, 'json', $context);
            }
            $object->setLog($values);
            unset($data['Log']);
        } elseif (\array_key_exists('Log', $data) && null === $data['Log']) {
            $object->setLog(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $dataArray['Status'] = $data->getStatus();
        }
        if ($data->isInitialized('failingStreak') && null !== $data->getFailingStreak()) {
            $dataArray['FailingStreak'] = $data->getFailingStreak();
        }
        if ($data->isInitialized('log') && null !== $data->getLog()) {
            $values = [];
            foreach ($data->getLog() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Log'] = $values;
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\Health::class => false];
    }
}
