<script type="text/javascript" src="js/editposts_edit.js"></script>

<div class="header-title">
<h1>Добавление/редактирование постов</h1>
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
	echo '<table class="boxshadow">';
	echo '<ul id="sortable">';
	echo '<tr class="fixed-menu"><th>Запись</th><th>Номер поста</th><th>Наименование</th><th>Адрес поста</th></tr>';
		foreach($data[1] as $posts){
			foreach($data[2] as $location_post_consistency){
				if(($location_post_consistency['location_post_consistency_location_id']==$locations['location_id']) and ($location_post_consistency['location_post_consistency_post_id']==$posts['post_id']))
					echo '<tr class="dogreybg" data-id="'.$posts['post_id'].'" align="center"><td>'.$posts['post_id'].'</td><td>'.$posts['post_number'].'</td><td>'.$posts['post_name'].'</td><td>'.$posts['post_address'].'</td><td><button>Редактировать</button><button class="remove-button">Удалить</button></td></tr>';
					
		}
	}
	  echo '</ul>';
	echo '</table>';
}
