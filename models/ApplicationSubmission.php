<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bo_application_submission}}".
 *
 * @property int $submission_id
 * @property int $application_id
 * @property int $user_id
 * @property int $dept_id
 * @property string $field_value
 * @property string $application_status
 * @property string $application_created_date
 * @property string $application_updated_date_time
 * @property string $reference_number
 * @property string $ip_address
 * @property string $user_agent
 * @property int $district_id
 *
 * @property BoApplications $application
 */
class ApplicationSubmission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bo_application_submission}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['application_id', 'user_id', 'field_value', 'application_status', 'application_created_date', 'application_updated_date_time', 'ip_address', 'user_agent'], 'required'],
            [['application_id', 'user_id', 'dept_id', 'district_id'], 'integer'],
            [['field_value', 'application_status'], 'string'],
            [['application_created_date', 'application_updated_date_time'], 'safe'],
            [['reference_number'], 'string', 'max' => 20],
            [['ip_address', 'user_agent'], 'string', 'max' => 255],
            [['application_id'], 'exist', 'skipOnError' => true, 'targetClass' => Applications::className(), 'targetAttribute' => ['application_id' => 'application_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'submission_id' => 'Submission ID',
            'application_id' => 'Application ID',
            'user_id' => 'User ID',
            'dept_id' => 'Dept ID',
            'field_value' => 'Field Value',
            'application_status' => 'Application Status',
            'application_created_date' => 'Application Created Date',
            'application_updated_date_time' => 'Application Updated Date Time',
            'reference_number' => 'Reference Number',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
            'district_id' => 'District ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Applications::className(), ['application_id' => 'application_id']);
    }
}
