<?php

namespace App\Tests\DataSource;

use App\DataSource\QuotaRequestDataSourceInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @covers \App\DataSource\QuotaRequestDataSource
 */
final class QuotaRequestDataSourceTest extends KernelTestCase
{
    private QuotaRequestDataSourceInterface $dataSource;

    protected function setUp(): void
    {
        self::bootKernel();
        $dataSource = $this->getContainer()->get(QuotaRequestDataSourceInterface::class);
        assert($dataSource instanceof QuotaRequestDataSourceInterface);
        $this->dataSource = $dataSource;
    }

    public function testFindAll(): void
    {
        $results = $this->dataSource->findAll();
        self::assertCount(2, $results);
    }
}
