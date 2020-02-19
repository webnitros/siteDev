{$modx->runSnippet('pdoCrumbs', [
'showAtHome' => 0,
'showHome' => 1,
'outerClass' => 'nav nav-pills',
'tpl' => '@INLINE <li class="breadcrumb-item"><a href="{$link}">{$menutitle}</a></li>',
'tplCurrent' => '@INLINE <li class="breadcrumb-item active">[[+menutitle]]</li>',
'tplWrapper' => '@INLINE <ol class="breadcrumb row">{$output}</ol>',
])}