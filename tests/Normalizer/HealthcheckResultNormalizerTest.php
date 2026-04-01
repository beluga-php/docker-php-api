<?php

declare(strict_types=1);

namespace Docker\API\Tests\Normalizer;

use Docker\API\Model\HealthcheckResult;
use Docker\API\Normalizer\HealthcheckResultNormalizer;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class HealthcheckResultNormalizerTest extends TestCase
{
    private HealthcheckResultNormalizer $normalizer;

    protected function setUp(): void
    {
        $this->normalizer = new HealthcheckResultNormalizer();
    }

    public static function parsedStartProvider(): iterable
    {
        yield 'nanosecond precision with Z timezone (localstack format)' => [
            '2019-12-22T10:59:05.6385933Z',
            '2019-12-22',
            '10:59:05',
        ];
        yield 'microsecond precision with numeric offset' => [
            '2019-12-22T10:59:05.638593+00:00',
            '2019-12-22',
            '10:59:05',
        ];
    }

    #[DataProvider('parsedStartProvider')]
    public function testDenormalizeStartParsesDateTime(string $input, string $expectedDate, string $expectedTime): void
    {
        $result = $this->normalizer->denormalize(['Start' => $input], HealthcheckResult::class);

        self::assertInstanceOf(\DateTimeInterface::class, $result->getStart());
        self::assertSame($expectedDate, $result->getStart()->format('Y-m-d'));
        self::assertSame($expectedTime, $result->getStart()->format('H:i:s'));
    }

    public static function nullStartProvider(): iterable
    {
        yield 'explicit null' => [['Start' => null]];
        yield 'unparsable string' => [['Start' => 'not-a-date']];
        yield 'non-string value' => [['Start' => 12345]];
    }

    #[DataProvider('nullStartProvider')]
    public function testDenormalizeStartReturnsNull(array $data): void
    {
        $result = $this->normalizer->denormalize($data, HealthcheckResult::class);

        self::assertNull($result->getStart());
    }

    public function testDenormalizeStartNotInitializedWhenKeyMissing(): void
    {
        $result = $this->normalizer->denormalize([], HealthcheckResult::class);

        self::assertFalse($result->isInitialized('start'));
    }
}
