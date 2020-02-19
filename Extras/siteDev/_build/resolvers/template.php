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

        /* @var modResource $resource*/
        $q = $modx->newQuery('modResource');
        if($objectList = $modx->getCollection('modResource', $q)) {
            foreach ($objectList as $resource) {
                $properties = $resource->get('properties');
                if (isset($properties['templatename'])) {
                    if ($template = $modx->getObject('modTemplate', array('templatename' => $properties['templatename']))) {
                        unset($properties['templatename']);
                        $resource->set('template', $template->get('id'));
                        $resource->set('properties', $properties);
                        $resource->save();
                    }
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