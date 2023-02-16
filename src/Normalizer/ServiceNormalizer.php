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
class ServiceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\Service';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\Service';
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
        $object = new \Docker\API\Model\Service();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ID', $data) && $data['ID'] !== null) {
            $object->setID($data['ID']);
            unset($data['ID']);
        }
        elseif (\array_key_exists('ID', $data) && $data['ID'] === null) {
            $object->setID(null);
        }
        if (\array_key_exists('Version', $data) && $data['Version'] !== null) {
            $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Docker\\API\\Model\\ObjectVersion', 'json', $context));
            unset($data['Version']);
        }
        elseif (\array_key_exists('Version', $data) && $data['Version'] === null) {
            $object->setVersion(null);
        }
        if (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] !== null) {
            $object->setCreatedAt($data['CreatedAt']);
            unset($data['CreatedAt']);
        }
        elseif (\array_key_exists('CreatedAt', $data) && $data['CreatedAt'] === null) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] !== null) {
            $object->setUpdatedAt($data['UpdatedAt']);
            unset($data['UpdatedAt']);
        }
        elseif (\array_key_exists('UpdatedAt', $data) && $data['UpdatedAt'] === null) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('Spec', $data) && $data['Spec'] !== null) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\\API\\Model\\ServiceSpec', 'json', $context));
            unset($data['Spec']);
        }
        elseif (\array_key_exists('Spec', $data) && $data['Spec'] === null) {
            $object->setSpec(null);
        }
        if (\array_key_exists('Endpoint', $data) && $data['Endpoint'] !== null) {
            $object->setEndpoint($this->denormalizer->denormalize($data['Endpoint'], 'Docker\\API\\Model\\ServiceEndpoint', 'json', $context));
            unset($data['Endpoint']);
        }
        elseif (\array_key_exists('Endpoint', $data) && $data['Endpoint'] === null) {
            $object->setEndpoint(null);
        }
        if (\array_key_exists('UpdateStatus', $data) && $data['UpdateStatus'] !== null) {
            $object->setUpdateStatus($this->denormalizer->denormalize($data['UpdateStatus'], 'Docker\\API\\Model\\ServiceUpdateStatus', 'json', $context));
            unset($data['UpdateStatus']);
        }
        elseif (\array_key_exists('UpdateStatus', $data) && $data['UpdateStatus'] === null) {
            $object->setUpdateStatus(null);
        }
        if (\array_key_exists('ServiceStatus', $data) && $data['ServiceStatus'] !== null) {
            $object->setServiceStatus($this->denormalizer->denormalize($data['ServiceStatus'], 'Docker\\API\\Model\\ServiceServiceStatus', 'json', $context));
            unset($data['ServiceStatus']);
        }
        elseif (\array_key_exists('ServiceStatus', $data) && $data['ServiceStatus'] === null) {
            $object->setServiceStatus(null);
        }
        if (\array_key_exists('JobStatus', $data) && $data['JobStatus'] !== null) {
            $object->setJobStatus($this->denormalizer->denormalize($data['JobStatus'], 'Docker\\API\\Model\\ServiceJobStatus', 'json', $context));
            unset($data['JobStatus']);
        }
        elseif (\array_key_exists('JobStatus', $data) && $data['JobStatus'] === null) {
            $object->setJobStatus(null);
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
        if ($object->isInitialized('iD') && null !== $object->getID()) {
            $data['ID'] = $object->getID();
        }
        if ($object->isInitialized('version') && null !== $object->getVersion()) {
            $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
        }
        if ($object->isInitialized('createdAt') && null !== $object->getCreatedAt()) {
            $data['CreatedAt'] = $object->getCreatedAt();
        }
        if ($object->isInitialized('updatedAt') && null !== $object->getUpdatedAt()) {
            $data['UpdatedAt'] = $object->getUpdatedAt();
        }
        if ($object->isInitialized('spec') && null !== $object->getSpec()) {
            $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
        }
        if ($object->isInitialized('endpoint') && null !== $object->getEndpoint()) {
            $data['Endpoint'] = $this->normalizer->normalize($object->getEndpoint(), 'json', $context);
        }
        if ($object->isInitialized('updateStatus') && null !== $object->getUpdateStatus()) {
            $data['UpdateStatus'] = $this->normalizer->normalize($object->getUpdateStatus(), 'json', $context);
        }
        if ($object->isInitialized('serviceStatus') && null !== $object->getServiceStatus()) {
            $data['ServiceStatus'] = $this->normalizer->normalize($object->getServiceStatus(), 'json', $context);
        }
        if ($object->isInitialized('jobStatus') && null !== $object->getJobStatus()) {
            $data['JobStatus'] = $this->normalizer->normalize($object->getJobStatus(), 'json', $context);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}