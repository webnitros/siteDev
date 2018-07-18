{if !$.get.msorder}
    {$_modx->runSnippet('msCart')}
    {$_modx->runSnippet('msOrder')}
{else}
    Заказа успешно отправлен.
<br>
<br>

    {$_modx->runSnippet('msGetOrder')}
{/if}