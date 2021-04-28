{extends file="layout.tpl"}

{block name="body"}
    <form action="" method="post">
        <input type="hidden" name="page" value="backend">
        <label for="username">Username:</label>
        <input type="text" name="username" /><br />
        <label for="password">Password:</label>
        <input type="password" id="pwd" name="password">
        <input type="Submit" value="Login" />
    </form>
{/block}