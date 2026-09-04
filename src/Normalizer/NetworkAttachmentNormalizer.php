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

class NetworkAttachmentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\NetworkAttachment::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\NetworkAttachment::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\NetworkAttachment();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Network', $data) && null !== $data['Network']) {
            $object->setNetwork($this->denormalizer->denormalize($data['Network'], \Docker\API\Model\Network::class, 'json', $context));
            unset($data['Network']);
        } elseif (\array_key_exists('Network', $data) && null === $data['Network']) {
            $object->setNetwork(null);
            unset($data['Network']);
        }
        if (\array_key_exists('Addresses', $data) && null !== $data['Addresses']) {
            $values = [];
            foreach ($data['Addresses'] as $value) {
                $values[] = $value;
            }
            $object->setAddresses($values);
            unset($data['Addresses']);
        } elseif (\array_key_exists('Addresses', $data) && null === $data['Addresses']) {
            $object->setAddresses(null);
            unset($data['Addresses']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('network') && null !== $data->getNetwork()) {
            $dataArray['Network'] = null === $data->getNetwork() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getNetwork(), 'json', $context));
        }
        if ($data->isInitialized('addresses') && null !== $data->getAddresses()) {
            $values = [];
            foreach ($data->getAddresses() as $value) {
                $values[] = $value;
            }
            $dataArray['Addresses'] = $values;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\NetworkAttachment::class => false];
    }
}
