document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27 && GUI.paused == 0) {
        GUI.paused = 1;
        $('.list').fadeIn(400);
    }else if (evt.keyCode == 27 && GUI.paused == 1){
		GUI.paused = 0;
		$('.list').fadeOut(400);
	}
};

$( document ).ready(function() {
	$( "#resume" ).click(function() {
  		GUI.paused = 0;
		$('.list').fadeOut(400);
	});
     $( "#exit" ).click(function() {
  		window.location.href = "https://www.discordapp.com";
	});
	$( "#restart" ).click(function() {
  		window.location.href = window.location.href;
	});
});
