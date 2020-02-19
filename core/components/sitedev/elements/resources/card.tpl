{if !$.get.msorder}
    {$modx->runSnippet('msCart',[
        'tpl' => '@FILE chunks/cart/cart.form.tpl'
    ])}
    {$modx->runSnippet('msOrder',[
        'tpl' => '@FILE chunks/cart/order.form.tpl'
    ])}
{else}
    Заказа успешно отправлен.
    <br>
    <br>
    {$modx->runSnippet('msGetOrder')}
{/if}