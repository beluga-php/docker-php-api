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
class HealthConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\HealthConfig';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\HealthConfig';
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
        $object = new \Docker\API\Model\HealthConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Test', $data) && $data['Test'] !== null) {
            $values = array();
            foreach ($data['Test'] as $value) {
                $values[] = $value;
            }
            $object->setTest($values);
            unset($data['Test']);
        }
        elseif (\array_key_exists('Test', $data) && $data['Test'] === null) {
            $object->setTest(null);
        }
        if (\array_key_exists('Interval', $data) && $data['Interval'] !== null) {
            $object->setInterval($data['Interval']);
            unset($data['Interval']);
        }
        elseif (\array_key_exists('Interval', $data) && $data['Interval'] === null) {
            $object->setInterval(null);
        }
        if (\array_key_exists('Timeout', $data) && $data['Timeout'] !== null) {
            $object->setTimeout($data['Timeout']);
            unset($data['Timeout']);
        }
        elseif (\array_key_exists('Timeout', $data) && $data['Timeout'] === null) {
            $object->setTimeout(null);
        }
        if (\array_key_exists('Retries', $data) && $data['Retries'] !== null) {
            $object->setRetries($data['Retries']);
            unset($data['Retries']);
        }
        elseif (\array_key_exists('Retries', $data) && $data['Retries'] === null) {
            $object->setRetries(null);
        }
        if (\array_key_exists('StartPeriod', $data) && $data['StartPeriod'] !== null) {
            $object->setStartPeriod($data['StartPeriod']);
            unset($data['StartPeriod']);
        }
        elseif (\array_key_exists('StartPeriod', $data) && $data['StartPeriod'] === null) {
            $object->setStartPeriod(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('test') && null !== $object->getTest()) {
            $values = array();
            foreach ($object->getTest() as $value) {
                $values[] = $value;
            }
            $data['Test'] = $values;
        }
        if ($object->isInitialized('interval') && null !== $object->getInterval()) {
            $data['Interval'] = $object->getInterval();
        }
        if ($object->isInitialized('timeout') && null !== $object->getTimeout()) {
            $data['Timeout'] = $object->getTimeout();
        }
        if ($object->isInitialized('retries') && null !== $object->getRetries()) {
            $data['Retries'] = $object->getRetries();
        }
        if ($object->isInitialized('startPeriod') && null !== $object->getStartPeriod()) {
            $data['StartPeriod'] = $object->getStartPeriod();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}