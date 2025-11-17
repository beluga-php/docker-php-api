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

class ExecIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ExecIdJsonGetResponse200::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ExecIdJsonGetResponse200::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ExecIdJsonGetResponse200();
        if (\array_key_exists('CanRemove', $data) && \is_int($data['CanRemove'])) {
            $data['CanRemove'] = (bool) $data['CanRemove'];
        }
        if (\array_key_exists('Running', $data) && \is_int($data['Running'])) {
            $data['Running'] = (bool) $data['Running'];
        }
        if (\array_key_exists('OpenStdin', $data) && \is_int($data['OpenStdin'])) {
            $data['OpenStdin'] = (bool) $data['OpenStdin'];
        }
        if (\array_key_exists('OpenStderr', $data) && \is_int($data['OpenStderr'])) {
            $data['OpenStderr'] = (bool) $data['OpenStderr'];
        }
        if (\array_key_exists('OpenStdout', $data) && \is_int($data['OpenStdout'])) {
            $data['OpenStdout'] = (bool) $data['OpenStdout'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('CanRemove', $data) && null !== $data['CanRemove']) {
            $object->setCanRemove($data['CanRemove']);
            unset($data['CanRemove']);
        } elseif (\array_key_exists('CanRemove', $data) && null === $data['CanRemove']) {
            $object->setCanRemove(null);
        }
        if (\array_key_exists('DetachKeys', $data) && null !== $data['DetachKeys']) {
            $object->setDetachKeys($data['DetachKeys']);
            unset($data['DetachKeys']);
        } elseif (\array_key_exists('DetachKeys', $data) && null === $data['DetachKeys']) {
            $object->setDetachKeys(null);
        }
        if (\array_key_exists('ID', $data) && null !== $data['ID']) {
            $object->setID($data['ID']);
            unset($data['ID']);
        } elseif (\array_key_exists('ID', $data) && null === $data['ID']) {
            $object->setID(null);
        }
        if (\array_key_exists('Running', $data) && null !== $data['Running']) {
            $object->setRunning($data['Running']);
            unset($data['Running']);
        } elseif (\array_key_exists('Running', $data) && null === $data['Running']) {
            $object->setRunning(null);
        }
        if (\array_key_exists('ExitCode', $data) && null !== $data['ExitCode']) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        } elseif (\array_key_exists('ExitCode', $data) && null === $data['ExitCode']) {
            $object->setExitCode(null);
        }
        if (\array_key_exists('ProcessConfig', $data) && null !== $data['ProcessConfig']) {
            $object->setProcessConfig($this->denormalizer->denormalize($data['ProcessConfig'], \Docker\API\Model\ProcessConfig::class, 'json', $context));
            unset($data['ProcessConfig']);
        } elseif (\array_key_exists('ProcessConfig', $data) && null === $data['ProcessConfig']) {
            $object->setProcessConfig(null);
        }
        if (\array_key_exists('OpenStdin', $data) && null !== $data['OpenStdin']) {
            $object->setOpenStdin($data['OpenStdin']);
            unset($data['OpenStdin']);
        } elseif (\array_key_exists('OpenStdin', $data) && null === $data['OpenStdin']) {
            $object->setOpenStdin(null);
        }
        if (\array_key_exists('OpenStderr', $data) && null !== $data['OpenStderr']) {
            $object->setOpenStderr($data['OpenStderr']);
            unset($data['OpenStderr']);
        } elseif (\array_key_exists('OpenStderr', $data) && null === $data['OpenStderr']) {
            $object->setOpenStderr(null);
        }
        if (\array_key_exists('OpenStdout', $data) && null !== $data['OpenStdout']) {
            $object->setOpenStdout($data['OpenStdout']);
            unset($data['OpenStdout']);
        } elseif (\array_key_exists('OpenStdout', $data) && null === $data['OpenStdout']) {
            $object->setOpenStdout(null);
        }
        if (\array_key_exists('ContainerID', $data) && null !== $data['ContainerID']) {
            $object->setContainerID($data['ContainerID']);
            unset($data['ContainerID']);
        } elseif (\array_key_exists('ContainerID', $data) && null === $data['ContainerID']) {
            $object->setContainerID(null);
        }
        if (\array_key_exists('Pid', $data) && null !== $data['Pid']) {
            $object->setPid($data['Pid']);
            unset($data['Pid']);
        } elseif (\array_key_exists('Pid', $data) && null === $data['Pid']) {
            $object->setPid(null);
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
        if ($data->isInitialized('canRemove') && null !== $data->getCanRemove()) {
            $dataArray['CanRemove'] = $data->getCanRemove();
        }
        if ($data->isInitialized('detachKeys') && null !== $data->getDetachKeys()) {
            $dataArray['DetachKeys'] = $data->getDetachKeys();
        }
        if ($data->isInitialized('iD') && null !== $data->getID()) {
            $dataArray['ID'] = $data->getID();
        }
        if ($data->isInitialized('running') && null !== $data->getRunning()) {
            $dataArray['Running'] = $data->getRunning();
        }
        if ($data->isInitialized('exitCode') && null !== $data->getExitCode()) {
            $dataArray['ExitCode'] = $data->getExitCode();
        }
        if ($data->isInitialized('processConfig') && null !== $data->getProcessConfig()) {
            $dataArray['ProcessConfig'] = $this->normalizer->normalize($data->getProcessConfig(), 'json', $context);
        }
        if ($data->isInitialized('openStdin') && null !== $data->getOpenStdin()) {
            $dataArray['OpenStdin'] = $data->getOpenStdin();
        }
        if ($data->isInitialized('openStderr') && null !== $data->getOpenStderr()) {
            $dataArray['OpenStderr'] = $data->getOpenStderr();
        }
        if ($data->isInitialized('openStdout') && null !== $data->getOpenStdout()) {
            $dataArray['OpenStdout'] = $data->getOpenStdout();
        }
        if ($data->isInitialized('containerID') && null !== $data->getContainerID()) {
            $dataArray['ContainerID'] = $data->getContainerID();
        }
        if ($data->isInitialized('pid') && null !== $data->getPid()) {
            $dataArray['Pid'] = $data->getPid();
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
        return [\Docker\API\Model\ExecIdJsonGetResponse200::class => false];
    }
}
