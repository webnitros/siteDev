{set $user = $modx->getObject('modUser', 1)}
{if $user}
{if $modx->user->id == 0}
{if $.get['login'] == 1}
{if $user->addSessionContext('web')}
Вы успешно вошли.
{else}
<a href="{$modx->resource->id|url}?login=1">Войти</a>
{/if}
{/if}
{else}
{if $.get['logout'] == 1}
{if $user->removeSessionContext('web')}
Вы вышли.
{/if}
{else}
<a href="{$modx->resource->id|url}?logout=1">Выйти</a>
{/if}
{/if}
{else}
Пользователь с идитификатором 1 не найден. Изменить ID
{/if}