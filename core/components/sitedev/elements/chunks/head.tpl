<meta charset="[[++modx_charset]]">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<base href="[[++site_url]]" />
<title>[[!pdoTitle]] / [[++site_name]]</title>

<link type="image/x-icon" rel="shortcut icon" href="[[++assets_url]]components/sitedev/images/web/favicon.ico">
<!-- You can add theme from bootswatch.com: just add it into &cssSources=``.
For example: [[++assets_url]]components/themebootstrap/css/slate/bootstrap.min.css-->
[[!MinifyX?
    &minifyCss=`1`
    &registerCss=`1`
    &cssSources=`
        [[++assets_url]]components/sitedev/css/web/bootstrap4/bootstrap.min.css,
        [[++assets_url]]components/sitedev/css/web/main.css
    `
    &minifyJs=`1`
    &registerJs=`1`
    &jsSources=`
        [[++assets_url]]components/sitedev/js/web/bootstrap4/bootstrap.min.js,
        [[++assets_url]]components/sitedev/js/web/main.js
    `
]]

<script src="[[++assets_url]]components/sitedev/js/web/jquery.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
