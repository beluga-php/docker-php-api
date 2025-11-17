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

class SwarmNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Swarm::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Swarm::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Swarm();
        if (\array_key_exists('RootRotationInProgress', $data) && \is_int($data['RootRotationInProgress'])) {
            $data['RootRotationInProgress'] = (bool) $data['RootRotationInProgress'];
        }
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
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], \Docker\API\Model\SwarmSpec::class, 'json', $context));
            unset($data['Spec']);
        } elseif (\array_key_exists('Spec', $data) && null === $data['Spec']) {
            $object->setSpec(null);
        }
        if (\array_key_exists('TLSInfo', $data) && null !== $data['TLSInfo']) {
            $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], \Docker\API\Model\TLSInfo::class, 'json', $context));
            unset($data['TLSInfo']);
        } elseif (\array_key_exists('TLSInfo', $data) && null === $data['TLSInfo']) {
            $object->setTLSInfo(null);
        }
        if (\array_key_exists('RootRotationInProgress', $data) && null !== $data['RootRotationInProgress']) {
            $object->setRootRotationInProgress($data['RootRotationInProgress']);
            unset($data['RootRotationInProgress']);
        } elseif (\array_key_exists('RootRotationInProgress', $data) && null === $data['RootRotationInProgress']) {
            $object->setRootRotationInProgress(null);
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
        if (\array_key_exists('SubnetSize', $data) && null !== $data['SubnetSize']) {
            $object->setSubnetSize($data['SubnetSize']);
            unset($data['SubnetSize']);
        } elseif (\array_key_exists('SubnetSize', $data) && null === $data['SubnetSize']) {
            $object->setSubnetSize(null);
        }
        if (\array_key_exists('JoinTokens', $data) && null !== $data['JoinTokens']) {
            $object->setJoinTokens($this->denormalizer->denormalize($data['JoinTokens'], \Docker\API\Model\JoinTokens::class, 'json', $context));
            unset($data['JoinTokens']);
        } elseif (\array_key_exists('JoinTokens', $data) && null === $data['JoinTokens']) {
            $object->setJoinTokens(null);
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
        if ($data->isInitialized('tLSInfo') && null !== $data->getTLSInfo()) {
            $dataArray['TLSInfo'] = $this->normalizer->normalize($data->getTLSInfo(), 'json', $context);
        }
        if ($data->isInitialized('rootRotationInProgress') && null !== $data->getRootRotationInProgress()) {
            $dataArray['RootRotationInProgress'] = $data->getRootRotationInProgress();
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
        if ($data->isInitialized('subnetSize') && null !== $data->getSubnetSize()) {
            $dataArray['SubnetSize'] = $data->getSubnetSize();
        }
        if ($data->isInitialized('joinTokens') && null !== $data->getJoinTokens()) {
            $dataArray['JoinTokens'] = $this->normalizer->normalize($data->getJoinTokens(), 'json', $context);
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
        return [\Docker\API\Model\Swarm::class => false];
    }
}
