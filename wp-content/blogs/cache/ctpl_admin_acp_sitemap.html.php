<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<h1><?php echo ((isset($this->_rootref['L_ACP_SITEMAP_SETTINGS'])) ? $this->_rootref['L_ACP_SITEMAP_SETTINGS'] : ((isset($user->lang['ACP_SITEMAP_SETTINGS'])) ? $user->lang['ACP_SITEMAP_SETTINGS'] : '{ ACP_SITEMAP_SETTINGS }')); ?></h1>

<p><?php echo ((isset($this->_rootref['L_ACP_SITEMAP_SETTINGS_EXPLAIN'])) ? $this->_rootref['L_ACP_SITEMAP_SETTINGS_EXPLAIN'] : ((isset($user->lang['ACP_SITEMAP_SETTINGS_EXPLAIN'])) ? $user->lang['ACP_SITEMAP_SETTINGS_EXPLAIN'] : '{ ACP_SITEMAP_SETTINGS_EXPLAIN }')); ?></p>

<?php if ($this->_rootref['S_WARNING']) {  ?>

	<div class="errorbox">
		<h3><?php echo ((isset($this->_rootref['L_WARNING'])) ? $this->_rootref['L_WARNING'] : ((isset($user->lang['WARNING'])) ? $user->lang['WARNING'] : '{ WARNING }')); ?></h3>
		<p><?php echo (isset($this->_rootref['WARNING_MSG'])) ? $this->_rootref['WARNING_MSG'] : ''; ?></p>
	</div>
<?php } ?>


<form id="acp_sitemap" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

<fieldset>
	<legend><?php echo ((isset($this->_rootref['L_ACP_SITEMAP_SETTINGS'])) ? $this->_rootref['L_ACP_SITEMAP_SETTINGS'] : ((isset($user->lang['ACP_SITEMAP_SETTINGS'])) ? $user->lang['ACP_SITEMAP_SETTINGS'] : '{ ACP_SITEMAP_SETTINGS }')); ?></legend>
<dl>
	<dt><label for="sitemap_enable"><?php echo ((isset($this->_rootref['L_SITEMAP_ENABLE'])) ? $this->_rootref['L_SITEMAP_ENABLE'] : ((isset($user->lang['SITEMAP_ENABLE'])) ? $user->lang['SITEMAP_ENABLE'] : '{ SITEMAP_ENABLE }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_ENABLE_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_ENABLE_EXPLAIN'] : ((isset($user->lang['SITEMAP_ENABLE_EXPLAIN'])) ? $user->lang['SITEMAP_ENABLE_EXPLAIN'] : '{ SITEMAP_ENABLE_EXPLAIN }')); ?></span></dt>
	<dd><label><input type="radio" class="radio" id="sitemap_enable" name="sitemap_enable" value="1"<?php if ($this->_rootref['SITEMAP_ENABLE']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_ENABLED'])) ? $this->_rootref['L_ENABLED'] : ((isset($user->lang['ENABLED'])) ? $user->lang['ENABLED'] : '{ ENABLED }')); ?></label>
		<label><input type="radio" class="radio" name="sitemap_enable" value="0"<?php if (! $this->_rootref['SITEMAP_ENABLE']) {  ?> checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_DISABLED'])) ? $this->_rootref['L_DISABLED'] : ((isset($user->lang['DISABLED'])) ? $user->lang['DISABLED'] : '{ DISABLED }')); ?></label></dd>
</dl>
<dl>
	<dt><label for="sitemap_cache_time"><?php echo ((isset($this->_rootref['L_SITEMAP_CACHE_TIME'])) ? $this->_rootref['L_SITEMAP_CACHE_TIME'] : ((isset($user->lang['SITEMAP_CACHE_TIME'])) ? $user->lang['SITEMAP_CACHE_TIME'] : '{ SITEMAP_CACHE_TIME }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_CACHE_TIME_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_CACHE_TIME_EXPLAIN'] : ((isset($user->lang['SITEMAP_CACHE_TIME_EXPLAIN'])) ? $user->lang['SITEMAP_CACHE_TIME_EXPLAIN'] : '{ SITEMAP_CACHE_TIME_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="sitemap_cache_time" name="sitemap_cache_time" value="<?php echo (isset($this->_rootref['SITEMAP_CACHE_TIME'])) ? $this->_rootref['SITEMAP_CACHE_TIME'] : ''; ?>" maxlength="5" size="5" /></dd>
</dl>
<dl>
	<dt><label for="sitemap_priority_0"><?php echo ((isset($this->_rootref['L_SITEMAP_PRIORITY_0'])) ? $this->_rootref['L_SITEMAP_PRIORITY_0'] : ((isset($user->lang['SITEMAP_PRIORITY_0'])) ? $user->lang['SITEMAP_PRIORITY_0'] : '{ SITEMAP_PRIORITY_0 }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_PRIORITY_0_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_PRIORITY_0_EXPLAIN'] : ((isset($user->lang['SITEMAP_PRIORITY_0_EXPLAIN'])) ? $user->lang['SITEMAP_PRIORITY_0_EXPLAIN'] : '{ SITEMAP_PRIORITY_0_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="sitemap_priority_0" name="sitemap_priority_0" value="<?php echo (isset($this->_rootref['SITEMAP_PRIORITY_0'])) ? $this->_rootref['SITEMAP_PRIORITY_0'] : ''; ?>" maxlength="5" size="5" /></dd>
</dl>
<dl>
	<dt><label for="sitemap_priority_1"><?php echo ((isset($this->_rootref['L_SITEMAP_PRIORITY_1'])) ? $this->_rootref['L_SITEMAP_PRIORITY_1'] : ((isset($user->lang['SITEMAP_PRIORITY_1'])) ? $user->lang['SITEMAP_PRIORITY_1'] : '{ SITEMAP_PRIORITY_1 }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_PRIORITY_1_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_PRIORITY_1_EXPLAIN'] : ((isset($user->lang['SITEMAP_PRIORITY_1_EXPLAIN'])) ? $user->lang['SITEMAP_PRIORITY_1_EXPLAIN'] : '{ SITEMAP_PRIORITY_1_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="sitemap_priority_1" name="sitemap_priority_1" value="<?php echo (isset($this->_rootref['SITEMAP_PRIORITY_1'])) ? $this->_rootref['SITEMAP_PRIORITY_1'] : ''; ?>" maxlength="5" size="5" /></dd>
</dl>
<dl>
	<dt><label for="sitemap_priority_2"><?php echo ((isset($this->_rootref['L_SITEMAP_PRIORITY_2'])) ? $this->_rootref['L_SITEMAP_PRIORITY_2'] : ((isset($user->lang['SITEMAP_PRIORITY_2'])) ? $user->lang['SITEMAP_PRIORITY_2'] : '{ SITEMAP_PRIORITY_2 }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_PRIORITY_2_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_PRIORITY_2_EXPLAIN'] : ((isset($user->lang['SITEMAP_PRIORITY_2_EXPLAIN'])) ? $user->lang['SITEMAP_PRIORITY_2_EXPLAIN'] : '{ SITEMAP_PRIORITY_2_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="sitemap_priority_2" name="sitemap_priority_2" value="<?php echo (isset($this->_rootref['SITEMAP_PRIORITY_2'])) ? $this->_rootref['SITEMAP_PRIORITY_2'] : ''; ?>" maxlength="5" size="5" /></dd>
</dl>
<dl>
	<dt><label for="sitemap_priority_3"><?php echo ((isset($this->_rootref['L_SITEMAP_PRIORITY_3'])) ? $this->_rootref['L_SITEMAP_PRIORITY_3'] : ((isset($user->lang['SITEMAP_PRIORITY_3'])) ? $user->lang['SITEMAP_PRIORITY_3'] : '{ SITEMAP_PRIORITY_3 }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_PRIORITY_3_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_PRIORITY_3_EXPLAIN'] : ((isset($user->lang['SITEMAP_PRIORITY_3_EXPLAIN'])) ? $user->lang['SITEMAP_PRIORITY_3_EXPLAIN'] : '{ SITEMAP_PRIORITY_3_EXPLAIN }')); ?></span></dt>
	<dd><input type="text" id="sitemap_priority_3" name="sitemap_priority_3" value="<?php echo (isset($this->_rootref['SITEMAP_PRIORITY_3'])) ? $this->_rootref['SITEMAP_PRIORITY_3'] : ''; ?>" maxlength="5" size="5" /></dd>
</dl>
<dl>
	<dt><label for="sitemap_freq_0"><?php echo ((isset($this->_rootref['L_SITEMAP_FREQ_0'])) ? $this->_rootref['L_SITEMAP_FREQ_0'] : ((isset($user->lang['SITEMAP_FREQ_0'])) ? $user->lang['SITEMAP_FREQ_0'] : '{ SITEMAP_FREQ_0 }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_FREQ_0_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_FREQ_0_EXPLAIN'] : ((isset($user->lang['SITEMAP_FREQ_0_EXPLAIN'])) ? $user->lang['SITEMAP_FREQ_0_EXPLAIN'] : '{ SITEMAP_FREQ_0_EXPLAIN }')); ?></span></dt>
	<dd><select name="sitemap_freq_0" id="sitemap_freq_0"><?php echo (isset($this->_rootref['SITEMAP_FREQ_LIST_0'])) ? $this->_rootref['SITEMAP_FREQ_LIST_0'] : ''; ?></select></dd>
</dl>
<dl>
	<dt><label for="sitemap_freq_1"><?php echo ((isset($this->_rootref['L_SITEMAP_FREQ_1'])) ? $this->_rootref['L_SITEMAP_FREQ_1'] : ((isset($user->lang['SITEMAP_FREQ_1'])) ? $user->lang['SITEMAP_FREQ_1'] : '{ SITEMAP_FREQ_1 }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_FREQ_1_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_FREQ_1_EXPLAIN'] : ((isset($user->lang['SITEMAP_FREQ_1_EXPLAIN'])) ? $user->lang['SITEMAP_FREQ_1_EXPLAIN'] : '{ SITEMAP_FREQ_1_EXPLAIN }')); ?></span></dt>
	<dd><select name="sitemap_freq_1" id="sitemap_freq_1"><?php echo (isset($this->_rootref['SITEMAP_FREQ_LIST_1'])) ? $this->_rootref['SITEMAP_FREQ_LIST_1'] : ''; ?></select></dd>
</dl>
<dl>
	<dt><label for="sitemap_freq_2"><?php echo ((isset($this->_rootref['L_SITEMAP_FREQ_2'])) ? $this->_rootref['L_SITEMAP_FREQ_2'] : ((isset($user->lang['SITEMAP_FREQ_2'])) ? $user->lang['SITEMAP_FREQ_2'] : '{ SITEMAP_FREQ_2 }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_FREQ_2_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_FREQ_2_EXPLAIN'] : ((isset($user->lang['SITEMAP_FREQ_2_EXPLAIN'])) ? $user->lang['SITEMAP_FREQ_2_EXPLAIN'] : '{ SITEMAP_FREQ_2_EXPLAIN }')); ?></span></dt>
	<dd><select name="sitemap_freq_2" id="sitemap_freq_2"><?php echo (isset($this->_rootref['SITEMAP_FREQ_LIST_2'])) ? $this->_rootref['SITEMAP_FREQ_LIST_2'] : ''; ?></select></dd>
</dl>
<dl>
	<dt><label for="sitemap_freq_3"><?php echo ((isset($this->_rootref['L_SITEMAP_FREQ_3'])) ? $this->_rootref['L_SITEMAP_FREQ_3'] : ((isset($user->lang['SITEMAP_FREQ_3'])) ? $user->lang['SITEMAP_FREQ_3'] : '{ SITEMAP_FREQ_3 }')); ?>:</label><br /><span><?php echo ((isset($this->_rootref['L_SITEMAP_FREQ_3_EXPLAIN'])) ? $this->_rootref['L_SITEMAP_FREQ_3_EXPLAIN'] : ((isset($user->lang['SITEMAP_FREQ_3_EXPLAIN'])) ? $user->lang['SITEMAP_FREQ_3_EXPLAIN'] : '{ SITEMAP_FREQ_3_EXPLAIN }')); ?></span></dt>
	<dd><select name="sitemap_freq_3" id="sitemap_freq_3"><?php echo (isset($this->_rootref['SITEMAP_FREQ_LIST_3'])) ? $this->_rootref['SITEMAP_FREQ_LIST_3'] : ''; ?></select></dd>
</dl>

</fieldset>

<fieldset class="submit-buttons">
	<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;
	<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</fieldset>
</form>

<?php $this->_tpl_include('overall_footer.html'); ?>