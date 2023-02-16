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
class IndexInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\IndexInfo';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\IndexInfo';
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
        $object = new \Docker\API\Model\IndexInfo();
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
        if (\array_key_exists('Mirrors', $data) && $data['Mirrors'] !== null) {
            $values = array();
            foreach ($data['Mirrors'] as $value) {
                $values[] = $value;
            }
            $object->setMirrors($values);
            unset($data['Mirrors']);
        }
        elseif (\array_key_exists('Mirrors', $data) && $data['Mirrors'] === null) {
            $object->setMirrors(null);
        }
        if (\array_key_exists('Secure', $data) && $data['Secure'] !== null) {
            $object->setSecure($data['Secure']);
            unset($data['Secure']);
        }
        elseif (\array_key_exists('Secure', $data) && $data['Secure'] === null) {
            $object->setSecure(null);
        }
        if (\array_key_exists('Official', $data) && $data['Official'] !== null) {
            $object->setOfficial($data['Official']);
            unset($data['Official']);
        }
        elseif (\array_key_exists('Official', $data) && $data['Official'] === null) {
            $object->setOfficial(null);
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
        if ($object->isInitialized('mirrors') && null !== $object->getMirrors()) {
            $values = array();
            foreach ($object->getMirrors() as $value) {
                $values[] = $value;
            }
            $data['Mirrors'] = $values;
        }
        if ($object->isInitialized('secure') && null !== $object->getSecure()) {
            $data['Secure'] = $object->getSecure();
        }
        if ($object->isInitialized('official') && null !== $object->getOfficial()) {
            $data['Official'] = $object->getOfficial();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}