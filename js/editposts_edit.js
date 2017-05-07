$(document).ready(function(){
	init();	

	function init(){
		initRemoveButtons();
	}

	function initRemoveButtons(){
		$('.remove-button').on('click', function(e){
//			var $element = $(this);
			var $element = $(e.currentTarget);	
			var $tr = $element.closest('tr');
			var id = $tr.attr('data-id');

			$.ajax({
				type: 'POST',
				url: '/editposts/deletepost',
				data: {post_id: id},
				success: function(response){
					$tr.remove();
				},
				error: function(response){
					alert('ajax error');
				}
			});
		});
	}
});