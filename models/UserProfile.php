<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bo_user_profile}}".
 *
 * @property int $profile_id
 * @property int $user_age
 * @property string $user_gender
 * @property string $user_caste
 * @property int $user_annual_income
 * @property string $user_education_qualification
 * @property string $user_occupation
 * @property string $user_father_name
 * @property string $user_husband_name
 * @property int $user_village_id
 * @property int $user_district_id
 * @property int $user_tehsil_id
 * @property int $user_pin_code
 * @property string $user_po
 * @property int $user_id
 * @property string $is_active
 *
 * @property Users $user
 * @property Village $userVillage
 * @property District $userDistrict
 * @property Tehsil $userTehsil
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bo_user_profile}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_age', 'user_gender', 'user_caste', 'user_annual_income', 'user_education_qualification', 'user_occupation', 'user_village_id', 'user_district_id', 'user_tehsil_id', 'user_id'], 'required'],
            [['user_age', 'user_annual_income', 'user_village_id', 'user_district_id', 'user_tehsil_id', 'user_pin_code', 'user_id'], 'integer'],
            [['user_gender', 'user_caste', 'user_education_qualification', 'is_active'], 'string'],
            [['user_occupation'], 'string', 'max' => 100],
            [['user_father_name', 'user_husband_name'], 'string', 'max' => 200],
          //  [['user_po'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'user_id']],
            [['user_village_id'], 'exist', 'skipOnError' => true, 'targetClass' => Village::className(), 'targetAttribute' => ['user_village_id' => 'vill_id']],
            [['user_district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['user_district_id' => 'district_id']],
            [['user_tehsil_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tehsil::className(), 'targetAttribute' => ['user_tehsil_id' => 'tehsil_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => 'Profile ID',
            'user_age' => 'User Age',
            'user_gender' => 'User Gender',
            'user_caste' => 'User Caste',
            'user_annual_income' => 'User Annual Income',
            'user_education_qualification' => 'User Education Qualification',
            'user_occupation' => 'User Occupation',
            'user_father_name' => 'User Father Name',
            'user_husband_name' => 'User Husband Name',
            'user_village_id' => 'User Village ID',
            'user_district_id' => 'User District ID',
            'user_tehsil_id' => 'User Tehsil ID',
            'user_pin_code' => 'User Pin Code',
           // 'user_po' => 'User Po',
            'user_id' => 'User ID',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserVillage()
    {
        return $this->hasOne(Village::className(), ['vill_id' => 'user_village_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDistrict()
    {
        return $this->hasOne(District::className(), ['district_id' => 'user_district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTehsil()
    {
        return $this->hasOne(Tehsil::className(), ['tehsil_id' => 'user_tehsil_id']);
    }
}
