<?php
/**
 * @var string $strTitle
 */
if (!check_bitrix_sessid()) return;
echo \CAdminMessage::ShowMessage($strTitle);
