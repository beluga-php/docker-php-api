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

class PluginConfigArgsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\PluginConfigArgs::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\PluginConfigArgs::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\PluginConfigArgs();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('Description', $data) && null !== $data['Description']) {
            $object->setDescription($data['Description']);
            unset($data['Description']);
        } elseif (\array_key_exists('Description', $data) && null === $data['Description']) {
            $object->setDescription(null);
        }
        if (\array_key_exists('Settable', $data) && null !== $data['Settable']) {
            $values = [];
            foreach ($data['Settable'] as $value) {
                $values[] = $value;
            }
            $object->setSettable($values);
            unset($data['Settable']);
        } elseif (\array_key_exists('Settable', $data) && null === $data['Settable']) {
            $object->setSettable(null);
        }
        if (\array_key_exists('Value', $data) && null !== $data['Value']) {
            $values_1 = [];
            foreach ($data['Value'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setValue($values_1);
            unset($data['Value']);
        } elseif (\array_key_exists('Value', $data) && null === $data['Value']) {
            $object->setValue(null);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['Name'] = $data->getName();
        $dataArray['Description'] = $data->getDescription();
        $values = [];
        foreach ($data->getSettable() as $value) {
            $values[] = $value;
        }
        $dataArray['Settable'] = $values;
        $values_1 = [];
        foreach ($data->getValue() as $value_1) {
            $values_1[] = $value_1;
        }
        $dataArray['Value'] = $values_1;
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\PluginConfigArgs::class => false];
    }
}
