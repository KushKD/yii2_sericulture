<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bo_applications}}".
 *
 * @property int $application_id
 * @property string $application_name
 * @property string $is_active
 * @property string $created_date
 */
class Applications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bo_applications}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_name'], 'required'],
            [['is_active'], 'string'],
            [['created_date'], 'safe'],
            [['application_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'application_id' => 'Application ID',
            'application_name' => 'Application Name',
            'is_active' => 'Is Active',
            'created_date' => 'Created Date',
        ];
    }
}
