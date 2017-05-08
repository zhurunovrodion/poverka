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
		        var $form = $('<form id="modal-form">');		        
		        var $dialog = $('<div class="modal-dialog">');
		        var $okButton = $('<button type="submit" class="btn btn-success">Сохранить</button>');
	            var $cancelButton = $('<button class="btn btn-danger">Отмена</button>');

	            this.$dialog = $dialog;

	        	$content.append($header)
	        			.append($body)
	        			.append($footer);	        			
		        $dialog.append($content);
	        	$footer.append($okButton)
	        			.append($cancelButton)
		        $body.append($form);

				for(var i=0; i<this.fields.length; i++){
					var field = this.fields[i];
					var $inputContainer = $('<div>');
					var $label = $('<label>').text(field.name); //set label text.
					var $input = $('<input type="text">')
									.attr('id', field.id)
									.attr('name', field.id)
									.val(field.value);

					$inputContainer.append($label)
									.append($input);

					$form.append($inputContainer);
				}

				$okButton.on('click', $.proxy(this.okButtonClick, this));
				$cancelButton.on('click', $.proxy(this.cancelButtonClick, this));

				this.applyValidation();
				$dialog.modal('show');
		    };
		   
			InputModal.prototype.applyValidation = function(){
				var $form = this.$dialog.find('form');
				if(this.options.validator){
					$form.validate(this.options.validator);
				}				
			}

	    	InputModal.prototype.okButtonClick = function(e){
	    		var $form = this.$dialog.find('form');
	    		if(!$form.valid()){
	    			return;
	    		}

	    		var $target = $(e.currentTarget);
	    		var $dialog = $target.closest('.modal-dialog');
	    		var $inputs = $dialog.find('input');
    			var result = {};

    			$inputs.each(function(item){
    				var $elem = $(this);
    				var id = $elem.attr('id');

    				result[id] = $elem.val(); //get value from input
    			});

    			this.options.submit(result);
    			this.$dialog.modal('hide');
    			this.$dialog.remove();
	    	}

			InputModal.prototype.cancelButtonClick = function(){
 				this.$dialog.modal('hide');
 				this.$dialog.remove();
			} 

		    $[pluginName] = function ( options ) {
		        var inputModal = new InputModal(options);
		        inputModal.init();
		    }

})( jQuery, window, document );
