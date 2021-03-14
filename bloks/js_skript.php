<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>
		$('#MenuShou').click (function(){
			if ($('#MobilMenu').is(':visible'))
				$('#MobilMenu').hide();
			else
				$('#MobilMenu').show();
		});
		
		$(document).scroll (function(){
			if($(document).width() > 822) {
				 if ($(document).scrollTop()> $('header').height()+10)
				 	$('nav').addClass('fixed');
				 else
				 	$('nav').removeClass('fixed');
				 }
		});
		
		window.onresize = function(event)
		{
			$('#MobilMenu').hide();
		}
		
	</script>