<div class="Decompte" id="DecompteBox">
  <div class="DecompteBox"><div class="DecompteValue" id="DecomptePrefixe">J -</div><div class="DecompteUnitTime"></div></div>
  <div class="DecompteBox"><div class="DecompteValue" id="JoursValue">&nbsp;</div><div class="DecompteUnitTime">Jours</div></div>
  <div class="DecompteBox"><div class="DecompteValue" id="HeuresValue">&nbsp;</div><div class="DecompteUnitTime">Heures</div></div>
  <div class="DecompteBox"><div class="DecompteValue" id="MinutesValue">&nbsp;</div><div class="DecompteUnitTime">Minutes</div></div>
  <div class="DecompteBox"><div class="DecompteValue" id="SecondesValue">&nbsp;</div><div class="DecompteUnitTime">Secondes</div></div>
  <div style="clear:both"></div>
</div>
<script type="text/javascript">
<?php
	//chargement des paramètres WD du script
	//$date_actuelle = date('d-m-Y G:i:s');
	$remcd_activation_date = get_option('remcd_activation_date');
	$remcd_desactivation_date = get_option('remcd_deactivation_date');
	$remcd_event_start_date = get_option('remcd_event_start_date').' '.get_option('remcd_event_start_hour').':00';
	$remcd_event_end_date = get_option('remcd_event_end_date').' '.get_option('remcd_event_end_hour').':00';
	$remcd_during_message = get_option('remcd_during_event_message');
	$remcd_after_message = get_option('remcd_after_event_message');

?>
init_remcd_js_variables('<?=$remcd_activation_date?>','<?=$remcd_desactivation_date?>', '<?=$remcd_event_start_date?>', '<?=$remcd_event_end_date?>', '<?=$remcd_during_message?>','<?=$remcd_after_message?>');
RebourLaunch(<? echo date('Y'); ?>, <?echo date('n')-1; ?>,<? echo date('j'); ?>, <? echo date('G') ?>, <? echo date('i')?>, <? echo date('s'); ?>);
</script>
