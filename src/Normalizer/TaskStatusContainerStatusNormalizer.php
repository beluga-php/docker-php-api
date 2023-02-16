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
class TaskStatusContainerStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\TaskStatusContainerStatus';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\TaskStatusContainerStatus';
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
        $object = new \Docker\API\Model\TaskStatusContainerStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ContainerID', $data) && $data['ContainerID'] !== null) {
            $object->setContainerID($data['ContainerID']);
            unset($data['ContainerID']);
        }
        elseif (\array_key_exists('ContainerID', $data) && $data['ContainerID'] === null) {
            $object->setContainerID(null);
        }
        if (\array_key_exists('PID', $data) && $data['PID'] !== null) {
            $object->setPID($data['PID']);
            unset($data['PID']);
        }
        elseif (\array_key_exists('PID', $data) && $data['PID'] === null) {
            $object->setPID(null);
        }
        if (\array_key_exists('ExitCode', $data) && $data['ExitCode'] !== null) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        }
        elseif (\array_key_exists('ExitCode', $data) && $data['ExitCode'] === null) {
            $object->setExitCode(null);
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
        if ($object->isInitialized('containerID') && null !== $object->getContainerID()) {
            $data['ContainerID'] = $object->getContainerID();
        }
        if ($object->isInitialized('pID') && null !== $object->getPID()) {
            $data['PID'] = $object->getPID();
        }
        if ($object->isInitialized('exitCode') && null !== $object->getExitCode()) {
            $data['ExitCode'] = $object->getExitCode();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}