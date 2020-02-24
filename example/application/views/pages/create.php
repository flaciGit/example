<form id="createform" method="POST" action="<?php echo base_url() . 'pages/createuser' ?>">
	<table class='table table-striped'>
		<thead>
			<tr>
				<td>Név</td>
				<td>Felhasználónév</td>
				<td>E-mail cím</td>
				<td>Jelszó</td>
				<td>Rövid bemutatkozás</td>

			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input name="name" type="text"/></td>
				<td><input name="username" type="text"/></td>
				<td><input name="email" type="email"/></td>
				<td><input name="password" type="password"/></td>
				<td><textarea name="intro"></textarea></td>

			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" value="Beküldés"/>
				</td>
			</tr>
		</tbody>
	</table>
    
    
</form>
