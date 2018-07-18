# Сборка для разработки

Заготовка сайта на MODX REVOLUTION для разработки приложения на Fenom + Bootstrap 4

## Fenom

Fenom на сайте включен по умолчанию все ресурсы (**чанки, шаблоны, страницы**) хранятся в папке 
```
core/elements/
```

## MarkDown

Добавлен свой сниппет для обработки страниц в формате .md

*для подключении на странице используется*
```
[[!MarkdownFenom? &input=`markdown/main.md`]]
```

## Установка приложения

* На сайте уже создана папка `Extras/modExtra` её требуется переименованить

* В место `myNameExtra` напишите свое имя приложения 

```
php /home/s14756/www/Extras/modExtra/rename_it.php myNameExtra
```

*путь на сайте может отличаться от текущего*

* для установки приложения в систему требуется запустить скрипт

```
php /home/s1031/www/Extras/myNameExtra/_build/build.php
``` 



## Css и js

Для css настроены стили для форматирования текста под формат markdown

### Копировать путь к файлу

В PhpStorm есть пункт в контекстном меню `Copy Realatve Path`  который копирует путь до папки с файлом.

```
По умолчанию получится вот так
core/elements/chunks
```   

Необходимо на папке ***core/elements*** в контектном меню выбрать `Mark Directory as -> Sources Root`

```   
Теперь при копировании будет вот такой путь 
chunks/_crumbs.tpl
```   


## Дополнительно

* [Заметки по Fenom](http://bustep.ru/markdown/55-shpargalka-po-fenom.html)
* [Заметки по Markdown](http://bustep.ru/markdown/shpargalka-po-markdown.html)
