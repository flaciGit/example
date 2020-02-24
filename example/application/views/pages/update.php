<form id="updateform" method="POST" action="<?php echo base_url() . 'pages/updateuser/' . $userToUpdate['id'] ?>">
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
				<td><input name="name" type="text" value="<?php echo $userToUpdate['name'];?>"/></td>
				<td><input name="username" type="text" value="<?php echo $userToUpdate['username'];?>"/></td>
				<td><input name="email" type="email" value="<?php echo $userToUpdate['email'];?>"/></td>
				<td><input name="password" type="password" value="<?php echo $userToUpdate['password'];?>"/></td>
				<td><textarea name="intro"><?php echo $userToUpdate['intro'];?></textarea></td>

			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" value="Beküldés"/>
				</td>
			</tr>
		</tbody>
	</table>
    
    
</form>