jQuery(document).ready(function($) {
	$("#phone").submit(function() {
		var str = $(this).serialize();
		var delay = 3000;
		$.ajax({
			type: "POST",
			url: "ASTERISK_HOST",
			data: str,
			success: function(msg) {
				if(msg == 'OK') {
					result = ' Уже звоним :)';
				}
				else {
					result = msg;
				}
				$('#phone').html(result);
			}
		});
		return false;
	});
});

