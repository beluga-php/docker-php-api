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
class PluginConfigLinuxNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\PluginConfigLinux';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\PluginConfigLinux';
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
        $object = new \Docker\API\Model\PluginConfigLinux();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Capabilities', $data) && $data['Capabilities'] !== null) {
            $values = array();
            foreach ($data['Capabilities'] as $value) {
                $values[] = $value;
            }
            $object->setCapabilities($values);
            unset($data['Capabilities']);
        }
        elseif (\array_key_exists('Capabilities', $data) && $data['Capabilities'] === null) {
            $object->setCapabilities(null);
        }
        if (\array_key_exists('AllowAllDevices', $data) && $data['AllowAllDevices'] !== null) {
            $object->setAllowAllDevices($data['AllowAllDevices']);
            unset($data['AllowAllDevices']);
        }
        elseif (\array_key_exists('AllowAllDevices', $data) && $data['AllowAllDevices'] === null) {
            $object->setAllowAllDevices(null);
        }
        if (\array_key_exists('Devices', $data) && $data['Devices'] !== null) {
            $values_1 = array();
            foreach ($data['Devices'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\PluginDevice', 'json', $context);
            }
            $object->setDevices($values_1);
            unset($data['Devices']);
        }
        elseif (\array_key_exists('Devices', $data) && $data['Devices'] === null) {
            $object->setDevices(null);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
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
        $values = array();
        foreach ($object->getCapabilities() as $value) {
            $values[] = $value;
        }
        $data['Capabilities'] = $values;
        $data['AllowAllDevices'] = $object->getAllowAllDevices();
        $values_1 = array();
        foreach ($object->getDevices() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $data['Devices'] = $values_1;
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }
        return $data;
    }
}