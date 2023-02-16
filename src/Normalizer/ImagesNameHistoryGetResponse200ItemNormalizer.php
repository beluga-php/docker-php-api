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
class ImagesNameHistoryGetResponse200ItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ImagesNameHistoryGetResponse200Item';
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
        $object = new \Docker\API\Model\ImagesNameHistoryGetResponse200Item();
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
        if (\array_key_exists('Created', $data) && $data['Created'] !== null) {
            $object->setCreated($data['Created']);
            unset($data['Created']);
        }
        elseif (\array_key_exists('Created', $data) && $data['Created'] === null) {
            $object->setCreated(null);
        }
        if (\array_key_exists('CreatedBy', $data) && $data['CreatedBy'] !== null) {
            $object->setCreatedBy($data['CreatedBy']);
            unset($data['CreatedBy']);
        }
        elseif (\array_key_exists('CreatedBy', $data) && $data['CreatedBy'] === null) {
            $object->setCreatedBy(null);
        }
        if (\array_key_exists('Tags', $data) && $data['Tags'] !== null) {
            $values = array();
            foreach ($data['Tags'] as $value) {
                $values[] = $value;
            }
            $object->setTags($values);
            unset($data['Tags']);
        }
        elseif (\array_key_exists('Tags', $data) && $data['Tags'] === null) {
            $object->setTags(null);
        }
        if (\array_key_exists('Size', $data) && $data['Size'] !== null) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        }
        elseif (\array_key_exists('Size', $data) && $data['Size'] === null) {
            $object->setSize(null);
        }
        if (\array_key_exists('Comment', $data) && $data['Comment'] !== null) {
            $object->setComment($data['Comment']);
            unset($data['Comment']);
        }
        elseif (\array_key_exists('Comment', $data) && $data['Comment'] === null) {
            $object->setComment(null);
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
        $data['Id'] = $object->getId();
        $data['Created'] = $object->getCreated();
        $data['CreatedBy'] = $object->getCreatedBy();
        $values = array();
        foreach ($object->getTags() as $value) {
            $values[] = $value;
        }
        $data['Tags'] = $values;
        $data['Size'] = $object->getSize();
        $data['Comment'] = $object->getComment();
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}