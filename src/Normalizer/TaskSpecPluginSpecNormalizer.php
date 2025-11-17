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

class TaskSpecPluginSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecPluginSpec::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecPluginSpec::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecPluginSpec();
        if (\array_key_exists('Disabled', $data) && \is_int($data['Disabled'])) {
            $data['Disabled'] = (bool) $data['Disabled'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('Remote', $data) && null !== $data['Remote']) {
            $object->setRemote($data['Remote']);
            unset($data['Remote']);
        } elseif (\array_key_exists('Remote', $data) && null === $data['Remote']) {
            $object->setRemote(null);
        }
        if (\array_key_exists('Disabled', $data) && null !== $data['Disabled']) {
            $object->setDisabled($data['Disabled']);
            unset($data['Disabled']);
        } elseif (\array_key_exists('Disabled', $data) && null === $data['Disabled']) {
            $object->setDisabled(null);
        }
        if (\array_key_exists('PluginPrivilege', $data) && null !== $data['PluginPrivilege']) {
            $values = [];
            foreach ($data['PluginPrivilege'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\PluginPrivilege::class, 'json', $context);
            }
            $object->setPluginPrivilege($values);
            unset($data['PluginPrivilege']);
        } elseif (\array_key_exists('PluginPrivilege', $data) && null === $data['PluginPrivilege']) {
            $object->setPluginPrivilege(null);
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
        if ($data->isInitialized('remote') && null !== $data->getRemote()) {
            $dataArray['Remote'] = $data->getRemote();
        }
        if ($data->isInitialized('disabled') && null !== $data->getDisabled()) {
            $dataArray['Disabled'] = $data->getDisabled();
        }
        if ($data->isInitialized('pluginPrivilege') && null !== $data->getPluginPrivilege()) {
            $values = [];
            foreach ($data->getPluginPrivilege() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['PluginPrivilege'] = $values;
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
        return [\Docker\API\Model\TaskSpecPluginSpec::class => false];
    }
}
