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

class ContainersIdWaitPostResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\ContainersIdWaitPostResponse200' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ContainersIdWaitPostResponse200' === $data::class;
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
        $object = new \Docker\API\Model\ContainersIdWaitPostResponse200();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('StatusCode', $data) && null !== $data['StatusCode']) {
            $object->setStatusCode($data['StatusCode']);
            unset($data['StatusCode']);
        } elseif (\array_key_exists('StatusCode', $data) && null === $data['StatusCode']) {
            $object->setStatusCode(null);
        }
        if (\array_key_exists('Error', $data) && null !== $data['Error']) {
            $object->setError($this->denormalizer->denormalize($data['Error'], 'Docker\\API\\Model\\ContainersIdWaitPostResponse200Error', 'json', $context));
            unset($data['Error']);
        } elseif (\array_key_exists('Error', $data) && null === $data['Error']) {
            $object->setError(null);
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
        $data['StatusCode'] = $object->getStatusCode();
        if ($object->isInitialized('error') && null !== $object->getError()) {
            $data['Error'] = new \ArrayObject($this->normalizer->normalize($object->getError(), 'json', $context), \ArrayObject::ARRAY_AS_PROPS);
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
