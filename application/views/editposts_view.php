<script type="text/javascript" src="js/editposts_edit.js"></script>
<?php

$locations_count=$count[0];
$posts_count=$count[1];
$directions_count=$count[2];
$device_list_count=$count[3];


?>

<div class="tabs">
							<ul class="nav nav-tabs">
								<li ><a href="/editlocations">Внесение данных городов<span class="badge"><?php echo $locations_count; ?></span></a></li>
								<li class="active"><a href="/editposts">Внесение данных постов<span class="badge"><?php echo $posts_count; ?></span></a></li>
								<li><a>Внесение данных направлений<span class="badge"><?php echo $directions_count; ?></span></a></li>
								<li><a>Внесение данных Приборов<span class="badge"><?php echo $device_list_count; ?></span></a></li>
							</ul>
						</div>
                     
<div id="edit_form_editposts" class="clearfix">
    <form id="editpost_form"  action="/editposts/setdata" method="post">
    	<h2 align="center">Введите данные поста для добавления</h2>
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

<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 align="center" class="panel-title">Вывод постов:</h3>
  </div>
  <div class="panel-body">
    <?php
global $i;
$i=1;
foreach ($data[0] as $locations) {
	
	
	echo '<h1 align="center">'.$locations['location_name'].'</h1>';
	
	echo '<table class="tableposts col-lg-12 col-md-12 col-xs-12 ">';
	echo '<ul id="sortable">';
	echo '<tr class="fixed-menu do-red"><th class="col-lg-1">Запись</th><th class="col-lg-1">Номер поста</th><th class="col-lg-4">Наименование</th><th class="col-lg-4">Адрес поста</th><th class="col-lg-2">Кнопки управления</th></tr>';
		
		foreach($data[1] as $posts){

			foreach($data[2] as $location_post_consistency){

				if(($location_post_consistency['location_post_consistency_location_id']==$locations['location_id']) and ($location_post_consistency['location_post_consistency_post_id']==$posts['post_id']))
					echo '<tr class="do-blue" data-id="'.$posts['post_id'].'" align="center"><td>'.$i++.'</td><td data-post-number="'.$posts['post_number'].'">'.$posts['post_number'].'</td><td data-post-name="'.$posts['post_name'].'">'.$posts['post_name'].'</td><td data-post-address="'.$posts['post_address'].'">'.$posts['post_address'].'</td><td><button class="edit-button btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-cog"></span>Редактировать</button><span> </span><button class="remove-button btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Удалить</button></td></tr>';
					
		}
	}
	  echo '</ul>';
	echo '</table>';
    
}?>
  </div>
</div>


