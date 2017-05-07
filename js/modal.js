;(function ( $, window, document, undefined ) {		  
		    var pluginName = 'inputModal',
		        defaults = {
		            propertyName: "value"
		        };
		    // The actual plugin constructor
		    function InputModal(options ) {	       
		        this.options = $.extend( {}, defaults, options);		       
		        this._defaults = defaults;
		        this._name = pluginName;

		        this._setOptions(options); 
		    }

	    	InputModal.prototype._setOptions = function(options){
	    		if(!options){
	    			return;
	    		}

	    		this.fields = options.fields || [];
	    	}

		    InputModal.prototype.init = function () {
		        var $header = $('<div class="modal-header"></div>');
		        var $content = $('<div class="modal-content">');
		        var $body = $('<div class="modal-body">');
		        var $footer = $('<div class="modal-footer">');
		        var $form = $('<form>');		        
		        var $dialog = $('<div class="modal-dialog">');

	        	$content.append($header)
	        			.append($body)
	        			.append($footer);	        			
		        $dialog.append($content);

		        $body.append($form);

				for(var i=0; i<this.fields.length; i++){
					var field = this.fields[i];
					var $inputContainer = $('<div>');
					var $label = $('<label>');
					var $input = $('<input type="text">')
									.attr('id', field.id)
									.val(field.value);

					$inputContainer.append($label)
									.append($input);

					$form.append($inputContainer);
				}

				$dialog.modal('show');
		    };
		   
		    $[pluginName] = function ( options ) {
		        var inputModal = new InputModal(options);
		        inputModal.init();
		    }

})( jQuery, window, document );
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