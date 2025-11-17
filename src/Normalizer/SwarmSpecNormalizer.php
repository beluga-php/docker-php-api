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

class SwarmSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SwarmSpec::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SwarmSpec::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmSpec();
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
        if (\array_key_exists('Orchestration', $data) && null !== $data['Orchestration']) {
            $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], \Docker\API\Model\SwarmSpecOrchestration::class, 'json', $context));
            unset($data['Orchestration']);
        } elseif (\array_key_exists('Orchestration', $data) && null === $data['Orchestration']) {
            $object->setOrchestration(null);
        }
        if (\array_key_exists('Raft', $data) && null !== $data['Raft']) {
            $object->setRaft($this->denormalizer->denormalize($data['Raft'], \Docker\API\Model\SwarmSpecRaft::class, 'json', $context));
            unset($data['Raft']);
        } elseif (\array_key_exists('Raft', $data) && null === $data['Raft']) {
            $object->setRaft(null);
        }
        if (\array_key_exists('Dispatcher', $data) && null !== $data['Dispatcher']) {
            $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], \Docker\API\Model\SwarmSpecDispatcher::class, 'json', $context));
            unset($data['Dispatcher']);
        } elseif (\array_key_exists('Dispatcher', $data) && null === $data['Dispatcher']) {
            $object->setDispatcher(null);
        }
        if (\array_key_exists('CAConfig', $data) && null !== $data['CAConfig']) {
            $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], \Docker\API\Model\SwarmSpecCAConfig::class, 'json', $context));
            unset($data['CAConfig']);
        } elseif (\array_key_exists('CAConfig', $data) && null === $data['CAConfig']) {
            $object->setCAConfig(null);
        }
        if (\array_key_exists('EncryptionConfig', $data) && null !== $data['EncryptionConfig']) {
            $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], \Docker\API\Model\SwarmSpecEncryptionConfig::class, 'json', $context));
            unset($data['EncryptionConfig']);
        } elseif (\array_key_exists('EncryptionConfig', $data) && null === $data['EncryptionConfig']) {
            $object->setEncryptionConfig(null);
        }
        if (\array_key_exists('TaskDefaults', $data) && null !== $data['TaskDefaults']) {
            $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], \Docker\API\Model\SwarmSpecTaskDefaults::class, 'json', $context));
            unset($data['TaskDefaults']);
        } elseif (\array_key_exists('TaskDefaults', $data) && null === $data['TaskDefaults']) {
            $object->setTaskDefaults(null);
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
        if ($data->isInitialized('orchestration') && null !== $data->getOrchestration()) {
            $dataArray['Orchestration'] = $this->normalizer->normalize($data->getOrchestration(), 'json', $context);
        }
        if ($data->isInitialized('raft') && null !== $data->getRaft()) {
            $dataArray['Raft'] = $this->normalizer->normalize($data->getRaft(), 'json', $context);
        }
        if ($data->isInitialized('dispatcher') && null !== $data->getDispatcher()) {
            $dataArray['Dispatcher'] = $this->normalizer->normalize($data->getDispatcher(), 'json', $context);
        }
        if ($data->isInitialized('cAConfig') && null !== $data->getCAConfig()) {
            $dataArray['CAConfig'] = $this->normalizer->normalize($data->getCAConfig(), 'json', $context);
        }
        if ($data->isInitialized('encryptionConfig') && null !== $data->getEncryptionConfig()) {
            $dataArray['EncryptionConfig'] = $this->normalizer->normalize($data->getEncryptionConfig(), 'json', $context);
        }
        if ($data->isInitialized('taskDefaults') && null !== $data->getTaskDefaults()) {
            $dataArray['TaskDefaults'] = $this->normalizer->normalize($data->getTaskDefaults(), 'json', $context);
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
        return [\Docker\API\Model\SwarmSpec::class => false];
    }
}
