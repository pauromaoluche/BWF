<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property int $id ID
 * @property string $title Título
 * @property string $variable Variável
 * @property string $value Valor
 * @property string $created_at Criado em
 * @property string|null $updated_at Atualizado em
 * @property string $status Status
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'variable', 'value', 'created_at'], 'required'],
            [['value', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'variable'], 'string', 'max' => 180],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Título'),
            'variable' => Yii::t('app', 'Variável'),
            'value' => Yii::t('app', 'Valor'),
            'created_at' => Yii::t('app', 'Criado em'),
            'updated_at' => Yii::t('app', 'Atualizado em'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConfigQuery(get_called_class());
    }
}
