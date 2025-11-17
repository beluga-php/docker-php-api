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

class HealthcheckResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\HealthcheckResult::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\HealthcheckResult::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\HealthcheckResult();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Start', $data) && null !== $data['Start']) {
            $object->setStart(\DateTime::createFromFormat('Y-m-d\TH:i:s.uuP', $data['Start']));
            unset($data['Start']);
        } elseif (\array_key_exists('Start', $data) && null === $data['Start']) {
            $object->setStart(null);
        }
        if (\array_key_exists('End', $data) && null !== $data['End']) {
            $object->setEnd($data['End']);
            unset($data['End']);
        } elseif (\array_key_exists('End', $data) && null === $data['End']) {
            $object->setEnd(null);
        }
        if (\array_key_exists('ExitCode', $data) && null !== $data['ExitCode']) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        } elseif (\array_key_exists('ExitCode', $data) && null === $data['ExitCode']) {
            $object->setExitCode(null);
        }
        if (\array_key_exists('Output', $data) && null !== $data['Output']) {
            $object->setOutput($data['Output']);
            unset($data['Output']);
        } elseif (\array_key_exists('Output', $data) && null === $data['Output']) {
            $object->setOutput(null);
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
        if ($data->isInitialized('start') && null !== $data->getStart()) {
            $dataArray['Start'] = $data->getStart()?->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('end') && null !== $data->getEnd()) {
            $dataArray['End'] = $data->getEnd();
        }
        if ($data->isInitialized('exitCode') && null !== $data->getExitCode()) {
            $dataArray['ExitCode'] = $data->getExitCode();
        }
        if ($data->isInitialized('output') && null !== $data->getOutput()) {
            $dataArray['Output'] = $data->getOutput();
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
        return [\Docker\API\Model\HealthcheckResult::class => false];
    }
}
