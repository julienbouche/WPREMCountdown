jQuery(document).ready(function(){ 
    jQuery(document).pngFix(); 
});

jQuery(document).ready(function() { 
jQuery("#dropmenu ul").css({display: "none"}); // Opera Fix 
jQuery("#dropmenu li").hover(function(){ 
        jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(268); 
        },function(){ 
        jQuery(this).find('ul:first').css({visibility: "hidden"}); 
        });
		 
}); 


/*$dateFinJsYear=2012;
$dateFinJsMonth=06; //de 0 à 11 en javascript
$dateFinJsDay=27;
$dateFinJsHour=16;
$dateFinJsMinutes=0;
$dateFinJsSeconds=0;

$date2FinJsYear=2012;
$date2FinJsMonth=06; //de 0 à 11 en javascript
$date2FinJsDay=28;
$date2FinJsHour=02;
$date2FinJsMinutes=00;
$date2FinJsSeconds=0;*/


var $date1;// = new Date($dateFinJsYear, $dateFinJsMonth, $dateFinJsDay, $dateFinJsHour, $dateFinJsMinutes, $dateFinJsSeconds);
var $dateFinFestival;// = new Date($date2FinJsYear, $date2FinJsMonth, $date2FinJsDay, $date2FinJsHour, $date2FinJsMinutes, $date2FinJsSeconds);
var $date2;
var $PendantLeFestival;
var $ApresLeFestival;

var $temps = 0;

function init_remcd_js_variables($remcd_activation_date_str,$remcd_desactivation_date_str, $start_date_str, $end_date_str, $during_msg, $after_msg){

	$currentdate = new Date();
	
	//conversion des dates en date js
	//mois commençant à 0 -> -1
	$activate_date = new Date($remcd_activation_date_str.substring(6,10),$remcd_activation_date_str.substring(3,5)-1,$remcd_activation_date_str.substring(0,2));
	$deactivate_date = new Date($remcd_desactivation_date_str.substring(6,10),$remcd_desactivation_date_str.substring(3,5)-1,$remcd_desactivation_date_str.substring(0,2));

	$event_start_date = new Date($start_date_str.substring(6,10),$start_date_str.substring(3,5)-1,$start_date_str.substring(0,2), $start_date_str.substring(11,13), $start_date_str.substring(14,16), $start_date_str.substring(17,19));
	$event_end_date = new Date($end_date_str.substring(6,10),$end_date_str.substring(3,5)-1,$end_date_str.substring(0,2), $end_date_str.substring(11,13), $end_date_str.substring(14,16), $end_date_str.substring(17,19));
	
	//2 heures de décalage
	$event_start_date.setHours($event_start_date.getHours()-2);	
	$event_end_date.setHours($event_end_date.getHours()-2);

	if($currentdate-$activate_date>0 && $currentdate-$deactivate_date<0 ){
		document.getElementById("DecompteBox").style.visibility='visible';
		$date1 = $event_start_date;
		$dateFinFestival = $event_end_date;
		$PendantLeFestival = $during_msg;
		$ApresLeFestival = $after_msg;
	}
	else{
		document.getElementById("DecompteBox").style.visibility='hidden';
	}
}

function loadTimeValue($days, $hours, $minutes, $seconds){
  document.getElementById('JoursValue').innerHTML = $days;
  document.getElementById('HeuresValue').innerHTML = $hours;
  document.getElementById('MinutesValue').innerHTML = $minutes;
  document.getElementById('SecondesValue').innerHTML = $seconds;
	
}

function Rebour() {
   var sec=(($date1 - $date2)/1000)-$temps;
   var n=24*3600;
   if (sec>0) {
      j=Math.floor(sec/n);
      h=Math.floor((sec-(j*n))/3600)+"";
      mn=Math.floor((sec-((j*n+h*3600)))/60)+"";
      sec=Math.floor(sec-((j*n+h*3600+mn*60)))+"";
      
      if(h.length==1) h="0"+h;
      if(mn.length==1) mn="0"+mn;
      if(sec.length==1) sec="0"+sec;
      
      loadTimeValue(j,h,mn,sec);
      $temps++;

      tRebour=setTimeout("Rebour();",1000);
   }
   else {
	sec=(($dateFinFestival - $date2)/1000)-$temps;
   	n=24*3600;
   	if(sec>0){
		loadMessage($PendantLeFestival);
		$temps++;
		tRebour=setTimeout("Rebour();",1000);
	}
	else loadMessage($ApresLeFestival);
   }
}

function RebourLaunch($y, $m, $day, $h, $mn, $sec){
	$date2 = new Date($y, $m, $day, $h, $mn, $sec);
	Rebour();
}

function loadMessage($msg){
	var box = document.getElementById("DecompteBox");
	box.innerHTML = "<div class=\"DecompteBox\"><div class=\"DecompteValue\" >"+$msg+"</div><div class=\"DecompteUnitTime\"></div></div>";
}

