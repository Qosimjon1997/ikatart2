<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int|null $oldprice
 * @property int|null $percent
 * @property int|null $Saler_id
 * @property int $category_id
 * @property int $isActive
 * @property string $info
 * @property int $mass
 *
 * @property Basket[] $baskets
 * @property Gift[] $gifts
 * @property Giftproduct[] $giftproducts
 * @property Images[] $images
 * @property Saler $saler
 * @property Category $category
 * @property Productlanguages[] $productlanguages
 * @property Sale[] $sales
 * @property Topproduct[] $topproducts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'category_id', 'isActive', 'info', 'mass_id'], 'required'],
            [['price', 'oldprice', 'percent', 'Saler_id', 'category_id', 'isActive', 'mass_id'], 'integer'],
            [['info'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['Saler_id'], 'exist', 'skipOnError' => true, 'targetClass' => Saler::className(), 'targetAttribute' => ['Saler_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'oldprice' => Yii::t('app', 'Oldprice'),
            'percent' => Yii::t('app', 'Percent'),
            'Saler_id' => Yii::t('app', 'Saler ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'saler.email' => Yii::t('app', 'Saler Email'),
            'category.name' => Yii::t('app', 'Category'),
            'isActive' => Yii::t('app', 'Is Active'),
            'info' => Yii::t('app', 'Info'),
            'mass.mass' => Yii::t('app', 'Mass'),
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Gifts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGifts()
    {
        return $this->hasMany(Gift::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Giftproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGiftproducts()
    {
        return $this->hasMany(Giftproduct::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Saler]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaler()
    {
        return $this->hasOne(Saler::className(), ['id' => 'Saler_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Productlanguages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductlanguages()
    {
        return $this->hasMany(Productlanguages::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sale::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Topproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTopproducts()
    {
        return $this->hasMany(Topproduct::className(), ['product_id' => 'id']);
    }

    public function getMass()
    {
        return $this->hasOne(Mass::className(), ['id' => 'mass_id']);
    }
}
