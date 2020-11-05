<?php if (!check_bitrix_sessid()) return; ?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

$documentsIblockId = Test::getIblockId($moduleId, Test::DOCUMENTS_INFOBLOCK_CODE);
$professionsIblockId = Test::getIblockId($moduleId, Test::PROFESSIONS_INFOBLOCK_CODE);
$facultiesIblockId = Test::getIblockId($moduleId, Test::FACULTIES_INFOBLOCK_CODE);
$subjectsInfoblockId = Test::getIblockId($moduleId, Test::SUBJECTS_INFOBLOCK_CODE);
$departmentsInfoblockId = Test::getIblockId($moduleId, Test::DEPARTMENTS_INFOBLOCK_CODE);
$libraryInfoblockId = Test::getIblockId($moduleId, Test::LIBRARY_INFOBLOCK_CODE);
$newsInfoblockId = Test::getIblockId($moduleId, Test::NEWS_INFOBLOCK_CODE);
$advertisementInfoblockId = Test::getIblockId($moduleId, Test::ADVERTISEMENT_INFOBLOCK_CODE);
$dormInfoblockId = Test::getIblockId($moduleId, Test::DORM_INFOBLOCK_CODE);
$creativeInfoblockId = Test::getIblockId($moduleId, Test::CREATIVE_INFOBLOCK_CODE);
$conferenceInfoblockId = Test::getIblockId($moduleId, Test::CONFERENCE_INFOBLOCK_CODE);
$trainingMaterialInfoblockId = Test::getIblockId($moduleId, Test::TRAINING_MATERIALS_INFOBLOCK_CODE);
$reviewsInfoblockId = Test::getIblockId($moduleId, Test::REVIEWS_INFOBLOCK_CODE);
$trainingInfoblockId = Test::getIblockId($moduleId, Test::TRAININGS_INFOBLOCK_CODE);
echo \CAdminMessage::ShowNote("Удаление значений свойств инфоблоков");
Test::deleteInfoblockPropertyEnumValues($professionsIblockId);
Test::deleteInfoblockPropertyEnumValues($newsInfoblockId);
echo \CAdminMessage::ShowNote("Значения свойств инфоблока удалены");

$oUserTypeEntity = new CUserTypeEntity();
echo \CAdminMessage::ShowNote("Удаление свойств");
Test::deleteUserField($oUserTypeEntity, 'UF_BEGIN_TIME');
Test::deleteUserField($oUserTypeEntity, 'UF_END_TIME');
Test::deleteUserField($oUserTypeEntity, 'UF_SITE');
Test::deleteUserField($oUserTypeEntity, 'UF_DOCUMENT');
Test::deleteUserField($oUserTypeEntity, 'UF_TIME_ADDITION');
Test::deleteUserField($oUserTypeEntity, 'UF_GENERAL_EXPERIENCE');
Test::deleteUserField($oUserTypeEntity, 'UF_PROFESSION_EXPERIENCE');
Test::deleteUserField($oUserTypeEntity, 'UF_POSITION');
Test::deleteUserField($oUserTypeEntity, 'UF_SUBJECT');
Test::deleteUserField($oUserTypeEntity, 'UF_DEGREE');
Test::deleteUserField($oUserTypeEntity, 'UF_RANK');
Test::deleteUserField($oUserTypeEntity, 'UF_RANK');
Test::deleteUserField($oUserTypeEntity, 'UF_ASSESSMENT');
Test::deleteUserField($oUserTypeEntity, 'UF_PROFESSION');
Test::deleteUserField($oUserTypeEntity, 'UF_DEPARTMENT');
echo \CAdminMessage::ShowNote("Свойства пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление групп пользователей");
Test::deleteUserGroup('FOUNDERS');
Test::deleteUserGroup('BRANCHES');
Test::deleteUserGroup('MAIN');
Test::deleteUserGroup('DEPARTMENT');
Test::deleteUserGroup('ACADEMIC_COUNCIL');
Test::deleteUserGroup('LEADERSHIP');
Test::deleteUserGroup('STAFF');
Test::deleteUserGroup('GRADUATE');
echo \CAdminMessage::ShowNote("Группы пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление свойств инфоблоков");
Test::deleteInfoblockProperty(Test::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE, $documentsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_FACULTY_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE, $professionsIblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_FACULTY_PROPERTY_CODE, $departmentsInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_ADDRESS_PROPERTY_CODE, $dormInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_ENTITY_PROPERTY_CODE, $newsInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE, $creativeInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_SCHEDULE_PROPERTY_CODE, $creativeInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_TIME_PROPERTY_CODE, $creativeInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_PLACE_PROPERTY_CODE, $creativeInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_PERIOD_PROPERTY_CODE, $conferenceInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_ORGANIZATOR_PROPERTY_CODE, $conferenceInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_FILE_PROPERTY_CODE, $trainingMaterialInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_FACULTY_PROPERTY_CODE, $trainingMaterialInfoblockId);
Test::deleteInfoblockProperty(Test::INFOBLOCK_USER_PROPERTY_CODE, $reviewsInfoblockId);
echo \CAdminMessage::ShowNote("Свойства инфоблоков удалены");

echo \CAdminMessage::ShowNote("Удаление инфоблоков");
Test::deleteInfoblock($documentsIblockId);
Test::deleteInfoblock($professionsIblockId);
Test::deleteInfoblock($facultiesIblockId);
Test::deleteInfoblock($subjectsInfoblockId);
Test::deleteInfoblock($departmentsInfoblockId);
Test::deleteInfoblock($libraryInfoblockId);
Test::deleteInfoblock($newsInfoblockId);
Test::deleteInfoblock($advertisementInfoblockId);
Test::deleteInfoblock($dormInfoblockId);
Test::deleteInfoblock($creativeInfoblockId);
Test::deleteInfoblock($conferenceInfoblockId);
Test::deleteInfoblock($trainingMaterialInfoblockId);
Test::deleteInfoblock($reviewsInfoblockId);
Test::deleteInfoblock($trainingInfoblockId);
echo \CAdminMessage::ShowNote("Инфоблоки удалены");

echo \CAdminMessage::ShowNote("Удаление типа инфоблока образовательной организации");
if (!\CIBlockType::Delete($moduleId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации удален");
$DB->Commit();
?>
