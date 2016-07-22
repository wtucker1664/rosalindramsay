<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property string $a__clientID_t
 * @property string $username
 * @property string $password
 * @property string $access_token
 * @property string $address1City
 * @property string $address1Country
 * @property string $address1PostalCode
 * @property string $address1Street
 * @property string $address2City
 * @property string $address2PostalCode
 * @property string $address2StateProvince
 * @property string $address2Street
 * @property string $countryCode
 * @property string $d_Hot_List_Stand
 * @property string $fax1
 * @property string $fax2
 * @property string $name
 * @property string $notes
 * @property string $phone1
 * @property string $phone2
 * @property string $type
 * @property string $webAddress
 * @property integer $zl_LOGS
 * @property string $zl_created
 * @property string $zl_createdBy
 * @property string $zl_modified
 * @property string $zl_modifiedBy
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a__clientID_t'], 'required'],
            [['username', 'password', 'access_token', 'address1City', 'address1Country', 'address1PostalCode', 'address1Street', 'address2City', 'address2PostalCode', 'address2StateProvince', 'address2Street', 'countryCode', 'd_Hot_List_Stand', 'fax1', 'fax2', 'name', 'notes', 'phone1', 'phone2', 'type', 'webAddress', 'zl_createdBy', 'zl_modifiedBy'], 'string'],
            [['zl_LOGS'], 'integer'],
            [['zl_created', 'zl_modified'], 'safe'],
            [['a__clientID_t'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a__clientID_t' => 'A  Client Id T',
            'username' => 'Username',
            'password' => 'Password',
            'access_token' => 'Access Token',
            'address1City' => 'Address1 City',
            'address1Country' => 'Address1 Country',
            'address1PostalCode' => 'Address1 Postal Code',
            'address1Street' => 'Address1 Street',
            'address2City' => 'Address2 City',
            'address2PostalCode' => 'Address2 Postal Code',
            'address2StateProvince' => 'Address2 State Province',
            'address2Street' => 'Address2 Street',
            'countryCode' => 'Country Code',
            'd_Hot_List_Stand' => 'D  Hot  List  Stand',
            'fax1' => 'Fax1',
            'fax2' => 'Fax2',
            'name' => 'Name',
            'notes' => 'Notes',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'type' => 'Type',
            'webAddress' => 'Web Address',
            'zl_LOGS' => 'Zl  Logs',
            'zl_created' => 'Zl Created',
            'zl_createdBy' => 'Zl Created By',
            'zl_modified' => 'Zl Modified',
            'zl_modifiedBy' => 'Zl Modified By',
        ];
    }
}
