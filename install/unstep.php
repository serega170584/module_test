<?php if (!check_bitrix_sessid()) return; ?>
<?php
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

$documentsIblockId = Edu::getIblockId($moduleId, Edu::DOCUMENTS_INFOBLOCK_CODE);
$professionsIblockId = Edu::getIblockId($moduleId, Edu::PROFESSIONS_INFOBLOCK_CODE);
$facultiesIblockId = Edu::getIblockId($moduleId, Edu::FACULTIES_INFOBLOCK_CODE);
$subjectsInfoblockId = Edu::getIblockId($moduleId, Edu::SUBJECTS_INFOBLOCK_CODE);
$departmentsInfoblockId = Edu::getIblockId($moduleId, Edu::DEPARTMENTS_INFOBLOCK_CODE);
$libraryInfoblockId = Edu::getIblockId($moduleId, Edu::LIBRARY_INFOBLOCK_CODE);
$newsInfoblockId = Edu::getIblockId($moduleId, Edu::NEWS_INFOBLOCK_CODE);
$advertisementInfoblockId = Edu::getIblockId($moduleId, Edu::ADVERTISEMENT_INFOBLOCK_CODE);
$dormInfoblockId = Edu::getIblockId($moduleId, Edu::DORM_INFOBLOCK_CODE);
$creativeInfoblockId = Edu::getIblockId($moduleId, Edu::CREATIVE_INFOBLOCK_CODE);
$conferenceInfoblockId = Edu::getIblockId($moduleId, Edu::CONFERENCE_INFOBLOCK_CODE);
$trainingMaterialInfoblockId = Edu::getIblockId($moduleId, Edu::TRAINING_MATERIALS_INFOBLOCK_CODE);
$reviewsInfoblockId = Edu::getIblockId($moduleId, Edu::REVIEWS_INFOBLOCK_CODE);
$trainingInfoblockId = Edu::getIblockId($moduleId, Edu::TRAININGS_INFOBLOCK_CODE);
echo \CAdminMessage::ShowNote("Удаление значений свойств инфоблоков");
Edu::deleteInfoblockPropertyEnumValues($professionsIblockId);
Edu::deleteInfoblockPropertyEnumValues($newsInfoblockId);
echo \CAdminMessage::ShowNote("Значения свойств инфоблока удалены");

$oUserTypeEntity = new CUserTypeEntity();
echo \CAdminMessage::ShowNote("Удаление свойств");
Edu::deleteUserField($oUserTypeEntity, 'UF_BEGIN_TIME');
Edu::deleteUserField($oUserTypeEntity, 'UF_END_TIME');
Edu::deleteUserField($oUserTypeEntity, 'UF_SITE');
Edu::deleteUserField($oUserTypeEntity, 'UF_DOCUMENT');
Edu::deleteUserField($oUserTypeEntity, 'UF_TIME_ADDITION');
Edu::deleteUserField($oUserTypeEntity, 'UF_GENERAL_EXPERIENCE');
Edu::deleteUserField($oUserTypeEntity, 'UF_PROFESSION_EXPERIENCE');
Edu::deleteUserField($oUserTypeEntity, 'UF_POSITION');
Edu::deleteUserField($oUserTypeEntity, 'UF_SUBJECT');
Edu::deleteUserField($oUserTypeEntity, 'UF_DEGREE');
Edu::deleteUserField($oUserTypeEntity, 'UF_RANK');
Edu::deleteUserField($oUserTypeEntity, 'UF_RANK');
Edu::deleteUserField($oUserTypeEntity, 'UF_ASSESSMENT');
Edu::deleteUserField($oUserTypeEntity, 'UF_PROFESSION');
Edu::deleteUserField($oUserTypeEntity, 'UF_DEPARTMENT');
echo \CAdminMessage::ShowNote("Свойства пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление групп пользователей");
Edu::deleteUserGroup('FOUNDERS');
Edu::deleteUserGroup('BRANCHES');
Edu::deleteUserGroup('MAIN');
Edu::deleteUserGroup('DEPARTMENT');
Edu::deleteUserGroup('ACADEMIC_COUNCIL');
Edu::deleteUserGroup('LEADERSHIP');
Edu::deleteUserGroup('STAFF');
Edu::deleteUserGroup('GRADUATE');
echo \CAdminMessage::ShowNote("Группы пользователя удалены");

echo \CAdminMessage::ShowNote("Удаление свойств инфоблоков");
Edu::deleteInfoblockProperty(EDU::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE, $documentsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_FACULTY_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE, $professionsIblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_FACULTY_PROPERTY_CODE, $departmentsInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_ADDRESS_PROPERTY_CODE, $dormInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_ENTITY_PROPERTY_CODE, $newsInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE, $creativeInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_SCHEDULE_PROPERTY_CODE, $creativeInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_TIME_PROPERTY_CODE, $creativeInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_PLACE_PROPERTY_CODE, $creativeInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_PERIOD_PROPERTY_CODE, $conferenceInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_ORGANIZATOR_PROPERTY_CODE, $conferenceInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_FILE_PROPERTY_CODE, $trainingMaterialInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_FACULTY_PROPERTY_CODE, $trainingMaterialInfoblockId);
Edu::deleteInfoblockProperty(EDU::INFOBLOCK_USER_PROPERTY_CODE, $reviewsInfoblockId);
echo \CAdminMessage::ShowNote("Свойства инфоблоков удалены");

echo \CAdminMessage::ShowNote("Удаление инфоблоков");
Edu::deleteInfoblock($documentsIblockId);
Edu::deleteInfoblock($professionsIblockId);
Edu::deleteInfoblock($facultiesIblockId);
Edu::deleteInfoblock($subjectsInfoblockId);
Edu::deleteInfoblock($departmentsInfoblockId);
Edu::deleteInfoblock($libraryInfoblockId);
Edu::deleteInfoblock($newsInfoblockId);
Edu::deleteInfoblock($advertisementInfoblockId);
Edu::deleteInfoblock($dormInfoblockId);
Edu::deleteInfoblock($creativeInfoblockId);
Edu::deleteInfoblock($conferenceInfoblockId);
Edu::deleteInfoblock($trainingMaterialInfoblockId);
Edu::deleteInfoblock($reviewsInfoblockId);
Edu::deleteInfoblock($trainingInfoblockId);
echo \CAdminMessage::ShowNote("Инфоблоки удалены");

echo \CAdminMessage::ShowNote("Удаление типа инфоблока образовательной организации");
if (!\CIBlockType::Delete($moduleId)) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception('Delete error!');
}
echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации удален");
$DB->Commit();
?>
