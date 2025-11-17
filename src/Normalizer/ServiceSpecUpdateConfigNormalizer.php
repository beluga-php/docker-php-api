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

class ServiceSpecUpdateConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ServiceSpecUpdateConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ServiceSpecUpdateConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceSpecUpdateConfig();
        if (\array_key_exists('MaxFailureRatio', $data) && \is_int($data['MaxFailureRatio'])) {
            $data['MaxFailureRatio'] = (float) $data['MaxFailureRatio'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Parallelism', $data) && null !== $data['Parallelism']) {
            $object->setParallelism($data['Parallelism']);
            unset($data['Parallelism']);
        } elseif (\array_key_exists('Parallelism', $data) && null === $data['Parallelism']) {
            $object->setParallelism(null);
        }
        if (\array_key_exists('Delay', $data) && null !== $data['Delay']) {
            $object->setDelay($data['Delay']);
            unset($data['Delay']);
        } elseif (\array_key_exists('Delay', $data) && null === $data['Delay']) {
            $object->setDelay(null);
        }
        if (\array_key_exists('FailureAction', $data) && null !== $data['FailureAction']) {
            $object->setFailureAction($data['FailureAction']);
            unset($data['FailureAction']);
        } elseif (\array_key_exists('FailureAction', $data) && null === $data['FailureAction']) {
            $object->setFailureAction(null);
        }
        if (\array_key_exists('Monitor', $data) && null !== $data['Monitor']) {
            $object->setMonitor($data['Monitor']);
            unset($data['Monitor']);
        } elseif (\array_key_exists('Monitor', $data) && null === $data['Monitor']) {
            $object->setMonitor(null);
        }
        if (\array_key_exists('MaxFailureRatio', $data) && null !== $data['MaxFailureRatio']) {
            $object->setMaxFailureRatio($data['MaxFailureRatio']);
            unset($data['MaxFailureRatio']);
        } elseif (\array_key_exists('MaxFailureRatio', $data) && null === $data['MaxFailureRatio']) {
            $object->setMaxFailureRatio(null);
        }
        if (\array_key_exists('Order', $data) && null !== $data['Order']) {
            $object->setOrder($data['Order']);
            unset($data['Order']);
        } elseif (\array_key_exists('Order', $data) && null === $data['Order']) {
            $object->setOrder(null);
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
        if ($data->isInitialized('parallelism') && null !== $data->getParallelism()) {
            $dataArray['Parallelism'] = $data->getParallelism();
        }
        if ($data->isInitialized('delay') && null !== $data->getDelay()) {
            $dataArray['Delay'] = $data->getDelay();
        }
        if ($data->isInitialized('failureAction') && null !== $data->getFailureAction()) {
            $dataArray['FailureAction'] = $data->getFailureAction();
        }
        if ($data->isInitialized('monitor') && null !== $data->getMonitor()) {
            $dataArray['Monitor'] = $data->getMonitor();
        }
        if ($data->isInitialized('maxFailureRatio') && null !== $data->getMaxFailureRatio()) {
            $dataArray['MaxFailureRatio'] = $data->getMaxFailureRatio();
        }
        if ($data->isInitialized('order') && null !== $data->getOrder()) {
            $dataArray['Order'] = $data->getOrder();
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
        return [\Docker\API\Model\ServiceSpecUpdateConfig::class => false];
    }
}
