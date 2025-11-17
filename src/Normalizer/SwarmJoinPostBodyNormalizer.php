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

class SwarmJoinPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SwarmJoinPostBody::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SwarmJoinPostBody::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmJoinPostBody();
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
        if (\array_key_exists('RemoteAddrs', $data) && null !== $data['RemoteAddrs']) {
            $values = [];
            foreach ($data['RemoteAddrs'] as $value) {
                $values[] = $value;
            }
            $object->setRemoteAddrs($values);
            unset($data['RemoteAddrs']);
        } elseif (\array_key_exists('RemoteAddrs', $data) && null === $data['RemoteAddrs']) {
            $object->setRemoteAddrs(null);
        }
        if (\array_key_exists('JoinToken', $data) && null !== $data['JoinToken']) {
            $object->setJoinToken($data['JoinToken']);
            unset($data['JoinToken']);
        } elseif (\array_key_exists('JoinToken', $data) && null === $data['JoinToken']) {
            $object->setJoinToken(null);
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
        if ($data->isInitialized('remoteAddrs') && null !== $data->getRemoteAddrs()) {
            $values = [];
            foreach ($data->getRemoteAddrs() as $value) {
                $values[] = $value;
            }
            $dataArray['RemoteAddrs'] = $values;
        }
        if ($data->isInitialized('joinToken') && null !== $data->getJoinToken()) {
            $dataArray['JoinToken'] = $data->getJoinToken();
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
        return [\Docker\API\Model\SwarmJoinPostBody::class => false];
    }
}
