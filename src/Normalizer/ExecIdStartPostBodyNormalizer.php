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

class ExecIdStartPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ExecIdStartPostBody::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ExecIdStartPostBody::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ExecIdStartPostBody();
        if (\array_key_exists('Detach', $data) && \is_int($data['Detach'])) {
            $data['Detach'] = (bool) $data['Detach'];
        }
        if (\array_key_exists('Tty', $data) && \is_int($data['Tty'])) {
            $data['Tty'] = (bool) $data['Tty'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Detach', $data) && null !== $data['Detach']) {
            $object->setDetach($data['Detach']);
            unset($data['Detach']);
        } elseif (\array_key_exists('Detach', $data) && null === $data['Detach']) {
            $object->setDetach(null);
        }
        if (\array_key_exists('Tty', $data) && null !== $data['Tty']) {
            $object->setTty($data['Tty']);
            unset($data['Tty']);
        } elseif (\array_key_exists('Tty', $data) && null === $data['Tty']) {
            $object->setTty(null);
        }
        if (\array_key_exists('ConsoleSize', $data) && null !== $data['ConsoleSize']) {
            $values = [];
            foreach ($data['ConsoleSize'] as $value) {
                $values[] = $value;
            }
            $object->setConsoleSize($values);
            unset($data['ConsoleSize']);
        } elseif (\array_key_exists('ConsoleSize', $data) && null === $data['ConsoleSize']) {
            $object->setConsoleSize(null);
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
        if ($data->isInitialized('detach') && null !== $data->getDetach()) {
            $dataArray['Detach'] = $data->getDetach();
        }
        if ($data->isInitialized('tty') && null !== $data->getTty()) {
            $dataArray['Tty'] = $data->getTty();
        }
        if ($data->isInitialized('consoleSize') && null !== $data->getConsoleSize()) {
            $values = [];
            foreach ($data->getConsoleSize() as $value) {
                $values[] = $value;
            }
            $dataArray['ConsoleSize'] = $values;
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
        return [\Docker\API\Model\ExecIdStartPostBody::class => false];
    }
}
