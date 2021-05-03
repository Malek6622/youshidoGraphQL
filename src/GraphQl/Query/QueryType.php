<?php

namespace App\GraphQl\Query;

use App\GraphQl\Query\Department\DepartmentField;
use App\GraphQl\Query\Product\ProductField;
use App\GraphQl\Query\User\UserField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class QueryType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     *
     */
    public function build($config)
    {
        $config->addFields([
            new ProductField(),
            new DepartmentField(),
            new UserField()
        ]);
    }
}
