<script type="text/javascript" src="js/editlocations_edit1.js"></script>
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
        <h2 align="center">Введите город для добавления</h2>
        
        <input id="edit_form_editlocations_inputs" type="text" name="location_name" placeholder="Введние название города/населенного пункта" autofocus required >   
        
        <input type="submit" id="edit_form_editlocations_submit" value="Добавить город">
        
        
    </form>
</div>
<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 align="center" class="panel-title">Вывод городов:</h3>
  </div>
  <div class="panel-body">
<div id="editlocations_table">
<?php


echo '<table class="table">';
echo '<tr><th>№</th><th>Наименование</th><th>Кнопки управления</th></tr>';

foreach ($data[0] as $locations) {
    echo '<tr data-id="'.$locations['location_id'].'"><td>'.$locations['location_id'].'</td><td class="col-lg-9">'.$locations['location_name'].'</td><td class="col-lg-2"><button class="edit-button btn btn-warning" data-toggle="modal" data-target="#myModal">Редактировать</button><span> </span><button class="remove-button btn btn-danger">Удалить</button></td></tr>';
    
}

echo '</table>';


?> 
</div>
  </div>
</div>