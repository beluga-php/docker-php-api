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

class ContainerStateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return \Docker\API\Model\ContainerState::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && \Docker\API\Model\ContainerState::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerState();
        if (\array_key_exists('Running', $data) && \is_int($data['Running'])) {
            $data['Running'] = (bool) $data['Running'];
        }
        if (\array_key_exists('Paused', $data) && \is_int($data['Paused'])) {
            $data['Paused'] = (bool) $data['Paused'];
        }
        if (\array_key_exists('Restarting', $data) && \is_int($data['Restarting'])) {
            $data['Restarting'] = (bool) $data['Restarting'];
        }
        if (\array_key_exists('OOMKilled', $data) && \is_int($data['OOMKilled'])) {
            $data['OOMKilled'] = (bool) $data['OOMKilled'];
        }
        if (\array_key_exists('Dead', $data) && \is_int($data['Dead'])) {
            $data['Dead'] = (bool) $data['Dead'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Status', $data) && null !== $data['Status']) {
            $object->setStatus($data['Status']);
            unset($data['Status']);
        } elseif (\array_key_exists('Status', $data) && null === $data['Status']) {
            $object->setStatus(null);
        }
        if (\array_key_exists('Running', $data) && null !== $data['Running']) {
            $object->setRunning($data['Running']);
            unset($data['Running']);
        } elseif (\array_key_exists('Running', $data) && null === $data['Running']) {
            $object->setRunning(null);
        }
        if (\array_key_exists('Paused', $data) && null !== $data['Paused']) {
            $object->setPaused($data['Paused']);
            unset($data['Paused']);
        } elseif (\array_key_exists('Paused', $data) && null === $data['Paused']) {
            $object->setPaused(null);
        }
        if (\array_key_exists('Restarting', $data) && null !== $data['Restarting']) {
            $object->setRestarting($data['Restarting']);
            unset($data['Restarting']);
        } elseif (\array_key_exists('Restarting', $data) && null === $data['Restarting']) {
            $object->setRestarting(null);
        }
        if (\array_key_exists('OOMKilled', $data) && null !== $data['OOMKilled']) {
            $object->setOOMKilled($data['OOMKilled']);
            unset($data['OOMKilled']);
        } elseif (\array_key_exists('OOMKilled', $data) && null === $data['OOMKilled']) {
            $object->setOOMKilled(null);
        }
        if (\array_key_exists('Dead', $data) && null !== $data['Dead']) {
            $object->setDead($data['Dead']);
            unset($data['Dead']);
        } elseif (\array_key_exists('Dead', $data) && null === $data['Dead']) {
            $object->setDead(null);
        }
        if (\array_key_exists('Pid', $data) && null !== $data['Pid']) {
            $object->setPid($data['Pid']);
            unset($data['Pid']);
        } elseif (\array_key_exists('Pid', $data) && null === $data['Pid']) {
            $object->setPid(null);
        }
        if (\array_key_exists('ExitCode', $data) && null !== $data['ExitCode']) {
            $object->setExitCode($data['ExitCode']);
            unset($data['ExitCode']);
        } elseif (\array_key_exists('ExitCode', $data) && null === $data['ExitCode']) {
            $object->setExitCode(null);
        }
        if (\array_key_exists('Error', $data) && null !== $data['Error']) {
            $object->setError($data['Error']);
            unset($data['Error']);
        } elseif (\array_key_exists('Error', $data) && null === $data['Error']) {
            $object->setError(null);
        }
        if (\array_key_exists('StartedAt', $data) && null !== $data['StartedAt']) {
            $object->setStartedAt($data['StartedAt']);
            unset($data['StartedAt']);
        } elseif (\array_key_exists('StartedAt', $data) && null === $data['StartedAt']) {
            $object->setStartedAt(null);
        }
        if (\array_key_exists('FinishedAt', $data) && null !== $data['FinishedAt']) {
            $object->setFinishedAt($data['FinishedAt']);
            unset($data['FinishedAt']);
        } elseif (\array_key_exists('FinishedAt', $data) && null === $data['FinishedAt']) {
            $object->setFinishedAt(null);
        }
        if (\array_key_exists('Health', $data) && null !== $data['Health']) {
            $object->setHealth($this->denormalizer->denormalize($data['Health'], \Docker\API\Model\Health::class, 'json', $context));
            unset($data['Health']);
        } elseif (\array_key_exists('Health', $data) && null === $data['Health']) {
            $object->setHealth(null);
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
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $dataArray['Status'] = $data->getStatus();
        }
        if ($data->isInitialized('running') && null !== $data->getRunning()) {
            $dataArray['Running'] = $data->getRunning();
        }
        if ($data->isInitialized('paused') && null !== $data->getPaused()) {
            $dataArray['Paused'] = $data->getPaused();
        }
        if ($data->isInitialized('restarting') && null !== $data->getRestarting()) {
            $dataArray['Restarting'] = $data->getRestarting();
        }
        if ($data->isInitialized('oOMKilled') && null !== $data->getOOMKilled()) {
            $dataArray['OOMKilled'] = $data->getOOMKilled();
        }
        if ($data->isInitialized('dead') && null !== $data->getDead()) {
            $dataArray['Dead'] = $data->getDead();
        }
        if ($data->isInitialized('pid') && null !== $data->getPid()) {
            $dataArray['Pid'] = $data->getPid();
        }
        if ($data->isInitialized('exitCode') && null !== $data->getExitCode()) {
            $dataArray['ExitCode'] = $data->getExitCode();
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['Error'] = $data->getError();
        }
        if ($data->isInitialized('startedAt') && null !== $data->getStartedAt()) {
            $dataArray['StartedAt'] = $data->getStartedAt();
        }
        if ($data->isInitialized('finishedAt') && null !== $data->getFinishedAt()) {
            $dataArray['FinishedAt'] = $data->getFinishedAt();
        }
        if ($data->isInitialized('health') && null !== $data->getHealth()) {
            $dataArray['Health'] = $this->normalizer->normalize($data->getHealth(), 'json', $context);
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
        return [\Docker\API\Model\ContainerState::class => false];
    }
}
