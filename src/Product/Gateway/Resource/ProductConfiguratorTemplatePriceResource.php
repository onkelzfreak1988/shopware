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

class ProductConfiguratorTemplatePriceResource extends Resource
{
    protected const TEMPLATE_ID_FIELD = 'templateId';
    protected const CUSTOMER_GROUP_KEY_FIELD = 'customerGroupKey';
    protected const FROM_FIELD = 'from';
    protected const TO_FIELD = 'to';
    protected const PRICE_FIELD = 'price';
    protected const PSEUDOPRICE_FIELD = 'pseudoprice';
    protected const PERCENT_FIELD = 'percent';
    protected const UUID_FIELD = 'uuid';

    public function __construct()
    {
        parent::__construct('product_configurator_template_price');
        
        $this->fields[self::TEMPLATE_ID_FIELD] = new IntField('template_id');
        $this->fields[self::CUSTOMER_GROUP_KEY_FIELD] = (new StringField('customer_group_key'))->setFlags(new Required());
        $this->fields[self::FROM_FIELD] = (new IntField('from'))->setFlags(new Required());
        $this->fields[self::TO_FIELD] = (new StringField('to'))->setFlags(new Required());
        $this->fields[self::PRICE_FIELD] = new FloatField('price');
        $this->fields[self::PSEUDOPRICE_FIELD] = new FloatField('pseudoprice');
        $this->fields[self::PERCENT_FIELD] = new FloatField('percent');
        $this->primaryKeyFields[self::UUID_FIELD] = (new UuidField('uuid'))->setFlags(new Required());
    }
    
    public function getWriteOrder(): array
    {
        return [
            \Shopware\Product\Gateway\Resource\ProductConfiguratorTemplatePriceResource::class
        ];
    }
}
