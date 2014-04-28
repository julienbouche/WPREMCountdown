<?php
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
?>

<div class="wrap">
	<?php screen_icon(); ?>
	<h2>Options du compte &agrave; rebours</h2>
	<form method="POST" action="options.php">
		<?php @settings_fields('remcountdown-plugin-group'); ?>
		<?php @do_settings_fields('remcountdown-plugin-group'); ?>
		
		<p>Date d'activation du compte &agrave; rebours :<input type="text" name="remcd_activation_date" id="remcd_activation_date" value="<?=get_option('remcd_activation_date');?>" /></p>
		<p>Date de désactivation du compte &agrave; rebours :	<input type="text" name="remcd_deactivation_date" id="remcd_deactivation_date" value="<?=get_option('remcd_deactivation_date');?>" /></p>
		<p>Date de d&eacute;but du festival:	<input type="text" name="remcd_event_start_date" id="remcd_event_start_date" value="<?=get_option('remcd_event_start_date');?>" /> Heure: <input type="text" name="remcd_event_start_hour" id="remcd_event_start_hour" placeholder="hh:mm" value="<?=get_option('remcd_event_start_hour')?>"/></p>
		<p>Date de fin du festival:	<input type="text" name="remcd_event_end_date" id="remcd_event_end_date" value="<?=get_option('remcd_event_end_date');?>" /> Heure: <input type="text" name="remcd_event_end_hour" id="remcd_event_end_hour" placeholder="hh:mm" value="<?=get_option('remcd_event_end_hour')?>"/></p>
		<p>Message à afficher pendant la manifestation:	<input type="text" name="remcd_during_event_message" id="remcd_during_event_message" value="<?=get_option('remcd_during_event_message');?>" /></p>
		<p>Message à afficher après la manifestation:	<input type="text" name="remcd_after_event_message" id="remcd_after_event_message" value="<?=get_option('remcd_after_event_message');?>" /></p>
	
		<?php submit_button(); ?>
	</form>
</div>

<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('#remcd_activation_date').datepicker({
        dateFormat : 'dd-mm-yy'
    });
    jQuery('#remcd_deactivation_date').datepicker({
        dateFormat : 'dd-mm-yy'
    });
    jQuery('#remcd_event_start_date').datepicker({
        dateFormat : 'dd-mm-yy'
    });
    jQuery('#remcd_event_end_date').datepicker({
        dateFormat : 'dd-mm-yy'
    });

});

</script>
