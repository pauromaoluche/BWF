<?php

namespace common\models;
use common\models\PageInformationQuery;
use Yii;
use yii\helpers\Inflector;

/**
 * This is the model class for table "page_information".
 *
 * @property int $id ID
 * @property string $title Title
 * @property string|null $subtitle Subtitle
 * @property string $text Text
 * @property string $code Code
 * @property string $image Upload Image
 * @property string $file Upload File
 * @property string $html HTML
 * @property int $maxlength Char Limit
 * @property string $is_page Is Page?
 * @property int $created_at Created At
 * @property int $updated_at Updated At
 * @property string $status Status
 * @property int $sort Sort
 */
class PageInformation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'code', 'created_at', 'updated_at'], 'required'],
            [['text', 'image', 'file', 'html', 'is_page', 'status'], 'string'],
            [['maxlength', 'created_at', 'updated_at', 'sort'], 'integer'],
            [['title', 'subtitle'], 'string', 'max' => 180],
            [['code'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'subtitle' => Yii::t('app', 'Subtitle'),
            'text' => Yii::t('app', 'Text'),
            'code' => Yii::t('app', 'Code'),
            'image' => Yii::t('app', 'Upload Image'),
            'file' => Yii::t('app', 'Upload File'),
            'html' => Yii::t('app', 'HTML'),
            'maxlength' => Yii::t('app', 'Char Limit'),
            'is_page' => Yii::t('app', 'Is Page?'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PageInformationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PageInformationQuery(get_called_class());
    }

        /**
     * @return string
     */
    public function getUrl()
    {
        return url([self::tableName() . '/view', 'id' => $this->primaryKey, 'title' => Inflector::slug($this->title)]);
    }
}
