<?php

namespace App\DataSource;

use App\Data\QuotaRequest;

final class QuotaRequestDataSource implements QuotaRequestDataSourceInterface
{
    public function findAll(): iterable
    {
        return [
            new QuotaRequest('Mike', 'mike@example.com', 'I need some of your stuff'),
            new QuotaRequest('Zoe', 'zoe@example.com', 'I need some of your stuff too!'),
        ];
    }
}
