<!-- Static navbar -->
<div class="navbar-expand-md navbar navbar-default navbar-static-top navbar-dark bg-dark" role="navigation">
    <div class="container">
         <a class="navbar-brand" href="/">{$modx->config.site_name}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExampleDefault">
            <ul class="nav navbar-nav mr-auto">
                {$modx->runSnippet('pdoMenu', [
                    'startId' => 0,
                    'level' => 1,
                    'rowClass' => 'nav-item',
                    'tpl' => '@INLINE <li {$classes}><a class="nav-link" href="{$link}" {$attributes}>{$menutitle}</a>{$wrapper}</li>',
                    'tplOuter' => '@INLINE {$wrapper}',
                ])}
            </ul>
        </div><!--/.nav-collapse -->

    </div>
</div>