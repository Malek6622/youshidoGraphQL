<?php

namespace App\GraphQl\Query\Department;

use App\Entity\Department;
use App\GraphQl\Query\Product\ProductField;
use App\GraphQl\Query\User\UserField;
use App\GraphQl\Type\DepartmentType;
use App\GraphQl\Type\ProductType;
use App\GraphQl\Type\UserType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Object\ObjectType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Config\Field\FieldConfig;

class DepartmentField extends AbstractContainerAwareField
{
    function __construct(array $config = [])
    {
        parent::__construct($config);
    }
    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'name' => new StringType(),
                 new ObjectType([
                    'name' => 'RootQueryType',
                    'fields' => [
                        new ProductType()
                    ]
                ]),
                new ObjectType([
                    'name' => 'RootQueryType',
                    'fields' => [
                        new UserType()
                    ]
                ])
            ]
        );
    }
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository(Department::class)
            ->findBy($args);
    }
    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new ListType(new  DepartmentType());
    }

}