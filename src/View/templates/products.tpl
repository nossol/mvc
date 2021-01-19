{extends file="layout.tpl"}

{block name=body}
    {foreach $allProducts as $product}
        <li>
            <a href="/?page=productdetails&pid={$product.id}">{$product.productname}</a>
        </li>
    {/foreach}
    <br>
    {$getProduct}
    <br>
        <li>
            {$singleProduct.id},
            {$singleProduct.productname},
            {$singleProduct.description}
        </li>
    <br>
    {$product}
    <br>
    {$hasProduct}
{/block}

