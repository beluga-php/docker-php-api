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
class ImageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\ImageSummary';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ImageSummary';
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
        $object = new \Docker\API\Model\ImageSummary();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data) && $data['Id'] !== null) {
            $object->setId($data['Id']);
            unset($data['Id']);
        }
        elseif (\array_key_exists('Id', $data) && $data['Id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('ParentId', $data) && $data['ParentId'] !== null) {
            $object->setParentId($data['ParentId']);
            unset($data['ParentId']);
        }
        elseif (\array_key_exists('ParentId', $data) && $data['ParentId'] === null) {
            $object->setParentId(null);
        }
        if (\array_key_exists('RepoTags', $data) && $data['RepoTags'] !== null) {
            $values = array();
            foreach ($data['RepoTags'] as $value) {
                $values[] = $value;
            }
            $object->setRepoTags($values);
            unset($data['RepoTags']);
        }
        elseif (\array_key_exists('RepoTags', $data) && $data['RepoTags'] === null) {
            $object->setRepoTags(null);
        }
        if (\array_key_exists('RepoDigests', $data) && $data['RepoDigests'] !== null) {
            $values_1 = array();
            foreach ($data['RepoDigests'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRepoDigests($values_1);
            unset($data['RepoDigests']);
        }
        elseif (\array_key_exists('RepoDigests', $data) && $data['RepoDigests'] === null) {
            $object->setRepoDigests(null);
        }
        if (\array_key_exists('Created', $data) && $data['Created'] !== null) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        elseif (\array_key_exists('Created', $data) && $data['Created'] === null) {
            $object->setCreated(null);
        }
        if (\array_key_exists('Size', $data) && $data['Size'] !== null) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        }
        elseif (\array_key_exists('Size', $data) && $data['Size'] === null) {
            $object->setSize(null);
        }
        if (\array_key_exists('SharedSize', $data) && $data['SharedSize'] !== null) {
            $object->setSharedSize($data['SharedSize']);
            unset($data['SharedSize']);
        }
        elseif (\array_key_exists('SharedSize', $data) && $data['SharedSize'] === null) {
            $object->setSharedSize(null);
        }
        if (\array_key_exists('VirtualSize', $data) && $data['VirtualSize'] !== null) {
            $object->setVirtualSize($data['VirtualSize']);
            unset($data['VirtualSize']);
        }
        elseif (\array_key_exists('VirtualSize', $data) && $data['VirtualSize'] === null) {
            $object->setVirtualSize(null);
        }
        if (\array_key_exists('Labels', $data) && $data['Labels'] !== null) {
            $values_2 = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setLabels($values_2);
            unset($data['Labels']);
        }
        elseif (\array_key_exists('Labels', $data) && $data['Labels'] === null) {
            $object->setLabels(null);
        }
        if (\array_key_exists('Containers', $data) && $data['Containers'] !== null) {
            $object->setContainers($data['Containers']);
            unset($data['Containers']);
        }
        elseif (\array_key_exists('Containers', $data) && $data['Containers'] === null) {
            $object->setContainers(null);
        }
        foreach ($data as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_3;
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
        $data['Id'] = $object->getId();
        $data['ParentId'] = $object->getParentId();
        $values = array();
        foreach ($object->getRepoTags() as $value) {
            $values[] = $value;
        }
        $data['RepoTags'] = $values;
        $values_1 = array();
        foreach ($object->getRepoDigests() as $value_1) {
            $values_1[] = $value_1;
        }
        $data['RepoDigests'] = $values_1;
        $data['Created'] = $object->getCreated();
        $data['Size'] = $object->getSize();
        $data['SharedSize'] = $object->getSharedSize();
        $data['VirtualSize'] = $object->getVirtualSize();
        $values_2 = array();
        foreach ($object->getLabels() as $key => $value_2) {
            $values_2[$key] = $value_2;
        }
        $data['Labels'] = $values_2;
        $data['Containers'] = $object->getContainers();
        foreach ($object as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_3;
            }
        }
        return $data;
    }
}