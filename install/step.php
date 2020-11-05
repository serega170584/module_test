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
Test::addUserField($oUserTypeEntity,
    'UF_BEGIN_TIME',
    'datetime',
    'BEGIN_TIME',
    'Время начала',
    'Begin time');
Test::addUserField($oUserTypeEntity,
    'UF_END_TIME',
    'datetime',
    'END_TIME',
    'Время окончания',
    'End time');
Test::addUserField($oUserTypeEntity,
    'UF_SITE',
    'string',
    'SITE',
    'Сайт',
    'Site');
Test::addUserField($oUserTypeEntity,
    'UF_DOCUMENT',
    'file',
    'DOCUMENT',
    'Документ',
    'Document');
Test::addUserField($oUserTypeEntity,
    'UF_TIME_ADDITION',
    'string',
    'TIME_ADDITION',
    'Уточнение времени работы',
    'Time addition');
Test::addUserField($oUserTypeEntity,
    'UF_GENERAL_EXPERIENCE',
    'string',
    'GENERAL_EXPERIENCE',
    'Общий стаж работы',
    'General experience');
Test::addUserField($oUserTypeEntity,
    'UF_PROFESSION_EXPERIENCE',
    'string',
    'PROFESSION_EXPERIENCE',
    'Cтаж работы по специальности',
    'Profession experience');
Test::addUserField($oUserTypeEntity,
    'UF_POSITION',
    'string',
    'POSITION',
    'Должность',
    'Position');
Test::addUserField($oUserTypeEntity,
    'UF_SUBJECT',
    'string',
    'SUBJECT',
    'Преподаваемые дисциплины',
    'Subject');
Test::addUserField($oUserTypeEntity,
    'UF_DEGREE',
    'string',
    'DEGREEE',
    'Ученая степень',
    'Degree');
Test::addUserField($oUserTypeEntity,
    'UF_RANK',
    'string',
    'RANK',
    'Ученое звание',
    'Rank');
Test::addUserField($oUserTypeEntity,
    'UF_ASSESSMENT',
    'string',
    'ASSESSMENT',
    'Данные о повышении квалификации и (или) профессиональной переподготовке',
    'Assessment');
echo \CAdminMessage::ShowNote("Свойства пользователя добавлены");

echo \CAdminMessage::ShowNote("Добавление групп пользователей");

$group = new \CGroup;
$id = Test::addUserGroup($group, 'Учредители', 'FOUNDERS');
$id = Test::addUserGroup($group, 'Филиалы', 'BRANCHES');
$id = Test::addUserGroup($group, 'Главный корпус', 'MAIN');
$id = Test::addUserGroup($group, 'Отдел', 'DEPARTMENT');
$id = Test::addUserGroup($group, 'Ученый совет', 'ACADEMIC_COUNCIL');
$id = Test::addUserGroup($group, 'Руководство', 'LEADERSHIP');
$id = Test::addUserGroup($group, 'Сотрудник', 'STAFF');
$id = Test::addUserGroup($group, 'Выпускник', 'GRADUATE');
echo \CAdminMessage::ShowNote("Группы пользователей добавлены");

echo \CAdminMessage::ShowNote("Добавление инфомационных блоков");

$ib = new \CIBlock;
$documentsIblockId = Test::addInfoblock($ib, 'Документы', Test::DOCUMENTS_INFOBLOCK_CODE, $moduleId);
$professionsIblockId = Test::addInfoblock($ib, 'Специальности', Test::PROFESSIONS_INFOBLOCK_CODE, $moduleId);
$facultiesIblockId = Test::addInfoblock($ib, 'Факультеты', Test::FACULTIES_INFOBLOCK_CODE, $moduleId);
$subjectsIblockId = Test::addInfoblock($ib, 'Предметы', Test::SUBJECTS_INFOBLOCK_CODE, $moduleId);
$departmentIblockId = Test::addInfoblock($ib, 'Кафедры', Test::DEPARTMENTS_INFOBLOCK_CODE, $moduleId);
$libraryIblockId = Test::addInfoblock($ib, 'Библиотека', Test::LIBRARY_INFOBLOCK_CODE, $moduleId);
$newsIblockId = Test::addInfoblock($ib, 'Новости', Test::NEWS_INFOBLOCK_CODE, $moduleId);
$advertisementIblockId = Test::addInfoblock($ib, 'Объявления', Test::ADVERTISEMENT_INFOBLOCK_CODE, $moduleId);
$dormInfoblockId = Test::addInfoblock($ib, 'Общежития', Test::DORM_INFOBLOCK_CODE, $moduleId);
$creativeInfoblockId = Test::addInfoblock($ib, 'Творческие коллективы', Test::CREATIVE_INFOBLOCK_CODE, $moduleId);
$conferenceInfoblockId = Test::addInfoblock($ib, 'Конференции', Test::CONFERENCE_INFOBLOCK_CODE, $moduleId);
$trainingMaterialsId = Test::addInfoblock($ib, 'Учебные материалы', Test::TRAINING_MATERIALS_INFOBLOCK_CODE, $moduleId);
$reviewsInfoblockId = Test::addInfoblock($ib, 'Отзывы', Test::REVIEWS_INFOBLOCK_CODE, $moduleId);
$trainingInfoblockId = Test::addInfoblock($ib, 'Тренинги и семинары', Test::TRAININGS_INFOBLOCK_CODE, $moduleId);
echo \CAdminMessage::ShowNote("Информационные блоки добавлены");

echo \CAdminMessage::ShowNote("Добавление пользовательских свойств-привязок к элементам инфомационных блоков");

Test::addUserField($oUserTypeEntity,
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

Test::addUserField($oUserTypeEntity,
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
$id = Test::addInfoblockProperty($property,
    'Файл',
    Test::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $documentsIblockId
);
$formOfEducationid = Test::addInfoblockProperty($property,
    'Форма обучения',
    Test::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE,
    Test::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Сроки обучения',
    Test::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Срок гос. аккредитации',
    Test::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    Test::DATE_TIME_INFOBLOCK_PROPERTY_USER_TYPE
);
$levelId = Test::addInfoblockProperty($property,
    'Уровень образования',
    Test::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE,
    Test::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Код специальности, направления подготовки',
    Test::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Описание образовательной программы',
    Test::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Учебный план',
    Test::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Аннотации к рабочим программам дисциплин',
    Test::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Календарный учебный график',
    Test::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Методические и иные документы',
    Test::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true
);
$id = Test::addInfoblockProperty($property,
    'Практики',
    Test::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Численность лиц, обучающихся за счет бюджета',
    Test::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Численность лиц, находящихся на платном обучении',
    Test::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Стоимость платных мест',
    Test::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Профили подготовки',
    Test::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Ключевые дисциплины',
    Test::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$languagesId = Test::addInfoblockProperty($property,
    'Языки, на которых происходит обучение',
    Test::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE,
    Test::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true
);
$id = Test::addInfoblockProperty($property,
    'Научно-исследовательская работа',
    Test::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Сведения о результатах приема',
    Test::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Результаты перевода и отчисления',
    Test::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$facultyId = Test::addInfoblockProperty($property,
    'Факультет',
    Test::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Test::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    false,
    $facultiesIblockId
);
$preliminaryTestId = Test::addInfoblockProperty($property,
    'Вступительные испытания',
    Test::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE,
    Test::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true,
    $subjectsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Факультет',
    Test::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Test::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $departmentIblockId,
    null,
    false,
    $facultiesIblockId
);
$id = Test::addInfoblockProperty($property,
    'Адрес',
    Test::INFOBLOCK_ADDRESS_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $dormInfoblockId
);
$entityId = Test::addInfoblockProperty($property,
    'Для кого показывать',
    Test::INFOBLOCK_ENTITY_PROPERTY_CODE,
    Test::LIST_INFOBLOCK_PROPERTY_TYPE,
    $newsIblockId
);
$id = Test::addInfoblockProperty($property,
    'Руководители коллектива',
    Test::INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Test::addInfoblockProperty($property,
    'Расписание',
    Test::INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Test::addInfoblockProperty($property,
    'Время',
    Test::INFOBLOCK_TIME_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Test::addInfoblockProperty($property,
    'Место',
    Test::INFOBLOCK_PLACE_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Test::addInfoblockProperty($property,
    'Сроки проведения',
    Test::INFOBLOCK_PERIOD_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $conferenceInfoblockId
);
$id = Test::addInfoblockProperty($property,
    'Организатор(факультет, лаборатория)',
    Test::INFOBLOCK_ORGANIZATOR_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $conferenceInfoblockId
);
$id = Test::addInfoblockProperty($property,
    'Факультет',
    Test::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Test::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $trainingMaterialsId,
    null,
    false,
    $facultiesIblockId
);
$id = Test::addInfoblockProperty($property,
    'Файл',
    Test::INFOBLOCK_FILE_PROPERTY_CODE,
    Test::FILE_INFOBLOCK_PROPERTY_TYPE,
    $trainingMaterialsId,
);
$id = Test::addInfoblockProperty($property,
    'Пользователь',
    Test::INFOBLOCK_USER_PROPERTY_CODE,
    Test::STRING_INFOBLOCK_PROPERTY_TYPE,
    $reviewsInfoblockId,
    Test::USER_INFOBLOCK_PROPERTY_USER_TYPE
);
echo \CAdminMessage::ShowNote("Свойства информационных блоков добавлены");

echo \CAdminMessage::ShowNote("Добавление значений свойств инфомационных блоков");
$iBPEnum = new CIBlockPropertyEnum;
Test::addEnumPropertyValue($iBPEnum, $formOfEducationid, 'заочная');
Test::addEnumPropertyValue($iBPEnum, $formOfEducationid, 'очная');
Test::addEnumPropertyValue($iBPEnum, $levelId, 'Бакалавриат');
Test::addEnumPropertyValue($iBPEnum, $levelId, 'Магистратура');
Test::addEnumPropertyValue($iBPEnum, $levelId, 'Специалист');
Test::addEnumPropertyValue($iBPEnum, $levelId, 'Аспирантура');
Test::addEnumPropertyValue($iBPEnum, $languagesId, 'Русский');
Test::addEnumPropertyValue($iBPEnum, $languagesId, 'Итальянский');
Test::addEnumPropertyValue($iBPEnum, $languagesId, 'Английский');
Test::addEnumPropertyValue($iBPEnum, $entityId, 'Студент');
Test::addEnumPropertyValue($iBPEnum, $entityId, 'ВУЗ');
echo \CAdminMessage::ShowNote("Значения свойств информационных блоков добавлены");
$DB->Commit();
?>