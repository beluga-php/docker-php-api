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

class RegistryServiceConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\RegistryServiceConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\RegistryServiceConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\RegistryServiceConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('AllowNondistributableArtifactsCIDRs', $data) && null !== $data['AllowNondistributableArtifactsCIDRs']) {
            $values = [];
            foreach ($data['AllowNondistributableArtifactsCIDRs'] as $value) {
                $values[] = $value;
            }
            $object->setAllowNondistributableArtifactsCIDRs($values);
            unset($data['AllowNondistributableArtifactsCIDRs']);
        } elseif (\array_key_exists('AllowNondistributableArtifactsCIDRs', $data) && null === $data['AllowNondistributableArtifactsCIDRs']) {
            $object->setAllowNondistributableArtifactsCIDRs(null);
        }
        if (\array_key_exists('AllowNondistributableArtifactsHostnames', $data) && null !== $data['AllowNondistributableArtifactsHostnames']) {
            $values_1 = [];
            foreach ($data['AllowNondistributableArtifactsHostnames'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAllowNondistributableArtifactsHostnames($values_1);
            unset($data['AllowNondistributableArtifactsHostnames']);
        } elseif (\array_key_exists('AllowNondistributableArtifactsHostnames', $data) && null === $data['AllowNondistributableArtifactsHostnames']) {
            $object->setAllowNondistributableArtifactsHostnames(null);
        }
        if (\array_key_exists('InsecureRegistryCIDRs', $data) && null !== $data['InsecureRegistryCIDRs']) {
            $values_2 = [];
            foreach ($data['InsecureRegistryCIDRs'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setInsecureRegistryCIDRs($values_2);
            unset($data['InsecureRegistryCIDRs']);
        } elseif (\array_key_exists('InsecureRegistryCIDRs', $data) && null === $data['InsecureRegistryCIDRs']) {
            $object->setInsecureRegistryCIDRs(null);
        }
        if (\array_key_exists('IndexConfigs', $data) && null !== $data['IndexConfigs']) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['IndexConfigs'] as $key => $value_3) {
                $values_3[$key] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\IndexInfo::class, 'json', $context);
            }
            $object->setIndexConfigs($values_3);
            unset($data['IndexConfigs']);
        } elseif (\array_key_exists('IndexConfigs', $data) && null === $data['IndexConfigs']) {
            $object->setIndexConfigs(null);
        }
        if (\array_key_exists('Mirrors', $data) && null !== $data['Mirrors']) {
            $values_4 = [];
            foreach ($data['Mirrors'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setMirrors($values_4);
            unset($data['Mirrors']);
        } elseif (\array_key_exists('Mirrors', $data) && null === $data['Mirrors']) {
            $object->setMirrors(null);
        }
        foreach ($data as $key_1 => $value_5) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_5;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('allowNondistributableArtifactsCIDRs') && null !== $data->getAllowNondistributableArtifactsCIDRs()) {
            $values = [];
            foreach ($data->getAllowNondistributableArtifactsCIDRs() as $value) {
                $values[] = $value;
            }
            $dataArray['AllowNondistributableArtifactsCIDRs'] = $values;
        }
        if ($data->isInitialized('allowNondistributableArtifactsHostnames') && null !== $data->getAllowNondistributableArtifactsHostnames()) {
            $values_1 = [];
            foreach ($data->getAllowNondistributableArtifactsHostnames() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['AllowNondistributableArtifactsHostnames'] = $values_1;
        }
        if ($data->isInitialized('insecureRegistryCIDRs') && null !== $data->getInsecureRegistryCIDRs()) {
            $values_2 = [];
            foreach ($data->getInsecureRegistryCIDRs() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['InsecureRegistryCIDRs'] = $values_2;
        }
        if ($data->isInitialized('indexConfigs') && null !== $data->getIndexConfigs()) {
            $values_3 = [];
            foreach ($data->getIndexConfigs() as $key => $value_3) {
                $values_3[$key] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $dataArray['IndexConfigs'] = $values_3;
        }
        if ($data->isInitialized('mirrors') && null !== $data->getMirrors()) {
            $values_4 = [];
            foreach ($data->getMirrors() as $value_4) {
                $values_4[] = $value_4;
            }
            $dataArray['Mirrors'] = $values_4;
        }
        foreach ($data as $key_1 => $value_5) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_5;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\RegistryServiceConfig::class => false];
    }
}
