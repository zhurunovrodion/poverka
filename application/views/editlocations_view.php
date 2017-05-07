<script type="text/javascript" src="js/editlocations_edit.js"></script>
<div class="header-title">
<h1>Добавление/редактирование населенного пункта</h1>
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


    echo '<table>';
    echo '<tr><th>№</th><th>Наименование</th></tr>';
    echo '<ul id="sortable">';
    foreach ($data[0] as $locations) {
    echo '<tr id="'.$locations['location_id'].'"><td>'.$locations['location_id'].'</td>'.'<td><li id="note_'.$locations['location_id'].'" class="editable"><span class="note" id="n_'.$locations['location_id'].'">'.$locations['location_name'].'</span><a href="#"><img src="../images/delete.png" alt="Удалить"></a></li></td></tr>';

    }
    echo '</ul>';
    echo '</table>';


?> 
</div>