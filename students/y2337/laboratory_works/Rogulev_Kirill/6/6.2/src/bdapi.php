<?php


function bd_connect($host, $bd_name, $bd_user, $bd_pass){
	return pg_connect("$host $bd_name $bd_user $bd_pass");
	
}

function bd_myconnect(){
		return bd_connect('host=localhost','dbname=rogulev','user=postgres','password=password');
}
function bd_close($db){
	pg_close($db);	
}
function parsePost($POST, &$t_name, &$data){
	
}
function bd_add($db,$table_name,$data){

	if(pg_insert($db, $table_name, $data))
		echo "Success";
	else
		echo "Error";
	
}

function bd_sel($db,$table_name){
	if($table_name != NULL){
		
	echo '<h3>Все данные таблицы '. $table_name . ':</h3>';
		$query = 'select * from gostinitsa.' . $table_name;
		$result = pg_query($db, $query);
		echo '<table border=1>';
		echo '<tr>';
		for ($i=0; $i<pg_num_fields($result); $i++) {
			echo '<td>' . pg_field_name($result, $i) . '</td>';
		}
		echo '</tr>';
		while ($row = pg_fetch_row($result)) {
			echo '<tr>';
			foreach ($row as $field) {
				echo '<td>' . $field . '</td>';
			}
			echo '</tr>';
		}
		echo '</table>';
	}
}

function bd_del($db,$table_name,$field,$value){
	$todel = Array($field => $value);
	
	if(pg_delete($db, $table_name, $todel))
		echo 'Success';
	else
		echo 'Error';
	
}

?>