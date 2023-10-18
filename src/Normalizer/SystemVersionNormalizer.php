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

class SystemVersionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\SystemVersion' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\SystemVersion' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SystemVersion();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Platform', $data) && null !== $data['Platform']) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Docker\\API\\Model\\SystemVersionPlatform', 'json', $context));
            unset($data['Platform']);
        } elseif (\array_key_exists('Platform', $data) && null === $data['Platform']) {
            $object->setPlatform(null);
        }
        if (\array_key_exists('Components', $data) && null !== $data['Components']) {
            $values = [];
            foreach ($data['Components'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Docker\\API\\Model\\SystemVersionComponentsItem', 'json', $context);
            }
            $object->setComponents($values);
            unset($data['Components']);
        } elseif (\array_key_exists('Components', $data) && null === $data['Components']) {
            $object->setComponents(null);
        }
        if (\array_key_exists('Version', $data) && null !== $data['Version']) {
            $object->setVersion($data['Version']);
            unset($data['Version']);
        } elseif (\array_key_exists('Version', $data) && null === $data['Version']) {
            $object->setVersion(null);
        }
        if (\array_key_exists('ApiVersion', $data) && null !== $data['ApiVersion']) {
            $object->setApiVersion($data['ApiVersion']);
            unset($data['ApiVersion']);
        } elseif (\array_key_exists('ApiVersion', $data) && null === $data['ApiVersion']) {
            $object->setApiVersion(null);
        }
        if (\array_key_exists('MinAPIVersion', $data) && null !== $data['MinAPIVersion']) {
            $object->setMinAPIVersion($data['MinAPIVersion']);
            unset($data['MinAPIVersion']);
        } elseif (\array_key_exists('MinAPIVersion', $data) && null === $data['MinAPIVersion']) {
            $object->setMinAPIVersion(null);
        }
        if (\array_key_exists('GitCommit', $data) && null !== $data['GitCommit']) {
            $object->setGitCommit($data['GitCommit']);
            unset($data['GitCommit']);
        } elseif (\array_key_exists('GitCommit', $data) && null === $data['GitCommit']) {
            $object->setGitCommit(null);
        }
        if (\array_key_exists('GoVersion', $data) && null !== $data['GoVersion']) {
            $object->setGoVersion($data['GoVersion']);
            unset($data['GoVersion']);
        } elseif (\array_key_exists('GoVersion', $data) && null === $data['GoVersion']) {
            $object->setGoVersion(null);
        }
        if (\array_key_exists('Os', $data) && null !== $data['Os']) {
            $object->setOs($data['Os']);
            unset($data['Os']);
        } elseif (\array_key_exists('Os', $data) && null === $data['Os']) {
            $object->setOs(null);
        }
        if (\array_key_exists('Arch', $data) && null !== $data['Arch']) {
            $object->setArch($data['Arch']);
            unset($data['Arch']);
        } elseif (\array_key_exists('Arch', $data) && null === $data['Arch']) {
            $object->setArch(null);
        }
        if (\array_key_exists('KernelVersion', $data) && null !== $data['KernelVersion']) {
            $object->setKernelVersion($data['KernelVersion']);
            unset($data['KernelVersion']);
        } elseif (\array_key_exists('KernelVersion', $data) && null === $data['KernelVersion']) {
            $object->setKernelVersion(null);
        }
        if (\array_key_exists('Experimental', $data) && null !== $data['Experimental']) {
            $object->setExperimental($data['Experimental']);
            unset($data['Experimental']);
        } elseif (\array_key_exists('Experimental', $data) && null === $data['Experimental']) {
            $object->setExperimental(null);
        }
        if (\array_key_exists('BuildTime', $data) && null !== $data['BuildTime']) {
            $object->setBuildTime($data['BuildTime']);
            unset($data['BuildTime']);
        } elseif (\array_key_exists('BuildTime', $data) && null === $data['BuildTime']) {
            $object->setBuildTime(null);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
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
        if ($object->isInitialized('platform') && null !== $object->getPlatform()) {
            $data['Platform'] = null === $object->getPlatform() ? null : new \ArrayObject($this->normalizer->normalize($object->getPlatform(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        if ($object->isInitialized('components') && null !== $object->getComponents()) {
            $values = [];
            foreach ($object->getComponents() as $value) {
                $values[] = null === $value ? null : new \ArrayObject($this->normalizer->normalize($value, 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
            }
            $data['Components'] = $values;
        }
        if ($object->isInitialized('version') && null !== $object->getVersion()) {
            $data['Version'] = $object->getVersion();
        }
        if ($object->isInitialized('apiVersion') && null !== $object->getApiVersion()) {
            $data['ApiVersion'] = $object->getApiVersion();
        }
        if ($object->isInitialized('minAPIVersion') && null !== $object->getMinAPIVersion()) {
            $data['MinAPIVersion'] = $object->getMinAPIVersion();
        }
        if ($object->isInitialized('gitCommit') && null !== $object->getGitCommit()) {
            $data['GitCommit'] = $object->getGitCommit();
        }
        if ($object->isInitialized('goVersion') && null !== $object->getGoVersion()) {
            $data['GoVersion'] = $object->getGoVersion();
        }
        if ($object->isInitialized('os') && null !== $object->getOs()) {
            $data['Os'] = $object->getOs();
        }
        if ($object->isInitialized('arch') && null !== $object->getArch()) {
            $data['Arch'] = $object->getArch();
        }
        if ($object->isInitialized('kernelVersion') && null !== $object->getKernelVersion()) {
            $data['KernelVersion'] = $object->getKernelVersion();
        }
        if ($object->isInitialized('experimental') && null !== $object->getExperimental()) {
            $data['Experimental'] = $object->getExperimental();
        }
        if ($object->isInitialized('buildTime') && null !== $object->getBuildTime()) {
            $data['BuildTime'] = $object->getBuildTime();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\SystemVersion' => false];
    }
}
