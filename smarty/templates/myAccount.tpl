{extends file='layout.tpl'}
{block name=body}
    <div class="content">
        <h1>Mijn profiel</h1>
        {block name="parent_block"}{include file="accountInfoForm.tpl"}{/block}
    </div>
{/block}
