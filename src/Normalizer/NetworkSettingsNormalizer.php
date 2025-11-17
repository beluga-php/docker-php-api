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

class NetworkSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\NetworkSettings::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\NetworkSettings::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\NetworkSettings();
        if (\array_key_exists('HairpinMode', $data) && \is_int($data['HairpinMode'])) {
            $data['HairpinMode'] = (bool) $data['HairpinMode'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Bridge', $data) && null !== $data['Bridge']) {
            $object->setBridge($data['Bridge']);
            unset($data['Bridge']);
        } elseif (\array_key_exists('Bridge', $data) && null === $data['Bridge']) {
            $object->setBridge(null);
        }
        if (\array_key_exists('SandboxID', $data) && null !== $data['SandboxID']) {
            $object->setSandboxID($data['SandboxID']);
            unset($data['SandboxID']);
        } elseif (\array_key_exists('SandboxID', $data) && null === $data['SandboxID']) {
            $object->setSandboxID(null);
        }
        if (\array_key_exists('HairpinMode', $data) && null !== $data['HairpinMode']) {
            $object->setHairpinMode($data['HairpinMode']);
            unset($data['HairpinMode']);
        } elseif (\array_key_exists('HairpinMode', $data) && null === $data['HairpinMode']) {
            $object->setHairpinMode(null);
        }
        if (\array_key_exists('LinkLocalIPv6Address', $data) && null !== $data['LinkLocalIPv6Address']) {
            $object->setLinkLocalIPv6Address($data['LinkLocalIPv6Address']);
            unset($data['LinkLocalIPv6Address']);
        } elseif (\array_key_exists('LinkLocalIPv6Address', $data) && null === $data['LinkLocalIPv6Address']) {
            $object->setLinkLocalIPv6Address(null);
        }
        if (\array_key_exists('LinkLocalIPv6PrefixLen', $data) && null !== $data['LinkLocalIPv6PrefixLen']) {
            $object->setLinkLocalIPv6PrefixLen($data['LinkLocalIPv6PrefixLen']);
            unset($data['LinkLocalIPv6PrefixLen']);
        } elseif (\array_key_exists('LinkLocalIPv6PrefixLen', $data) && null === $data['LinkLocalIPv6PrefixLen']) {
            $object->setLinkLocalIPv6PrefixLen(null);
        }
        if (\array_key_exists('Ports', $data) && null !== $data['Ports']) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Ports'] as $key => $value) {
                if (null === $value) {
                    $values[$key] = null;
                    continue;
                }
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\PortBinding::class, 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $object->setPorts($values);
            unset($data['Ports']);
        } elseif (\array_key_exists('Ports', $data) && null === $data['Ports']) {
            $object->setPorts(null);
        }
        if (\array_key_exists('SandboxKey', $data) && null !== $data['SandboxKey']) {
            $object->setSandboxKey($data['SandboxKey']);
            unset($data['SandboxKey']);
        } elseif (\array_key_exists('SandboxKey', $data) && null === $data['SandboxKey']) {
            $object->setSandboxKey(null);
        }
        if (\array_key_exists('SecondaryIPAddresses', $data) && null !== $data['SecondaryIPAddresses']) {
            $values_2 = [];
            foreach ($data['SecondaryIPAddresses'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\Address::class, 'json', $context);
            }
            $object->setSecondaryIPAddresses($values_2);
            unset($data['SecondaryIPAddresses']);
        } elseif (\array_key_exists('SecondaryIPAddresses', $data) && null === $data['SecondaryIPAddresses']) {
            $object->setSecondaryIPAddresses(null);
        }
        if (\array_key_exists('SecondaryIPv6Addresses', $data) && null !== $data['SecondaryIPv6Addresses']) {
            $values_3 = [];
            foreach ($data['SecondaryIPv6Addresses'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\Address::class, 'json', $context);
            }
            $object->setSecondaryIPv6Addresses($values_3);
            unset($data['SecondaryIPv6Addresses']);
        } elseif (\array_key_exists('SecondaryIPv6Addresses', $data) && null === $data['SecondaryIPv6Addresses']) {
            $object->setSecondaryIPv6Addresses(null);
        }
        if (\array_key_exists('EndpointID', $data) && null !== $data['EndpointID']) {
            $object->setEndpointID($data['EndpointID']);
            unset($data['EndpointID']);
        } elseif (\array_key_exists('EndpointID', $data) && null === $data['EndpointID']) {
            $object->setEndpointID(null);
        }
        if (\array_key_exists('Gateway', $data) && null !== $data['Gateway']) {
            $object->setGateway($data['Gateway']);
            unset($data['Gateway']);
        } elseif (\array_key_exists('Gateway', $data) && null === $data['Gateway']) {
            $object->setGateway(null);
        }
        if (\array_key_exists('GlobalIPv6Address', $data) && null !== $data['GlobalIPv6Address']) {
            $object->setGlobalIPv6Address($data['GlobalIPv6Address']);
            unset($data['GlobalIPv6Address']);
        } elseif (\array_key_exists('GlobalIPv6Address', $data) && null === $data['GlobalIPv6Address']) {
            $object->setGlobalIPv6Address(null);
        }
        if (\array_key_exists('GlobalIPv6PrefixLen', $data) && null !== $data['GlobalIPv6PrefixLen']) {
            $object->setGlobalIPv6PrefixLen($data['GlobalIPv6PrefixLen']);
            unset($data['GlobalIPv6PrefixLen']);
        } elseif (\array_key_exists('GlobalIPv6PrefixLen', $data) && null === $data['GlobalIPv6PrefixLen']) {
            $object->setGlobalIPv6PrefixLen(null);
        }
        if (\array_key_exists('IPAddress', $data) && null !== $data['IPAddress']) {
            $object->setIPAddress($data['IPAddress']);
            unset($data['IPAddress']);
        } elseif (\array_key_exists('IPAddress', $data) && null === $data['IPAddress']) {
            $object->setIPAddress(null);
        }
        if (\array_key_exists('IPPrefixLen', $data) && null !== $data['IPPrefixLen']) {
            $object->setIPPrefixLen($data['IPPrefixLen']);
            unset($data['IPPrefixLen']);
        } elseif (\array_key_exists('IPPrefixLen', $data) && null === $data['IPPrefixLen']) {
            $object->setIPPrefixLen(null);
        }
        if (\array_key_exists('IPv6Gateway', $data) && null !== $data['IPv6Gateway']) {
            $object->setIPv6Gateway($data['IPv6Gateway']);
            unset($data['IPv6Gateway']);
        } elseif (\array_key_exists('IPv6Gateway', $data) && null === $data['IPv6Gateway']) {
            $object->setIPv6Gateway(null);
        }
        if (\array_key_exists('MacAddress', $data) && null !== $data['MacAddress']) {
            $object->setMacAddress($data['MacAddress']);
            unset($data['MacAddress']);
        } elseif (\array_key_exists('MacAddress', $data) && null === $data['MacAddress']) {
            $object->setMacAddress(null);
        }
        if (\array_key_exists('Networks', $data) && null !== $data['Networks']) {
            $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Networks'] as $key_1 => $value_4) {
                $values_4[$key_1] = $this->denormalizer->denormalize($value_4, \Docker\API\Model\EndpointSettings::class, 'json', $context);
            }
            $object->setNetworks($values_4);
            unset($data['Networks']);
        } elseif (\array_key_exists('Networks', $data) && null === $data['Networks']) {
            $object->setNetworks(null);
        }
        foreach ($data as $key_2 => $value_5) {
            if (preg_match('/.*/', (string) $key_2)) {
                $object[$key_2] = $value_5;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('bridge') && null !== $data->getBridge()) {
            $dataArray['Bridge'] = $data->getBridge();
        }
        if ($data->isInitialized('sandboxID') && null !== $data->getSandboxID()) {
            $dataArray['SandboxID'] = $data->getSandboxID();
        }
        if ($data->isInitialized('hairpinMode') && null !== $data->getHairpinMode()) {
            $dataArray['HairpinMode'] = $data->getHairpinMode();
        }
        if ($data->isInitialized('linkLocalIPv6Address') && null !== $data->getLinkLocalIPv6Address()) {
            $dataArray['LinkLocalIPv6Address'] = $data->getLinkLocalIPv6Address();
        }
        if ($data->isInitialized('linkLocalIPv6PrefixLen') && null !== $data->getLinkLocalIPv6PrefixLen()) {
            $dataArray['LinkLocalIPv6PrefixLen'] = $data->getLinkLocalIPv6PrefixLen();
        }
        if ($data->isInitialized('ports') && null !== $data->getPorts()) {
            $values = [];
            foreach ($data->getPorts() as $key => $value) {
                if (null === $value) {
                    $values[$key] = null;
                    continue;
                }
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $dataArray['Ports'] = $values;
        }
        if ($data->isInitialized('sandboxKey') && null !== $data->getSandboxKey()) {
            $dataArray['SandboxKey'] = $data->getSandboxKey();
        }
        if ($data->isInitialized('secondaryIPAddresses') && null !== $data->getSecondaryIPAddresses()) {
            $values_2 = [];
            foreach ($data->getSecondaryIPAddresses() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['SecondaryIPAddresses'] = $values_2;
        }
        if ($data->isInitialized('secondaryIPv6Addresses') && null !== $data->getSecondaryIPv6Addresses()) {
            $values_3 = [];
            foreach ($data->getSecondaryIPv6Addresses() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $dataArray['SecondaryIPv6Addresses'] = $values_3;
        }
        if ($data->isInitialized('endpointID') && null !== $data->getEndpointID()) {
            $dataArray['EndpointID'] = $data->getEndpointID();
        }
        if ($data->isInitialized('gateway') && null !== $data->getGateway()) {
            $dataArray['Gateway'] = $data->getGateway();
        }
        if ($data->isInitialized('globalIPv6Address') && null !== $data->getGlobalIPv6Address()) {
            $dataArray['GlobalIPv6Address'] = $data->getGlobalIPv6Address();
        }
        if ($data->isInitialized('globalIPv6PrefixLen') && null !== $data->getGlobalIPv6PrefixLen()) {
            $dataArray['GlobalIPv6PrefixLen'] = $data->getGlobalIPv6PrefixLen();
        }
        if ($data->isInitialized('iPAddress') && null !== $data->getIPAddress()) {
            $dataArray['IPAddress'] = $data->getIPAddress();
        }
        if ($data->isInitialized('iPPrefixLen') && null !== $data->getIPPrefixLen()) {
            $dataArray['IPPrefixLen'] = $data->getIPPrefixLen();
        }
        if ($data->isInitialized('iPv6Gateway') && null !== $data->getIPv6Gateway()) {
            $dataArray['IPv6Gateway'] = $data->getIPv6Gateway();
        }
        if ($data->isInitialized('macAddress') && null !== $data->getMacAddress()) {
            $dataArray['MacAddress'] = $data->getMacAddress();
        }
        if ($data->isInitialized('networks') && null !== $data->getNetworks()) {
            $values_4 = [];
            foreach ($data->getNetworks() as $key_1 => $value_4) {
                $values_4[$key_1] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $dataArray['Networks'] = $values_4;
        }
        foreach ($data as $key_2 => $value_5) {
            if (preg_match('/.*/', (string) $key_2)) {
                $dataArray[$key_2] = $value_5;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\NetworkSettings::class => false];
    }
}
