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

class TaskSpecContainerSpecPrivilegesCredentialSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Config', $data) && null !== $data['Config']) {
            $object->setConfig($data['Config']);
            unset($data['Config']);
        } elseif (\array_key_exists('Config', $data) && null === $data['Config']) {
            $object->setConfig(null);
        }
        if (\array_key_exists('File', $data) && null !== $data['File']) {
            $object->setFile($data['File']);
            unset($data['File']);
        } elseif (\array_key_exists('File', $data) && null === $data['File']) {
            $object->setFile(null);
        }
        if (\array_key_exists('Registry', $data) && null !== $data['Registry']) {
            $object->setRegistry($data['Registry']);
            unset($data['Registry']);
        } elseif (\array_key_exists('Registry', $data) && null === $data['Registry']) {
            $object->setRegistry(null);
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
        if ($data->isInitialized('config') && null !== $data->getConfig()) {
            $dataArray['Config'] = $data->getConfig();
        }
        if ($data->isInitialized('file') && null !== $data->getFile()) {
            $dataArray['File'] = $data->getFile();
        }
        if ($data->isInitialized('registry') && null !== $data->getRegistry()) {
            $dataArray['Registry'] = $data->getRegistry();
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
        return [\Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec::class => false];
    }
}
