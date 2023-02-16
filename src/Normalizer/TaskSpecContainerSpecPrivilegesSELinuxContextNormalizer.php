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
class TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext';
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
        $object = new \Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Disable', $data) && $data['Disable'] !== null) {
            $object->setDisable($data['Disable']);
            unset($data['Disable']);
        }
        elseif (\array_key_exists('Disable', $data) && $data['Disable'] === null) {
            $object->setDisable(null);
        }
        if (\array_key_exists('User', $data) && $data['User'] !== null) {
            $object->setUser($data['User']);
            unset($data['User']);
        }
        elseif (\array_key_exists('User', $data) && $data['User'] === null) {
            $object->setUser(null);
        }
        if (\array_key_exists('Role', $data) && $data['Role'] !== null) {
            $object->setRole($data['Role']);
            unset($data['Role']);
        }
        elseif (\array_key_exists('Role', $data) && $data['Role'] === null) {
            $object->setRole(null);
        }
        if (\array_key_exists('Type', $data) && $data['Type'] !== null) {
            $object->setType($data['Type']);
            unset($data['Type']);
        }
        elseif (\array_key_exists('Type', $data) && $data['Type'] === null) {
            $object->setType(null);
        }
        if (\array_key_exists('Level', $data) && $data['Level'] !== null) {
            $object->setLevel($data['Level']);
            unset($data['Level']);
        }
        elseif (\array_key_exists('Level', $data) && $data['Level'] === null) {
            $object->setLevel(null);
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
        if ($object->isInitialized('disable') && null !== $object->getDisable()) {
            $data['Disable'] = $object->getDisable();
        }
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $data['User'] = $object->getUser();
        }
        if ($object->isInitialized('role') && null !== $object->getRole()) {
            $data['Role'] = $object->getRole();
        }
        if ($object->isInitialized('type') && null !== $object->getType()) {
            $data['Type'] = $object->getType();
        }
        if ($object->isInitialized('level') && null !== $object->getLevel()) {
            $data['Level'] = $object->getLevel();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}