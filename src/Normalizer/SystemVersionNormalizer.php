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

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\SystemVersion::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\SystemVersion::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SystemVersion();
        if (\array_key_exists('Experimental', $data) && \is_int($data['Experimental'])) {
            $data['Experimental'] = (bool) $data['Experimental'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Platform', $data) && null !== $data['Platform']) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], \Docker\API\Model\SystemVersionPlatform::class, 'json', $context));
            unset($data['Platform']);
        } elseif (\array_key_exists('Platform', $data) && null === $data['Platform']) {
            $object->setPlatform(null);
        }
        if (\array_key_exists('Components', $data) && null !== $data['Components']) {
            $values = [];
            foreach ($data['Components'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\SystemVersionComponentsItem::class, 'json', $context);
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

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('platform') && null !== $data->getPlatform()) {
            $dataArray['Platform'] = $this->normalizer->normalize($data->getPlatform(), 'json', $context);
        }
        if ($data->isInitialized('components') && null !== $data->getComponents()) {
            $values = [];
            foreach ($data->getComponents() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Components'] = $values;
        }
        if ($data->isInitialized('version') && null !== $data->getVersion()) {
            $dataArray['Version'] = $data->getVersion();
        }
        if ($data->isInitialized('apiVersion') && null !== $data->getApiVersion()) {
            $dataArray['ApiVersion'] = $data->getApiVersion();
        }
        if ($data->isInitialized('minAPIVersion') && null !== $data->getMinAPIVersion()) {
            $dataArray['MinAPIVersion'] = $data->getMinAPIVersion();
        }
        if ($data->isInitialized('gitCommit') && null !== $data->getGitCommit()) {
            $dataArray['GitCommit'] = $data->getGitCommit();
        }
        if ($data->isInitialized('goVersion') && null !== $data->getGoVersion()) {
            $dataArray['GoVersion'] = $data->getGoVersion();
        }
        if ($data->isInitialized('os') && null !== $data->getOs()) {
            $dataArray['Os'] = $data->getOs();
        }
        if ($data->isInitialized('arch') && null !== $data->getArch()) {
            $dataArray['Arch'] = $data->getArch();
        }
        if ($data->isInitialized('kernelVersion') && null !== $data->getKernelVersion()) {
            $dataArray['KernelVersion'] = $data->getKernelVersion();
        }
        if ($data->isInitialized('experimental') && null !== $data->getExperimental()) {
            $dataArray['Experimental'] = $data->getExperimental();
        }
        if ($data->isInitialized('buildTime') && null !== $data->getBuildTime()) {
            $dataArray['BuildTime'] = $data->getBuildTime();
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
        return [\Docker\API\Model\SystemVersion::class => false];
    }
}
