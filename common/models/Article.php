<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property int|null $author_id
 * @property int|null $catalog_id
 * @property string|null $title
 * @property string|null $title_translit
 * @property string|null $text
 * @property int $created_at
 * @property int $updated_at
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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'catalog_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['author_id', 'catalog_id', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
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
            'author_id' => 'Author ID',
            'catalog_id' => 'Catalog ID',
            'title' => 'Title',
            'title_translit' => 'Title Translit',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
    public function getCatalog()
    {
        return $this->hasOne(Catalog::class, ['id' => 'catalog_id']);
    }
}
