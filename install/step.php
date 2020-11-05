<?php if (!check_bitrix_sessid()) return;
/**
 * @var \CMain $APPLICATION
 * @var string $DOCUMENT_ROOT
 * @var \CDatabase $DB
 * @var string $moduleId
 */
global $moduleId;

echo \CAdminMessage::ShowNote("Добавление типа инфоблока образовательной организации");
$arFields = [
    'ID' => $moduleId,
    'SECTIONS' => 'Y',
    'IN_RSS' => 'N',
    'SORT' => 100,
    'LANG' => [
        'en' => [
            'NAME' => 'Educational organization',
            'SECTION_NAME' => 'Sections',
            'ELEMENT_NAME' => 'Elements'
        ],
        'ru' => [
            'NAME' => 'Образовательная организация',
            'SECTION_NAME' => 'Разделы',
            'ELEMENT_NAME' => 'Элементы'
        ]
    ]
];
$obBlocktype = new \CIBlockType;
$res = $obBlocktype->Add($arFields);
if (!$res) {
    $DB->Rollback();
    throw new \Bitrix\Main\DB\Exception($obBlocktype->LAST_ERROR);
}
echo \CAdminMessage::ShowNote("Тип инфоблока образовательной организации добавлен");

echo \CAdminMessage::ShowNote("Добавление свойств");
$oUserTypeEntity = new CUserTypeEntity();
test_test::addUserField($oUserTypeEntity,
    'UF_BEGIN_TIME',
    'datetime',
    'BEGIN_TIME',
    'Время начала',
    'Begin time');
test_test::addUserField($oUserTypeEntity,
    'UF_END_TIME',
    'datetime',
    'END_TIME',
    'Время окончания',
    'End time');
test_test::addUserField($oUserTypeEntity,
    'UF_SITE',
    'string',
    'SITE',
    'Сайт',
    'Site');
test_test::addUserField($oUserTypeEntity,
    'UF_DOCUMENT',
    'file',
    'DOCUMENT',
    'Документ',
    'Document');
test_test::addUserField($oUserTypeEntity,
    'UF_TIME_ADDITION',
    'string',
    'TIME_ADDITION',
    'Уточнение времени работы',
    'Time addition');
test_test::addUserField($oUserTypeEntity,
    'UF_GENERAL_EXPERIENCE',
    'string',
    'GENERAL_EXPERIENCE',
    'Общий стаж работы',
    'General experience');
test_test::addUserField($oUserTypeEntity,
    'UF_PROFESSION_EXPERIENCE',
    'string',
    'PROFESSION_EXPERIENCE',
    'Cтаж работы по специальности',
    'Profession experience');
test_test::addUserField($oUserTypeEntity,
    'UF_POSITION',
    'string',
    'POSITION',
    'Должность',
    'Position');
test_test::addUserField($oUserTypeEntity,
    'UF_SUBJECT',
    'string',
    'SUBJECT',
    'Преподаваемые дисциплины',
    'Subject');
test_test::addUserField($oUserTypeEntity,
    'UF_DEGREE',
    'string',
    'DEGREEE',
    'Ученая степень',
    'Degree');
test_test::addUserField($oUserTypeEntity,
    'UF_RANK',
    'string',
    'RANK',
    'Ученое звание',
    'Rank');
test_test::addUserField($oUserTypeEntity,
    'UF_ASSESSMENT',
    'string',
    'ASSESSMENT',
    'Данные о повышении квалификации и (или) профессиональной переподготовке',
    'Assessment');
echo \CAdminMessage::ShowNote("Свойства пользователя добавлены");

echo \CAdminMessage::ShowNote("Добавление групп пользователей");

$group = new \CGroup;
$id = test_test::addUserGroup($group, 'Учредители', 'FOUNDERS');
$id = test_test::addUserGroup($group, 'Филиалы', 'BRANCHES');
$id = test_test::addUserGroup($group, 'Главный корпус', 'MAIN');
$id = test_test::addUserGroup($group, 'Отдел', 'DEPARTMENT');
$id = test_test::addUserGroup($group, 'Ученый совет', 'ACADEMIC_COUNCIL');
$id = test_test::addUserGroup($group, 'Руководство', 'LEADERSHIP');
$id = test_test::addUserGroup($group, 'Сотрудник', 'STAFF');
$id = test_test::addUserGroup($group, 'Выпускник', 'GRADUATE');
echo \CAdminMessage::ShowNote("Группы пользователей добавлены");

echo \CAdminMessage::ShowNote("Добавление инфомационных блоков");

$ib = new \CIBlock;
$documentsIblockId = test_test::addInfoblock($ib, 'Документы', test_test::DOCUMENTS_INFOBLOCK_CODE, $moduleId);
$professionsIblockId = test_test::addInfoblock($ib, 'Специальности', test_test::PROFESSIONS_INFOBLOCK_CODE, $moduleId);
$facultiesIblockId = test_test::addInfoblock($ib, 'Факультеты', test_test::FACULTIES_INFOBLOCK_CODE, $moduleId);
$subjectsIblockId = test_test::addInfoblock($ib, 'Предметы', test_test::SUBJECTS_INFOBLOCK_CODE, $moduleId);
$departmentIblockId = test_test::addInfoblock($ib, 'Кафедры', test_test::DEPARTMENTS_INFOBLOCK_CODE, $moduleId);
$libraryIblockId = test_test::addInfoblock($ib, 'Библиотека', test_test::LIBRARY_INFOBLOCK_CODE, $moduleId);
$newsIblockId = test_test::addInfoblock($ib, 'Новости', test_test::NEWS_INFOBLOCK_CODE, $moduleId);
$advertisementIblockId = test_test::addInfoblock($ib, 'Объявления', test_test::ADVERTISEMENT_INFOBLOCK_CODE, $moduleId);
$dormInfoblockId = test_test::addInfoblock($ib, 'Общежития', test_test::DORM_INFOBLOCK_CODE, $moduleId);
$creativeInfoblockId = test_test::addInfoblock($ib, 'Творческие коллективы', test_test::CREATIVE_INFOBLOCK_CODE, $moduleId);
$conferenceInfoblockId = test_test::addInfoblock($ib, 'Конференции', test_test::CONFERENCE_INFOBLOCK_CODE, $moduleId);
$trainingMaterialsId = test_test::addInfoblock($ib, 'Учебные материалы', test_test::TRAINING_MATERIALS_INFOBLOCK_CODE, $moduleId);
$reviewsInfoblockId = test_test::addInfoblock($ib, 'Отзывы', test_test::REVIEWS_INFOBLOCK_CODE, $moduleId);
$trainingInfoblockId = test_test::addInfoblock($ib, 'Тренинги и семинары', test_test::TRAININGS_INFOBLOCK_CODE, $moduleId);
echo \CAdminMessage::ShowNote("Информационные блоки добавлены");

echo \CAdminMessage::ShowNote("Добавление пользовательских свойств-привязок к элементам инфомационных блоков");

test_test::addUserField($oUserTypeEntity,
    'UF_PROFESSION',
    'iblock_element',
    'PROFESSION',
    'Наименование направления подготовки и (или) специальности',
    'Profession',
    [
        'IBLOCK_TYPE_ID' => $moduleId,
        'IBLOCK_ID' => $professionsIblockId
    ]
);

test_test::addUserField($oUserTypeEntity,
    'UF_DEPARTMENT',
    'iblock_element',
    'PROFESSION',
    'Кафедра',
    'Department',
    [
        'IBLOCK_TYPE_ID' => $moduleId,
        'IBLOCK_ID' => $departmentIblockId
    ]
);
echo \CAdminMessage::ShowNote("Пользовательские свойства-привязки к элементам информационных блоков добавлены");

echo \CAdminMessage::ShowNote("Добавление свойств инфомационных блоков");
$property = new \CIBlockProperty();
$id = test_test::addInfoblockProperty($property,
    'Файл',
    test_test::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $documentsIblockId
);
$formOfEducationid = test_test::addInfoblockProperty($property,
    'Форма обучения',
    test_test::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE,
    test_test::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Сроки обучения',
    test_test::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Срок гос. аккредитации',
    test_test::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    test_test::DATE_TIME_INFOBLOCK_PROPERTY_USER_TYPE
);
$levelId = test_test::addInfoblockProperty($property,
    'Уровень образования',
    test_test::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE,
    test_test::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Код специальности, направления подготовки',
    test_test::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Описание образовательной программы',
    test_test::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Учебный план',
    test_test::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Аннотации к рабочим программам дисциплин',
    test_test::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Календарный учебный график',
    test_test::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Методические и иные документы',
    test_test::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true
);
$id = test_test::addInfoblockProperty($property,
    'Практики',
    test_test::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Численность лиц, обучающихся за счет бюджета',
    test_test::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Численность лиц, находящихся на платном обучении',
    test_test::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Стоимость платных мест',
    test_test::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Профили подготовки',
    test_test::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Ключевые дисциплины',
    test_test::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$languagesId = test_test::addInfoblockProperty($property,
    'Языки, на которых происходит обучение',
    test_test::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE,
    test_test::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true
);
$id = test_test::addInfoblockProperty($property,
    'Научно-исследовательская работа',
    test_test::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Сведения о результатах приема',
    test_test::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Результаты перевода и отчисления',
    test_test::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$facultyId = test_test::addInfoblockProperty($property,
    'Факультет',
    test_test::INFOBLOCK_FACULTY_PROPERTY_CODE,
    test_test::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    false,
    $facultiesIblockId
);
$preliminaryTestId = test_test::addInfoblockProperty($property,
    'Вступительные испытания',
    test_test::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE,
    test_test::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true,
    $subjectsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Факультет',
    test_test::INFOBLOCK_FACULTY_PROPERTY_CODE,
    test_test::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $departmentIblockId,
    null,
    false,
    $facultiesIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Адрес',
    test_test::INFOBLOCK_ADDRESS_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $dormInfoblockId
);
$entityId = test_test::addInfoblockProperty($property,
    'Для кого показывать',
    test_test::INFOBLOCK_ENTITY_PROPERTY_CODE,
    test_test::LIST_INFOBLOCK_PROPERTY_TYPE,
    $newsIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Руководители коллектива',
    test_test::INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = test_test::addInfoblockProperty($property,
    'Расписание',
    test_test::INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = test_test::addInfoblockProperty($property,
    'Время',
    test_test::INFOBLOCK_TIME_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = test_test::addInfoblockProperty($property,
    'Место',
    test_test::INFOBLOCK_PLACE_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = test_test::addInfoblockProperty($property,
    'Сроки проведения',
    test_test::INFOBLOCK_PERIOD_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $conferenceInfoblockId
);
$id = test_test::addInfoblockProperty($property,
    'Организатор(факультет, лаборатория)',
    test_test::INFOBLOCK_ORGANIZATOR_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $conferenceInfoblockId
);
$id = test_test::addInfoblockProperty($property,
    'Факультет',
    test_test::INFOBLOCK_FACULTY_PROPERTY_CODE,
    test_test::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $trainingMaterialsId,
    null,
    false,
    $facultiesIblockId
);
$id = test_test::addInfoblockProperty($property,
    'Файл',
    test_test::INFOBLOCK_FILE_PROPERTY_CODE,
    test_test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $trainingMaterialsId,
);
$id = test_test::addInfoblockProperty($property,
    'Пользователь',
    test_test::INFOBLOCK_USER_PROPERTY_CODE,
    test_test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $reviewsInfoblockId,
    test_test::USER_INFOBLOCK_PROPERTY_USER_TYPE
);
echo \CAdminMessage::ShowNote("Свойства информационных блоков добавлены");

echo \CAdminMessage::ShowNote("Добавление значений свойств инфомационных блоков");
$iBPEnum = new CIBlockPropertyEnum;
test_test::addEnumPropertyValue($iBPEnum, $formOfEducationid, 'заочная');
test_test::addEnumPropertyValue($iBPEnum, $formOfEducationid, 'очная');
test_test::addEnumPropertyValue($iBPEnum, $levelId, 'Бакалавриат');
test_test::addEnumPropertyValue($iBPEnum, $levelId, 'Магистратура');
test_test::addEnumPropertyValue($iBPEnum, $levelId, 'Специалист');
test_test::addEnumPropertyValue($iBPEnum, $levelId, 'Аспирантура');
test_test::addEnumPropertyValue($iBPEnum, $languagesId, 'Русский');
test_test::addEnumPropertyValue($iBPEnum, $languagesId, 'Итальянский');
test_test::addEnumPropertyValue($iBPEnum, $languagesId, 'Английский');
test_test::addEnumPropertyValue($iBPEnum, $entityId, 'Студент');
test_test::addEnumPropertyValue($iBPEnum, $entityId, 'ВУЗ');
echo \CAdminMessage::ShowNote("Значения свойств информационных блоков добавлены");
$DB->Commit();
?>