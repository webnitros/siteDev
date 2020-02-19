<!DOCTYPE html>
<html lang="en">
<head>
    {include 'file:chunks/head.tpl'}
</head>
<body>
{include 'file:chunks/navbar.tpl'}
<div class="container">
    {block 'crumbs'}
    {include 'file:chunks/crumbs.tpl'}
    {/block}
    {block 'main'}
    <div id="content" class="main">
        <div class="row">
            <div class="col-md-3">
                {include 'file:chunks/sidebar.tpl'}
            </div>
            <div class="col-md-9">
                <h1>{$modx->resource->pagetitle}</h1>
                {$modx->resource->content}
            </div>
        </div>
    </div>
    {/block}
    {include 'file:chunks/footer.tpl'}
</div>

<div id="back-top" >
    <a href="#">Наверх</a>
</div>
</body>
</html>