<?php

/**
 * Class Test
 */
class Test extends CModule
{
    const DIRECTORY = 'local/modules/edu/install';
    const ID = 'edu';
    const ALL_USERS_GROUP_ID = 2;
    const READ_PERMISSION = 'R';
    const DOCUMENTS_INFOBLOCK_CODE = 'DOCUMENTS';
    const PROFESSIONS_INFOBLOCK_CODE = 'PROFESSIONS';
    const FACULTIES_INFOBLOCK_CODE = 'FACULTIES';
    const SUBJECTS_INFOBLOCK_CODE = 'SUBJECTS';
    const DEPARTMENTS_INFOBLOCK_CODE = 'DEPARTMENTS';
    const LIBRARY_INFOBLOCK_CODE = 'LIBRARY';
    const NEWS_INFOBLOCK_CODE = 'NEWS';
    const ADVERTISEMENT_INFOBLOCK_CODE = 'ADVERTISEMENT';
    const DORM_INFOBLOCK_CODE = 'DORM';
    const CREATIVE_INFOBLOCK_CODE = 'CREATIVE';
    const CONFERENCE_INFOBLOCK_CODE = 'CONFERENCE';
    const TRAINING_MATERIALS_INFOBLOCK_CODE = 'TRAINING_MATERIALS';
    const REVIEWS_INFOBLOCK_CODE = 'REVIEWS';
    const TRAININGS_INFOBLOCK_CODE = 'TRAININGS';
    const SITE_ID = 's1';
    const DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE = 'FILE';
    const PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE = 'FORM_OF_EDUCATION';
    const PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE = 'PERIOD';
    const PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE = 'ACCREDITATION_PERIOD';
    const PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE = 'LEVEL';
    const PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE = 'CODE';
    const PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE = 'DESCRIPTION';
    const PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE = 'PLAN';
    const PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE = 'ANNOTATIONS';
    const PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE = 'SCHEDULE';
    const PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE = 'METHODOLOGICAL_DOCUMENTS';
    const PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE = 'PRACTICES';
    const PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE = 'BUDGET_COUNT';
    const PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE = 'PAYED_COUNT';
    const PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE = 'PRICE';
    const INFOBLOCK_FILE_PROPERTY_CODE = 'FILE';
    const PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE = 'PREPARATORY_PROFILE';
    const PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE = 'PRINCIPAL_SUBJECTS';
    const PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE = 'LANGUAGES';
    const INFOBLOCK_FACULTY_PROPERTY_CODE = 'FACULTY';
    const INFOBLOCK_ADDRESS_PROPERTY_CODE = 'ADDRESS';
    const INFOBLOCK_ENTITY_PROPERTY_CODE = 'ENTITY';
    const INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE = 'CREATIVE_LEADERSHIP';
    const INFOBLOCK_SCHEDULE_PROPERTY_CODE = 'SCHEDULE';
    const INFOBLOCK_TIME_PROPERTY_CODE = 'TIME';
    const INFOBLOCK_PLACE_PROPERTY_CODE = 'PLACE';
    const INFOBLOCK_PERIOD_PROPERTY_CODE = 'PERIOD';
    const INFOBLOCK_ORGANIZATOR_PROPERTY_CODE = 'ORGANIZATOR';
    const PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE = 'PRELIMINARY_TESTS';
    const PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE = 'RESEARCHES';
    const PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE = 'RESULTS';
    const PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE = 'REPLACED_RESULTS';
    const INFOBLOCK_USER_PROPERTY_CODE = 'USER';
    const FILE_INFOBLOCK_PROPERTY_TYPE = 'F';
    const STRING_INFOBLOCK_PROPERTY_TYPE = 'S';
    const LIST_INFOBLOCK_PROPERTY_TYPE = 'L';
    const ELEMENT_INFOBLOCK_PROPERTY_TYPE = 'E';
    const DATE_TIME_INFOBLOCK_PROPERTY_USER_TYPE = 'DateTime';
    const USER_INFOBLOCK_PROPERTY_USER_TYPE = 'UserID';

    var $MODULE_ID = "test";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;

    function __construct()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path . "/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = self::ID . " – модуль образовательной организации";
        $this->MODULE_DESCRIPTION = "После установки вы сможете пользоваться модулем образовательной организации";

        \CModule::IncludeModule('iblock');
    }

    function InstallFiles()
    {
        return true;
    }

    function UnInstallFiles()
    {
        return true;
    }

    function DoInstall()
    {
        /**
         * \CDatabase $DB
         */
        global $DOCUMENT_ROOT, $APPLICATION, $DB, $moduleId;
        try {
            $DB->StartTransaction();
            RegisterModule(self::ID);
            $moduleId = self::ID;
            $APPLICATION->IncludeAdminFile("Установка модуля " . self::ID, $DOCUMENT_ROOT . "/" . self::DIRECTORY . "/step.php");
        } catch (\Exception $e) {
            $APPLICATION->IncludeAdminFile($e->getMessage(), $DOCUMENT_ROOT . "/" . self::DIRECTORY . "/error_step.php");
        }
    }

    function DoUninstall()
    {
        /**
         * @var \CDatabase $DB
         */
        global $DOCUMENT_ROOT, $APPLICATION, $DB, $moduleId;
        try {
            $DB->StartTransaction();
            UnRegisterModule(self::ID);
            $moduleId = self::ID;
            $APPLICATION->IncludeAdminFile("Деинсталляция модуля " . self::ID, $DOCUMENT_ROOT . "/" . self::DIRECTORY . "/unstep.php");
        } catch (Exception $e) {
            $APPLICATION->IncludeAdminFile($e->getMessage(), $DOCUMENT_ROOT . "/" . self::DIRECTORY . "/error_unstep.php");
        }
    }

    /**
     * @param $type
     * @param $code
     * @return mixed
     */
    public static function getIblockId($type, $code)
    {
        return \CIBlock::GetList([
            'ID' => 'ASC'
        ], [
            'TYPE' => $type,
            'CODE' => $code,
        ])->Fetch()['ID'];
    }

    /**
     * @param $oUserTypeEntity
     * @param $fieldName
     */
    public static function deleteUserField($oUserTypeEntity, $fieldName)
    {
        $oUserTypeEntity->Delete(CUserTypeEntity::GetList([
            'ID' => 'ASC'
        ], [
            'ENTITY_ID' => 'USER',
            'FIELD_NAME' => $fieldName
        ])->Fetch()['ID']);
    }

    /**
     * @param $name
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function deleteUserGroup($name)
    {
        /**
         * @var \CDatabase $DB
         */
        global $DB;
        $by = 'id';
        $order = 'asc';
        $filter = [
            'STRING_ID' => $name
        ];
        if (!\CGroup::Delete(\CGroup::GetList($by, $order, $filter)->Fetch()['ID'])) {
            $DB->Rollback();
            throw new \Bitrix\Main\DB\Exception('Delete error!');
        }
    }

    /**
     * @param $code
     * @param $id
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function deleteInfoblockProperty($code, $id)
    {
        /**
         * @var \CDatabase $DB
         */
        global $DB;
        if (!\CIBlockProperty::Delete(\CIBlockProperty::GetList([
            'ID' => 'ASC'
        ], [
            'CODE' => $code,
            'IBLOCK_ID' => $id
        ])->Fetch()['ID'])) {
            $DB->Rollback();
            throw new \Bitrix\Main\DB\Exception('Delete error!');
        }
    }

    /**
     * @param $id
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function deleteInfoblock($id)
    {
        /**
         * @var \CDatabase $DB
         */
        global $DB;
        if (!\CIBlock::Delete($id)) {
            $DB->Rollback();
            throw new \Bitrix\Main\DB\Exception('Delete error!');
        }
    }

    /**
     * @param $oUserTypeEntity
     * @param $name
     * @param $type
     * @param $xmlId
     * @param $ruLabel
     * @param $enLabel
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function addUserField($oUserTypeEntity,
                                        $name,
                                        $type,
                                        $xmlId,
                                        $ruLabel,
                                        $enLabel,
                                        $settings = [])
    {
        /**
         * @var \CDatabase $DB
         */
        global $DB;
        $aUserFields = [
            'ENTITY_ID' => 'USER',
            'FIELD_NAME' => $name,
            'USER_TYPE_ID' => $type,
            'XML_ID' => $xmlId,
            'SORT' => 500,
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => '',
            'EDIT_IN_LIST' => '',
            'IS_SEARCHABLE' => 'N',
            'EDIT_FORM_LABEL' => [
                'ru' => $ruLabel,
                'en' => $enLabel
            ],
            'LIST_COLUMN_LABEL' => [
                'ru' => $ruLabel,
                'en' => $enLabel,
            ],
            'LIST_FILTER_LABEL' => [
                'ru' => $ruLabel,
                'en' => $enLabel,
            ],
            'ERROR_MESSAGE' => [
                'ru' => 'Ошибка при заполнении',
                'en' => 'An error in completing',
            ],
            'HELP_MESSAGE' => [
                'ru' => '',
                'en' => '',
            ]
        ];
        if ($settings) {
            $aUserFields['SETTINGS'] = $settings;
        }
        $res = $oUserTypeEntity->Add($aUserFields);
        if (!$res) {
            $DB->Rollback();
            throw new \Bitrix\Main\DB\Exception('Ошибка добавления пользовательского свойства');
        }
    }

    /**
     * @param $group
     * @param $name
     * @param $id
     * @return
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function addUserGroup($group, $name, $id)
    {
        /**
         * @var \CDatabase $group
         */
        global $DB;
        $arFields = [
            "ACTIVE" => "Y",
            "C_SORT" => 100,
            "NAME" => $name,
            "DESCRIPTION" => $name,
            "USER_ID" => [],
            "STRING_ID" => $id
        ];
        $id = $group->Add($arFields);
        if (strlen($group->LAST_ERROR) > 0) {
            $DB->Rollback();
            throw new \Bitrix\Main\DB\Exception('Ошибка добавления группы пользователя');
        }
        return $id;
    }

    /**
     * @param $ib
     * @param $name
     * @param $code
     * @param $type
     * @return mixed
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function addInfoblock($ib, $name, $code, $type)
    {
        /**
         * @var \CDatabase $DB
         */
        global $DB;
        $arFields = [
            "NAME" => $name,
            "CODE" => $code,
            "LIST_PAGE_URL" => '',
            "DETAIL_PAGE_URL" => '',
            "IBLOCK_TYPE_ID" => $type,
            "SITE_ID" => [Test::SITE_ID],
            'LID' => Test::SITE_ID,
            "GROUP_ID" => [Test::ALL_USERS_GROUP_ID => Test::READ_PERMISSION]
        ];
        $id = $ib->Add($arFields);
        if (!($id > 0)) {
            $DB->Rollback();
            throw new \Bitrix\Main\DB\Exception('Ошибка добавления инфоблока');
        }
        return $id;
    }

    /**
     * @param $property
     * @param $name
     * @param $code
     * @param $type
     * @param $iblockId
     * @param null $userType
     * @param bool $isMultiple
     * @param null $linkIblockId
     * @return mixed
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function addInfoblockProperty($property,
                                                $name,
                                                $code,
                                                $type,
                                                $iblockId,
                                                $userType = null,
                                                $isMultiple = false,
                                                $linkIblockId = null
    )
    {
        /**
         * @var \CDatabase $DB
         */
        global $DB;
        $arFields = [
            "NAME" => $name,
            "CODE" => $code,
            "PROPERTY_TYPE" => $type,
            "IBLOCK_ID" => $iblockId,
        ];
        if ($userType) {
            $arFields['USER_TYPE'] = $userType;
        }
        if ($isMultiple) {
            $arFields['MULTIPLE'] = 'Y';
        }
        if ($linkIblockId) {
            $arFields['LINK_IBLOCK_ID'] = $linkIblockId;
        }
        $id = $property->Add($arFields);
        if (!($id > 0)) {
            $DB->Rollback();
            throw new \Bitrix\Main\DB\Exception('Ошибка добавления свойства инфоблока');
        }
        return $id;
    }

    /**
     * @param $iBPEnum
     * @param $id
     * @param $value
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function addEnumPropertyValue($iBPEnum, $id, $value)
    {
        /**
         * @var \CDatabase $DB
         */
        global $DB;
        if (!($iBPEnum->Add(['PROPERTY_ID' => $id, 'VALUE' => $value]))) {
            $DB->Rollback();
            throw new \Bitrix\Main\DB\Exception('Ошибка добавления значения свойства инфоблока');
        }
    }

    /**
     * @param $id
     * @throws \Bitrix\Main\DB\Exception
     */
    public static function deleteInfoblockPropertyEnumValues($id)
    {
        /**
         * @var \CDatabase $DB
         */
        global $DB;
        $db = CIBlockPropertyEnum::GetList([
            'ID' => 'ASC',
        ], [
            'IBLOCK_ID' => $id
        ]);
        while ($row = $db->Fetch()) {
            if (!\CIBlockPropertyEnum::Delete($row['ID'])){
                $DB->Rollback();
                throw new \Bitrix\Main\DB\Exception('Ошибка удаления значения свойства инфоблока');
            }
        }
    }
}