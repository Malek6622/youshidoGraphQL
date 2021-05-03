<?php

namespace App\GraphQl\Type;

use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use App\GraphQl\Type\DepartmentType;
use App\GraphQl\Type\ProductType;

class UserType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @return mixed
     */
    public function build($config)
    {
        $config->addField('products',new ListType(new ProductType()));
        $config->addFields(
            [
                'id' => new NonNullType(new IdType()),
                'name' => new StringType(),
                'email' => new StringType(),
                'phoneNumber' => new NumberType(),
                'cin' => new NumberType(),
                'department' => new DepartmentType(),
            ]
        );
    }
}
