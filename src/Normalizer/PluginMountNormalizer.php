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
class PluginMountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\PluginMount';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\PluginMount';
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
        $object = new \Docker\API\Model\PluginMount();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && $data['Name'] !== null) {
            $object->setName($data['Name']);
            unset($data['Name']);
        }
        elseif (\array_key_exists('Name', $data) && $data['Name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('Description', $data) && $data['Description'] !== null) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        }
        elseif (\array_key_exists('Description', $data) && $data['Description'] === null) {
            $object->setDescription(null);
        }
        if (\array_key_exists('Settable', $data) && $data['Settable'] !== null) {
            $values = array();
            foreach ($data['Settable'] as $value) {
                $values[] = $value;
            }
            $object->setSettable($values);
            unset($data['Settable']);
        }
        elseif (\array_key_exists('Settable', $data) && $data['Settable'] === null) {
            $object->setSettable(null);
        }
        if (\array_key_exists('Source', $data) && $data['Source'] !== null) {
            $object->setSource($data['Source']);
            unset($data['Source']);
        }
        elseif (\array_key_exists('Source', $data) && $data['Source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('Destination', $data) && $data['Destination'] !== null) {
            $object->setDestination($data['Destination']);
            unset($data['Destination']);
        }
        elseif (\array_key_exists('Destination', $data) && $data['Destination'] === null) {
            $object->setDestination(null);
        }
        if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
            $object->setType($data['Type']);
            unset($data['Type']);
        }
        elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('Options', $data) && $data['Options'] !== null) {
            $values_1 = array();
            foreach ($data['Options'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setOptions($values_1);
            unset($data['Options']);
        }
        elseif (\array_key_exists('Options', $data) && $data['Options'] === null) {
            $object->setOptions(null);
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
        $data['Name'] = $object->getName();
        $data['Description'] = $object->getDescription();
        $values = array();
        foreach ($object->getSettable() as $value) {
            $values[] = $value;
        }
        $data['Settable'] = $values;
        $data['Source'] = $object->getSource();
        $data['Destination'] = $object->getDestination();
        $data['Type'] = $object->getType();
        $values_1 = array();
        foreach ($object->getOptions() as $value_1) {
            $values_1[] = $value_1;
        }
        $data['Options'] = $values_1;
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }
        return $data;
    }
}