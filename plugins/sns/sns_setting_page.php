<h2><?php echo __('SNS Settings');?></h2>
<form method="post" action="options.php">
<?php
	settings_fields( 'vkExUnit_sns_options_fields' );
	$options = vkExUnit_get_sns_options();
/*-------------------------------------------*/
/*	SNS
/*-------------------------------------------*/
?>
<div id="snsSetting" class="sectionBox">

<!-- OGP hidden -->
<table class="form-table">
<tr>
<th><?php _e('Do not output the OGP', 'biz-vkExUnit'); ?></th>
<td>
<p><?php _e('If other plug-ins are used for the OGP, do not output the OGP using this plugin.', 'vkExUnit'); ?></p>
<?php
$ogTagDisplay = (isset($options['ogTagDisplay'])) ? $options['ogTagDisplay'] : 'ogp_on';
$vkExUnit_ogpTags = array(
	'ogp_on' 	=> __('Output OGP tags(default)', 'vkExUnit'),
	'ogp_off' 	=> __('Do not output OGP tags', 'vkExUnit')
	);
foreach( $vkExUnit_ogpTags as $vkExUnit_ogpTagValue => $vkExUnit_ogpTagLavel) {
	if ( $vkExUnit_ogpTagValue == $ogTagDisplay ) { ?>
	<label><input type="radio" name="vkExUnit_sns_options[ogTagDisplay]" value="<?php echo $vkExUnit_ogpTagValue ?>" checked> <?php echo $vkExUnit_ogpTagLavel ?></label><br />
	<?php } else { ?>
	<label><input type="radio" name="vkExUnit_sns_options[ogTagDisplay]" value="<?php echo $vkExUnit_ogpTagValue ?>"> <?php echo $vkExUnit_ogpTagLavel ?></label><br />
	<?php }
} ?>
</td>
</tr>
<tr>
<th><?php _e('facebook application ID', 'vkExUnit'); ?></th>
<td><input type="text" name="vkExUnit_sns_options[fbAppId]" id="fbAppId" value="<?php echo esc_attr( $options['fbAppId'] ); ?>" />
<span>[ <a href="https://developers.facebook.com/apps" target="_blank">&raquo; <?php _e('I will check and get the application ID', 'vkExUnit'); ?></a> ]</span><br />
<?php _e('* If an application ID is not specified, neither a Like button nor the comment field displays and operates correctly.', 'vkExUnit'); ?><br />
<?php _e('Please search for terms as [get Facebook application ID] If you do not know much about how to get application ID for Facebook.', 'vkExUnit'); ?>
</td>
</tr>
<!-- OGP -->
<tr>
<th><?php _e('OG default image', 'vkExUnit'); ?></th>
<td><?php _e('If, for example someone pressed the Facebook [Like] button, this is the image that appears on the Facebook timeline.', 'vkExUnit'); ?><br />
<?php _e('If a featured image is specified for the page, it takes precedence.', 'vkExUnit'); ?><br />
<input type="text" name="vkExUnit_sns_options[ogImage]" id="ogImage" value="<?php echo esc_attr( $options['ogImage'] ); ?>" /> 
<button id="media_ogImage" class="media_btn button"><?php _e('Select an image', 'vkExUnit'); ?></button><br />
<span><?php _e('ex) ', 'vkExUnit') ;?>http://www.vektor-inc.co.jp/images/ogImage.png</span><br />
<?php _e('* Picture sizes are 300x300 pixels or more and picture ratio 16:9 is recommended.', 'vkExUnit'); ?>
</td>
</tr>
</table>
<?php submit_button(); ?>