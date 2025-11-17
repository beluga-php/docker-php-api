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

class IPAMConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\IPAMConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\IPAMConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\IPAMConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Subnet', $data) && null !== $data['Subnet']) {
            $object->setSubnet($data['Subnet']);
            unset($data['Subnet']);
        } elseif (\array_key_exists('Subnet', $data) && null === $data['Subnet']) {
            $object->setSubnet(null);
        }
        if (\array_key_exists('IPRange', $data) && null !== $data['IPRange']) {
            $object->setIPRange($data['IPRange']);
            unset($data['IPRange']);
        } elseif (\array_key_exists('IPRange', $data) && null === $data['IPRange']) {
            $object->setIPRange(null);
        }
        if (\array_key_exists('Gateway', $data) && null !== $data['Gateway']) {
            $object->setGateway($data['Gateway']);
            unset($data['Gateway']);
        } elseif (\array_key_exists('Gateway', $data) && null === $data['Gateway']) {
            $object->setGateway(null);
        }
        if (\array_key_exists('AuxiliaryAddresses', $data) && null !== $data['AuxiliaryAddresses']) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['AuxiliaryAddresses'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setAuxiliaryAddresses($values);
            unset($data['AuxiliaryAddresses']);
        } elseif (\array_key_exists('AuxiliaryAddresses', $data) && null === $data['AuxiliaryAddresses']) {
            $object->setAuxiliaryAddresses(null);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('subnet') && null !== $data->getSubnet()) {
            $dataArray['Subnet'] = $data->getSubnet();
        }
        if ($data->isInitialized('iPRange') && null !== $data->getIPRange()) {
            $dataArray['IPRange'] = $data->getIPRange();
        }
        if ($data->isInitialized('gateway') && null !== $data->getGateway()) {
            $dataArray['Gateway'] = $data->getGateway();
        }
        if ($data->isInitialized('auxiliaryAddresses') && null !== $data->getAuxiliaryAddresses()) {
            $values = [];
            foreach ($data->getAuxiliaryAddresses() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['AuxiliaryAddresses'] = $values;
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\IPAMConfig::class => false];
    }
}
