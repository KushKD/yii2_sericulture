<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bo_user_bank_detail}}".
 *
 * @property int $bank_details_id
 * @property string $bank_name
 * @property string $bank_ifsc_code
 * @property string $account_number
 * @property string $bank_address
 * @property string $account_type
 * @property string $account_holder_name
 * @property int $user_id
 *
 * @property Users $user
 */
class UserBankDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bo_user_bank_detail}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_name', 'bank_ifsc_code', 'account_number', 'bank_address', 'account_type', 'account_holder_name', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['bank_name'], 'string', 'max' => 50],
            [['bank_ifsc_code'], 'string', 'max' => 15],
            [['account_number'], 'string', 'max' => 20],
            [['bank_address'], 'string', 'max' => 100],
            [['account_type', 'account_holder_name'], 'string', 'max' => 150],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bank_details_id' => 'Bank Details ID',
            'bank_name' => 'Bank Name',
            'bank_ifsc_code' => 'Bank Ifsc Code',
            'account_number' => 'Account Number',
            'bank_address' => 'Bank Address',
            'account_type' => 'Account Type',
            'account_holder_name' => 'Account Holder Name',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
    }
}
