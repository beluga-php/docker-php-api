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
class ManagerStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\ManagerStatus';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ManagerStatus';
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
        $object = new \Docker\API\Model\ManagerStatus();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Leader', $data) && $data['Leader'] !== null) {
            $object->setLeader($data['Leader']);
            unset($data['Leader']);
        }
        elseif (\array_key_exists('Leader', $data) && $data['Leader'] === null) {
            $object->setLeader(null);
        }
        if (\array_key_exists('Reachability', $data) && $data['Reachability'] !== null) {
            $object->setReachability($data['Reachability']);
            unset($data['Reachability']);
        }
        elseif (\array_key_exists('Reachability', $data) && $data['Reachability'] === null) {
            $object->setReachability(null);
        }
        if (\array_key_exists('Addr', $data) && $data['Addr'] !== null) {
            $object->setAddr($data['Addr']);
            unset($data['Addr']);
        }
        elseif (\array_key_exists('Addr', $data) && $data['Addr'] === null) {
            $object->setAddr(null);
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
        if ($object->isInitialized('leader') && null !== $object->getLeader()) {
            $data['Leader'] = $object->getLeader();
        }
        if ($object->isInitialized('reachability') && null !== $object->getReachability()) {
            $data['Reachability'] = $object->getReachability();
        }
        if ($object->isInitialized('addr') && null !== $object->getAddr()) {
            $data['Addr'] = $object->getAddr();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}