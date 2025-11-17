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

class EndpointPortConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\EndpointPortConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\EndpointPortConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\EndpointPortConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('Protocol', $data) && null !== $data['Protocol']) {
            $object->setProtocol($data['Protocol']);
            unset($data['Protocol']);
        } elseif (\array_key_exists('Protocol', $data) && null === $data['Protocol']) {
            $object->setProtocol(null);
        }
        if (\array_key_exists('TargetPort', $data) && null !== $data['TargetPort']) {
            $object->setTargetPort($data['TargetPort']);
            unset($data['TargetPort']);
        } elseif (\array_key_exists('TargetPort', $data) && null === $data['TargetPort']) {
            $object->setTargetPort(null);
        }
        if (\array_key_exists('PublishedPort', $data) && null !== $data['PublishedPort']) {
            $object->setPublishedPort($data['PublishedPort']);
            unset($data['PublishedPort']);
        } elseif (\array_key_exists('PublishedPort', $data) && null === $data['PublishedPort']) {
            $object->setPublishedPort(null);
        }
        if (\array_key_exists('PublishMode', $data) && null !== $data['PublishMode']) {
            $object->setPublishMode($data['PublishMode']);
            unset($data['PublishMode']);
        } elseif (\array_key_exists('PublishMode', $data) && null === $data['PublishMode']) {
            $object->setPublishMode(null);
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
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('protocol') && null !== $data->getProtocol()) {
            $dataArray['Protocol'] = $data->getProtocol();
        }
        if ($data->isInitialized('targetPort') && null !== $data->getTargetPort()) {
            $dataArray['TargetPort'] = $data->getTargetPort();
        }
        if ($data->isInitialized('publishedPort') && null !== $data->getPublishedPort()) {
            $dataArray['PublishedPort'] = $data->getPublishedPort();
        }
        if ($data->isInitialized('publishMode') && null !== $data->getPublishMode()) {
            $dataArray['PublishMode'] = $data->getPublishMode();
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
        return [\Docker\API\Model\EndpointPortConfig::class => false];
    }
}
