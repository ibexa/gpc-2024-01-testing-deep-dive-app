<?php

namespace App\Tests\DataSource;

use App\DataSource\QuotaRequestDataSourceInterface;
use Ibexa\Contracts\Core\Repository\PermissionResolver;
use Ibexa\Core\Repository\Values\User\UserReference;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @covers \App\DataSource\QuotaRequestDataSource
 */
final class QuotaRequestDataSourceTest extends KernelTestCase
{
    private QuotaRequestDataSourceInterface $dataSource;

    private PermissionResolver $permissionResolver;

    protected function setUp(): void
    {
        self::bootKernel();
        $repository = $this->getContainer()->get(QuotaRequestDataSourceInterface::class);
        assert($repository instanceof QuotaRequestDataSourceInterface);
        $this->dataSource = $repository;

        $permissionResolver = $this->getContainer()->get(PermissionResolver::class);
        assert($permissionResolver instanceof PermissionResolver);
        $this->permissionResolver = $permissionResolver;
    }

    public function testFindAll(): void
    {
        $this->permissionResolver->setCurrentUserReference(new UserReference(14));

        $results = $this->dataSource->findAll();
        self::assertCount(2, $results);
    }

    public function testFindAsAnonymousGivesNoResults(): void
    {
        $this->permissionResolver->setCurrentUserReference(new UserReference(10));

        $results = $this->dataSource->findAll();
        self::assertCount(0, $results);
    }
}
