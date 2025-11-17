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

class ServiceSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ServiceSpec::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ServiceSpec::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceSpec();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('Labels', $data) && null !== $data['Labels']) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
            unset($data['Labels']);
        } elseif (\array_key_exists('Labels', $data) && null === $data['Labels']) {
            $object->setLabels(null);
        }
        if (\array_key_exists('TaskTemplate', $data) && null !== $data['TaskTemplate']) {
            $object->setTaskTemplate($this->denormalizer->denormalize($data['TaskTemplate'], \Docker\API\Model\TaskSpec::class, 'json', $context));
            unset($data['TaskTemplate']);
        } elseif (\array_key_exists('TaskTemplate', $data) && null === $data['TaskTemplate']) {
            $object->setTaskTemplate(null);
        }
        if (\array_key_exists('Mode', $data) && null !== $data['Mode']) {
            $object->setMode($this->denormalizer->denormalize($data['Mode'], \Docker\API\Model\ServiceSpecMode::class, 'json', $context));
            unset($data['Mode']);
        } elseif (\array_key_exists('Mode', $data) && null === $data['Mode']) {
            $object->setMode(null);
        }
        if (\array_key_exists('UpdateConfig', $data) && null !== $data['UpdateConfig']) {
            $object->setUpdateConfig($this->denormalizer->denormalize($data['UpdateConfig'], \Docker\API\Model\ServiceSpecUpdateConfig::class, 'json', $context));
            unset($data['UpdateConfig']);
        } elseif (\array_key_exists('UpdateConfig', $data) && null === $data['UpdateConfig']) {
            $object->setUpdateConfig(null);
        }
        if (\array_key_exists('RollbackConfig', $data) && null !== $data['RollbackConfig']) {
            $object->setRollbackConfig($this->denormalizer->denormalize($data['RollbackConfig'], \Docker\API\Model\ServiceSpecRollbackConfig::class, 'json', $context));
            unset($data['RollbackConfig']);
        } elseif (\array_key_exists('RollbackConfig', $data) && null === $data['RollbackConfig']) {
            $object->setRollbackConfig(null);
        }
        if (\array_key_exists('Networks', $data) && null !== $data['Networks']) {
            $values_1 = [];
            foreach ($data['Networks'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\NetworkAttachmentConfig::class, 'json', $context);
            }
            $object->setNetworks($values_1);
            unset($data['Networks']);
        } elseif (\array_key_exists('Networks', $data) && null === $data['Networks']) {
            $object->setNetworks(null);
        }
        if (\array_key_exists('EndpointSpec', $data) && null !== $data['EndpointSpec']) {
            $object->setEndpointSpec($this->denormalizer->denormalize($data['EndpointSpec'], \Docker\API\Model\EndpointSpec::class, 'json', $context));
            unset($data['EndpointSpec']);
        } elseif (\array_key_exists('EndpointSpec', $data) && null === $data['EndpointSpec']) {
            $object->setEndpointSpec(null);
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_2;
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
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values = [];
            foreach ($data->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['Labels'] = $values;
        }
        if ($data->isInitialized('taskTemplate') && null !== $data->getTaskTemplate()) {
            $dataArray['TaskTemplate'] = $this->normalizer->normalize($data->getTaskTemplate(), 'json', $context);
        }
        if ($data->isInitialized('mode') && null !== $data->getMode()) {
            $dataArray['Mode'] = $this->normalizer->normalize($data->getMode(), 'json', $context);
        }
        if ($data->isInitialized('updateConfig') && null !== $data->getUpdateConfig()) {
            $dataArray['UpdateConfig'] = $this->normalizer->normalize($data->getUpdateConfig(), 'json', $context);
        }
        if ($data->isInitialized('rollbackConfig') && null !== $data->getRollbackConfig()) {
            $dataArray['RollbackConfig'] = $this->normalizer->normalize($data->getRollbackConfig(), 'json', $context);
        }
        if ($data->isInitialized('networks') && null !== $data->getNetworks()) {
            $values_1 = [];
            foreach ($data->getNetworks() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['Networks'] = $values_1;
        }
        if ($data->isInitialized('endpointSpec') && null !== $data->getEndpointSpec()) {
            $dataArray['EndpointSpec'] = $this->normalizer->normalize($data->getEndpointSpec(), 'json', $context);
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ServiceSpec::class => false];
    }
}
