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

class ProcessConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ProcessConfig::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ProcessConfig::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ProcessConfig();
        if (\array_key_exists('privileged', $data) && \is_int($data['privileged'])) {
            $data['privileged'] = (bool) $data['privileged'];
        }
        if (\array_key_exists('tty', $data) && \is_int($data['tty'])) {
            $data['tty'] = (bool) $data['tty'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('privileged', $data) && null !== $data['privileged']) {
            $object->setPrivileged($data['privileged']);
            unset($data['privileged']);
        } elseif (\array_key_exists('privileged', $data) && null === $data['privileged']) {
            $object->setPrivileged(null);
        }
        if (\array_key_exists('user', $data) && null !== $data['user']) {
            $object->setUser($data['user']);
            unset($data['user']);
        } elseif (\array_key_exists('user', $data) && null === $data['user']) {
            $object->setUser(null);
        }
        if (\array_key_exists('tty', $data) && null !== $data['tty']) {
            $object->setTty($data['tty']);
            unset($data['tty']);
        } elseif (\array_key_exists('tty', $data) && null === $data['tty']) {
            $object->setTty(null);
        }
        if (\array_key_exists('entrypoint', $data) && null !== $data['entrypoint']) {
            $object->setEntrypoint($data['entrypoint']);
            unset($data['entrypoint']);
        } elseif (\array_key_exists('entrypoint', $data) && null === $data['entrypoint']) {
            $object->setEntrypoint(null);
        }
        if (\array_key_exists('arguments', $data) && null !== $data['arguments']) {
            $values = [];
            foreach ($data['arguments'] as $value) {
                $values[] = $value;
            }
            $object->setArguments($values);
            unset($data['arguments']);
        } elseif (\array_key_exists('arguments', $data) && null === $data['arguments']) {
            $object->setArguments(null);
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
        if ($data->isInitialized('privileged') && null !== $data->getPrivileged()) {
            $dataArray['privileged'] = $data->getPrivileged();
        }
        if ($data->isInitialized('user') && null !== $data->getUser()) {
            $dataArray['user'] = $data->getUser();
        }
        if ($data->isInitialized('tty') && null !== $data->getTty()) {
            $dataArray['tty'] = $data->getTty();
        }
        if ($data->isInitialized('entrypoint') && null !== $data->getEntrypoint()) {
            $dataArray['entrypoint'] = $data->getEntrypoint();
        }
        if ($data->isInitialized('arguments') && null !== $data->getArguments()) {
            $values = [];
            foreach ($data->getArguments() as $value) {
                $values[] = $value;
            }
            $dataArray['arguments'] = $values;
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
        return [\Docker\API\Model\ProcessConfig::class => false];
    }
}
