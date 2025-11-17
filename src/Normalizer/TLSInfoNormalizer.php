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

class TLSInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TLSInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TLSInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TLSInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('TrustRoot', $data) && null !== $data['TrustRoot']) {
            $object->setTrustRoot($data['TrustRoot']);
            unset($data['TrustRoot']);
        } elseif (\array_key_exists('TrustRoot', $data) && null === $data['TrustRoot']) {
            $object->setTrustRoot(null);
        }
        if (\array_key_exists('CertIssuerSubject', $data) && null !== $data['CertIssuerSubject']) {
            $object->setCertIssuerSubject($data['CertIssuerSubject']);
            unset($data['CertIssuerSubject']);
        } elseif (\array_key_exists('CertIssuerSubject', $data) && null === $data['CertIssuerSubject']) {
            $object->setCertIssuerSubject(null);
        }
        if (\array_key_exists('CertIssuerPublicKey', $data) && null !== $data['CertIssuerPublicKey']) {
            $object->setCertIssuerPublicKey($data['CertIssuerPublicKey']);
            unset($data['CertIssuerPublicKey']);
        } elseif (\array_key_exists('CertIssuerPublicKey', $data) && null === $data['CertIssuerPublicKey']) {
            $object->setCertIssuerPublicKey(null);
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
        if ($data->isInitialized('trustRoot') && null !== $data->getTrustRoot()) {
            $dataArray['TrustRoot'] = $data->getTrustRoot();
        }
        if ($data->isInitialized('certIssuerSubject') && null !== $data->getCertIssuerSubject()) {
            $dataArray['CertIssuerSubject'] = $data->getCertIssuerSubject();
        }
        if ($data->isInitialized('certIssuerPublicKey') && null !== $data->getCertIssuerPublicKey()) {
            $dataArray['CertIssuerPublicKey'] = $data->getCertIssuerPublicKey();
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
        return [\Docker\API\Model\TLSInfo::class => false];
    }
}
