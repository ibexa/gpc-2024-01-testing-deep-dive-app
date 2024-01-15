<?php

namespace App\DataSource;

interface QuotaRequestDataSourceInterface
{
    public function findAll(): iterable;
}
