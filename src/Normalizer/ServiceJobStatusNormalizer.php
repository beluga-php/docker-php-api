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
class ServiceJobStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\ServiceJobStatus';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ServiceJobStatus';
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
        $object = new \Docker\API\Model\ServiceJobStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('JobIteration', $data) && $data['JobIteration'] !== null) {
            $object->setJobIteration($this->denormalizer->denormalize($data['JobIteration'], 'Docker\\API\\Model\\ObjectVersion', 'json', $context));
            unset($data['JobIteration']);
        }
        elseif (\array_key_exists('JobIteration', $data) && $data['JobIteration'] === null) {
            $object->setJobIteration(null);
        }
        if (\array_key_exists('LastExecution', $data) && $data['LastExecution'] !== null) {
            $object->setLastExecution($data['LastExecution']);
            unset($data['LastExecution']);
        }
        elseif (\array_key_exists('LastExecution', $data) && $data['LastExecution'] === null) {
            $object->setLastExecution(null);
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
        if ($object->isInitialized('jobIteration') && null !== $object->getJobIteration()) {
            $data['JobIteration'] = $this->normalizer->normalize($object->getJobIteration(), 'json', $context);
        }
        if ($object->isInitialized('lastExecution') && null !== $object->getLastExecution()) {
            $data['LastExecution'] = $object->getLastExecution();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}