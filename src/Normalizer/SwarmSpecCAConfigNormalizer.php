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

class SwarmSpecCAConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SwarmSpecCAConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SwarmSpecCAConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmSpecCAConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NodeCertExpiry', $data) && null !== $data['NodeCertExpiry']) {
            $object->setNodeCertExpiry($data['NodeCertExpiry']);
            unset($data['NodeCertExpiry']);
        } elseif (\array_key_exists('NodeCertExpiry', $data) && null === $data['NodeCertExpiry']) {
            $object->setNodeCertExpiry(null);
        }
        if (\array_key_exists('ExternalCAs', $data) && null !== $data['ExternalCAs']) {
            $values = [];
            foreach ($data['ExternalCAs'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\SwarmSpecCAConfigExternalCAsItem::class, 'json', $context);
            }
            $object->setExternalCAs($values);
            unset($data['ExternalCAs']);
        } elseif (\array_key_exists('ExternalCAs', $data) && null === $data['ExternalCAs']) {
            $object->setExternalCAs(null);
        }
        if (\array_key_exists('SigningCACert', $data) && null !== $data['SigningCACert']) {
            $object->setSigningCACert($data['SigningCACert']);
            unset($data['SigningCACert']);
        } elseif (\array_key_exists('SigningCACert', $data) && null === $data['SigningCACert']) {
            $object->setSigningCACert(null);
        }
        if (\array_key_exists('SigningCAKey', $data) && null !== $data['SigningCAKey']) {
            $object->setSigningCAKey($data['SigningCAKey']);
            unset($data['SigningCAKey']);
        } elseif (\array_key_exists('SigningCAKey', $data) && null === $data['SigningCAKey']) {
            $object->setSigningCAKey(null);
        }
        if (\array_key_exists('ForceRotate', $data) && null !== $data['ForceRotate']) {
            $object->setForceRotate($data['ForceRotate']);
            unset($data['ForceRotate']);
        } elseif (\array_key_exists('ForceRotate', $data) && null === $data['ForceRotate']) {
            $object->setForceRotate(null);
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
        if ($data->isInitialized('nodeCertExpiry') && null !== $data->getNodeCertExpiry()) {
            $dataArray['NodeCertExpiry'] = $data->getNodeCertExpiry();
        }
        if ($data->isInitialized('externalCAs') && null !== $data->getExternalCAs()) {
            $values = [];
            foreach ($data->getExternalCAs() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['ExternalCAs'] = $values;
        }
        if ($data->isInitialized('signingCACert') && null !== $data->getSigningCACert()) {
            $dataArray['SigningCACert'] = $data->getSigningCACert();
        }
        if ($data->isInitialized('signingCAKey') && null !== $data->getSigningCAKey()) {
            $dataArray['SigningCAKey'] = $data->getSigningCAKey();
        }
        if ($data->isInitialized('forceRotate') && null !== $data->getForceRotate()) {
            $dataArray['ForceRotate'] = $data->getForceRotate();
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
        return [\Docker\API\Model\SwarmSpecCAConfig::class => false];
    }
}
