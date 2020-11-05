<?php if (!check_bitrix_sessid()) return; ?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

$documentsIblockId = test_test::getIblockId($moduleId, test_test::DOCUMENTS_INFOBLOCK_CODE);
$professionsIblockId = test_test::getIblockId($moduleId, test_test::PROFESSIONS_INFOBLOCK_CODE);
$facultiesIblockId = test_test::getIblockId($moduleId, test_test::FACULTIES_INFOBLOCK_CODE);
$subjectsInfoblockId = test_test::getIblockId($moduleId, test_test::SUBJECTS_INFOBLOCK_CODE);
$departmentsInfoblockId = test_test::getIblockId($moduleId, test_test::DEPARTMENTS_INFOBLOCK_CODE);
$libraryInfoblockId = test_test::getIblockId($moduleId, test_test::LIBRARY_INFOBLOCK_CODE);
$newsInfoblockId = test_test::getIblockId($moduleId, test_test::NEWS_INFOBLOCK_CODE);
$advertisementInfoblockId = test_test::getIblockId($moduleId, test_test::ADVERTISEMENT_INFOBLOCK_CODE);
$dormInfoblockId = test_test::getIblockId($moduleId, test_test::DORM_INFOBLOCK_CODE);
$creativeInfoblockId = test_test::getIblockId($moduleId, test_test::CREATIVE_INFOBLOCK_CODE);
$conferenceInfoblockId = test_test::getIblockId($moduleId, test_test::CONFERENCE_INFOBLOCK_CODE);
$trainingMaterialInfoblockId = test_test::getIblockId($moduleId, test_test::TRAINING_MATERIALS_INFOBLOCK_CODE);
$reviewsInfoblockId = test_test::getIblockId($moduleId, test_test::REVIEWS_INFOBLOCK_CODE);
$trainingInfoblockId = test_test::getIblockId($moduleId, test_test::TRAININGS_INFOBLOCK_CODE);
echo \CAdminMessage::ShowNote("Удаление значений свойств инфоблоков");
test_test::deleteInfoblockPropertyEnumValues($professionsIblockId);
test_test::deleteInfoblockPropertyEnumValues($newsInfoblockId);
echo \CAdminMessage::ShowNote("Значения свойств инфоблока удалены");

$oUserTypeEntity = new CUserTypeEntity();
echo \CAdminMessage::ShowNote("Удаление свойств");
test_test::deleteUserField($oUserTypeEntity, 'UF_BEGIN_TIME');
test_test::deleteUserField($oUserTypeEntity, 'UF_END_TIME');
test_test::deleteUserField($oUserTypeEntity, 'UF_SITE');
test_test::deleteUserField($oUserTypeEntity, 'UF_DOCUMENT');
test_test::deleteUserField($oUserTypeEntity, 'UF_TIME_ADDITION');
test_test::deleteUserField($oUserTypeEntity, 'UF_GENERAL_EXPERIENCE');
test_test::deleteUserField($oUserTypeEntity, 'UF_PROFESSION_EXPERIENCE');
test_test::deleteUserField($oUserTypeEntity, 'UF_POSITION');
test_test::deleteUserField($oUserTypeEntity, 'UF_SUBJECT');
test_test::deleteUserField($oUserTypeEntity, 'UF_DEGREE');
test_test::deleteUserField($oUserTypeEntity, 'UF_RANK');
test_test::deleteUserField($oUserTypeEntity, 'UF_RANK');
test_test::deleteUserField($oUserTypeEntity, 'UF_ASSESSMENT');
test_test::deleteUserField($oUserTypeEntity, 'UF_PROFESSION');
test_test::deleteUserField($oUserTypeEntity, 'UF_DEPARTMENT');
echo \CAdminMessage::ShowNote("Свойства пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление групп пользователей");
test_test::deleteUserGroup('FOUNDERS');
test_test::deleteUserGroup('BRANCHES');
test_test::deleteUserGroup('MAIN');
test_test::deleteUserGroup('DEPARTMENT');
test_test::deleteUserGroup('ACADEMIC_COUNCIL');
test_test::deleteUserGroup('LEADERSHIP');
test_test::deleteUserGroup('STAFF');
test_test::deleteUserGroup('GRADUATE');
echo \CAdminMessage::ShowNote("Группы пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление свойств инфоблоков");
test_test::deleteInfoblockProperty(test_test::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE, $documentsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_FACULTY_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE, $professionsIblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_FACULTY_PROPERTY_CODE, $departmentsInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_ADDRESS_PROPERTY_CODE, $dormInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_ENTITY_PROPERTY_CODE, $newsInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE, $creativeInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_SCHEDULE_PROPERTY_CODE, $creativeInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_TIME_PROPERTY_CODE, $creativeInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_PLACE_PROPERTY_CODE, $creativeInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_PERIOD_PROPERTY_CODE, $conferenceInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_ORGANIZATOR_PROPERTY_CODE, $conferenceInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_FILE_PROPERTY_CODE, $trainingMaterialInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_FACULTY_PROPERTY_CODE, $trainingMaterialInfoblockId);
test_test::deleteInfoblockProperty(test_test::INFOBLOCK_USER_PROPERTY_CODE, $reviewsInfoblockId);
echo \CAdminMessage::ShowNote("Свойства инфоблоков удалены");

echo \CAdminMessage::ShowNote("Удаление инфоблоков");
test_test::deleteInfoblock($documentsIblockId);
test_test::deleteInfoblock($professionsIblockId);
test_test::deleteInfoblock($facultiesIblockId);
test_test::deleteInfoblock($subjectsInfoblockId);
test_test::deleteInfoblock($departmentsInfoblockId);
test_test::deleteInfoblock($libraryInfoblockId);
test_test::deleteInfoblock($newsInfoblockId);
test_test::deleteInfoblock($advertisementInfoblockId);
test_test::deleteInfoblock($dormInfoblockId);
test_test::deleteInfoblock($creativeInfoblockId);
test_test::deleteInfoblock($conferenceInfoblockId);
test_test::deleteInfoblock($trainingMaterialInfoblockId);
test_test::deleteInfoblock($reviewsInfoblockId);
test_test::deleteInfoblock($trainingInfoblockId);
echo \CAdminMessage::ShowNote("Инфоблоки удалены");

echo \CAdminMessage::ShowNote("Удаление типа инфоблока образовательной организации");
if (!\CIBlockType::Delete($moduleId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации удален");
$DB->Commit();
?>
