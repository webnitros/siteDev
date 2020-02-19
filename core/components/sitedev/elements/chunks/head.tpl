<meta charset="{$modx->config.modx_charset}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<base href="{$modx->config.site_url}" />
<title>{$modx->runSnippet("pdoTitle")} / {$modx->config.site_name}</title>

<link type="image/x-icon" rel="shortcut icon" href="/inc/images/favicon.ico">

[[!MinifyX?
&minifyCss=`1`
&minifyJs=`1`
&registerJs=`default`
&registerCss=`default`
&jsSources=`
/inc/js/bootstrap4/bootstrap.min.js,
/inc/js/main.js,
`
&cssSources=`
/inc/css/bootstrap4/bootstrap.min.css,
/inc/css/main.css
`
]]

<script src="/inc/js/jquery.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
