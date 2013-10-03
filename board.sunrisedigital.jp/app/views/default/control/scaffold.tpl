{extends file='default/base.tpl'}

{block title append} {$page_name}{/block}

{block js append}
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
{include 'sdx/include/scaffold/js.tpl'}
{/block}

{block css append}
<link rel="stylesheet" type="text/css" href="/css/sdx/scaffold.bootstrap.css">
{/block}

{block main_contents}{include 'sdx/include/scaffold/html.tpl'}{/block}