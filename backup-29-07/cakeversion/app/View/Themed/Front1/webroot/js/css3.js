 $(function() {
    if (window.PIE) {        
		$('.news_updates_container').each(function() {
            PIE.attach(this);
        });
		$('.roundedbox_contanier').each(function() {
            PIE.attach(this);
        });
		$('.second_roundedbox_contanier').each(function() {
            PIE.attach(this);
        });
		$('.container_right').each(function() {
            PIE.attach(this);
        });
		$('.contact_map').each(function() {
            PIE.attach(this);
        });
				
 }
});