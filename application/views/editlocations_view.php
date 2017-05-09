<script type="text/javascript" src="js/editlocations_edit.js"></script>
<?php

$locations_count=$count[0];
$posts_count=$count[1];
$directions_count=$count[2];
$device_list_count=$count[3];


?>
<div class="tabs">
							<ul class="nav nav-tabs">
								<li class="active"><a href="/editlocations">Внесение данных городов<span class="badge"><?php echo $locations_count; ?></span></a></li>
								<li ><a href="/editposts">Внесение данных постов<span class="badge"><?php echo $posts_count; ?></span></a></li>
								<li><a>Внесение данных направлений<span class="badge"><?php echo $directions_count; ?></span></a></li>
								<li><a>Внесение данных Приборов<span class="badge"><?php echo $device_list_count; ?></span></a></li>
							</ul>
						</div>


                     
<div id="edit_form_editlocations" class="clearfix">
    <form  action="/editlocations/setdata" method="post">
        <h1>Введите город для добавления</h1>
        
        <input id="edit_form_editlocations_inputs" type="text" name="location_name" placeholder="Введние название города/населенного пункта" autofocus required >   
        
        <input type="submit" id="edit_form_editlocations_submit" value="Добавить город">
        
        
    </form>
</div>

<div id="editlocations_table">
<?php


echo '<table class="table">';
echo '<tr><th>№</th><th>Наименование</th></tr>';
echo '<ul id="sortable">';
foreach ($data[0] as $locations) {
    echo '<tr id="' . $locations['location_id'] . '"><td>' . $locations['location_id'] . '</td>' . '<td><li id="note_' . $locations['location_id'] . '" class="editable"><span class="note" id="n_' . $locations['location_id'] . '">' . $locations['location_name'] . '</span><a href="#"><img src="../images/delete.png" alt="Удалить"></a></li></td></tr>';
    
}
echo '</ul>';
echo '</table>';


?> 
</div>