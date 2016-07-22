<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Authors".
 *
 * @property string $a__authorID_t
 * @property string $a__filmAgentContactID
 * @property string $a_filmAgentID
 * @property string $a_primaryAgentContactID
 * @property string $a_primaryAgentID
 * @property string $a_translationAgentContactID
 * @property string $a_translationAgentID
 * @property string $address1City
 * @property string $address1County
 * @property string $address1PostalCode
 * @property string $address1Street
 * @property string $weblink
 * @property string $email
 * @property string $emailAddresswithName
 * @property string $fax1
 * @property string $fax2
 * @property string $name
 * @property string $notes
 * @property string $phone1
 * @property string $phone2
 * @property string $phoneMobile1
 * @property string $phoneMobile2
 * @property string $title
 * @property string $zl_____LOGS
 * @property string $zl_created
 * @property string $zl_createdBy
 * @property string $zl_modified
 * @property string $zl_modifiedBy
 * @property string $zzznameFirst
 *
 * @property AgencyContacts $aFilmAgentContact
 * @property Agencies $aFilmAgent
 * @property Agencies $aPrimaryAgent
 * @property AgencyContacts $aTranslationAgentContact
 * @property Agencies $aTranslationAgentContact0
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a__authorID_t'], 'required'],
            [['address1City', 'address1County', 'address1PostalCode', 'address1Street', 'email', 'emailAddresswithName', 'fax1', 'fax2', 'name', 'notes', 'phone1', 'phone2', 'phoneMobile1', 'phoneMobile2', 'title', 'zl_____LOGS', 'zl_createdBy', 'zl_modifiedBy', 'zzznameFirst'], 'string'],
            [['zl_created', 'zl_modified'], 'safe'],
            [['a__authorID_t', 'a__filmAgentContactID', 'a_filmAgentID', 'a_primaryAgentContactID', 'a_primaryAgentID', 'a_translationAgentContactID', 'a_translationAgentID'], 'string', 'max' => 10],
            [['a__filmAgentContactID'], 'exist', 'skipOnError' => true, 'targetClass' => AgencyContacts::className(), 'targetAttribute' => ['a__filmAgentContactID' => 'a__agencyContactID_t']],
            [['a_filmAgentID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencies::className(), 'targetAttribute' => ['a_filmAgentID' => 'a__agencyID_t']],
            [['a_primaryAgentID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencies::className(), 'targetAttribute' => ['a_primaryAgentID' => 'a__agencyID_t']],
            [['a_translationAgentContactID'], 'exist', 'skipOnError' => true, 'targetClass' => AgencyContacts::className(), 'targetAttribute' => ['a_translationAgentContactID' => 'a__agencyContactID_t']],
            [['a_translationAgentContactID'], 'exist', 'skipOnError' => true, 'targetClass' => Agencies::className(), 'targetAttribute' => ['a_translationAgentContactID' => 'a__agencyID_t']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a__authorID_t' => 'A  Author Id T',
            'a__filmAgentContactID' => 'A  Film Agent Contact ID',
            'a_filmAgentID' => 'A Film Agent ID',
            'a_primaryAgentContactID' => 'A Primary Agent Contact ID',
            'a_primaryAgentID' => 'A Primary Agent ID',
            'a_translationAgentContactID' => 'A Translation Agent Contact ID',
            'a_translationAgentID' => 'A Translation Agent ID',
            'address1City' => 'Address1 City',
            'address1County' => 'Address1 County',
            'address1PostalCode' => 'Address1 Postal Code',
            'address1Street' => 'Address1 Street',
            'email' => 'Email',
            'emailAddresswithName' => 'Email Addresswith Name',
            'fax1' => 'Fax1',
            'fax2' => 'Fax2',
            'name' => 'Name',
            'notes' => 'Notes',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'phoneMobile1' => 'Phone Mobile1',
            'phoneMobile2' => 'Phone Mobile2',
            'title' => 'Title',
            'zl_____LOGS' => 'Zl      Logs',
            'zl_created' => 'Zl Created',
            'zl_createdBy' => 'Zl Created By',
            'zl_modified' => 'Zl Modified',
            'zl_modifiedBy' => 'Zl Modified By',
            'zzznameFirst' => 'Zzzname First',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAFilmAgentContact()
    {
        return $this->hasOne(AgencyContacts::className(), ['a__agencyContactID_t' => 'a__filmAgentContactID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAFilmAgent()
    {
        return $this->hasOne(Agencies::className(), ['a__agencyID_t' => 'a_filmAgentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAPrimaryAgent()
    {
        return $this->hasOne(Agencies::className(), ['a__agencyID_t' => 'a_primaryAgentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getATranslationAgentContact()
    {
        return $this->hasOne(AgencyContacts::className(), ['a__agencyContactID_t' => 'a_translationAgentContactID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getATranslationAgentContact0()
    {
        return $this->hasOne(Agencies::className(), ['a__agencyID_t' => 'a_translationAgentContactID']);
    }
    
    public function getBooks(){
    	return $this->hasMany(Books::className(), ["a_AuthorID"=>"a__authorID_t"]);
    }
}
