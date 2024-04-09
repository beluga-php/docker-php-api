<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class TLSInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TLSInfo' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TLSInfo' === $data::class;
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

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('trustRoot') && null !== $object->getTrustRoot()) {
                $data['TrustRoot'] = $object->getTrustRoot();
            }
            if ($object->isInitialized('certIssuerSubject') && null !== $object->getCertIssuerSubject()) {
                $data['CertIssuerSubject'] = $object->getCertIssuerSubject();
            }
            if ($object->isInitialized('certIssuerPublicKey') && null !== $object->getCertIssuerPublicKey()) {
                $data['CertIssuerPublicKey'] = $object->getCertIssuerPublicKey();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\TLSInfo' => false];
        }
    }
} else {
    class TLSInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\TLSInfo' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\TLSInfo' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
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

        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('trustRoot') && null !== $object->getTrustRoot()) {
                $data['TrustRoot'] = $object->getTrustRoot();
            }
            if ($object->isInitialized('certIssuerSubject') && null !== $object->getCertIssuerSubject()) {
                $data['CertIssuerSubject'] = $object->getCertIssuerSubject();
            }
            if ($object->isInitialized('certIssuerPublicKey') && null !== $object->getCertIssuerPublicKey()) {
                $data['CertIssuerPublicKey'] = $object->getCertIssuerPublicKey();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\TLSInfo' => false];
        }
    }
}
