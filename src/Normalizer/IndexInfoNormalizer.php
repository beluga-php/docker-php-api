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

class IndexInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\IndexInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\IndexInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\IndexInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('Secure', $data) && \is_int($data['Secure'])) {
            $data['Secure'] = (bool) $data['Secure'];
        }
        if (\array_key_exists('Official', $data) && \is_int($data['Official'])) {
            $data['Official'] = (bool) $data['Official'];
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
            unset($data['Name']);
        }
        if (\array_key_exists('Mirrors', $data) && null !== $data['Mirrors']) {
            $values = [];
            foreach ($data['Mirrors'] as $value) {
                $values[] = $value;
            }
            $object->setMirrors($values);
            unset($data['Mirrors']);
        } elseif (\array_key_exists('Mirrors', $data) && null === $data['Mirrors']) {
            $object->setMirrors(null);
            unset($data['Mirrors']);
        }
        if (\array_key_exists('Secure', $data) && null !== $data['Secure']) {
            $object->setSecure($data['Secure']);
            unset($data['Secure']);
        } elseif (\array_key_exists('Secure', $data) && null === $data['Secure']) {
            $object->setSecure(null);
            unset($data['Secure']);
        }
        if (\array_key_exists('Official', $data) && null !== $data['Official']) {
            $object->setOfficial($data['Official']);
            unset($data['Official']);
        } elseif (\array_key_exists('Official', $data) && null === $data['Official']) {
            $object->setOfficial(null);
            unset($data['Official']);
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
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('mirrors') && null !== $data->getMirrors()) {
            $values = [];
            foreach ($data->getMirrors() as $value) {
                $values[] = $value;
            }
            $dataArray['Mirrors'] = $values;
        }
        if ($data->isInitialized('secure') && null !== $data->getSecure()) {
            $dataArray['Secure'] = $data->getSecure();
        }
        if ($data->isInitialized('official') && null !== $data->getOfficial()) {
            $dataArray['Official'] = $data->getOfficial();
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
        return [\Docker\API\Model\IndexInfo::class => false];
    }
}
