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

class SwarmSpecCAConfigExternalCAsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SwarmSpecCAConfigExternalCAsItem::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SwarmSpecCAConfigExternalCAsItem::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmSpecCAConfigExternalCAsItem();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Protocol', $data) && null !== $data['Protocol']) {
            $object->setProtocol($data['Protocol']);
            unset($data['Protocol']);
        } elseif (\array_key_exists('Protocol', $data) && null === $data['Protocol']) {
            $object->setProtocol(null);
        }
        if (\array_key_exists('URL', $data) && null !== $data['URL']) {
            $object->setURL($data['URL']);
            unset($data['URL']);
        } elseif (\array_key_exists('URL', $data) && null === $data['URL']) {
            $object->setURL(null);
        }
        if (\array_key_exists('Options', $data) && null !== $data['Options']) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setOptions($values);
            unset($data['Options']);
        } elseif (\array_key_exists('Options', $data) && null === $data['Options']) {
            $object->setOptions(null);
        }
        if (\array_key_exists('CACert', $data) && null !== $data['CACert']) {
            $object->setCACert($data['CACert']);
            unset($data['CACert']);
        } elseif (\array_key_exists('CACert', $data) && null === $data['CACert']) {
            $object->setCACert(null);
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('protocol') && null !== $data->getProtocol()) {
            $dataArray['Protocol'] = $data->getProtocol();
        }
        if ($data->isInitialized('uRL') && null !== $data->getURL()) {
            $dataArray['URL'] = $data->getURL();
        }
        if ($data->isInitialized('options') && null !== $data->getOptions()) {
            $values = [];
            foreach ($data->getOptions() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['Options'] = $values;
        }
        if ($data->isInitialized('cACert') && null !== $data->getCACert()) {
            $dataArray['CACert'] = $data->getCACert();
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SwarmSpecCAConfigExternalCAsItem::class => false];
    }
}
