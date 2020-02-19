<?php

return [
    'siteDev' => [
        'file' => 'sitedev',
        'description' => '',
        'events' => [
            'OnMODXInit' => [],
            'OnLoadWebDocument' => [],
            'pdoToolsOnFenomInit' => [],
            'OnHandleRequest' => [],
        ],
    ],
    'returnKilButton' => [
        'file' => 'returnkilbutton',
        'description' => 'Плагин возвращает кнопку для уничтожения ресурсов',
        'events' => [
            'OnManagerPageBeforeRender' => [],
            'OnResourceToolbarLoad' => [],
        ],
    ],
];