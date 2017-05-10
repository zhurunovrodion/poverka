$(document).ready(function(){
	init();	

	function init(){
		initRemoveButtons();
		initEditButtons();
	}

	function initRemoveButtons(){
		$('.remove-button').on('click', function(e){
//			var $element = $(this);
			var $element = $(e.currentTarget);	
			var $tr = $element.closest('tr');
			var id = $tr.attr('data-id');
			

			if(confirm('Точно удалить?')){						
				var ajaxData = {location_id: id};

				$.ajax({
					type: 'POST',
					url: '/editlocations/deletelocation',
					data: ajaxData,
					success: function(response){
						$tr.addClass('success-removing');
						$tr.fadeOut(400, function(){
							$tr.remove();
						});						
					},
					error: function(response){
						alert('ajax error');
					}
				});
			}
		});
	}

	function initEditButtons(){
		$('.edit-button').on('click', function(e){
			var $element = $(e.currentTarget);
			var $tr = $element.closest('tr');

			var id = $tr.attr('data-id');
			
			var name = $tr.find('[data-location-name]').attr('data-location-name');
			

			var validator = {
				rules: {
				 	
				 	name: {
				 		required: true
				 	}
				 },
				 messages: {
				 	
				 	name: {
				 		required: "Обязательно для заполнения!"
				 		
				 	}
				}
			}

			$.inputModal({
				fields: [
				{
					id: 'name',
					value: name,
					name: 'Название города'
				}],
				windowClass: 'edit-posts-modal',
				validator: validator,
				submit: function(data){
					data.id = id;
					callPostUpdate(data);
				}
			});
		});
	}

	function callPostUpdate(data){
		$.ajax({
			type: 'POST',
			url: '/editlocations/updatelocation',
			data: data,
			success: function(response){
				if(response !== 'success'){
					alert('ajax error');
					return;
				}

				updateRow(data);
			}
		});
	}

	function updateRow(data){
		var $tr = $('tr[data-id="'+data.id+'"]');
		$tr.find('[data-location-name]')
			.attr('data-location-name', data.name)
			.text(data.name);
		

		$tr.hide();
		$tr.addClass('success-updating');
		$tr.fadeIn(1000, function(){
			setTimeout(function(){
				$tr.removeClass('success-updating');
			}, 500)
		});
	}
});

/*
$.inputModal({	
	fields: [{
		'id': 'post1' ,
		'value': 'lalal',
		'type': 'text/select'
	}, {
	
	}],
	validate:{
		...
	},
	success: function(data){
		//send data to server
	}
});



*/