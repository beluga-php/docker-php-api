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

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\TaskSpecContainerSpecPrivileges' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\TaskSpecContainerSpecPrivileges' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecContainerSpecPrivileges();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('CredentialSpec', $data) && null !== $data['CredentialSpec']) {
            $object->setCredentialSpec($this->denormalizer->denormalize($data['CredentialSpec'], 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesCredentialSpec', 'json', $context));
            unset($data['CredentialSpec']);
        } elseif (\array_key_exists('CredentialSpec', $data) && null === $data['CredentialSpec']) {
            $object->setCredentialSpec(null);
        }
        if (\array_key_exists('SELinuxContext', $data) && null !== $data['SELinuxContext']) {
            $object->setSELinuxContext($this->denormalizer->denormalize($data['SELinuxContext'], 'Docker\\API\\Model\\TaskSpecContainerSpecPrivilegesSELinuxContext', 'json', $context));
            unset($data['SELinuxContext']);
        } elseif (\array_key_exists('SELinuxContext', $data) && null === $data['SELinuxContext']) {
            $object->setSELinuxContext(null);
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
        if ($object->isInitialized('credentialSpec') && null !== $object->getCredentialSpec()) {
            $data['CredentialSpec'] = null === $object->getCredentialSpec() ? null : new \ArrayObject($this->normalizer->normalize($object->getCredentialSpec(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('sELinuxContext') && null !== $object->getSELinuxContext()) {
            $data['SELinuxContext'] = null === $object->getSELinuxContext() ? null : new \ArrayObject($this->normalizer->normalize($object->getSELinuxContext(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\TaskSpecContainerSpecPrivileges' => false];
    }
}
