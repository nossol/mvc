<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{block name=title}MVC TRAINING{/block}</title>
</head>
<body>
    {include file='nav.tpl'}
    <h1>{$headline}</h1>
    {$info}
    <br>
    {block name=body}{/block}
</body>
</html>

