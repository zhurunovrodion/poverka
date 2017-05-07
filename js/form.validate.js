$(function() {
	$("#editpost_form").validate({
		 rules: {
		 	post_number: {
		 		required: true,
		 		digits: true

		 	},
		 	post_name: {
		 		required: true
		 	},
		 	post_address: {
		 		required: true
		 	},
		 	location_id: {
		 		digits: true
		 	}
		 },
		 messages: {
		 	post_number: {
		 		required: "Обязательно для заполнения!",
		 		digits: "Должно содержать только цифры!"
		 	},
		 	post_name: {
		 		required: "Обязательно для заполнения!",
		 		
		 	},
		 	post_address: {
		 		required: "Обязательно для заполнения!",
		 		
		 	},
		 	location_id: {
		 		digits: "Выберите город!"
		 	}
		 }
	});

});