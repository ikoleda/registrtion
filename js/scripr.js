$(document).ready(function() {

	$('form').submit(function(event) {

		event.preventDefault();//отменяет submit

		$.ajax({
			type: $(this).attr('method'),//получаем метод 
			url: $(this).attr('action'),//получаем файл куда будет отправлены данные
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				alert(result);
			},
		});
		
	});

});