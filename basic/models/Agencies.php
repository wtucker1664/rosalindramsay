<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Agencies".
 *
 * @property string $a__agencyID_t
 * @property string $address1City
 * @property string $address1Country
 * @property string $address1PostalCode
 * @property string $address1Street
 * @property string $address2City
 * @property string $address2PostalCode
 * @property string $address2StateProvince
 * @property string $address2Street
 * @property string $Agents_Attending FBF 08
 * @property string $Agents_Attending FBF 08 For Hotlist
 * @property string $c_1
 * @property string $c_Inactive
 * @property string $countryCode
 * @property string $d_Rights_Guide_Received
 * @property string $d_Rights_Guide_Requested
 * @property string $fax1
 * @property string $fax2
 * @property string $Hotlist_Page_Number
 * @property string $industry
 * @property string $Last_Rights_Guide
 * @property string $Last_Rights_Guide_Date
 * @property string $List_of_clients
 * @property string $name
 * @property string $name_fullcompanyname
 * @property string $notes
 * @property string $phone1
 * @property string $phone2
 * @property string $Rights_List_Date
 * @property string $Rights_List_FF_2008
 * @property string $Sub_Ag_last_updated
 * @property string $Subagents
 * @property string $type
 * @property string $webAddress
 * @property string $za_agencyNameAndImprints
 * @property string $za_subAgents
 * @property string $za_subAgents_Report
 * @property string $za_subAgentsAll
 * @property string $zl_____LOGS
 * @property string $zl_created
 * @property string $zl_createdBy
 * @property string $zl_modified
 * @property string $zl_modifiedBy
 *
 * @property AgencyContacts[] $agencyContacts
 * @property Authors[] $authors
 * @property Authors[] $authors0
 * @property Authors[] $authors1
 * @property HotList[] $hotLists
 */
class Agencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Agencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a__agencyID_t'], 'required'],
            [['address1City', 'address1Country', 'address1PostalCode', 'address1Street', 'address2City', 'address2PostalCode', 'address2StateProvince', 'address2Street', 'Agents_Attending FBF 08', 'Agents_Attending FBF 08 For Hotlist', 'c_1', 'c_Inactive', 'countryCode', 'fax1', 'fax2', 'Hotlist_Page_Number', 'industry', 'Last_Rights_Guide', 'Last_Rights_Guide_Date', 'List_of_clients', 'name', 'name_fullcompanyname', 'notes', 'phone1', 'phone2', 'Rights_List_Date', 'Rights_List_FF_2008', 'Sub_Ag_last_updated', 'Subagents', 'type', 'webAddress', 'za_agencyNameAndImprints', 'za_subAgents', 'za_subAgents_Report', 'za_subAgentsAll', 'zl_____LOGS', 'zl_createdBy', 'zl_modifiedBy'], 'string'],
            [['d_Rights_Guide_Received', 'd_Rights_Guide_Requested', 'zl_created', 'zl_modified'], 'safe'],
            [['a__agencyID_t'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a__agencyID_t' => 'A  Agency Id T',
            'address1City' => 'Address1 City',
            'address1Country' => 'Address1 Country',
            'address1PostalCode' => 'Address1 Postal Code',
            'address1Street' => 'Address1 Street',
            'address2City' => 'Address2 City',
            'address2PostalCode' => 'Address2 Postal Code',
            'address2StateProvince' => 'Address2 State Province',
            'address2Street' => 'Address2 Street',
            'Agents_Attending FBF 08' => 'Agents  Attending  Fbf 08',
            'Agents_Attending FBF 08 For Hotlist' => 'Agents  Attending  Fbf 08  For  Hotlist',
            'c_1' => 'C 1',
            'c_Inactive' => 'C  Inactive',
            'countryCode' => 'Country Code',
            'd_Rights_Guide_Received' => 'D  Rights  Guide  Received',
            'd_Rights_Guide_Requested' => 'D  Rights  Guide  Requested',
            'fax1' => 'Fax1',
            'fax2' => 'Fax2',
            'Hotlist_Page_Number' => 'Hotlist  Page  Number',
            'industry' => 'Industry',
            'Last_Rights_Guide' => 'Last  Rights  Guide',
            'Last_Rights_Guide_Date' => 'Last  Rights  Guide  Date',
            'List_of_clients' => 'List Of Clients',
            'name' => 'Name',
            'name_fullcompanyname' => 'Name Fullcompanyname',
            'notes' => 'Notes',
            'phone1' => 'Phone1',
            'phone2' => 'Phone2',
            'Rights_List_Date' => 'Rights  List  Date',
            'Rights_List_FF_2008' => 'Rights  List  Ff 2008',
            'Sub_Ag_last_updated' => 'Sub  Ag Last Updated',
            'Subagents' => 'Subagents',
            'type' => 'Type',
            'webAddress' => 'Web Address',
            'za_agencyNameAndImprints' => 'Za Agency Name And Imprints',
            'za_subAgents' => 'Za Sub Agents',
            'za_subAgents_Report' => 'Za Sub Agents  Report',
            'za_subAgentsAll' => 'Za Sub Agents All',
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
    public function getAgencyContacts()
    {
        return $this->hasMany(AgencyContacts::className(), ['a_agencyID_t' => 'a__agencyID_t']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['a_filmAgentID' => 'a__agencyID_t']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors0()
    {
        return $this->hasMany(Authors::className(), ['a_primaryAgentID' => 'a__agencyID_t']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors1()
    {
        return $this->hasMany(Authors::className(), ['a_translationAgentContactID' => 'a__agencyID_t']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHotLists()
    {
        return $this->hasMany(HotList::className(), ['a_agencyID' => 'a__agencyID_t']);
    }
}
