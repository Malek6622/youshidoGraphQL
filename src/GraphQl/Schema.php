<?php

namespace App\GraphQl;

use App\GraphQl\Query\QueryType;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Config\Schema\SchemaConfig;
use Youshido\GraphQL\Type\Scalar\StringType;

class Schema extends AbstractSchema
{
    public function build(SchemaConfig $config)
    {
        $config
            ->setQuery(new QueryType());
    }
}