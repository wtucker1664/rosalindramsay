<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Books".
 *
 * @property string $a__bookID
 * @property string $a_AuthorID
 * @property string $a_FilmAgentContactID
 * @property string $a_FilmAgentID
 * @property string $a_originatingPublisherID
 * @property string $a_PrimaryAgentContactID
 * @property string $a_PrimaryAgentID
 * @property string $a_ReceivedFromAgentContactID
 * @property string $a_ReceivedFromAgentID
 * @property string $a_TranslationAgentContactID
 * @property string $a_TranslationAgentID
 * @property string $a_ukEditorID
 * @property string $a_ukImprintID
 * @property string $a_ukPublisherID
 * @property string $AgeRange
 * @property string $Audience
 * @property string $Author
 * @property string $c_Yes
 * @property string $category
 * @property string $Cover_Image
 * @property string $Creation_Date
 * @property string $Creation_id
 * @property string $d_Film_Report_Flag
 * @property string $d_Film_Rights_Available_Flag
 * @property string $d_Meeting_Notes
 * @property string $d_NRI
 * @property string $d_Original_Publication_Date
 * @property string $d_Ramdom_Report_Notes
 * @property string $d_Reading
 * @property string $d_Word_Count
 * @property string $Date_Received_2
 * @property string $Date_Received1
 * @property string $Due_Report
 * @property string $Extent
 * @property string $Extent_Report
 * @property string $Field
 * @property string $Film_Text
 * @property string $FNF
 * @property string $Foreign_sales
 * @property string $Hotlist_text
 * @property string $Last_modified
 * @property string $London_Book_Fair_2008_hotlist
 * @property string $Material_due_date
 * @property string $Material_Report
 * @property string $Material_request_date
 * @property string $Material_Type1
 * @property string $Material_Type2
 * @property string $Meeting_Info_Date
 * @property string $ms_version_1
 * @property string $ms_version_2
 * @property string $ms_version_3
 * @property string $News_Info_Date
 * @property string $News_report_date_1
 * @property string $News_report_date_2
 * @property string $News_report_date_3
 * @property string $News_report_text
 * @property string $Next_Meeting_Report
 * @property string $Next_Weekly_Report
 * @property string $Notes
 * @property string $Option
 * @property string $Previous_foreign_sales
 * @property string $Primary_Agent_plus_Agency_Name
 * @property string $Publication_Date_Report
 * @property string $Publication_Date
 * @property string $Reader
 * @property string $Reader_Date
 * @property string $Reader_Report
 * @property string $Reading_report
 * @property string $Reading_report_date
 * @property string $Report
 * @property string $Report_Text_for_Hotlist
 * @property string $Report_Text
 * @property string $Rights_List_LBF08
 * @property string $script_field
 * @property string $SubAgents
 * @property string $Subagents_For_Hotlist
 * @property string $Submission_date
 * @property string $Submission_Result_Due
 * @property string $SubTitle
 * @property string $Sumbission_text
 * @property string $TickAdult
 * @property string $TickFilm
 * @property string $TickKids
 * @property string $Title
 * @property string $Title_plus_Author
 * @property string $Translation_Agent_plus_Agency
 * @property string $Translation_Agent_plus_Agency_Name
 * @property string $UK_Editor_plus_Agency_Name
 * @property string $v_Filter
 * @property string $v_Report_Header
 * @property string $v_TranslationAgentID
 * @property string $z_News_Report_Date
 * @property string $za_Age_Range
 * @property string $za_Category
 * @property string $za_ExtentLabel
 * @property string $za_FilmAgent
 * @property string $za_Material
 * @property string $za_MaterialLabel
 * @property string $za_Options
 * @property string $za_OptionsSalesLabel_Return
 * @property string $za_Original_Pub_Date
 * @property string $za_Original_Publisher_Return
 * @property string $za_Previous_Sales
 * @property string $za_PreviousRightsSold
 * @property string $za_PreviousRightsSoldLabel
 * @property string $za_PreviousRightsSoldLabel_Return
 * @property string $za_PreviousRightsSoldOptionLabel_Return
 * @property string $za_PreviousSalesLabel_Return
 * @property string $za_PrimaryAgent
 * @property string $za_PreviousRightsSoldOptions
 * @property string $za_PrimaryAgentLabel
 * @property string $za_PrimaryAgentLabel_Return
 * @property string $za_PubDateLabel
 * @property string $za_ReaderLabel
 * @property string $za_RightsSold
 * @property string $za_RightsSoldLabel
 * @property string $za_RightsSoldLabel_Return
 * @property string $za_SubAgents
 * @property string $za_SubAgentsLabel_Return
 * @property string $za_TranslationAgent
 * @property string $za_TranslationAgentLabel
 * @property string $za_TranslationAgentLabelReturn
 * @property string $za_UKeditor
 * @property string $za_UKeditor_Report
 * @property string $za_UKeditorLabel
 * @property string $za_WordCountLabel
 * @property string $zc_showID_g
 * @property string $zl_____LOGS
 * @property string $zl_created
 * @property string $zl_createdBy
 * @property string $zl_modified
 * @property string $zl_modifiedBy
 * @property string $zz_Page_Number
 *
 * @property Authors $aAuthor
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a__bookID'], 'required'],
            [['AgeRange', 'Audience', 'Author', 'c_Yes', 'category', 'Cover_Image', 'Creation_Date', 'Creation_id', 'd_Film_Report_Flag', 'd_Film_Rights_Available_Flag', 'd_Meeting_Notes', 'd_NRI', 'd_Original_Publication_Date', 'd_Ramdom_Report_Notes', 'd_Reading', 'd_Word_Count', 'Date_Received_2', 'Due_Report', 'Extent', 'Extent_Report', 'Field', 'Film_Text', 'FNF', 'Foreign_sales', 'Hotlist_text', 'London_Book_Fair_2008_hotlist', 'Material_Report', 'Material_request_date', 'Material_Type1', 'Material_Type2', 'ms_version_1', 'ms_version_2', 'ms_version_3', 'News_report_text', 'Next_Meeting_Report', 'Next_Weekly_Report', 'Notes', 'Option', 'Previous_foreign_sales', 'Primary_Agent_plus_Agency_Name', 'Reader', 'Reader_Report', 'Reading_report', 'Report', 'Report_Text_for_Hotlist', 'Report_Text', 'Rights_List_LBF08', 'script_field', 'SubAgents', 'Subagents_For_Hotlist', 'SubTitle', 'Sumbission_text', 'TickAdult', 'TickFilm', 'TickKids', 'Title', 'Title_plus_Author', 'Translation_Agent_plus_Agency', 'Translation_Agent_plus_Agency_Name', 'UK_Editor_plus_Agency_Name', 'v_Filter', 'v_Report_Header', 'v_TranslationAgentID', 'z_News_Report_Date', 'za_Age_Range', 'za_Category', 'za_ExtentLabel', 'za_FilmAgent', 'za_Material', 'za_MaterialLabel', 'za_Options', 'za_OptionsSalesLabel_Return', 'za_Original_Pub_Date', 'za_Original_Publisher_Return', 'za_Previous_Sales', 'za_PreviousRightsSold', 'za_PreviousRightsSoldLabel', 'za_PreviousRightsSoldLabel_Return', 'za_PreviousRightsSoldOptionLabel_Return', 'za_PreviousSalesLabel_Return', 'za_PrimaryAgent', 'za_PreviousRightsSoldOptions', 'za_PrimaryAgentLabel', 'za_PrimaryAgentLabel_Return', 'za_PubDateLabel', 'za_ReaderLabel', 'za_RightsSold', 'za_RightsSoldLabel', 'za_RightsSoldLabel_Return', 'za_SubAgents', 'za_SubAgentsLabel_Return', 'za_TranslationAgent', 'za_TranslationAgentLabel', 'za_TranslationAgentLabelReturn', 'za_UKeditor', 'za_UKeditor_Report', 'za_UKeditorLabel', 'za_WordCountLabel', 'zc_showID_g', 'zl_____LOGS', 'zl_created', 'zl_modified', 'zz_Page_Number'], 'string'],
            [['Date_Received1', 'Last_modified', 'Material_due_date', 'Meeting_Info_Date', 'News_Info_Date', 'News_report_date_1', 'News_report_date_2', 'News_report_date_3', 'Publication_Date_Report', 'Publication_Date', 'Reader_Date', 'Reading_report_date', 'Submission_date', 'Submission_Result_Due', 'zl_createdBy', 'zl_modifiedBy'], 'safe'],
            [['a__bookID', 'a_AuthorID', 'a_FilmAgentContactID', 'a_FilmAgentID', 'a_originatingPublisherID', 'a_PrimaryAgentContactID', 'a_PrimaryAgentID', 'a_ReceivedFromAgentContactID', 'a_ReceivedFromAgentID', 'a_TranslationAgentContactID', 'a_TranslationAgentID', 'a_ukEditorID', 'a_ukImprintID', 'a_ukPublisherID'], 'string', 'max' => 45],
            [['a_AuthorID'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['a_AuthorID' => 'a__authorID_t']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a__bookID' => 'A  Book ID',
            'a_AuthorID' => 'A  Author ID',
            'a_FilmAgentContactID' => 'A  Film Agent Contact ID',
            'a_FilmAgentID' => 'A  Film Agent ID',
            'a_originatingPublisherID' => 'A Originating Publisher ID',
            'a_PrimaryAgentContactID' => 'A  Primary Agent Contact ID',
            'a_PrimaryAgentID' => 'A  Primary Agent ID',
            'a_ReceivedFromAgentContactID' => 'A  Received From Agent Contact ID',
            'a_ReceivedFromAgentID' => 'A  Received From Agent ID',
            'a_TranslationAgentContactID' => 'A  Translation Agent Contact ID',
            'a_TranslationAgentID' => 'A  Translation Agent ID',
            'a_ukEditorID' => 'A Uk Editor ID',
            'a_ukImprintID' => 'A Uk Imprint ID',
            'a_ukPublisherID' => 'A Uk Publisher ID',
            'AgeRange' => 'Age Range',
            'Audience' => 'Audience',
            'Author' => 'Author',
            'c_Yes' => 'C  Yes',
            'category' => 'Category',
            'Cover_Image' => 'Cover  Image',
            'Creation_Date' => 'Creation  Date',
            'Creation_id' => 'Creation ID',
            'd_Film_Report_Flag' => 'D  Film  Report  Flag',
            'd_Film_Rights_Available_Flag' => 'D  Film  Rights  Available  Flag',
            'd_Meeting_Notes' => 'D  Meeting  Notes',
            'd_NRI' => 'D  Nri',
            'd_Original_Publication_Date' => 'D  Original  Publication  Date',
            'd_Ramdom_Report_Notes' => 'D  Ramdom  Report  Notes',
            'd_Reading' => 'D  Reading',
            'd_Word_Count' => 'D  Word  Count',
            'Date_Received_2' => 'Date  Received 2',
            'Date_Received1' => 'Date  Received1',
            'Due_Report' => 'Due  Report',
            'Extent' => 'Extent',
            'Extent_Report' => 'Extent  Report',
            'Field' => 'Field',
            'Film_Text' => 'Film  Text',
            'FNF' => 'Fnf',
            'Foreign_sales' => 'Foreign Sales',
            'Hotlist_text' => 'Hotlist Text',
            'Last_modified' => 'Last Modified',
            'London_Book_Fair_2008_hotlist' => 'London  Book  Fair 2008 Hotlist',
            'Material_due_date' => 'Material Due Date',
            'Material_Report' => 'Material  Report',
            'Material_request_date' => 'Material Request Date',
            'Material_Type1' => 'Material  Type1',
            'Material_Type2' => 'Material  Type2',
            'Meeting_Info_Date' => 'Meeting  Info  Date',
            'ms_version_1' => 'Ms Version 1',
            'ms_version_2' => 'Ms Version 2',
            'ms_version_3' => 'Ms Version 3',
            'News_Info_Date' => 'News  Info  Date',
            'News_report_date_1' => 'News Report Date 1',
            'News_report_date_2' => 'News Report Date 2',
            'News_report_date_3' => 'News Report Date 3',
            'News_report_text' => 'News Report Text',
            'Next_Meeting_Report' => 'Next  Meeting  Report',
            'Next_Weekly_Report' => 'Next  Weekly  Report',
            'Notes' => 'Notes',
            'Option' => 'Option',
            'Previous_foreign_sales' => 'Previous Foreign Sales',
            'Primary_Agent_plus_Agency_Name' => 'Primary  Agent Plus  Agency  Name',
            'Publication_Date_Report' => 'Publication  Date  Report',
            'Publication_Date' => 'Publication  Date',
            'Reader' => 'Reader',
            'Reader_Date' => 'Reader  Date',
            'Reader_Report' => 'Reader  Report',
            'Reading_report' => 'Reading Report',
            'Reading_report_date' => 'Reading Report Date',
            'Report' => 'Report',
            'Report_Text_for_Hotlist' => 'Report  Text For  Hotlist',
            'Report_Text' => 'Report  Text',
            'Rights_List_LBF08' => 'Rights  List  Lbf08',
            'script_field' => 'Script Field',
            'SubAgents' => 'Sub Agents',
            'Subagents_For_Hotlist' => 'Subagents  For  Hotlist',
            'Submission_date' => 'Submission Date',
            'Submission_Result_Due' => 'Submission  Result  Due',
            'SubTitle' => 'Sub Title',
            'Sumbission_text' => 'Sumbission Text',
            'TickAdult' => 'Tick Adult',
            'TickFilm' => 'Tick Film',
            'TickKids' => 'Tick Kids',
            'Title' => 'Title',
            'Title_plus_Author' => 'Title Plus  Author',
            'Translation_Agent_plus_Agency' => 'Translation  Agent Plus  Agency',
            'Translation_Agent_plus_Agency_Name' => 'Translation  Agent Plus  Agency  Name',
            'UK_Editor_plus_Agency_Name' => 'Uk  Editor Plus  Agency  Name',
            'v_Filter' => 'V  Filter',
            'v_Report_Header' => 'V  Report  Header',
            'v_TranslationAgentID' => 'V  Translation Agent ID',
            'z_News_Report_Date' => 'Z  News  Report  Date',
            'za_Age_Range' => 'Za  Age  Range',
            'za_Category' => 'Za  Category',
            'za_ExtentLabel' => 'Za  Extent Label',
            'za_FilmAgent' => 'Za  Film Agent',
            'za_Material' => 'Za  Material',
            'za_MaterialLabel' => 'Za  Material Label',
            'za_Options' => 'Za  Options',
            'za_OptionsSalesLabel_Return' => 'Za  Options Sales Label  Return',
            'za_Original_Pub_Date' => 'Za  Original  Pub  Date',
            'za_Original_Publisher_Return' => 'Za  Original  Publisher  Return',
            'za_Previous_Sales' => 'Za  Previous  Sales',
            'za_PreviousRightsSold' => 'Za  Previous Rights Sold',
            'za_PreviousRightsSoldLabel' => 'Za  Previous Rights Sold Label',
            'za_PreviousRightsSoldLabel_Return' => 'Za  Previous Rights Sold Label  Return',
            'za_PreviousRightsSoldOptionLabel_Return' => 'Za  Previous Rights Sold Option Label  Return',
            'za_PreviousSalesLabel_Return' => 'Za  Previous Sales Label  Return',
            'za_PrimaryAgent' => 'Za  Primary Agent',
            'za_PreviousRightsSoldOptions' => 'Za  Previous Rights Sold Options',
            'za_PrimaryAgentLabel' => 'Za  Primary Agent Label',
            'za_PrimaryAgentLabel_Return' => 'Za  Primary Agent Label  Return',
            'za_PubDateLabel' => 'Za  Pub Date Label',
            'za_ReaderLabel' => 'Za  Reader Label',
            'za_RightsSold' => 'Za  Rights Sold',
            'za_RightsSoldLabel' => 'Za  Rights Sold Label',
            'za_RightsSoldLabel_Return' => 'Za  Rights Sold Label  Return',
            'za_SubAgents' => 'Za  Sub Agents',
            'za_SubAgentsLabel_Return' => 'Za  Sub Agents Label  Return',
            'za_TranslationAgent' => 'Za  Translation Agent',
            'za_TranslationAgentLabel' => 'Za  Translation Agent Label',
            'za_TranslationAgentLabelReturn' => 'Za  Translation Agent Label Return',
            'za_UKeditor' => 'Za  Ukeditor',
            'za_UKeditor_Report' => 'Za  Ukeditor  Report',
            'za_UKeditorLabel' => 'Za  Ukeditor Label',
            'za_WordCountLabel' => 'Za  Word Count Label',
            'zc_showID_g' => 'Zc Show Id G',
            'zl_____LOGS' => 'Zl      Logs',
            'zl_created' => 'Zl Created',
            'zl_createdBy' => 'Zl Created By',
            'zl_modified' => 'Zl Modified',
            'zl_modifiedBy' => 'Zl Modified By',
            'zz_Page_Number' => 'Zz  Page  Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['a__authorID_t' => 'a_AuthorID']);
    }
    
    public function getOriginatingPublisher(){
    	return $this->hasOne(Agencies::className(), ['a__agencyID_t' => 'a_originatingPublisherID']);
    }
    public function getPrimaryAgent(){
    	return $this->hasOne(Agencies::className(), ['a__agencyID_t' => 'a_PrimaryAgentID']);
    }
    public function getTranslationAgent(){
    	return $this->hasOne(Agencies::className(), ['a__agencyID_t' => 'a_TranslationAgentID']);
    }
    
}
