<?php

namespace App\GraphQl\Query\Product;

use App\Entity\Product;
use App\GraphQl\Type\ProductType;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Config\Field\FieldConfig;

class ProductField extends AbstractContainerAwareField
{
    function __construct(array $config = [])
    {
        parent::__construct($config);
    }
    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'name' => new StringType()
            ]
        );
    }
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $this->container
            ->get('doctrine.orm.entity_manager')
            ->getRepository(Product::class)
            ->findBy($args);
    }
    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new ListType(new ProductType());
    }
}