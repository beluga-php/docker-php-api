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
class DistributionNameJsonGetResponse200DescriptorNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\DistributionNameJsonGetResponse200Descriptor';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\DistributionNameJsonGetResponse200Descriptor';
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
        $object = new \Docker\API\Model\DistributionNameJsonGetResponse200Descriptor();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('MediaType', $data) && $data['MediaType'] !== null) {
            $object->setMediaType($data['MediaType']);
            unset($data['MediaType']);
        }
        elseif (\array_key_exists('MediaType', $data) && $data['MediaType'] === null) {
            $object->setMediaType(null);
        }
        if (\array_key_exists('Size', $data) && $data['Size'] !== null) {
            $object->setSize($data['Size']);
            unset($data['Size']);
        }
        elseif (\array_key_exists('Size', $data) && $data['Size'] === null) {
            $object->setSize(null);
        }
        if (\array_key_exists('Digest', $data) && $data['Digest'] !== null) {
            $object->setDigest($data['Digest']);
            unset($data['Digest']);
        }
        elseif (\array_key_exists('Digest', $data) && $data['Digest'] === null) {
            $object->setDigest(null);
        }
        if (\array_key_exists('URLs', $data) && $data['URLs'] !== null) {
            $values = array();
            foreach ($data['URLs'] as $value) {
                $values[] = $value;
            }
            $object->setURLs($values);
            unset($data['URLs']);
        }
        elseif (\array_key_exists('URLs', $data) && $data['URLs'] === null) {
            $object->setURLs(null);
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
        if ($object->isInitialized('mediaType') && null !== $object->getMediaType()) {
            $data['MediaType'] = $object->getMediaType();
        }
        if ($object->isInitialized('size') && null !== $object->getSize()) {
            $data['Size'] = $object->getSize();
        }
        if ($object->isInitialized('digest') && null !== $object->getDigest()) {
            $data['Digest'] = $object->getDigest();
        }
        if ($object->isInitialized('uRLs') && null !== $object->getURLs()) {
            $values = array();
            foreach ($object->getURLs() as $value) {
                $values[] = $value;
            }
            $data['URLs'] = $values;
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }
        return $data;
    }
}