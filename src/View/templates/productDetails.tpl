{extends file="layout.tpl"}

{block name=body}
    <br>
    Id: {$smarty.get.pid}
    <br>
    Name: {$singleProduct->getName()}
    <br>
    Description: {$singleProduct->getDescription()}
{/block}

