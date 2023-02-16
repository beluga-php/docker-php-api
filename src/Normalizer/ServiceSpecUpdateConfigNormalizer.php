<?php

namespace Docker\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ServiceSpecUpdateConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\ServiceSpecUpdateConfig';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ServiceSpecUpdateConfig';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceSpecUpdateConfig();
        if (\array_key_exists('MaxFailureRatio', $data) && \is_int($data['MaxFailureRatio'])) {
            $data['MaxFailureRatio'] = (double) $data['MaxFailureRatio'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Parallelism', $data) && $data['Parallelism'] !== null) {
            $object->setParallelism($data['Parallelism']);
            unset($data['Parallelism']);
        }
        elseif (\array_key_exists('Parallelism', $data) && $data['Parallelism'] === null) {
            $object->setParallelism(null);
        }
        if (\array_key_exists('Delay', $data) && $data['Delay'] !== null) {
            $object->setDelay($data['Delay']);
            unset($data['Delay']);
        }
        elseif (\array_key_exists('Delay', $data) && $data['Delay'] === null) {
            $object->setDelay(null);
        }
        if (\array_key_exists('FailureAction', $data) && $data['FailureAction'] !== null) {
            $object->setFailureAction($data['FailureAction']);
            unset($data['FailureAction']);
        }
        elseif (\array_key_exists('FailureAction', $data) && $data['FailureAction'] === null) {
            $object->setFailureAction(null);
        }
        if (\array_key_exists('Monitor', $data) && $data['Monitor'] !== null) {
            $object->setMonitor($data['Monitor']);
            unset($data['Monitor']);
        }
        elseif (\array_key_exists('Monitor', $data) && $data['Monitor'] === null) {
            $object->setMonitor(null);
        }
        if (\array_key_exists('MaxFailureRatio', $data) && $data['MaxFailureRatio'] !== null) {
            $object->setMaxFailureRatio($data['MaxFailureRatio']);
            unset($data['MaxFailureRatio']);
        }
        elseif (\array_key_exists('MaxFailureRatio', $data) && $data['MaxFailureRatio'] === null) {
            $object->setMaxFailureRatio(null);
        }
        if (\array_key_exists('Order', $data) && $data['Order'] !== null) {
            $object->setOrder($data['Order']);
            unset($data['Order']);
        }
        elseif (\array_key_exists('Order', $data) && $data['Order'] === null) {
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
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
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