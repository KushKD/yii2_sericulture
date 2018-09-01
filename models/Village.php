<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bo_village}}".
 *
 * @property int $vill_id
 * @property string $vill_name
 * @property int $tehsil_id
 * @property string $created_on
 * @property string $is_active
 *
 * @property BoUserProfile[] $boUserProfiles
 * @property BoTehsil $tehsil
 */
class Village extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bo_village}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vill_name', 'tehsil_id'], 'required'],
            [['tehsil_id'], 'integer'],
            [['created_on'], 'safe'],
            [['is_active'], 'string'],
            [['vill_name'], 'string', 'max' => 255],
            [['tehsil_id'], 'exist', 'skipOnError' => true, 'targetClass' => BoTehsil::className(), 'targetAttribute' => ['tehsil_id' => 'tehsil_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vill_id' => 'Vill ID',
            'vill_name' => 'Vill Name',
            'tehsil_id' => 'Tehsil ID',
            'created_on' => 'Created On',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBoUserProfiles()
    {
        return $this->hasMany(BoUserProfile::className(), ['user_village_id' => 'vill_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTehsil()
    {
        return $this->hasOne(BoTehsil::className(), ['tehsil_id' => 'tehsil_id']);
    }
}
