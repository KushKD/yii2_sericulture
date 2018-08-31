<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bo_district}}".
 *
 * @property int $district_id
 * @property string $distric_name
 * @property string $created_on
 * @property string $is_active
 *
 * @property BoTehsil[] $boTehsils
 * @property BoUserProfile[] $boUserProfiles
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bo_district}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['distric_name', 'created_on'], 'required'],
            [['created_on'], 'safe'],
            [['is_active'], 'string'],
            [['distric_name'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'district_id' => 'District ID',
            'distric_name' => 'Distric Name',
            'created_on' => 'Created On',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoTehsils()
    {
        return $this->hasMany(BoTehsil::className(), ['district_id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoUserProfiles()
    {
        return $this->hasMany(BoUserProfile::className(), ['user_district_id' => 'district_id']);
    }
}
