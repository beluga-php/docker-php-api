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

class PluginNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\Plugin::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\Plugin::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Plugin();
        if (\array_key_exists('Enabled', $data) && \is_int($data['Enabled'])) {
            $data['Enabled'] = (bool) $data['Enabled'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data) && null !== $data['Id']) {
            $object->setId($data['Id']);
            unset($data['Id']);
        } elseif (\array_key_exists('Id', $data) && null === $data['Id']) {
            $object->setId(null);
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('Enabled', $data) && null !== $data['Enabled']) {
            $object->setEnabled($data['Enabled']);
            unset($data['Enabled']);
        } elseif (\array_key_exists('Enabled', $data) && null === $data['Enabled']) {
            $object->setEnabled(null);
        }
        if (\array_key_exists('Settings', $data) && null !== $data['Settings']) {
            $object->setSettings($this->denormalizer->denormalize($data['Settings'], \Docker\API\Model\PluginSettings::class, 'json', $context));
            unset($data['Settings']);
        } elseif (\array_key_exists('Settings', $data) && null === $data['Settings']) {
            $object->setSettings(null);
        }
        if (\array_key_exists('PluginReference', $data) && null !== $data['PluginReference']) {
            $object->setPluginReference($data['PluginReference']);
            unset($data['PluginReference']);
        } elseif (\array_key_exists('PluginReference', $data) && null === $data['PluginReference']) {
            $object->setPluginReference(null);
        }
        if (\array_key_exists('Config', $data) && null !== $data['Config']) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], \Docker\API\Model\PluginConfig::class, 'json', $context));
            unset($data['Config']);
        } elseif (\array_key_exists('Config', $data) && null === $data['Config']) {
            $object->setConfig(null);
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
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['Id'] = $data->getId();
        }
        $dataArray['Name'] = $data->getName();
        $dataArray['Enabled'] = $data->getEnabled();
        $dataArray['Settings'] = $this->normalizer->normalize($data->getSettings(), 'json', $context);
        if ($data->isInitialized('pluginReference') && null !== $data->getPluginReference()) {
            $dataArray['PluginReference'] = $data->getPluginReference();
        }
        $dataArray['Config'] = $this->normalizer->normalize($data->getConfig(), 'json', $context);
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\Plugin::class => false];
    }
}
