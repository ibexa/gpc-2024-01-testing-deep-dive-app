<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @group integration
 *
 * @coversNothing
 */
final class TestSetupValidateTest extends KernelTestCase
{
    public function testCompilesSuccessfully(): void
    {
        self::bootKernel();

        $this->expectNotToPerformAssertions();
    }
}
