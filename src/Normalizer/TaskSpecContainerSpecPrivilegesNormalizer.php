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

class TaskSpecContainerSpecPrivilegesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecContainerSpecPrivileges::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecContainerSpecPrivileges::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new \Docker\API\Model\TaskSpecContainerSpecPrivileges();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('NoNewPrivileges', $data) && \is_int($data['NoNewPrivileges'])) {
            $data['NoNewPrivileges'] = (bool) $data['NoNewPrivileges'];
        }
        if (\array_key_exists('CredentialSpec', $data) && null !== $data['CredentialSpec']) {
            $object->setCredentialSpec($this->denormalizer->denormalize($data['CredentialSpec'], \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec::class, 'json', $context));
            unset($data['CredentialSpec']);
        } elseif (\array_key_exists('CredentialSpec', $data) && null === $data['CredentialSpec']) {
            $object->setCredentialSpec(null);
            unset($data['CredentialSpec']);
        }
        if (\array_key_exists('SELinuxContext', $data) && null !== $data['SELinuxContext']) {
            $object->setSELinuxContext($this->denormalizer->denormalize($data['SELinuxContext'], \Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext::class, 'json', $context));
            unset($data['SELinuxContext']);
        } elseif (\array_key_exists('SELinuxContext', $data) && null === $data['SELinuxContext']) {
            $object->setSELinuxContext(null);
            unset($data['SELinuxContext']);
        }
        if (\array_key_exists('Seccomp', $data) && null !== $data['Seccomp']) {
            $object->setSeccomp($this->denormalizer->denormalize($data['Seccomp'], \Docker\API\Model\TaskSpecContainerSpecPrivilegesSeccomp::class, 'json', $context));
            unset($data['Seccomp']);
        } elseif (\array_key_exists('Seccomp', $data) && null === $data['Seccomp']) {
            $object->setSeccomp(null);
            unset($data['Seccomp']);
        }
        if (\array_key_exists('AppArmor', $data) && null !== $data['AppArmor']) {
            $object->setAppArmor($this->denormalizer->denormalize($data['AppArmor'], \Docker\API\Model\TaskSpecContainerSpecPrivilegesAppArmor::class, 'json', $context));
            unset($data['AppArmor']);
        } elseif (\array_key_exists('AppArmor', $data) && null === $data['AppArmor']) {
            $object->setAppArmor(null);
            unset($data['AppArmor']);
        }
        if (\array_key_exists('NoNewPrivileges', $data) && null !== $data['NoNewPrivileges']) {
            $object->setNoNewPrivileges($data['NoNewPrivileges']);
            unset($data['NoNewPrivileges']);
        } elseif (\array_key_exists('NoNewPrivileges', $data) && null === $data['NoNewPrivileges']) {
            $object->setNoNewPrivileges(null);
            unset($data['NoNewPrivileges']);
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
        if ($data->isInitialized('credentialSpec') && null !== $data->getCredentialSpec()) {
            $dataArray['CredentialSpec'] = null === $data->getCredentialSpec() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getCredentialSpec(), 'json', $context));
        }
        if ($data->isInitialized('sELinuxContext') && null !== $data->getSELinuxContext()) {
            $dataArray['SELinuxContext'] = null === $data->getSELinuxContext() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getSELinuxContext(), 'json', $context));
        }
        if ($data->isInitialized('seccomp') && null !== $data->getSeccomp()) {
            $dataArray['Seccomp'] = null === $data->getSeccomp() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getSeccomp(), 'json', $context));
        }
        if ($data->isInitialized('appArmor') && null !== $data->getAppArmor()) {
            $dataArray['AppArmor'] = null === $data->getAppArmor() ? null : new \Docker\API\Runtime\JsonObject($this->normalizer->normalize($data->getAppArmor(), 'json', $context));
        }
        if ($data->isInitialized('noNewPrivileges') && null !== $data->getNoNewPrivileges()) {
            $dataArray['NoNewPrivileges'] = $data->getNoNewPrivileges();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskSpecContainerSpecPrivileges::class => false];
    }
}
