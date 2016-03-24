
<html>
<head>
  <title>{block name=title}Default Page Title{/block}</title>
  {block name=head}{/block}
</head>
<body>

    <h2>My webshoppie</h2>
    
    <ul>
    {foreach from=$header item=nav}
        <li><a href="/Plug_IT/index.php?method={$nav}">{$nav}</a></li>
    {/foreach}
    </ul>

    {block name=body}{/block}
        
   <ul>
   {foreach from=$footer item=info}
        <li>{$info}</li>
    {/foreach}
    </ul>
</body>
</html>
