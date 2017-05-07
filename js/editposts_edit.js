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
				var ajaxData = {post_id: id};

				$.ajax({
					type: 'POST',
					url: '/editposts/deletepost',
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
				submit: function(data){
					sendDataToServer(data);
				}
			});
		});
	}

	function sendDataToServer(data){
		$.ajax({
			type: 'POST',
			url: '/editposts/updatepost',
			data: data,
			success: function(response){
				console.log('success');
			},
			error: function(response){
				alert('ajax error');
			}
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