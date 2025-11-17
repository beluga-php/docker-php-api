<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ServiceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Service::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Service::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
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
        if (\array_key_exists('ID', $data) && null !== $data['ID']) {
            $object->setID($data['ID']);
            unset($data['ID']);
        } elseif (\array_key_exists('ID', $data) && null === $data['ID']) {
            $object->setID(null);
        }
        if (\array_key_exists('Version', $data) && null !== $data['Version']) {
            $object->setVersion($this->denormalizer->denormalize($data['Version'], \Docker\API\Model\ObjectVersion::class, 'json', $context));
            unset($data['Version']);
        } elseif (\array_key_exists('Version', $data) && null === $data['Version']) {
            $object->setVersion(null);
        }
        if (\array_key_exists('CreatedAt', $data) && null !== $data['CreatedAt']) {
            $object->setCreatedAt($data['CreatedAt']);
            unset($data['CreatedAt']);
        } elseif (\array_key_exists('CreatedAt', $data) && null === $data['CreatedAt']) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('UpdatedAt', $data) && null !== $data['UpdatedAt']) {
            $object->setUpdatedAt($data['UpdatedAt']);
            unset($data['UpdatedAt']);
        } elseif (\array_key_exists('UpdatedAt', $data) && null === $data['UpdatedAt']) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('Spec', $data) && null !== $data['Spec']) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], \Docker\API\Model\ServiceSpec::class, 'json', $context));
            unset($data['Spec']);
        } elseif (\array_key_exists('Spec', $data) && null === $data['Spec']) {
            $object->setSpec(null);
        }
        if (\array_key_exists('Endpoint', $data) && null !== $data['Endpoint']) {
            $object->setEndpoint($this->denormalizer->denormalize($data['Endpoint'], \Docker\API\Model\ServiceEndpoint::class, 'json', $context));
            unset($data['Endpoint']);
        } elseif (\array_key_exists('Endpoint', $data) && null === $data['Endpoint']) {
            $object->setEndpoint(null);
        }
        if (\array_key_exists('UpdateStatus', $data) && null !== $data['UpdateStatus']) {
            $object->setUpdateStatus($this->denormalizer->denormalize($data['UpdateStatus'], \Docker\API\Model\ServiceUpdateStatus::class, 'json', $context));
            unset($data['UpdateStatus']);
        } elseif (\array_key_exists('UpdateStatus', $data) && null === $data['UpdateStatus']) {
            $object->setUpdateStatus(null);
        }
        if (\array_key_exists('ServiceStatus', $data) && null !== $data['ServiceStatus']) {
            $object->setServiceStatus($this->denormalizer->denormalize($data['ServiceStatus'], \Docker\API\Model\ServiceServiceStatus::class, 'json', $context));
            unset($data['ServiceStatus']);
        } elseif (\array_key_exists('ServiceStatus', $data) && null === $data['ServiceStatus']) {
            $object->setServiceStatus(null);
        }
        if (\array_key_exists('JobStatus', $data) && null !== $data['JobStatus']) {
            $object->setJobStatus($this->denormalizer->denormalize($data['JobStatus'], \Docker\API\Model\ServiceJobStatus::class, 'json', $context));
            unset($data['JobStatus']);
        } elseif (\array_key_exists('JobStatus', $data) && null === $data['JobStatus']) {
            $object->setJobStatus(null);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('iD') && null !== $data->getID()) {
            $dataArray['ID'] = $data->getID();
        }
        if ($data->isInitialized('version') && null !== $data->getVersion()) {
            $dataArray['Version'] = $this->normalizer->normalize($data->getVersion(), 'json', $context);
        }
        if ($data->isInitialized('createdAt') && null !== $data->getCreatedAt()) {
            $dataArray['CreatedAt'] = $data->getCreatedAt();
        }
        if ($data->isInitialized('updatedAt') && null !== $data->getUpdatedAt()) {
            $dataArray['UpdatedAt'] = $data->getUpdatedAt();
        }
        if ($data->isInitialized('spec') && null !== $data->getSpec()) {
            $dataArray['Spec'] = $this->normalizer->normalize($data->getSpec(), 'json', $context);
        }
        if ($data->isInitialized('endpoint') && null !== $data->getEndpoint()) {
            $dataArray['Endpoint'] = $this->normalizer->normalize($data->getEndpoint(), 'json', $context);
        }
        if ($data->isInitialized('updateStatus') && null !== $data->getUpdateStatus()) {
            $dataArray['UpdateStatus'] = $this->normalizer->normalize($data->getUpdateStatus(), 'json', $context);
        }
        if ($data->isInitialized('serviceStatus') && null !== $data->getServiceStatus()) {
            $dataArray['ServiceStatus'] = $this->normalizer->normalize($data->getServiceStatus(), 'json', $context);
        }
        if ($data->isInitialized('jobStatus') && null !== $data->getJobStatus()) {
            $dataArray['JobStatus'] = $this->normalizer->normalize($data->getJobStatus(), 'json', $context);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\Service::class => false];
    }
}
