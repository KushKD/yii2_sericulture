<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bo_tehsil}}".
 *
 * @property int $tehsil_id
 * @property string $tehsil_name
 * @property int $district_id
 * @property string $created_on
 * @property string $is_active
 *
 * @property BoDistrict $district
 * @property BoUserProfile[] $boUserProfiles
 * @property BoVillage[] $boVillages
 */
class Tehsil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bo_tehsil}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tehsil_name', 'district_id', 'created_on'], 'required'],
            [['district_id'], 'integer'],
            [['created_on'], 'safe'],
            [['is_active'], 'string'],
            [['tehsil_name'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => BoDistrict::className(), 'targetAttribute' => ['district_id' => 'district_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tehsil_id' => 'Tehsil ID',
            'tehsil_name' => 'Tehsil Name',
            'district_id' => 'District ID',
            'created_on' => 'Created On',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(BoDistrict::className(), ['district_id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoUserProfiles()
    {
        return $this->hasMany(BoUserProfile::className(), ['user_tehsil_id' => 'tehsil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoVillages()
    {
        return $this->hasMany(BoVillage::className(), ['tehsil_id' => 'tehsil_id']);
    }
}
