{extends file="layout.tpl"}

{block name=body}
    <br>
    Product Id: {$smarty.get.pid}
    <br>
    Productname: {$singleProduct.productname}
    <br>
    Product description: {$singleProduct.description}
{/block}

