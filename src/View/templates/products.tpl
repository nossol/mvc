{extends file="layout.tpl"}

{block name=body}
    {foreach $myProducts as $product}
        <li>
            {$product.productname}
            {$product.description}
        </li>
    {/foreach}
{/block}

