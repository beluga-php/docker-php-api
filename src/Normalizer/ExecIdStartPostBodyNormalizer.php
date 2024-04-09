<?php

declare(strict_types=1);

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class ExecIdStartPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ExecIdStartPostBody' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ExecIdStartPostBody' === $data::class;
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

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('detach') && null !== $object->getDetach()) {
                $data['Detach'] = $object->getDetach();
            }
            if ($object->isInitialized('tty') && null !== $object->getTty()) {
                $data['Tty'] = $object->getTty();
            }
            if ($object->isInitialized('consoleSize') && null !== $object->getConsoleSize()) {
                $values = [];
                foreach ($object->getConsoleSize() as $value) {
                    $values[] = $value;
                }
                $data['ConsoleSize'] = $values;
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\ExecIdStartPostBody' => false];
        }
    }
} else {
    class ExecIdStartPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return 'Docker\\API\\Model\\ExecIdStartPostBody' === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && 'Docker\\API\\Model\\ExecIdStartPostBody' === $data::class;
        }

        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new \Docker\API\Model\ExecIdStartPostBody();
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

        /**
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('detach') && null !== $object->getDetach()) {
                $data['Detach'] = $object->getDetach();
            }
            if ($object->isInitialized('tty') && null !== $object->getTty()) {
                $data['Tty'] = $object->getTty();
            }
            if ($object->isInitialized('consoleSize') && null !== $object->getConsoleSize()) {
                $values = [];
                foreach ($object->getConsoleSize() as $value) {
                    $values[] = $value;
                }
                $data['ConsoleSize'] = $values;
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\\API\\Model\\ExecIdStartPostBody' => false];
        }
    }
}
