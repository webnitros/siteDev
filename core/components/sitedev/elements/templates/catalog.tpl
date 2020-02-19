{extends 'file:templates/base.tpl'}
{block 'main'}
<div id="content" class="main">
    <div class="row">
        <div class="col-md-3">
            <h3>Категории</h3>
            {$modx->runSnippet('pdoMenu', [
                'parents' => 2,
                'depth' => 0,
                'outerClass' => 'nav nav-pills flex-column',
                'tplOuter' => '@INLINE <ul[[+classes]]>[[+wrapper]]</ul>',
                'tpl' => '@FILE chunks/catalog/category.row.tpl',
            ])}
        </div>
        <div class="col-md-9 mt-1">
            <h1>{$modx->resource->pagetitle}</h1>
            {'!pdoPage@Bootstrap4' | snippet : [
                'element' => 'msProducts',
            ]}
            {$modx->getPlaceholder('page.nav')}
        </div>
    </div>
</div>
{/block}
