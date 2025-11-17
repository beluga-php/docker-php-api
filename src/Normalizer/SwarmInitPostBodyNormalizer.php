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

class SwarmInitPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SwarmInitPostBody::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SwarmInitPostBody::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmInitPostBody();
        if (\array_key_exists('ForceNewCluster', $data) && \is_int($data['ForceNewCluster'])) {
            $data['ForceNewCluster'] = (bool) $data['ForceNewCluster'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ListenAddr', $data) && null !== $data['ListenAddr']) {
            $object->setListenAddr($data['ListenAddr']);
            unset($data['ListenAddr']);
        } elseif (\array_key_exists('ListenAddr', $data) && null === $data['ListenAddr']) {
            $object->setListenAddr(null);
        }
        if (\array_key_exists('AdvertiseAddr', $data) && null !== $data['AdvertiseAddr']) {
            $object->setAdvertiseAddr($data['AdvertiseAddr']);
            unset($data['AdvertiseAddr']);
        } elseif (\array_key_exists('AdvertiseAddr', $data) && null === $data['AdvertiseAddr']) {
            $object->setAdvertiseAddr(null);
        }
        if (\array_key_exists('DataPathAddr', $data) && null !== $data['DataPathAddr']) {
            $object->setDataPathAddr($data['DataPathAddr']);
            unset($data['DataPathAddr']);
        } elseif (\array_key_exists('DataPathAddr', $data) && null === $data['DataPathAddr']) {
            $object->setDataPathAddr(null);
        }
        if (\array_key_exists('DataPathPort', $data) && null !== $data['DataPathPort']) {
            $object->setDataPathPort($data['DataPathPort']);
            unset($data['DataPathPort']);
        } elseif (\array_key_exists('DataPathPort', $data) && null === $data['DataPathPort']) {
            $object->setDataPathPort(null);
        }
        if (\array_key_exists('DefaultAddrPool', $data) && null !== $data['DefaultAddrPool']) {
            $values = [];
            foreach ($data['DefaultAddrPool'] as $value) {
                $values[] = $value;
            }
            $object->setDefaultAddrPool($values);
            unset($data['DefaultAddrPool']);
        } elseif (\array_key_exists('DefaultAddrPool', $data) && null === $data['DefaultAddrPool']) {
            $object->setDefaultAddrPool(null);
        }
        if (\array_key_exists('ForceNewCluster', $data) && null !== $data['ForceNewCluster']) {
            $object->setForceNewCluster($data['ForceNewCluster']);
            unset($data['ForceNewCluster']);
        } elseif (\array_key_exists('ForceNewCluster', $data) && null === $data['ForceNewCluster']) {
            $object->setForceNewCluster(null);
        }
        if (\array_key_exists('SubnetSize', $data) && null !== $data['SubnetSize']) {
            $object->setSubnetSize($data['SubnetSize']);
            unset($data['SubnetSize']);
        } elseif (\array_key_exists('SubnetSize', $data) && null === $data['SubnetSize']) {
            $object->setSubnetSize(null);
        }
        if (\array_key_exists('Spec', $data) && null !== $data['Spec']) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], \Docker\API\Model\SwarmSpec::class, 'json', $context));
            unset($data['Spec']);
        } elseif (\array_key_exists('Spec', $data) && null === $data['Spec']) {
            $object->setSpec(null);
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
        if ($data->isInitialized('listenAddr') && null !== $data->getListenAddr()) {
            $dataArray['ListenAddr'] = $data->getListenAddr();
        }
        if ($data->isInitialized('advertiseAddr') && null !== $data->getAdvertiseAddr()) {
            $dataArray['AdvertiseAddr'] = $data->getAdvertiseAddr();
        }
        if ($data->isInitialized('dataPathAddr') && null !== $data->getDataPathAddr()) {
            $dataArray['DataPathAddr'] = $data->getDataPathAddr();
        }
        if ($data->isInitialized('dataPathPort') && null !== $data->getDataPathPort()) {
            $dataArray['DataPathPort'] = $data->getDataPathPort();
        }
        if ($data->isInitialized('defaultAddrPool') && null !== $data->getDefaultAddrPool()) {
            $values = [];
            foreach ($data->getDefaultAddrPool() as $value) {
                $values[] = $value;
            }
            $dataArray['DefaultAddrPool'] = $values;
        }
        if ($data->isInitialized('forceNewCluster') && null !== $data->getForceNewCluster()) {
            $dataArray['ForceNewCluster'] = $data->getForceNewCluster();
        }
        if ($data->isInitialized('subnetSize') && null !== $data->getSubnetSize()) {
            $dataArray['SubnetSize'] = $data->getSubnetSize();
        }
        if ($data->isInitialized('spec') && null !== $data->getSpec()) {
            $dataArray['Spec'] = $this->normalizer->normalize($data->getSpec(), 'json', $context);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SwarmInitPostBody::class => false];
    }
}
