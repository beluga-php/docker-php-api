<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class SwarmSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\SwarmSpec' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\SwarmSpec' === $data::class;
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
                $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], 'Docker\\API\\Model\\SwarmSpecOrchestration', 'json', $context));
                unset($data['Orchestration']);
            } elseif (\array_key_exists('Orchestration', $data) && null === $data['Orchestration']) {
                $object->setOrchestration(null);
            }
            if (\array_key_exists('Raft', $data) && null !== $data['Raft']) {
                $object->setRaft($this->denormalizer->denormalize($data['Raft'], 'Docker\\API\\Model\\SwarmSpecRaft', 'json', $context));
                unset($data['Raft']);
            } elseif (\array_key_exists('Raft', $data) && null === $data['Raft']) {
                $object->setRaft(null);
            }
            if (\array_key_exists('Dispatcher', $data) && null !== $data['Dispatcher']) {
                $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], 'Docker\\API\\Model\\SwarmSpecDispatcher', 'json', $context));
                unset($data['Dispatcher']);
            } elseif (\array_key_exists('Dispatcher', $data) && null === $data['Dispatcher']) {
                $object->setDispatcher(null);
            }
            if (\array_key_exists('CAConfig', $data) && null !== $data['CAConfig']) {
                $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], 'Docker\\API\\Model\\SwarmSpecCAConfig', 'json', $context));
                unset($data['CAConfig']);
            } elseif (\array_key_exists('CAConfig', $data) && null === $data['CAConfig']) {
                $object->setCAConfig(null);
            }
            if (\array_key_exists('EncryptionConfig', $data) && null !== $data['EncryptionConfig']) {
                $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], 'Docker\\API\\Model\\SwarmSpecEncryptionConfig', 'json', $context));
                unset($data['EncryptionConfig']);
            } elseif (\array_key_exists('EncryptionConfig', $data) && null === $data['EncryptionConfig']) {
                $object->setEncryptionConfig(null);
            }
            if (\array_key_exists('TaskDefaults', $data) && null !== $data['TaskDefaults']) {
                $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], 'Docker\\API\\Model\\SwarmSpecTaskDefaults', 'json', $context));
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

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('labels') && null !== $object->getLabels()) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('orchestration') && null !== $object->getOrchestration()) {
                $data['Orchestration'] = $this->normalizer->normalize($object->getOrchestration(), 'json', $context);
            }
            if ($object->isInitialized('raft') && null !== $object->getRaft()) {
                $data['Raft'] = $this->normalizer->normalize($object->getRaft(), 'json', $context);
            }
            if ($object->isInitialized('dispatcher') && null !== $object->getDispatcher()) {
                $data['Dispatcher'] = $this->normalizer->normalize($object->getDispatcher(), 'json', $context);
            }
            if ($object->isInitialized('cAConfig') && null !== $object->getCAConfig()) {
                $data['CAConfig'] = $this->normalizer->normalize($object->getCAConfig(), 'json', $context);
            }
            if ($object->isInitialized('encryptionConfig') && null !== $object->getEncryptionConfig()) {
                $data['EncryptionConfig'] = $this->normalizer->normalize($object->getEncryptionConfig(), 'json', $context);
            }
            if ($object->isInitialized('taskDefaults') && null !== $object->getTaskDefaults()) {
                $data['TaskDefaults'] = $this->normalizer->normalize($object->getTaskDefaults(), 'json', $context);
            }
            foreach ($object as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\SwarmSpec' => false];
        }
    }
} else {
    class SwarmSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\SwarmSpec' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\SwarmSpec' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
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
                $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], 'Docker\\API\\Model\\SwarmSpecOrchestration', 'json', $context));
                unset($data['Orchestration']);
            } elseif (\array_key_exists('Orchestration', $data) && null === $data['Orchestration']) {
                $object->setOrchestration(null);
            }
            if (\array_key_exists('Raft', $data) && null !== $data['Raft']) {
                $object->setRaft($this->denormalizer->denormalize($data['Raft'], 'Docker\\API\\Model\\SwarmSpecRaft', 'json', $context));
                unset($data['Raft']);
            } elseif (\array_key_exists('Raft', $data) && null === $data['Raft']) {
                $object->setRaft(null);
            }
            if (\array_key_exists('Dispatcher', $data) && null !== $data['Dispatcher']) {
                $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], 'Docker\\API\\Model\\SwarmSpecDispatcher', 'json', $context));
                unset($data['Dispatcher']);
            } elseif (\array_key_exists('Dispatcher', $data) && null === $data['Dispatcher']) {
                $object->setDispatcher(null);
            }
            if (\array_key_exists('CAConfig', $data) && null !== $data['CAConfig']) {
                $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], 'Docker\\API\\Model\\SwarmSpecCAConfig', 'json', $context));
                unset($data['CAConfig']);
            } elseif (\array_key_exists('CAConfig', $data) && null === $data['CAConfig']) {
                $object->setCAConfig(null);
            }
            if (\array_key_exists('EncryptionConfig', $data) && null !== $data['EncryptionConfig']) {
                $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], 'Docker\\API\\Model\\SwarmSpecEncryptionConfig', 'json', $context));
                unset($data['EncryptionConfig']);
            } elseif (\array_key_exists('EncryptionConfig', $data) && null === $data['EncryptionConfig']) {
                $object->setEncryptionConfig(null);
            }
            if (\array_key_exists('TaskDefaults', $data) && null !== $data['TaskDefaults']) {
                $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], 'Docker\\API\\Model\\SwarmSpecTaskDefaults', 'json', $context));
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

        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('labels') && null !== $object->getLabels()) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('orchestration') && null !== $object->getOrchestration()) {
                $data['Orchestration'] = $this->normalizer->normalize($object->getOrchestration(), 'json', $context);
            }
            if ($object->isInitialized('raft') && null !== $object->getRaft()) {
                $data['Raft'] = $this->normalizer->normalize($object->getRaft(), 'json', $context);
            }
            if ($object->isInitialized('dispatcher') && null !== $object->getDispatcher()) {
                $data['Dispatcher'] = $this->normalizer->normalize($object->getDispatcher(), 'json', $context);
            }
            if ($object->isInitialized('cAConfig') && null !== $object->getCAConfig()) {
                $data['CAConfig'] = $this->normalizer->normalize($object->getCAConfig(), 'json', $context);
            }
            if ($object->isInitialized('encryptionConfig') && null !== $object->getEncryptionConfig()) {
                $data['EncryptionConfig'] = $this->normalizer->normalize($object->getEncryptionConfig(), 'json', $context);
            }
            if ($object->isInitialized('taskDefaults') && null !== $object->getTaskDefaults()) {
                $data['TaskDefaults'] = $this->normalizer->normalize($object->getTaskDefaults(), 'json', $context);
            }
            foreach ($object as $key_1 => $value_1) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\SwarmSpec' => false];
        }
    }
}
