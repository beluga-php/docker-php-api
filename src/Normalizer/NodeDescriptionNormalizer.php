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

class NodeDescriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\NodeDescription::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\NodeDescription::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\NodeDescription();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Hostname', $data) && null !== $data['Hostname']) {
            $object->setHostname($data['Hostname']);
            unset($data['Hostname']);
        } elseif (\array_key_exists('Hostname', $data) && null === $data['Hostname']) {
            $object->setHostname(null);
        }
        if (\array_key_exists('Platform', $data) && null !== $data['Platform']) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], \Docker\API\Model\Platform::class, 'json', $context));
            unset($data['Platform']);
        } elseif (\array_key_exists('Platform', $data) && null === $data['Platform']) {
            $object->setPlatform(null);
        }
        if (\array_key_exists('Resources', $data) && null !== $data['Resources']) {
            $object->setResources($this->denormalizer->denormalize($data['Resources'], \Docker\API\Model\ResourceObject::class, 'json', $context));
            unset($data['Resources']);
        } elseif (\array_key_exists('Resources', $data) && null === $data['Resources']) {
            $object->setResources(null);
        }
        if (\array_key_exists('Engine', $data) && null !== $data['Engine']) {
            $object->setEngine($this->denormalizer->denormalize($data['Engine'], \Docker\API\Model\EngineDescription::class, 'json', $context));
            unset($data['Engine']);
        } elseif (\array_key_exists('Engine', $data) && null === $data['Engine']) {
            $object->setEngine(null);
        }
        if (\array_key_exists('TLSInfo', $data) && null !== $data['TLSInfo']) {
            $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], \Docker\API\Model\TLSInfo::class, 'json', $context));
            unset($data['TLSInfo']);
        } elseif (\array_key_exists('TLSInfo', $data) && null === $data['TLSInfo']) {
            $object->setTLSInfo(null);
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
        if ($data->isInitialized('hostname') && null !== $data->getHostname()) {
            $dataArray['Hostname'] = $data->getHostname();
        }
        if ($data->isInitialized('platform') && null !== $data->getPlatform()) {
            $dataArray['Platform'] = $this->normalizer->normalize($data->getPlatform(), 'json', $context);
        }
        if ($data->isInitialized('resources') && null !== $data->getResources()) {
            $dataArray['Resources'] = $this->normalizer->normalize($data->getResources(), 'json', $context);
        }
        if ($data->isInitialized('engine') && null !== $data->getEngine()) {
            $dataArray['Engine'] = $this->normalizer->normalize($data->getEngine(), 'json', $context);
        }
        if ($data->isInitialized('tLSInfo') && null !== $data->getTLSInfo()) {
            $dataArray['TLSInfo'] = $this->normalizer->normalize($data->getTLSInfo(), 'json', $context);
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
        return [\Docker\API\Model\NodeDescription::class => false];
    }
}
