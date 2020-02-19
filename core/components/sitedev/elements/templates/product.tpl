{extends 'file:templates/base.tpl'}
{block 'main'}
<div id="content" class="main">
    <div class="row">
        <div class="col-md-12">
            {$modx->getChunk('msProduct.content')}
        </div>
    </div>
</div>
{/block}
