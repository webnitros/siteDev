<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if (!$transport->xpdo || !($transport instanceof xPDOTransport)) {
    return false;
}

$modx =& $transport->xpdo;
$success = false;
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

    if ($snippet = $modx->getObject('modSnippet', array('name' => 'pdoPage'))) {
        if (!$prop_bootsrap4 = $modx->getObject('modPropertySet', array('name' => 'Bootstrap4'))) {
            // Подставляем массив свойств для набора Bootstrap4
            $prop_bootsrap4 = $modx->newObject('modPropertySet', array(
                'name' => 'Bootstrap4',
                'description' => 'Pagination Property Set for Bootstrap 4',
                'properties' => array(
                    'tplPage' => array(
                        'name' => 'tplPage',
                        'desc' => 'pdotools_prop_tplPage',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>',
                    ),
                    'tplPageWrapper' => array(
                        'name' => 'tplPageWrapper',
                        'desc' => 'pdotools_tplPageWrapper',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <ul class="pagination">[[+first]][[+prev]][[+pages]][[+next]][[+last]]</ul>',
                    ),
                    'tplPageActive' => array(
                        'name' => 'tplPageActive',
                        'desc' => 'pdotools_tplPageActive',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item active"><a class="page-link" href="[[+href]]">[[+pageNo]]</a></li>',
                    ),
                    'tplPageFirst' => array(
                        'name' => 'tplPageFirst',
                        'desc' => 'pdotools_tplPageFirst',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_first]]</a></li>',
                    ),
                    'tplPageLast' => array(
                        'name' => 'tplPageLast',
                        'desc' => 'pdotools_tplPageLast',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">[[%pdopage_last]]</a></li>',
                    ),
                    'tplPagePrev' => array(
                        'name' => 'tplPagePrev',
                        'desc' => 'pdotools_tplPagePrev',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&laquo;</a></li>',
                    ),
                    'tplPageNext' => array(
                        'name' => 'tplPageNext',
                        'desc' => 'pdotools_tplPageNext',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item"><a class="page-link" href="[[+href]]">&raquo;</a></li>',
                    ),
                    'tplPageSkip' => array(
                        'name' => 'tplPageSkip',
                        'desc' => 'pdotools_tplPageSkip',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item disabled"><span class="page-link">...</span></li>',
                    ),
                    'tplPageFirstEmpty' => array(
                        'name' => 'tplPageFirstEmpty',
                        'desc' => 'pdotools_tplPageFirstEmpty',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item disabled"><span class="page-link">[[%pdopage_first]]</span></li>',
                    ),
                    'tplPageLastEmpty' => array(
                        'name' => 'tplPageLastEmpty',
                        'desc' => 'pdotools_tplPageLastEmpty',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item disabled"><span class="page-link">[[%pdopage_last]]</span></li>',
                    ),
                    'tplPagePrevEmpty' => array(
                        'name' => 'tplPagePrevEmpty',
                        'desc' => 'pdotools_tplPagePrevEmpty',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item disabled"><span class="page-link" aria-hidden="true">&laquo;</span></li>',
                    ),
                    'tplPageNextEmpty' => array(
                        'name' => 'tplPageNextEmpty',
                        'desc' => 'pdotools_tplPageNextEmpty',
                        'options' => array(),
                        'lexicon' => 'pdotools:properties',
                        'area' => '',
                        'type' => 'textfield',
                        'value' => '@INLINE <li class="page-item disabled"><span class="page-link" aria-hidden="true">&raquo;</span></li>',
                    ),
                ),
            ));
            // Запись набора свойств и пишем в лог установки
            if ($prop_bootsrap4->save() && $snippet->addPropertySet($prop_bootsrap4)) {
                $modx->log(xPDO::LOG_LEVEL_INFO,
                    'Property set "pdoPage" for snippet <b>pdoPage</b> was created');
            } else {
                $modx->log(xPDO::LOG_LEVEL_ERROR,
                    'Could not create property set "Bootstrap4" for <b>pdoPage</b>');
            }
        }
    }

        $success = true;
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        $success = true;
        break;
}

return $success;