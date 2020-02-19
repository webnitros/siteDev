<?php
include_once dirname(__FILE__) . '/update.class.php';
class modExtraItemDisableProcessor extends modExtraItemUpdateProcessor
{
    public function beforeSet()
    {
        $this->setProperty('active', false);
        return true;
    }
}
return 'modExtraItemDisableProcessor';
