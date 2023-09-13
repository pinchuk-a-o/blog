<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\helpers\Inflector;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int|null $author_id
 * @property int|null $catalog_id
 * @property string|null $title
 * @property string|null $title_translit
 * @property string|null $short_text
 * @property string|null $text
 * @property int $created_at
 * @property int $updated_at
 * @property int $sort
 *
 * @property User $author
 * @property Catalog $catalog
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'catalog_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['author_id', 'catalog_id', 'created_at', 'updated_at', 'sort'], 'integer'],
            [['short_text', 'text'], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['title', 'title_translit'], 'string', 'max' => 255],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::class, 'targetAttribute' => ['catalog_id' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Автор',
            'catalog_id' => 'Каталог',
            'sort' => 'Позиция в курсе',
            'title' => 'Заголовок',
            'title_translit' => 'Транслит',
            'short_text' => 'Короткий текст',
            'text' => 'Полный текст',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Catalog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Catalog::class, ['id' => 'catalog_id']);
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
        return '/article/' . $this->id;
    }
}
