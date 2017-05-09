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
			var number = $tr.find('[data-post-number]').attr('data-post-number');
			var name = $tr.find('[data-post-name]').attr('data-post-name');
			var address = $tr.find('[data-post-address]').attr('data-post-address');

			var validator = {
				rules: {
				 	number: {
				 		required: true,
				 		digits: true
				 	},
				 	name: {
				 		required: true
				 	},
				 	address: {
				 		required: true
				 	}
				 },
				 messages: {
				 	number: {
				 		required: "Обязательно для заполнения!",
				 		digits: "Должно содержать только цифры!"
				 	},
				 	name: {
				 		required: "Обязательно для заполнения!"
				 		
				 	},
				 	address: {
				 		required: "Обязательно для заполнения!"				 		
				 	}
				}
			}

			$.inputModal({
				fields: [{
					id: 'number',
					value: number,
					name: 'Номер'
				},
				{
					id: 'name',
					value: name,
					name: 'Имя поста'
				},
				{
					id: 'address',
					value: address,
					name: 'Адресс'
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
			url: '/editposts/updatepost',
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
		$tr.find('[data-post-number]')
			.attr('data-post-number', data.number)
			.text(data.number);
		$tr.find('[data-post-name]')
			.attr('data-post-name', data.name)
			.text(data.name);
		$tr.find('[data-post-address]')
			.attr('data-post-address', data.address)
			.text(data.address);

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