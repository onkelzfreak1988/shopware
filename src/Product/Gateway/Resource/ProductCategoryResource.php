<?php declare(strict_types=1);

namespace Shopware\Product\Gateway\Resource;

use Shopware\Framework\Write\Flag\Required;
use Shopware\Framework\Write\Field\FkField;
use Shopware\Framework\Write\Field\IntField;
use Shopware\Framework\Write\Field\ReferenceField;
use Shopware\Framework\Write\Field\StringField;
use Shopware\Framework\Write\Field\BoolField;
use Shopware\Framework\Write\Field\DateField;
use Shopware\Framework\Write\Field\SubresourceField;
use Shopware\Framework\Write\Field\LongTextField;
use Shopware\Framework\Write\Field\LongTextWithHtmlField;
use Shopware\Framework\Write\Field\FloatField;
use Shopware\Framework\Write\Field\TranslatedField;
use Shopware\Framework\Write\Field\UuidField;
use Shopware\Framework\Write\Resource;

class ProductCategoryResource extends Resource
{
    

    public function __construct()
    {
        parent::__construct('product_category');
        
        $this->fields['product'] = new ReferenceField('productUuid', 'uuid', \Shopware\Product\Gateway\Resource\ProductResource::class);
        $this->primaryKeyFields['productUuid'] = (new FkField('product_uuid', \Shopware\Product\Gateway\Resource\ProductResource::class, 'uuid'))->setFlags(new Required());
        $this->fields['category'] = new ReferenceField('categoryUuid', 'uuid', \Shopware\Category\Gateway\Resource\CategoryResource::class);
        $this->primaryKeyFields['categoryUuid'] = (new FkField('category_uuid', \Shopware\Category\Gateway\Resource\CategoryResource::class, 'uuid'))->setFlags(new Required());
    }
    
    public function getWriteOrder(): array
    {
        return [
            \Shopware\Product\Gateway\Resource\ProductResource::class,
            \Shopware\Category\Gateway\Resource\CategoryResource::class,
            \Shopware\Product\Gateway\Resource\ProductCategoryResource::class
        ];
    }
}
