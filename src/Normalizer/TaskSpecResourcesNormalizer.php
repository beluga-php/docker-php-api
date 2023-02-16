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
class TaskSpecResourcesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\TaskSpecResources';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\TaskSpecResources';
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
        $object = new \Docker\API\Model\TaskSpecResources();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Limits', $data) && $data['Limits'] !== null) {
            $object->setLimits($this->denormalizer->denormalize($data['Limits'], 'Docker\\API\\Model\\Limit', 'json', $context));
            unset($data['Limits']);
        }
        elseif (\array_key_exists('Limits', $data) && $data['Limits'] === null) {
            $object->setLimits(null);
        }
        if (\array_key_exists('Reservation', $data) && $data['Reservation'] !== null) {
            $object->setReservation($this->denormalizer->denormalize($data['Reservation'], 'Docker\\API\\Model\\ResourceObject', 'json', $context));
            unset($data['Reservation']);
        }
        elseif (\array_key_exists('Reservation', $data) && $data['Reservation'] === null) {
            $object->setReservation(null);
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
        if ($object->isInitialized('limits') && null !== $object->getLimits()) {
            $data['Limits'] = $this->normalizer->normalize($object->getLimits(), 'json', $context);
        }
        if ($object->isInitialized('reservation') && null !== $object->getReservation()) {
            $data['Reservation'] = $this->normalizer->normalize($object->getReservation(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}