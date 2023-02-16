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

class ServiceSpecRollbackConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\ServiceSpecRollbackConfig' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ServiceSpecRollbackConfig' === $data::class;
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceSpecRollbackConfig();
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

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('parallelism') && null !== $object->getParallelism()) {
            $data['Parallelism'] = $object->getParallelism();
        }
        if ($object->isInitialized('delay') && null !== $object->getDelay()) {
            $data['Delay'] = $object->getDelay();
        }
        if ($object->isInitialized('failureAction') && null !== $object->getFailureAction()) {
            $data['FailureAction'] = $object->getFailureAction();
        }
        if ($object->isInitialized('monitor') && null !== $object->getMonitor()) {
            $data['Monitor'] = $object->getMonitor();
        }
        if ($object->isInitialized('maxFailureRatio') && null !== $object->getMaxFailureRatio()) {
            $data['MaxFailureRatio'] = $object->getMaxFailureRatio();
        }
        if ($object->isInitialized('order') && null !== $object->getOrder()) {
            $data['Order'] = $object->getOrder();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
