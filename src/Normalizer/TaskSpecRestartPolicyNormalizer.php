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

class TaskSpecRestartPolicyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\TaskSpecRestartPolicy::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\TaskSpecRestartPolicy::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecRestartPolicy();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Condition', $data) && null !== $data['Condition']) {
            $object->setCondition($data['Condition']);
            unset($data['Condition']);
        } elseif (\array_key_exists('Condition', $data) && null === $data['Condition']) {
            $object->setCondition(null);
        }
        if (\array_key_exists('Delay', $data) && null !== $data['Delay']) {
            $object->setDelay($data['Delay']);
            unset($data['Delay']);
        } elseif (\array_key_exists('Delay', $data) && null === $data['Delay']) {
            $object->setDelay(null);
        }
        if (\array_key_exists('MaxAttempts', $data) && null !== $data['MaxAttempts']) {
            $object->setMaxAttempts($data['MaxAttempts']);
            unset($data['MaxAttempts']);
        } elseif (\array_key_exists('MaxAttempts', $data) && null === $data['MaxAttempts']) {
            $object->setMaxAttempts(null);
        }
        if (\array_key_exists('Window', $data) && null !== $data['Window']) {
            $object->setWindow($data['Window']);
            unset($data['Window']);
        } elseif (\array_key_exists('Window', $data) && null === $data['Window']) {
            $object->setWindow(null);
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
        if ($data->isInitialized('condition') && null !== $data->getCondition()) {
            $dataArray['Condition'] = $data->getCondition();
        }
        if ($data->isInitialized('delay') && null !== $data->getDelay()) {
            $dataArray['Delay'] = $data->getDelay();
        }
        if ($data->isInitialized('maxAttempts') && null !== $data->getMaxAttempts()) {
            $dataArray['MaxAttempts'] = $data->getMaxAttempts();
        }
        if ($data->isInitialized('window') && null !== $data->getWindow()) {
            $dataArray['Window'] = $data->getWindow();
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskSpecRestartPolicy::class => false];
    }
}
