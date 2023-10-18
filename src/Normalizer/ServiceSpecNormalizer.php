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

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\ServiceSpec' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ServiceSpec' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
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
            $object->setTaskTemplate($this->denormalizer->denormalize($data['TaskTemplate'], 'Docker\\API\\Model\\TaskSpec', 'json', $context));
            unset($data['TaskTemplate']);
        } elseif (\array_key_exists('TaskTemplate', $data) && null === $data['TaskTemplate']) {
            $object->setTaskTemplate(null);
        }
        if (\array_key_exists('Mode', $data) && null !== $data['Mode']) {
            $object->setMode($this->denormalizer->denormalize($data['Mode'], 'Docker\\API\\Model\\ServiceSpecMode', 'json', $context));
            unset($data['Mode']);
        } elseif (\array_key_exists('Mode', $data) && null === $data['Mode']) {
            $object->setMode(null);
        }
        if (\array_key_exists('UpdateConfig', $data) && null !== $data['UpdateConfig']) {
            $object->setUpdateConfig($this->denormalizer->denormalize($data['UpdateConfig'], 'Docker\\API\\Model\\ServiceSpecUpdateConfig', 'json', $context));
            unset($data['UpdateConfig']);
        } elseif (\array_key_exists('UpdateConfig', $data) && null === $data['UpdateConfig']) {
            $object->setUpdateConfig(null);
        }
        if (\array_key_exists('RollbackConfig', $data) && null !== $data['RollbackConfig']) {
            $object->setRollbackConfig($this->denormalizer->denormalize($data['RollbackConfig'], 'Docker\\API\\Model\\ServiceSpecRollbackConfig', 'json', $context));
            unset($data['RollbackConfig']);
        } elseif (\array_key_exists('RollbackConfig', $data) && null === $data['RollbackConfig']) {
            $object->setRollbackConfig(null);
        }
        if (\array_key_exists('Networks', $data) && null !== $data['Networks']) {
            $values_1 = [];
            foreach ($data['Networks'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\\API\\Model\\NetworkAttachmentConfig', 'json', $context);
            }
            $object->setNetworks($values_1);
            unset($data['Networks']);
        } elseif (\array_key_exists('Networks', $data) && null === $data['Networks']) {
            $object->setNetworks(null);
        }
        if (\array_key_exists('EndpointSpec', $data) && null !== $data['EndpointSpec']) {
            $object->setEndpointSpec($this->denormalizer->denormalize($data['EndpointSpec'], 'Docker\\API\\Model\\EndpointSpec', 'json', $context));
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
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($object->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $data['Labels'] = $values;
        }
        if ($object->isInitialized('taskTemplate') && null !== $object->getTaskTemplate()) {
            $data['TaskTemplate'] = null === $object->getTaskTemplate() ? null : new \ArrayObject($this->normalizer->normalize($object->getTaskTemplate(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('mode') && null !== $object->getMode()) {
            $data['Mode'] = null === $object->getMode() ? null : new \ArrayObject($this->normalizer->normalize($object->getMode(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('updateConfig') && null !== $object->getUpdateConfig()) {
            $data['UpdateConfig'] = null === $object->getUpdateConfig() ? null : new \ArrayObject($this->normalizer->normalize($object->getUpdateConfig(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('rollbackConfig') && null !== $object->getRollbackConfig()) {
            $data['RollbackConfig'] = null === $object->getRollbackConfig() ? null : new \ArrayObject($this->normalizer->normalize($object->getRollbackConfig(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('networks') && null !== $object->getNetworks()) {
            $values_1 = [];
            foreach ($object->getNetworks() as $value_1) {
                $values_1[] = null === $value_1 ? null : new \ArrayObject($this->normalizer->normalize($value_1, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
            }
            $data['Networks'] = $values_1;
        }
        if ($object->isInitialized('endpointSpec') && null !== $object->getEndpointSpec()) {
            $data['EndpointSpec'] = null === $object->getEndpointSpec() ? null : new \ArrayObject($this->normalizer->normalize($object->getEndpointSpec(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key_1 => $value_2) {
            if (preg_match('/.*/', (string) $key_1)) {
                $data[$key_1] = $value_2;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\ServiceSpec' => false];
    }
}
