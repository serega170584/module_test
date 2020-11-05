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
Edu::addUserField($oUserTypeEntity,
    'UF_BEGIN_TIME',
    'datetime',
    'BEGIN_TIME',
    'Время начала',
    'Begin time');
Edu::addUserField($oUserTypeEntity,
    'UF_END_TIME',
    'datetime',
    'END_TIME',
    'Время окончания',
    'End time');
Edu::addUserField($oUserTypeEntity,
    'UF_SITE',
    'string',
    'SITE',
    'Сайт',
    'Site');
Edu::addUserField($oUserTypeEntity,
    'UF_DOCUMENT',
    'file',
    'DOCUMENT',
    'Документ',
    'Document');
Edu::addUserField($oUserTypeEntity,
    'UF_TIME_ADDITION',
    'string',
    'TIME_ADDITION',
    'Уточнение времени работы',
    'Time addition');
Edu::addUserField($oUserTypeEntity,
    'UF_GENERAL_EXPERIENCE',
    'string',
    'GENERAL_EXPERIENCE',
    'Общий стаж работы',
    'General experience');
Edu::addUserField($oUserTypeEntity,
    'UF_PROFESSION_EXPERIENCE',
    'string',
    'PROFESSION_EXPERIENCE',
    'Cтаж работы по специальности',
    'Profession experience');
Edu::addUserField($oUserTypeEntity,
    'UF_POSITION',
    'string',
    'POSITION',
    'Должность',
    'Position');
Edu::addUserField($oUserTypeEntity,
    'UF_SUBJECT',
    'string',
    'SUBJECT',
    'Преподаваемые дисциплины',
    'Subject');
Edu::addUserField($oUserTypeEntity,
    'UF_DEGREE',
    'string',
    'DEGREEE',
    'Ученая степень',
    'Degree');
Edu::addUserField($oUserTypeEntity,
    'UF_RANK',
    'string',
    'RANK',
    'Ученое звание',
    'Rank');
Edu::addUserField($oUserTypeEntity,
    'UF_ASSESSMENT',
    'string',
    'ASSESSMENT',
    'Данные о повышении квалификации и (или) профессиональной переподготовке',
    'Assessment');
echo \CAdminMessage::ShowNote("Свойства пользователя добавлены");

echo \CAdminMessage::ShowNote("Добавление групп пользователей");

$group = new \CGroup;
$id = Edu::addUserGroup($group, 'Учредители', 'FOUNDERS');
$id = Edu::addUserGroup($group, 'Филиалы', 'BRANCHES');
$id = Edu::addUserGroup($group, 'Главный корпус', 'MAIN');
$id = Edu::addUserGroup($group, 'Отдел', 'DEPARTMENT');
$id = Edu::addUserGroup($group, 'Ученый совет', 'ACADEMIC_COUNCIL');
$id = Edu::addUserGroup($group, 'Руководство', 'LEADERSHIP');
$id = Edu::addUserGroup($group, 'Сотрудник', 'STAFF');
$id = Edu::addUserGroup($group, 'Выпускник', 'GRADUATE');
echo \CAdminMessage::ShowNote("Группы пользователей добавлены");

echo \CAdminMessage::ShowNote("Добавление инфомационных блоков");

$ib = new \CIBlock;
$documentsIblockId = Edu::addInfoblock($ib, 'Документы', Edu::DOCUMENTS_INFOBLOCK_CODE, $moduleId);
$professionsIblockId = Edu::addInfoblock($ib, 'Специальности', Edu::PROFESSIONS_INFOBLOCK_CODE, $moduleId);
$facultiesIblockId = Edu::addInfoblock($ib, 'Факультеты', Edu::FACULTIES_INFOBLOCK_CODE, $moduleId);
$subjectsIblockId = Edu::addInfoblock($ib, 'Предметы', Edu::SUBJECTS_INFOBLOCK_CODE, $moduleId);
$departmentIblockId = Edu::addInfoblock($ib, 'Кафедры', Edu::DEPARTMENTS_INFOBLOCK_CODE, $moduleId);
$libraryIblockId = Edu::addInfoblock($ib, 'Библиотека', Edu::LIBRARY_INFOBLOCK_CODE, $moduleId);
$newsIblockId = Edu::addInfoblock($ib, 'Новости', Edu::NEWS_INFOBLOCK_CODE, $moduleId);
$advertisementIblockId = Edu::addInfoblock($ib, 'Объявления', Edu::ADVERTISEMENT_INFOBLOCK_CODE, $moduleId);
$dormInfoblockId = Edu::addInfoblock($ib, 'Общежития', Edu::DORM_INFOBLOCK_CODE, $moduleId);
$creativeInfoblockId = Edu::addInfoblock($ib, 'Творческие коллективы', Edu::CREATIVE_INFOBLOCK_CODE, $moduleId);
$conferenceInfoblockId = Edu::addInfoblock($ib, 'Конференции', Edu::CONFERENCE_INFOBLOCK_CODE, $moduleId);
$trainingMaterialsId = Edu::addInfoblock($ib, 'Учебные материалы', Edu::TRAINING_MATERIALS_INFOBLOCK_CODE, $moduleId);
$reviewsInfoblockId = Edu::addInfoblock($ib, 'Отзывы', Edu::REVIEWS_INFOBLOCK_CODE, $moduleId);
$trainingInfoblockId = Edu::addInfoblock($ib, 'Тренинги и семинары', Edu::TRAININGS_INFOBLOCK_CODE, $moduleId);
echo \CAdminMessage::ShowNote("Информационные блоки добавлены");

echo \CAdminMessage::ShowNote("Добавление пользовательских свойств-привязок к элементам инфомационных блоков");

Edu::addUserField($oUserTypeEntity,
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

Edu::addUserField($oUserTypeEntity,
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
$id = Edu::addInfoblockProperty($property,
    'Файл',
    Edu::DOCUMENT_INFOBLOCK_FILE_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $documentsIblockId
);
$formOfEducationid = Edu::addInfoblockProperty($property,
    'Форма обучения',
    Edu::PROFESSIONS_INFOBLOCK_FORM_OF_EDUCATION_PROPERTY_CODE,
    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Сроки обучения',
    Edu::PROFESSIONS_INFOBLOCK_PERIOD_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Срок гос. аккредитации',
    Edu::PROFESSIONS_INFOBLOCK_ACCREDITATION_PERIOD_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    Edu::DATE_TIME_INFOBLOCK_PROPERTY_USER_TYPE
);
$levelId = Edu::addInfoblockProperty($property,
    'Уровень образования',
    Edu::PROFESSIONS_INFOBLOCK_LEVEL_PROPERTY_CODE,
    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Код специальности, направления подготовки',
    Edu::PROFESSIONS_INFOBLOCK_CODE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Описание образовательной программы',
    Edu::PROFESSIONS_INFOBLOCK_DESCRIPTION_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Учебный план',
    Edu::PROFESSIONS_INFOBLOCK_PLAN_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Аннотации к рабочим программам дисциплин',
    Edu::PROFESSIONS_INFOBLOCK_ANNOTATIONS_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Календарный учебный график',
    Edu::PROFESSIONS_INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Методические и иные документы',
    Edu::PROFESSIONS_INFOBLOCK_METHODOLOGICAL_DOCUMENTS_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true
);
$id = Edu::addInfoblockProperty($property,
    'Практики',
    Edu::PROFESSIONS_INFOBLOCK_PRACTICES_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Численность лиц, обучающихся за счет бюджета',
    Edu::PROFESSIONS_INFOBLOCK_BUDGET_COUNT_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Численность лиц, находящихся на платном обучении',
    Edu::PROFESSIONS_INFOBLOCK_PAYED_COUNT_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Стоимость платных мест',
    Edu::PROFESSIONS_INFOBLOCK_PRICE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Профили подготовки',
    Edu::PROFESSIONS_INFOBLOCK_PREPARATORY_PROFILE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Ключевые дисциплины',
    Edu::PROFESSIONS_INFOBLOCK_PRINCIPAL_SUBJECTS_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$languagesId = Edu::addInfoblockProperty($property,
    'Языки, на которых происходит обучение',
    Edu::PROFESSIONS_INFOBLOCK_LANGUAGES_PROPERTY_CODE,
    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true
);
$id = Edu::addInfoblockProperty($property,
    'Научно-исследовательская работа',
    Edu::PROFESSIONS_INFOBLOCK_RESEARCHES_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Сведения о результатах приема',
    Edu::PROFESSIONS_INFOBLOCK_RESULTS_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Результаты перевода и отчисления',
    Edu::PROFESSIONS_INFOBLOCK_REPLACED_RESULTS_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId
);
$facultyId = Edu::addInfoblockProperty($property,
    'Факультет',
    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    false,
    $facultiesIblockId
);
$preliminaryTestId = Edu::addInfoblockProperty($property,
    'Вступительные испытания',
    Edu::PROFESSIONS_INFOBLOCK_PRELIMINARY_TESTS_PROPERTY_CODE,
    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $professionsIblockId,
    null,
    true,
    $subjectsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Факультет',
    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $departmentIblockId,
    null,
    false,
    $facultiesIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Адрес',
    Edu::INFOBLOCK_ADDRESS_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $dormInfoblockId
);
$entityId = Edu::addInfoblockProperty($property,
    'Для кого показывать',
    Edu::INFOBLOCK_ENTITY_PROPERTY_CODE,
    Edu::LIST_INFOBLOCK_PROPERTY_TYPE,
    $newsIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Руководители коллектива',
    Edu::INFOBLOCK_CREATIVE_LEADERSHIP_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    'Расписание',
    Edu::INFOBLOCK_SCHEDULE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    'Время',
    Edu::INFOBLOCK_TIME_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    'Место',
    Edu::INFOBLOCK_PLACE_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $creativeInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    'Сроки проведения',
    Edu::INFOBLOCK_PERIOD_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $conferenceInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    'Организатор(факультет, лаборатория)',
    Edu::INFOBLOCK_ORGANIZATOR_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $conferenceInfoblockId
);
$id = Edu::addInfoblockProperty($property,
    'Факультет',
    Edu::INFOBLOCK_FACULTY_PROPERTY_CODE,
    Edu::ELEMENT_INFOBLOCK_PROPERTY_TYPE,
    $trainingMaterialsId,
    null,
    false,
    $facultiesIblockId
);
$id = Edu::addInfoblockProperty($property,
    'Файл',
    Edu::INFOBLOCK_FILE_PROPERTY_CODE,
    Edu::FILE_INFOBLOCK_PROPERTY_TYPE,
    $trainingMaterialsId,
);
$id = Edu::addInfoblockProperty($property,
    'Пользователь',
    Edu::INFOBLOCK_USER_PROPERTY_CODE,
    Edu::STRING_INFOBLOCK_PROPERTY_TYPE,
    $reviewsInfoblockId,
    Edu::USER_INFOBLOCK_PROPERTY_USER_TYPE
);
echo \CAdminMessage::ShowNote("Свойства информационных блоков добавлены");

echo \CAdminMessage::ShowNote("Добавление значений свойств инфомационных блоков");
$iBPEnum = new CIBlockPropertyEnum;
Edu::addEnumPropertyValue($iBPEnum, $formOfEducationid, 'заочная');
Edu::addEnumPropertyValue($iBPEnum, $formOfEducationid, 'очная');
Edu::addEnumPropertyValue($iBPEnum, $levelId, 'Бакалавриат');
Edu::addEnumPropertyValue($iBPEnum, $levelId, 'Магистратура');
Edu::addEnumPropertyValue($iBPEnum, $levelId, 'Специалист');
Edu::addEnumPropertyValue($iBPEnum, $levelId, 'Аспирантура');
Edu::addEnumPropertyValue($iBPEnum, $languagesId, 'Русский');
Edu::addEnumPropertyValue($iBPEnum, $languagesId, 'Итальянский');
Edu::addEnumPropertyValue($iBPEnum, $languagesId, 'Английский');
Edu::addEnumPropertyValue($iBPEnum, $entityId, 'Студент');
Edu::addEnumPropertyValue($iBPEnum, $entityId, 'ВУЗ');
echo \CAdminMessage::ShowNote("Значения свойств информационных блоков добавлены");
$DB->Commit();
?>