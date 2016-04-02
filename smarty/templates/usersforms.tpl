{extends file='admin.tpl'}
{block name=usersforms}
    <div class="adminpart">
    {block name="parent_block"}{include file="registerform.tpl"}{/block}
    {block name="parent_block"}{include file="accountInfoForm.tpl"}{/block}
</div>
{/block}