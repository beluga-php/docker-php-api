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
class NetworkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\Network';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Network';
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
        $object = new \Docker\API\Model\Network();
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
        if (\array_key_exists('Id', $data) && $data['Id'] !== null) {
            $object->setId($data['Id']);
            unset($data['Id']);
        }
        elseif (\array_key_exists('Id', $data) && $data['Id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('Created', $data) && $data['Created'] !== null) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        elseif (\array_key_exists('Created', $data) && $data['Created'] === null) {
            $object->setCreated(null);
        }
        if (\array_key_exists('Scope', $data) && $data['Scope'] !== null) {
            $object->setScope($data['Scope']);
            unset($data['Scope']);
        }
        elseif (\array_key_exists('Scope', $data) && $data['Scope'] === null) {
            $object->setScope(null);
        }
        if (\array_key_exists('Driver', $data) && $data['Driver'] !== null) {
            $object->setDriver($data['Driver']);
            unset($data['Driver']);
        }
        elseif (\array_key_exists('Driver', $data) && $data['Driver'] === null) {
            $object->setDriver(null);
        }
        if (\array_key_exists('EnableIPv6', $data) && $data['EnableIPv6'] !== null) {
            $object->setEnableIPv6($data['EnableIPv6']);
            unset($data['EnableIPv6']);
        }
        elseif (\array_key_exists('EnableIPv6', $data) && $data['EnableIPv6'] === null) {
            $object->setEnableIPv6(null);
        }
        if (\array_key_exists('IPAM', $data) && $data['IPAM'] !== null) {
            $object->setIPAM($this->denormalizer->denormalize($data['IPAM'], 'Docker\\API\\Model\\IPAM', 'json', $context));
            unset($data['IPAM']);
        }
        elseif (\array_key_exists('IPAM', $data) && $data['IPAM'] === null) {
            $object->setIPAM(null);
        }
        if (\array_key_exists('Internal', $data) && $data['Internal'] !== null) {
            $object->setInternal($data['Internal']);
            unset($data['Internal']);
        }
        elseif (\array_key_exists('Internal', $data) && $data['Internal'] === null) {
            $object->setInternal(null);
        }
        if (\array_key_exists('Attachable', $data) && $data['Attachable'] !== null) {
            $object->setAttachable($data['Attachable']);
            unset($data['Attachable']);
        }
        elseif (\array_key_exists('Attachable', $data) && $data['Attachable'] === null) {
            $object->setAttachable(null);
        }
        if (\array_key_exists('Ingress', $data) && $data['Ingress'] !== null) {
            $object->setIngress($data['Ingress']);
            unset($data['Ingress']);
        }
        elseif (\array_key_exists('Ingress', $data) && $data['Ingress'] === null) {
            $object->setIngress(null);
        }
        if (\array_key_exists('Containers', $data) && $data['Containers'] !== null) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Containers'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\NetworkContainer', 'json', $context);
            }
            $object->setContainers($values);
            unset($data['Containers']);
        }
        elseif (\array_key_exists('Containers', $data) && $data['Containers'] === null) {
            $object->setContainers(null);
        }
        if (\array_key_exists('Options', $data) && $data['Options'] !== null) {
            $values_1 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setOptions($values_1);
            unset($data['Options']);
        }
        elseif (\array_key_exists('Options', $data) && $data['Options'] === null) {
            $object->setOptions(null);
        }
        if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        }
        elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
            $object->setLabels(null);
        }
        foreach ($data as $key_3 => $value_3) {
            if (preg_match('/.*/', (string) $key_3)) {
                $object[$key_3] = $value_3;
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
        if ($object->isInitialized('id') && null !== $object->getId()) {
            $data['Id'] = $object->getId();
        }
        if ($object->isInitialized('created') && null !== $object->getCreated()) {
            $data['Created'] = $object->getCreated();
        }
        if ($object->isInitialized('scope') && null !== $object->getScope()) {
            $data['Scope'] = $object->getScope();
        }
        if ($object->isInitialized('driver') && null !== $object->getDriver()) {
            $data['Driver'] = $object->getDriver();
        }
        if ($object->isInitialized('enableIPv6') && null !== $object->getEnableIPv6()) {
            $data['EnableIPv6'] = $object->getEnableIPv6();
        }
        if ($object->isInitialized('iPAM') && null !== $object->getIPAM()) {
            $data['IPAM'] = $this->normalizer->normalize($object->getIPAM(), 'json', $context);
        }
        if ($object->isInitialized('internal') && null !== $object->getInternal()) {
            $data['Internal'] = $object->getInternal();
        }
        if ($object->isInitialized('attachable') && null !== $object->getAttachable()) {
            $data['Attachable'] = $object->getAttachable();
        }
        if ($object->isInitialized('ingress') && null !== $object->getIngress()) {
            $data['Ingress'] = $object->getIngress();
        }
        if ($object->isInitialized('containers') && null !== $object->getContainers()) {
            $values = array();
            foreach ($object->getContainers() as $key => $value) {
                $values[$key] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Containers'] = $values;
        }
        if ($object->isInitialized('options') && null !== $object->getOptions()) {
            $values_1 = array();
            foreach ($object->getOptions() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['Options'] = $values_1;
        }
        if ($object->isInitialized('labels') && null !== $object->getLabels()) {
            $values_2 = array();
            foreach ($object->getLabels() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['Labels'] = $values_2;
        }
        foreach ($object as $key_3 => $value_3) {
            if (preg_match('/.*/', (string) $key_3)) {
                $data[$key_3] = $value_3;
            }
        }
        return $data;
    }
}