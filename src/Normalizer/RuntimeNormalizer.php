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
class RuntimeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\Runtime';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Runtime';
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
        $object = new \Docker\API\Model\Runtime();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('path', $data) && $data['path'] !== null) {
            $object->setPath($data['path']);
            unset($data['path']);
        }
        elseif (\array_key_exists('path', $data) && $data['path'] === null) {
            $object->setPath(null);
        }
        if (\array_key_exists('runtimeArgs', $data) && $data['runtimeArgs'] !== null) {
            $values = array();
            foreach ($data['runtimeArgs'] as $value) {
                $values[] = $value;
            }
            $object->setRuntimeArgs($values);
            unset($data['runtimeArgs']);
        }
        elseif (\array_key_exists('runtimeArgs', $data) && $data['runtimeArgs'] === null) {
            $object->setRuntimeArgs(null);
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
        if ($object->isInitialized('path') && null !== $object->getPath()) {
            $data['path'] = $object->getPath();
        }
        if ($object->isInitialized('runtimeArgs') && null !== $object->getRuntimeArgs()) {
            $values = array();
            foreach ($object->getRuntimeArgs() as $value) {
                $values[] = $value;
            }
            $data['runtimeArgs'] = $values;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}