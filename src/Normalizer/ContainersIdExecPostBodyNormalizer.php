<?php

namespace Docker\API\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class ContainersIdExecPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null) : bool
    {
        return $type === 'Docker\\API\\Model\\ContainersIdExecPostBody';
    }
    public function supportsNormalization($data, $format = null) : bool
    {
        return is_object($data) && get_class($data) === 'Docker\\API\\Model\\ContainersIdExecPostBody';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainersIdExecPostBody();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('AttachStdin', $data) && $data['AttachStdin'] !== null) {
            $object->setAttachStdin($data['AttachStdin']);
            unset($data['AttachStdin']);
        }
        elseif (\array_key_exists('AttachStdin', $data) && $data['AttachStdin'] === null) {
            $object->setAttachStdin(null);
        }
        if (\array_key_exists('AttachStdout', $data) && $data['AttachStdout'] !== null) {
            $object->setAttachStdout($data['AttachStdout']);
            unset($data['AttachStdout']);
        }
        elseif (\array_key_exists('AttachStdout', $data) && $data['AttachStdout'] === null) {
            $object->setAttachStdout(null);
        }
        if (\array_key_exists('AttachStderr', $data) && $data['AttachStderr'] !== null) {
            $object->setAttachStderr($data['AttachStderr']);
            unset($data['AttachStderr']);
        }
        elseif (\array_key_exists('AttachStderr', $data) && $data['AttachStderr'] === null) {
            $object->setAttachStderr(null);
        }
        if (\array_key_exists('DetachKeys', $data) && $data['DetachKeys'] !== null) {
            $object->setDetachKeys($data['DetachKeys']);
            unset($data['DetachKeys']);
        }
        elseif (\array_key_exists('DetachKeys', $data) && $data['DetachKeys'] === null) {
            $object->setDetachKeys(null);
        }
        if (\array_key_exists('Tty', $data) && $data['Tty'] !== null) {
            $object->setTty($data['Tty']);
            unset($data['Tty']);
        }
        elseif (\array_key_exists('Tty', $data) && $data['Tty'] === null) {
            $object->setTty(null);
        }
        if (\array_key_exists('Env', $data) && $data['Env'] !== null) {
            $values = array();
            foreach ($data['Env'] as $value) {
                $values[] = $value;
            }
            $object->setEnv($values);
            unset($data['Env']);
        }
        elseif (\array_key_exists('Env', $data) && $data['Env'] === null) {
            $object->setEnv(null);
        }
        if (\array_key_exists('Cmd', $data) && $data['Cmd'] !== null) {
            $values_1 = array();
            foreach ($data['Cmd'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setCmd($values_1);
            unset($data['Cmd']);
        }
        elseif (\array_key_exists('Cmd', $data) && $data['Cmd'] === null) {
            $object->setCmd(null);
        }
        if (\array_key_exists('Privileged', $data) && $data['Privileged'] !== null) {
            $object->setPrivileged($data['Privileged']);
            unset($data['Privileged']);
        }
        elseif (\array_key_exists('Privileged', $data) && $data['Privileged'] === null) {
            $object->setPrivileged(null);
        }
        if (\array_key_exists('User', $data) && $data['User'] !== null) {
            $object->setUser($data['User']);
            unset($data['User']);
        }
        elseif (\array_key_exists('User', $data) && $data['User'] === null) {
            $object->setUser(null);
        }
        if (\array_key_exists('WorkingDir', $data) && $data['WorkingDir'] !== null) {
            $object->setWorkingDir($data['WorkingDir']);
            unset($data['WorkingDir']);
        }
        elseif (\array_key_exists('WorkingDir', $data) && $data['WorkingDir'] === null) {
            $object->setWorkingDir(null);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('attachStdin') && null !== $object->getAttachStdin()) {
            $data['AttachStdin'] = $object->getAttachStdin();
        }
        if ($object->isInitialized('attachStdout') && null !== $object->getAttachStdout()) {
            $data['AttachStdout'] = $object->getAttachStdout();
        }
        if ($object->isInitialized('attachStderr') && null !== $object->getAttachStderr()) {
            $data['AttachStderr'] = $object->getAttachStderr();
        }
        if ($object->isInitialized('detachKeys') && null !== $object->getDetachKeys()) {
            $data['DetachKeys'] = $object->getDetachKeys();
        }
        if ($object->isInitialized('tty') && null !== $object->getTty()) {
            $data['Tty'] = $object->getTty();
        }
        if ($object->isInitialized('env') && null !== $object->getEnv()) {
            $values = array();
            foreach ($object->getEnv() as $value) {
                $values[] = $value;
            }
            $data['Env'] = $values;
        }
        if ($object->isInitialized('cmd') && null !== $object->getCmd()) {
            $values_1 = array();
            foreach ($object->getCmd() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Cmd'] = $values_1;
        }
        if ($object->isInitialized('privileged') && null !== $object->getPrivileged()) {
            $data['Privileged'] = $object->getPrivileged();
        }
        if ($object->isInitialized('user') && null !== $object->getUser()) {
            $data['User'] = $object->getUser();
        }
        if ($object->isInitialized('workingDir') && null !== $object->getWorkingDir()) {
            $data['WorkingDir'] = $object->getWorkingDir();
        }
        foreach ($object as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_2;
            }
        }
        return $data;
    }
}