<?php

namespace App\DataSource;

use App\Data\QuotaRequest;

interface QuotaRequestDataSourceInterface
{
    /**
     * @return iterable<QuotaRequest>
     */
    public function findAll(): iterable;
}
