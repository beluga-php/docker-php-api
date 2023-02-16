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
class ServiceServiceStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\ServiceServiceStatus';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ServiceServiceStatus';
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
        $object = new \Docker\API\Model\ServiceServiceStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('RunningTasks', $data) && $data['RunningTasks'] !== null) {
            $object->setRunningTasks($data['RunningTasks']);
            unset($data['RunningTasks']);
        }
        elseif (\array_key_exists('RunningTasks', $data) && $data['RunningTasks'] === null) {
            $object->setRunningTasks(null);
        }
        if (\array_key_exists('DesiredTasks', $data) && $data['DesiredTasks'] !== null) {
            $object->setDesiredTasks($data['DesiredTasks']);
            unset($data['DesiredTasks']);
        }
        elseif (\array_key_exists('DesiredTasks', $data) && $data['DesiredTasks'] === null) {
            $object->setDesiredTasks(null);
        }
        if (\array_key_exists('CompletedTasks', $data) && $data['CompletedTasks'] !== null) {
            $object->setCompletedTasks($data['CompletedTasks']);
            unset($data['CompletedTasks']);
        }
        elseif (\array_key_exists('CompletedTasks', $data) && $data['CompletedTasks'] === null) {
            $object->setCompletedTasks(null);
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
        if ($object->isInitialized('runningTasks') && null !== $object->getRunningTasks()) {
            $data['RunningTasks'] = $object->getRunningTasks();
        }
        if ($object->isInitialized('desiredTasks') && null !== $object->getDesiredTasks()) {
            $data['DesiredTasks'] = $object->getDesiredTasks();
        }
        if ($object->isInitialized('completedTasks') && null !== $object->getCompletedTasks()) {
            $data['CompletedTasks'] = $object->getCompletedTasks();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}