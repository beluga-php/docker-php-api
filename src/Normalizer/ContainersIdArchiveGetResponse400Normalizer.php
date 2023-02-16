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

class ContainersIdArchiveGetResponse400Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization($data, $type, $format = null): bool
    {
        return 'Docker\\API\\Model\\ContainersIdArchiveGetResponse400' === $type;
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return \is_object($data) && 'Docker\\API\\Model\\ContainersIdArchiveGetResponse400' === $data::class;
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
        $object = new \Docker\API\Model\ContainersIdArchiveGetResponse400();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ErrorResponse', $data) && null !== $data['ErrorResponse']) {
            $object->setErrorResponse($this->denormalizer->denormalize($data['ErrorResponse'], 'Docker\\API\\Model\\ErrorResponse', 'json', $context));
            unset($data['ErrorResponse']);
        } elseif (\array_key_exists('ErrorResponse', $data) && null === $data['ErrorResponse']) {
            $object->setErrorResponse(null);
        }
        if (\array_key_exists('message', $data) && null !== $data['message']) {
            $object->setMessage($data['message']);
            unset($data['message']);
        } elseif (\array_key_exists('message', $data) && null === $data['message']) {
            $object->setMessage(null);
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
        if ($object->isInitialized('errorResponse') && null !== $object->getErrorResponse()) {
            $data['ErrorResponse'] = $this->normalizer->normalize($object->getErrorResponse(), 'json', $context);
        }
        if ($object->isInitialized('message') && null !== $object->getMessage()) {
            $data['message'] = $object->getMessage();
        }
        foreach ($object as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}
