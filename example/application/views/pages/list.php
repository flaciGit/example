<?php

	if(isset($users) && !empty($users)){
		echo "<div class='title'>Felhasználók kilistázása:</div>";
		echo  "<table id='listtable' class='table table-striped'>
    		<thead>
    			<tr>
    				<td>Név</td>
    				<td>Felhasználónév</td>
					<td>E-mail cím</td>
					
    				<td>Delete</td>
					<td>Edit</td>
    			</tr>
    		</thead>
    		<tbody>";

	
		foreach ($users as $row) {
			echo "<tr>
    				<td>" . $row->name . "</td>
					<td>" . $row->username . "</td>
					<td>" . $row->email . "</td>

    				<td>" .
						anchor("pages/delete/".$row->id,"Delete",array('onclick' => "return confirm('Do you want delete this record')")) .
						"</td>" . 
					"<td>" .
						"<a href='". base_url('pages/update/'.$row->id) . "'>Edit</a>" . 
						"</td>" . 
    			"</tr>";
		}

		echo "</tbody>
    	</table>";
	}
	else
		echo "NO DATA FOUND";

?>
