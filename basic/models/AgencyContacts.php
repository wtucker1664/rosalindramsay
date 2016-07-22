<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "AgencyContacts".
 *
 * @property string $a__agencyContactID_t
 * @property string $a_agencyID_t
 * @property string $a_showID_g
 * @property string $a_textConfirmedOrPencilled
 * @property string $a_textPlanning
 * @property string $c_Inactive
 * @property string $Christmas Card?
 * @property string $Contact date
 * @property string $d_Find
 * @property integer $d_Rights_Guide_Flag_n
 * @property string $email
 * @property string $emailAddresswithName
 * @property string $FBF 08
 * @property string $nameFirst
 * @property string $nameLast
 * @property string $Next_contact_date
 * @property string $notes
 * @property string $phone1
 * @property string $phone2
 * @property string $phoneMobile1
 * @property string $phoneMobile2
 * @property string $status
 * @property string $title
 * @property string $v_Text
 * @property string $za_companyName
 * @property string $za_Contact_Info
 * @property string $za_mobileAndInitials
 * @property string $za_nameFull
 * @property string $za_nameFullAndCompany
 * @property string $zl_____LOGS
 * @property string $zl_created
 * @property string $zl_createdBy
 * @property string $zl_modified
 * @property string $zl_modifiedBy
 *
 * @property Agencies $aAgencyIDT
 * @property Authors[] $authors
 * @property Authors[] $authors0
 */
class AgencyContacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AgencyContacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a__agencyContactID_t'], 'required'],
            [['a_textConfirmedOrPencilled', 'a_textPlanning', 'c_Inactive', 'Christmas Card?', 'Contact date', 'd_Find', 'email', 'emailAddresswithName', 'FBF 08', 'nameFirst', 'nameLast', 'Next_contact_date', 'notes', 'phone1', 'phone2', 'phoneMobile1', 'phoneMobile2', 'status', 'title', 'v_Text', 'za_companyName', 'za_Contact_Info', 'za_mobileAndInitials', 'za_nameFull', 'za_nameFullAndCompany', 'zl_____LOGS', 'zl_createdBy', 'zl_modifiedBy'], 'string'],
            [['d_Rights_Guide_Flag_n'], 'integer'],
            [['zl_created', 'zl_modified'], 'safe'],
            [['a__agencyContactID_t', 'a_agencyID_t', 'a_showID_g'], 'string', 'max' => 10],
            [['a_agencyID_t'], 'exist', 'skipOnError' => true, 'targetClass' => Agencies::className(), 'targetAttribute' => ['a_agencyID_t' => 'a__agencyID_t']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a__agencyContactID_t' => 'A  Agency Contact Id T',
            'a_agencyID_t' => 'A Agency Id T',
            'a_showID_g' => 'A Show Id G',
            'a_textConfirmedOrPencilled' => 'A Text Confirmed Or Pencilled',
            'a_textPlanning' => 'A Text Planning',
            'c_Inactive' => 'C  Inactive',
            'Christmas Card?' => 'Christmas  Card?',
            'Contact date' => 'Contact Date',
            'd_Find' => 'D  Find',
            'd_Rights_Guide_Flag_n' => 'D  Rights  Guide  Flag N',
            'email' => 'Email',
            'emailAddresswithName' => 'Email Addresswith Name',
            'FBF 08' => 'Fbf 08',
            'nameFirst' => 'Name First',
            'nameLast' => 'Name Last',
            'Next_contact_date' => 'Next Contact Date',
            'notes' => 'Notes',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'phoneMobile1' => 'Phone Mobile1',
            'phoneMobile2' => 'Phone Mobile2',
            'status' => 'Status',
            'title' => 'Title',
            'v_Text' => 'V  Text',
            'za_companyName' => 'Za Company Name',
            'za_Contact_Info' => 'Za  Contact  Info',
            'za_mobileAndInitials' => 'Za Mobile And Initials',
            'za_nameFull' => 'Za Name Full',
            'za_nameFullAndCompany' => 'Za Name Full And Company',
            'zl_____LOGS' => 'Zl      Logs',
            'zl_created' => 'Zl Created',
            'zl_createdBy' => 'Zl Created By',
            'zl_modified' => 'Zl Modified',
            'zl_modifiedBy' => 'Zl Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAAgencyIDT()
    {
        return $this->hasOne(Agencies::className(), ['a__agencyID_t' => 'a_agencyID_t']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['a__filmAgentContactID' => 'a__agencyContactID_t']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors0()
    {
        return $this->hasMany(Authors::className(), ['a_translationAgentContactID' => 'a__agencyContactID_t']);
    }
}
