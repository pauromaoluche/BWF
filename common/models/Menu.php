<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id ID
 * @property int $language_id
 * @property int|null $parent
 * @property string $title
 * @property string $table_db
 * @property string $route
 * @property int $sort
 * @property string|null $type
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language_id', 'parent', 'sort'], 'integer'],
            [['title', 'table_db'], 'required'],
            [['type', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'table_db', 'route'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'parent' => Yii::t('app', 'Parent'),
            'title' => Yii::t('app', 'Title'),
            'table_db' => Yii::t('app', 'Table Db'),
            'route' => Yii::t('app', 'Route'),
            'sort' => Yii::t('app', 'Sort'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MenuQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MenuQuery(get_called_class());
    }
}
