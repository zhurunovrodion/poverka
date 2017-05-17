<?php

$locations_count=$count[0];
$posts_count=$count[1];
$directions_count=$count[2];
$device_list_count=$count[3];


?>

<div class="tabs">
							<ul class="nav nav-tabs">
								<li ><a href="/editlocations">Внесение данных городов<span class="badge"><?php echo $locations_count; ?></span></a></li>
								<li ><a href="/editposts">Внесение данных постов<span class="badge"><?php echo $posts_count; ?></span></a></li>
								<li class="active"><a>Внесение данных направлений<span class="badge"><?php echo $directions_count; ?></span></a></li>
								<li><a>Внесение данных Приборов<span class="badge"><?php echo $device_list_count; ?></span></a></li>
							</ul>
						</div>

<div id="edit_form_editdirections" class="clearfix">
    <form id="editdirections_form"  action="/editdirections/setdata" method="post">
    	<h2 align="center">Введите данные направления для добавления</h2>
    	<div id="edit_form_editdirections_inputblock" >
    		<div class="edit_form_editdirections_block_text_input">
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
	    	<div class="select">
		    	<select  name="location_id" required>
		    	<option selected>Выберите пост из списка</option>
		    	<?php
		    		foreach ($data[0] as $locations){
		    			echo '<option value="'.$locations['location_id'].'">'.$locations['location_name'].'</option>';
		    		}
		    	?>
		    	</select>
	    	</div>

	    	</div>
	    	<div class="edit_form_editdirections_block_text_input">
	    		<input class="edit_form_editdirections_inputs" type="text" name="post_number" class="flowerValidation" placeholder="Введите название направления"  >
	    	</div>
	    	
		    <div class="edit_form_editdirections_block_text_input">
		    	<input class="edit_form_editdirections_inputs" type="text" name="post_address" placeholder="Введите количество полос направления"  >  
		    </div> 
		    <input type="submit" id="edit_form_editdirections_submit" value="Добавить направление">
        </div>      
    </form>
</div>