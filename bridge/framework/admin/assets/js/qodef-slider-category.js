(function($){
	$(document).ready(function() {
        
		$('.advanced-responsiveness select').change(function(){
			if($(this).val() == 'yes'){
				$('.slider-breakpoints').show();
			}else{
				$('.slider-breakpoints').hide();
			}
		}).change();
		
	});
	
})(jQuery);	 