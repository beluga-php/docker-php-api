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
class TaskSpecPluginSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\TaskSpecPluginSpec';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\TaskSpecPluginSpec';
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
        $object = new \Docker\API\Model\TaskSpecPluginSpec();
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
        if (\array_key_exists('Remote', $data) && $data['Remote'] !== null) {
            $object->setRemote($data['Remote']);
            unset($data['Remote']);
        }
        elseif (\array_key_exists('Remote', $data) && $data['Remote'] === null) {
            $object->setRemote(null);
        }
        if (\array_key_exists('Disabled', $data) && $data['Disabled'] !== null) {
            $object->setDisabled($data['Disabled']);
            unset($data['Disabled']);
        }
        elseif (\array_key_exists('Disabled', $data) && $data['Disabled'] === null) {
            $object->setDisabled(null);
        }
        if (\array_key_exists('PluginPrivilege', $data) && $data['PluginPrivilege'] !== null) {
            $values = array();
            foreach ($data['PluginPrivilege'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\TaskSpecPluginSpecPluginPrivilegeItem', 'json', $context);
            }
            $object->setPluginPrivilege($values);
            unset($data['PluginPrivilege']);
        }
        elseif (\array_key_exists('PluginPrivilege', $data) && $data['PluginPrivilege'] === null) {
            $object->setPluginPrivilege(null);
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
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('remote') && null !== $object->getRemote()) {
            $data['Remote'] = $object->getRemote();
        }
        if ($object->isInitialized('disabled') && null !== $object->getDisabled()) {
            $data['Disabled'] = $object->getDisabled();
        }
        if ($object->isInitialized('pluginPrivilege') && null !== $object->getPluginPrivilege()) {
            $values = array();
            foreach ($object->getPluginPrivilege() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['PluginPrivilege'] = $values;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}