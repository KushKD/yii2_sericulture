<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bo_user}}".
 *
 * @property int $user_id
 * @property string $full_name
 * @property int $mobile_number
 * @property string $email_id
 * @property int $aadhaar_number
 * @property string $is_department_user
 * @property string $created_date_time
 * @property string $updated_date_time
 * @property string $remote_address
 * @property string $user_agent
 * @property string $is_active
 *
 * @property BoUserBankDetail[] $boUserBankDetails
 * @property BoUserProfile[] $boUserProfiles
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bo_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'mobile_number'], 'required'],
            [['mobile_number', 'aadhaar_number'], 'integer'],
            [['is_department_user', 'is_active'], 'string'],
            [['created_date_time', 'updated_date_time'], 'safe'],
            [['full_name', 'email_id'], 'string', 'max' => 253],
            [['remote_address'], 'string', 'max' => 250],
            [['user_agent'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'full_name' => 'Full Name',
            'mobile_number' => 'Mobile Number',
            'email_id' => 'Email ID',
            'aadhaar_number' => 'Aadhaar Number',
            'is_department_user' => 'Is Department User',
            'created_date_time' => 'Created Date Time',
            'updated_date_time' => 'Updated Date Time',
            'remote_address' => 'Remote Address',
            'user_agent' => 'User Agent',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoUserBankDetails()
    {
        return $this->hasMany(BoUserBankDetail::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoUserProfiles()
    {
        return $this->hasMany(BoUserProfile::className(), ['user_id' => 'user_id']);
    }
}
