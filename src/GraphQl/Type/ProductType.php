<?php

namespace App\GraphQl\Type;

use App\GraphQl\Type\DepartmentType;
use App\GraphQl\Type\UserType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

/**
 * Class ProductType
 * @package App\GraphQl\Type
 */
class ProductType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addField('users', new ListType(new UserType()));
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'name' => new StringType(),
                'department' => new DepartmentType()
            ]
        );
    }
}
