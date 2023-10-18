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

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return 'Docker\\API\\Model\\ContainerState' === $type;
    }

    public function supportsNormalization($data, $format = null, array $context = []): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ContainerState' === $data::class;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerState();
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
            $object->setHealth($this->denormalizer->denormalize($data['Health'], 'Docker\\API\\Model\\Health', 'json', $context));
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

    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if ($object->isInitialized('status') && null !== $object->getStatus()) {
            $data['Status'] = $object->getStatus();
        }
        if ($object->isInitialized('running') && null !== $object->getRunning()) {
            $data['Running'] = $object->getRunning();
        }
        if ($object->isInitialized('paused') && null !== $object->getPaused()) {
            $data['Paused'] = $object->getPaused();
        }
        if ($object->isInitialized('restarting') && null !== $object->getRestarting()) {
            $data['Restarting'] = $object->getRestarting();
        }
        if ($object->isInitialized('oOMKilled') && null !== $object->getOOMKilled()) {
            $data['OOMKilled'] = $object->getOOMKilled();
        }
        if ($object->isInitialized('dead') && null !== $object->getDead()) {
            $data['Dead'] = $object->getDead();
        }
        if ($object->isInitialized('pid') && null !== $object->getPid()) {
            $data['Pid'] = $object->getPid();
        }
        if ($object->isInitialized('exitCode') && null !== $object->getExitCode()) {
            $data['ExitCode'] = $object->getExitCode();
        }
        if ($object->isInitialized('error') && null !== $object->getError()) {
            $data['Error'] = $object->getError();
        }
        if ($object->isInitialized('startedAt') && null !== $object->getStartedAt()) {
            $data['StartedAt'] = $object->getStartedAt();
        }
        if ($object->isInitialized('finishedAt') && null !== $object->getFinishedAt()) {
            $data['FinishedAt'] = $object->getFinishedAt();
        }
        if ($object->isInitialized('health') && null !== $object->getHealth()) {
            $data['Health'] = null === $object->getHealth() ? null : new \ArrayObject($this->normalizer->normalize($object->getHealth(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function getSupportedTypes(string $format = null): array
    {
        return ['Docker\\API\\Model\\ContainerState' => false];
    }
}
