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

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\SwarmJoinPostBody' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\SwarmJoinPostBody' === $data::class;
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
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

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('listenAddr') && null !== $object->getListenAddr()) {
            $data['ListenAddr'] = $object->getListenAddr();
        }
        if ($object->isInitialized('advertiseAddr') && null !== $object->getAdvertiseAddr()) {
            $data['AdvertiseAddr'] = $object->getAdvertiseAddr();
        }
        if ($object->isInitialized('dataPathAddr') && null !== $object->getDataPathAddr()) {
            $data['DataPathAddr'] = $object->getDataPathAddr();
        }
        if ($object->isInitialized('remoteAddrs') && null !== $object->getRemoteAddrs()) {
            $values = [];
            foreach ($object->getRemoteAddrs() as $value) {
                $values[] = $value;
            }
            $data['RemoteAddrs'] = $values;
        }
        if ($object->isInitialized('joinToken') && null !== $object->getJoinToken()) {
            $data['JoinToken'] = $object->getJoinToken();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }
}
