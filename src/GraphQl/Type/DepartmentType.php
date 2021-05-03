<?php

namespace App\GraphQl\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class DepartmentType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addField('products', new ListType(new ProductType()));
        $config->addField('users', new ListType(new UserType()));
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'name' => new StringType()
            ]
        );
    }
}