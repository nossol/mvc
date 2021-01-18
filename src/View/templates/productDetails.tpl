{extends file="layout.tpl"}

{block name=body}
    <br>
    {$getProduct}
    <br>
    <li>
        {$singleProduct.id},
        {$singleProduct.productname},
        {$singleProduct.description}
    </li>
    <br>
    <br>
{/block}

