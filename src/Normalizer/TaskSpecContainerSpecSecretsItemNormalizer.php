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
class TaskSpecContainerSpecSecretsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\TaskSpecContainerSpecSecretsItem';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\TaskSpecContainerSpecSecretsItem';
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
        $object = new \Docker\API\Model\TaskSpecContainerSpecSecretsItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('File', $data) && $data['File'] !== null) {
            $object->setFile($this->denormalizer->denormalize($data['File'], 'Docker\\API\\Model\\TaskSpecContainerSpecSecretsItemFile', 'json', $context));
            unset($data['File']);
        }
        elseif (\array_key_exists('File', $data) && $data['File'] === null) {
            $object->setFile(null);
        }
        if (\array_key_exists('SecretID', $data) && $data['SecretID'] !== null) {
            $object->setSecretID($data['SecretID']);
            unset($data['SecretID']);
        }
        elseif (\array_key_exists('SecretID', $data) && $data['SecretID'] === null) {
            $object->setSecretID(null);
        }
        if (\array_key_exists('SecretName', $data) && $data['SecretName'] !== null) {
            $object->setSecretName($data['SecretName']);
            unset($data['SecretName']);
        }
        elseif (\array_key_exists('SecretName', $data) && $data['SecretName'] === null) {
            $object->setSecretName(null);
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
        if ($object->isInitialized('file') && null !== $object->getFile()) {
            $data['File'] = $this->normalizer->normalize($object->getFile(), 'json', $context);
        }
        if ($object->isInitialized('secretID') && null !== $object->getSecretID()) {
            $data['SecretID'] = $object->getSecretID();
        }
        if ($object->isInitialized('secretName') && null !== $object->getSecretName()) {
            $data['SecretName'] = $object->getSecretName();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}