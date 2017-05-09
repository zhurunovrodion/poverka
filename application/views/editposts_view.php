<script type="text/javascript" src="js/editposts_edit.js"></script>


<div class="tabs">
							<ul class="nav nav-tabs">
								<li ><a href="/editlocations">Внесение данных городов</a></li>
								<li class="active"><a href="/editposts">Внесение данных постов</a></li>
								<li><a>Внесение данных направлений</a></li>
								<li><a>Внесение данных Приборов</a></li>
							</ul>
						</div>
                     
<div id="edit_form_editposts" class="clearfix">
    <form id="editpost_form"  action="/editposts/setdata" method="post">
    	<h1>Введите данные поста для добавления</h1>
    	<div id="edit_form_editposts_inputblock" >
    		<div class="edit_form_editposts_block_text_input">
    		<div class="select">
		    	<select  name="location_id" required>
		    	<option selected>Выберите город из списка</option>
		    	<?php
		    		foreach ($data[0] as $locations){
		    			echo '<option value="'.$locations['location_id'].'">'.$locations['location_name'].'</option>';
		    		}
		    	?>
		    	</select>
	    	</div>
	    	</div>
	    	<div class="edit_form_editposts_block_text_input">
	    		<input class="edit_form_editposts_inputs" type="text" name="post_number" class="flowerValidation" placeholder="Введите номер поста"  >
	    	</div>
	    	<div class="edit_form_editposts_block_text_input">
		    	<input class="edit_form_editposts_inputs" type="text" name="post_name" placeholder="Введите название поста" autofocus  >
		    </div>
		    <div class="edit_form_editposts_block_text_input">
		    	<input class="edit_form_editposts_inputs" type="text" name="post_address" placeholder="Введите адрес поста"  >  
		    </div> 
		    <input type="submit" id="edit_form_editposts_submit" value="Добавить пост">
        </div>      
    </form>
</div>



<?php
foreach ($data[0] as $locations) {

	echo '<h1 align="center">'.$locations['location_name'].'</h1>';
	echo '<table class="boxshadow col-lg-12 col-md-12 col-xs-12 ">';
	echo '<ul id="sortable">';
	echo '<tr class="fixed-menu"><th class="col-lg-1">Запись</th><th class="col-lg-1">Номер поста</th><th class="col-lg-4">Наименование</th><th class="col-lg-4">Адрес поста</th><th class="col-lg-2">Кнопки управления</th></tr>';
		foreach($data[1] as $posts){
			foreach($data[2] as $location_post_consistency){
				if(($location_post_consistency['location_post_consistency_location_id']==$locations['location_id']) and ($location_post_consistency['location_post_consistency_post_id']==$posts['post_id']))
					echo '<tr class="dogreybg" data-id="'.$posts['post_id'].'" align="center"><td>'.$posts['post_id'].'</td><td data-post-number="'.$posts['post_number'].'">'.$posts['post_number'].'</td><td data-post-name="'.$posts['post_name'].'">'.$posts['post_name'].'</td><td data-post-address="'.$posts['post_address'].'">'.$posts['post_address'].'</td><td><button class="edit-button btn btn-warning" data-toggle="modal" data-target="#myModal">Редактировать</button><span> </span><button class="remove-button btn btn-danger">Удалить</button></td></tr>';
					
		}
	}
	  echo '</ul>';
	echo '</table>';
}
