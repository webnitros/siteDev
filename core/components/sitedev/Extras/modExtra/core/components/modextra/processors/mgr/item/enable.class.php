<?php
include_once dirname(__FILE__) . '/update.class.php';
class modExtraItemEnableProcessor extends modExtraItemUpdateProcessor
{
    public function beforeSet()
    {
        $this->setProperty('active', true);
        return true;
    }
}
return 'modExtraItemEnableProcessor';