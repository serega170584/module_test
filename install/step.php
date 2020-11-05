<?if(!check_bitrix_sessid())
    return;?>

<style type="text/css">
    .adm-info-message-wrap + .adm-info-message-wrap .adm-info-message{
        margin-top:0 !important;
    }
</style>

<?=CAdminMessage::ShowNote(GetMessage("ambersite_prostositelight_MOD_INST_OK"));?>
<?=BeginNote("align='left'");?>
<?=GetMessage("ambersite_prostositelight_MOD_INST_NOTE")?>
<?=EndNote();?>

<form action="/bitrix/admin/wizard_list.php?lang=ru">
    <input type="submit" name="" value="<?=GetMessage('ambersite_prostositelight_OPEN_WIZARDS_LIST')?>">
<form>