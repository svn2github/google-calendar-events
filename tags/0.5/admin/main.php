<div class="wrap">
	<h3><?php _e('Add a New Feed', GCE_TEXT_DOMAIN); ?></h3>

	<a href="<?php echo admin_url('options-general.php?page=' . GCE_PLUGIN_NAME . '.php&action=add'); ?>" class="button-secondary" title="<?php _e('Click here to add a new feed', GCE_TEXT_DOMAIN); ?>"><?php _e('Add Feed', GCE_TEXT_DOMAIN); ?></a>

	<br /><br />
	<h3><?php _e('Current Feeds', GCE_TEXT_DOMAIN); ?></h3>

	<?php
	//Get saved feed options
	$options = get_option(GCE_OPTIONS_NAME);
	//If there are no saved feeds
	if(empty($options)){
	?>

	<p><?php _e('You haven\'t added any Google Calendar feeds yet.', GCE_TEXT_DOMAIN); ?></p>

	<?php //If there are saved feeds, display them ?>
	<?php }else{ ?>

	<table class="widefat">
		<thead>
			<tr>
				<th scope="col"><?php _e('ID', GCE_TEXT_DOMAIN); ?></th>
				<th scope="col"><?php _e('Title', GCE_TEXT_DOMAIN); ?></th>
				<th scope="col"><?php _e('URL', GCE_TEXT_DOMAIN); ?></th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th scope="col"><?php _e('ID', GCE_TEXT_DOMAIN); ?></th>
				<th scope="col"><?php _e('Title', GCE_TEXT_DOMAIN); ?></th>
				<th scope="col"><?php _e('URL', GCE_TEXT_DOMAIN); ?></th>
				<th scope="col"></th>
			</tr>
		</tfoot>

		<tbody>
			<?php 
			foreach($options as $key => $event){ ?>
			<tr>
				<td><?php echo $key; ?></td>
				<td><?php echo $event['title']; ?></td>
				<td><?php echo $event['url']; ?></td>
				<td align="right">
					<a href="<?php echo admin_url('options-general.php?page=' . GCE_PLUGIN_NAME . '.php&action=edit&id=' . $key); ?>"><?php _e('Edit', GCE_TEXT_DOMAIN); ?></a>&nbsp;|&nbsp;<a href="<?php echo admin_url('options-general.php?page=' . GCE_PLUGIN_NAME . '.php&action=delete&id=' . $key); ?>"><?php _e('Delete', GCE_TEXT_DOMAIN); ?></a>
				</td>
			</tr>
			<?php } ?>
		</tbody>

	</table>

	<?php }
	//Get saved general options
	$options = get_option(GCE_GENERAL_OPTIONS_NAME);
	?>

	<br />
	<h3><?php _e('General Options', GCE_TEXT_DOMAIN); ?></h3>
	
	<table class="form-table">
		<tr>
			<th scope="row"><?php _e('Custom stylesheet URL', GCE_TEXT_DOMAIN); ?></th>
			<td>
				<span class="description"><?php _e('If you want to make changes to the default CSS, make a copy of <code>google-calendar-events/css/gce-style.css</code> on your server. Make any 
				changes to the copy. Enter the URL to the copied file below.', GCE_TEXT_DOMAIN); ?></span>
				<br />
				<input type="text" name="gce_general[stylesheet]" value="<?php echo $options['stylesheet']; ?>" size="100" />
			</td>
		</tr><tr>
			<th scope="row"><?php _e('Add JavaScript to footer?', GCE_TEXT_DOMAIN); ?></th>
			<td>
				<span class="description"><?php _e('If you are having issues with tooltips not appearing or the AJAX functionality not working, try ticking the checkbox below.', GCE_TEXT_DOMAIN); ?></span>
				<br />
				<input type="checkbox" name="gce_general[javascript]"<?php checked($options['javascript'], true); ?> value="on" />
			</td>
		</tr><tr>
			<th scope="row"><?php _e('Loading text', GCE_TEXT_DOMAIN); ?></th>
			<td>
				<span class="description"><?php _e('Text to display while calendar data is loading (on AJAX requests).', GCE_TEXT_DOMAIN); ?></span>
				<br />
				<input type="text" name="gce_general[loading]" value="<?php echo $options['loading']; ?>" />
			</td>
		</tr><tr>
			<th scope="row"><?php _e('Error message', GCE_TEXT_DOMAIN); ?></th>
			<td>
				<span class="description"><?php _e('An error message to display to non-admin users if events cannot be displayed for any reason (admins will see a message indicating the cause of the problem).', GCE_TEXT_DOMAIN); ?></span>
				<br />
				<input type="text" name="gce_general[error]" value="<?php echo $options['error']; ?>" size="100" />
			</td>
		</tr>
	</table>

	<br />

	<input type="submit" class="button-primary" value="<?php _e('Save', GCE_TEXT_DOMAIN); ?>" />
</div>