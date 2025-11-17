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

class HealthConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\HealthConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\HealthConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\HealthConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Test', $data) && null !== $data['Test']) {
            $values = [];
            foreach ($data['Test'] as $value) {
                $values[] = $value;
            }
            $object->setTest($values);
            unset($data['Test']);
        } elseif (\array_key_exists('Test', $data) && null === $data['Test']) {
            $object->setTest(null);
        }
        if (\array_key_exists('Interval', $data) && null !== $data['Interval']) {
            $object->setInterval($data['Interval']);
            unset($data['Interval']);
        } elseif (\array_key_exists('Interval', $data) && null === $data['Interval']) {
            $object->setInterval(null);
        }
        if (\array_key_exists('Timeout', $data) && null !== $data['Timeout']) {
            $object->setTimeout($data['Timeout']);
            unset($data['Timeout']);
        } elseif (\array_key_exists('Timeout', $data) && null === $data['Timeout']) {
            $object->setTimeout(null);
        }
        if (\array_key_exists('Retries', $data) && null !== $data['Retries']) {
            $object->setRetries($data['Retries']);
            unset($data['Retries']);
        } elseif (\array_key_exists('Retries', $data) && null === $data['Retries']) {
            $object->setRetries(null);
        }
        if (\array_key_exists('StartPeriod', $data) && null !== $data['StartPeriod']) {
            $object->setStartPeriod($data['StartPeriod']);
            unset($data['StartPeriod']);
        } elseif (\array_key_exists('StartPeriod', $data) && null === $data['StartPeriod']) {
            $object->setStartPeriod(null);
        }
        if (\array_key_exists('StartInterval', $data) && null !== $data['StartInterval']) {
            $object->setStartInterval($data['StartInterval']);
            unset($data['StartInterval']);
        } elseif (\array_key_exists('StartInterval', $data) && null === $data['StartInterval']) {
            $object->setStartInterval(null);
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
        if ($data->isInitialized('test') && null !== $data->getTest()) {
            $values = [];
            foreach ($data->getTest() as $value) {
                $values[] = $value;
            }
            $dataArray['Test'] = $values;
        }
        if ($data->isInitialized('interval') && null !== $data->getInterval()) {
            $dataArray['Interval'] = $data->getInterval();
        }
        if ($data->isInitialized('timeout') && null !== $data->getTimeout()) {
            $dataArray['Timeout'] = $data->getTimeout();
        }
        if ($data->isInitialized('retries') && null !== $data->getRetries()) {
            $dataArray['Retries'] = $data->getRetries();
        }
        if ($data->isInitialized('startPeriod') && null !== $data->getStartPeriod()) {
            $dataArray['StartPeriod'] = $data->getStartPeriod();
        }
        if ($data->isInitialized('startInterval') && null !== $data->getStartInterval()) {
            $dataArray['StartInterval'] = $data->getStartInterval();
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
        return [\Docker\API\Model\HealthConfig::class => false];
    }
}
