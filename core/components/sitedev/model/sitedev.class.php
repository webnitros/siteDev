<?php

class siteDev
{
    /** @var modX $modx */
    public $modx;

    /** @var array $initialized */
    public $initialized = array();

    const assets_version = '1.1-dev';

    /** @var pdoFetch $pdoTools */
    public $pdoTools;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx = $modx;
        $this->pdoTools = $modx->getService('pdoFetch');
        $corePath = MODX_CORE_PATH . 'components/sitedev/';
        $assetsUrl = MODX_ASSETS_URL . 'components/sitedev/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',

            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->initialize();

    }

    /**
     * Initialize siteDev
     */
    public function initialize()
    {
        /* @var pdoFetch $pdoTools*/
        $this->pdoTools = $this->modx->getService('pdoFetch');

        if (!isset($_SESSION['csrf-token'])) {
            $_SESSION['csrf-token'] = bin2hex(openssl_random_pseudo_bytes(16));
        }
        $csrf_token = $_SESSION['csrf-token'];
        $this->modx->regClientStartupHTMLBlock('<meta name="csrf-token" content="' . $csrf_token . '">' . "\n");

        $this->modx->addPackage('sitedev', $this->config['modelPath']);
    }

    /**
     * @param $action
     * @param array $data
     *
     * @return array|bool|mixed
     */
    public function runProcessor($action, array $data = [])
    {
        $action = 'web/' . trim($action, '/');
        /** @var modProcessorResponse $response */
        $response = $this->modx->runProcessor($action, $data, ['processors_path' => $this->config['processorsPath']]);
        if ($response) {
            $data = $response->getResponse();
            if (is_string($data)) {
                $data = json_decode($data, true);
            }

            return $data;
        }

        return false;
    }


    /**
     * @param modSystemEvent $event
     * @param array $scriptProperties
     */
    public function handleEvent(modSystemEvent $event, array $scriptProperties)
    {
        extract($scriptProperties);
        switch ($event->name) {
            case 'pdoToolsOnFenomInit':

                $modx = $this->modx;
                $pdo = $this->pdoTools;

                /** @var Fenom|FenomX $fenom */
                $fenom->addAllowedFunctions([
                    'array_keys',
                    'array_values',
                ]);

                $fenom->addAccessorSmart('SiteDev', 'SiteDev', Fenom::ACCESSOR_PROPERTY);
                $fenom->App = $this;

                #$fenom->addAccessorSmart('en', 'en', Fenom::ACCESSOR_PROPERTY);
                #$fenom->en = $this->modx->getOption('cultureKey') == 'en';

                $fenom->addAccessorSmart('assets_version', 'assets_version', Fenom::ACCESSOR_PROPERTY);
                $fenom->assets_version = $this::assets_version;

                break;
            case 'OnHandleRequest':
                break;
            case 'OnLoadWebDocument':
                break;

        }
    }
}