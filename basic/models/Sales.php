<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Sales".
 *
 * @property string $a__saleID
 * @property string $a_bookID
 * @property string $a_companyID
 * @property string $a_editorID
 * @property string $_imprintID
 * @property string $country
 * @property string $country_Old_Store
 * @property string $Options
 * @property string $za_companyName
 * @property string $za_editorName
 * @property string $za_rightsSold
 * @property string $zl_created
 * @property string $zl_createdBy
 * @property string $zl_modified
 * @property string $zl_modifiedBy
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a__saleID'], 'required'],
            [['country', 'country_Old_Store', 'Options', 'za_companyName', 'za_editorName', 'za_rightsSold', 'zl_createdBy', 'zl_modifiedBy'], 'string'],
            [['zl_created', 'zl_modified'], 'safe'],
            [['a__saleID', 'a_bookID', 'a_companyID', 'a_editorID', '_imprintID'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'a__saleID' => 'A  Sale ID',
            'a_bookID' => 'A Book ID',
            'a_companyID' => 'A Company ID',
            'a_editorID' => 'A Editor ID',
            '_imprintID' => 'Imprint ID',
            'country' => 'Country',
            'country_Old_Store' => 'Country  Old  Store',
            'Options' => 'Options',
            'za_companyName' => 'Za Company Name',
            'za_editorName' => 'Za Editor Name',
            'za_rightsSold' => 'Za Rights Sold',
            'zl_created' => 'Zl Created',
            'zl_createdBy' => 'Zl Created By',
            'zl_modified' => 'Zl Modified',
            'zl_modifiedBy' => 'Zl Modified By',
        ];
    }
}
