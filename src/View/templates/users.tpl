{extends file="layout.tpl"}

{block name=body}
    {foreach $allUsers as $users}
        <li>
            Id:{$users->getUserId()}, Username:{$users->getUsername()}
        </li>
    {/foreach}
{/block}

