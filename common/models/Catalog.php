<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $title_translit
 * @property int|null $type
 * @property int $created_at
 * @property int $updated_at
 * @property int $sort
 *
 * @property Article[] $articles
 */
class Catalog extends ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public const TYPE_CATEGORY = 1;
    public const TYPE_COURSE = 2;

    public static function typeList(): array
    {
        return [self::TYPE_CATEGORY => 'Категория', self::TYPE_COURSE => 'Курс',];
    }

    public static function tableName()
    {
        return 'catalog';
    }

    public function rules()
    {
        return [
            [['type', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['type', 'created_at', 'updated_at', 'sort'], 'integer'],
            [['sort'], 'required'],
            [['title', 'title_translit'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'title_translit' => 'Транслит заголовка',
            'type' => 'Тип',
            'sort' => 'Вес при сортировке',
            'created_at' => 'Дата создания',
            'updated_at' => 'Последнее обновление',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['catalog_id' => 'id']);
    }

    public function beforeValidate(): bool
    {
        if (!isset($this->oldAttributes['title']) || $this->oldAttributes['title'] !== $this->title) {
            $this->title_translit = Inflector::slug($this->title);
        }

        return parent::beforeValidate();
    }

    public function getUrl(): string
    {
        return '/catalog/' . $this->id;
    }
}
