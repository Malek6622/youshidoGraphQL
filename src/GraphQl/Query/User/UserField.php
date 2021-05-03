<?php

namespace App\GraphQl\Query\User;

use App\Entity\Department;
use App\Entity\User;
use App\GraphQl\Type\ProductType;
use App\GraphQl\Type\DepartmentType;
use App\GraphQl\Type\UserType;
use Doctrine\DBAL\Types\Type;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\BooleanType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Config\Field\FieldConfig;

class UserField extends AbstractContainerAwareField
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
                'email' => new StringType(),
                'phoneNumber' => new IntType(),
                'cin' => new IntType()
            ]
        );
    }
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository(User::class)
            ->findBy($args);
    }
    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new ListType(new  UserType());
    }

}