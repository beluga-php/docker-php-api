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

class PluginsInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\PluginsInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\PluginsInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\PluginsInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Volume', $data) && null !== $data['Volume']) {
            $values = [];
            foreach ($data['Volume'] as $value) {
                $values[] = $value;
            }
            $object->setVolume($values);
            unset($data['Volume']);
        } elseif (\array_key_exists('Volume', $data) && null === $data['Volume']) {
            $object->setVolume(null);
        }
        if (\array_key_exists('Network', $data) && null !== $data['Network']) {
            $values_1 = [];
            foreach ($data['Network'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setNetwork($values_1);
            unset($data['Network']);
        } elseif (\array_key_exists('Network', $data) && null === $data['Network']) {
            $object->setNetwork(null);
        }
        if (\array_key_exists('Authorization', $data) && null !== $data['Authorization']) {
            $values_2 = [];
            foreach ($data['Authorization'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setAuthorization($values_2);
            unset($data['Authorization']);
        } elseif (\array_key_exists('Authorization', $data) && null === $data['Authorization']) {
            $object->setAuthorization(null);
        }
        if (\array_key_exists('Log', $data) && null !== $data['Log']) {
            $values_3 = [];
            foreach ($data['Log'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setLog($values_3);
            unset($data['Log']);
        } elseif (\array_key_exists('Log', $data) && null === $data['Log']) {
            $object->setLog(null);
        }
        foreach ($data as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_4;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('volume') && null !== $data->getVolume()) {
            $values = [];
            foreach ($data->getVolume() as $value) {
                $values[] = $value;
            }
            $dataArray['Volume'] = $values;
        }
        if ($data->isInitialized('network') && null !== $data->getNetwork()) {
            $values_1 = [];
            foreach ($data->getNetwork() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['Network'] = $values_1;
        }
        if ($data->isInitialized('authorization') && null !== $data->getAuthorization()) {
            $values_2 = [];
            foreach ($data->getAuthorization() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['Authorization'] = $values_2;
        }
        if ($data->isInitialized('log') && null !== $data->getLog()) {
            $values_3 = [];
            foreach ($data->getLog() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['Log'] = $values_3;
        }
        foreach ($data as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_4;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\PluginsInfo::class => false];
    }
}
