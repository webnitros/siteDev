<div class="col-md-12">
    <h1>Сборка для разработки</h1>
    <p>Заготовка сайта на MODX REVOLUTION для разработки приложения на Fenom + Bootstrap 4</p>
    <h2>Fenom</h2>
    <p>Fenom на сайте включен по умолчанию все ресурсы (<strong>чанки, шаблоны, страницы</strong>) хранятся в папке </p>
    <pre><code>core/elements/</code></pre>


    {if $modx->getAuthenticatedUser('mgr')}
    <h2>Установка приложения</h2>
    <ul>
        <li>
            <p>На сайте уже создана папка <code>Extras/modExtra</code> её требуется переименованить</p>
        </li>
        <li>В место <code>myNameExtra</code> напишите свое имя приложения</li>
    </ul>
    <pre><code>php {$modx->config['base_path']}Extras/modExtra/rename_it.php myNameExtra</code></pre>
    <p><em>путь на сайте может отличаться от текущего</em></p>
    <ul>
        <li>для установки приложения в систему требуется запустить скрипт</li>
    </ul>
    <pre><code>php {$modx->config['base_path']}Extras/myNameExtra/_build/build.php</code></pre>

    {/if}

    <h2>Css и js</h2>
    <p>Для css настроены стили для форматирования текста под формат markdown</p>
    <h3>Копировать путь к файлу</h3>
    <p>В PhpStorm есть пункт в контекстном меню <code>Copy Realatve Path</code> который копирует путь до папки с файлом.
    </p>
    <pre><code>По умолчанию получится вот так
core/elements/chunks</code></pre>
    <p>Необходимо на папке <strong><em>core/elements</em></strong> в контектном меню выбрать <code>Mark Directory as -&gt;
        Sources Root</code></p>
    <pre><code>Теперь при копировании будет вот такой путь
chunks/_crumbs.tpl</code></pre>
    <h2>Дополнительно</h2>
    <ul>
        <li><a href="http://bustep.ru/markdown/55-shpargalka-po-fenom.html">Заметки по Fenom</a></li>
        <li><a href="http://bustep.ru/markdown/shpargalka-po-markdown.html">Заметки по Markdown</a></li>
    </ul>
</div>