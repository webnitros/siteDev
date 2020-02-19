<?php

class siteDevItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'siteDevItem';
    public $classKey = 'siteDevItem';
    public $languageTopics = ['sitedev'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('sitedev_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('sitedev_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'siteDevItemCreateProcessor';