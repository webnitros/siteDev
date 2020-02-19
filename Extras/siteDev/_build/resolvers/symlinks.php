<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/siteDev/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/sitedev')) {
            $cache->deleteTree(
                $dev . 'assets/components/sitedev/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/sitedev/', $dev . 'assets/components/sitedev');
        }
        if (!is_link($dev . 'core/components/sitedev')) {
            $cache->deleteTree(
                $dev . 'core/components/sitedev/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/sitedev/', $dev . 'core/components/sitedev');
        }
    }
}

return true;