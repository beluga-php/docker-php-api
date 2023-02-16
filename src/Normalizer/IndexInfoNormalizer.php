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

class IndexInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\IndexInfo' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\IndexInfo' === $data::class;
    }

    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\IndexInfo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data) && null !== $data['Name']) {
            $object->setName($data['Name']);
            unset($data['Name']);
        } elseif (\array_key_exists('Name', $data) && null === $data['Name']) {
            $object->setName(null);
        }
        if (\array_key_exists('Mirrors', $data) && null !== $data['Mirrors']) {
            $values = [];
            foreach ($data['Mirrors'] as $value) {
                $values[] = $value;
            }
            $object->setMirrors($values);
            unset($data['Mirrors']);
        } elseif (\array_key_exists('Mirrors', $data) && null === $data['Mirrors']) {
            $object->setMirrors(null);
        }
        if (\array_key_exists('Secure', $data) && null !== $data['Secure']) {
            $object->setSecure($data['Secure']);
            unset($data['Secure']);
        } elseif (\array_key_exists('Secure', $data) && null === $data['Secure']) {
            $object->setSecure(null);
        }
        if (\array_key_exists('Official', $data) && null !== $data['Official']) {
            $object->setOfficial($data['Official']);
            unset($data['Official']);
        } elseif (\array_key_exists('Official', $data) && null === $data['Official']) {
            $object->setOfficial(null);
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
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['Name'] = $object->getName();
        }
        if ($object->isInitialized('mirrors') && null !== $object->getMirrors()) {
            $values = [];
            foreach ($object->getMirrors() as $value) {
                $values[] = $value;
            }
            $data['Mirrors'] = $values;
        }
        if ($object->isInitialized('secure') && null !== $object->getSecure()) {
            $data['Secure'] = $object->getSecure();
        }
        if ($object->isInitialized('official') && null !== $object->getOfficial()) {
            $data['Official'] = $object->getOfficial();
        }
        foreach ($object as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value_1;
            }
        }

        return $data;
    }
}
