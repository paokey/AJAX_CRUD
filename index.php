<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a href="#" class="navbar-brand"><b>PHP Demo</b> | Powered by DICT</a>
		</div>
	</nav>
	<div class="col-md-2"></div>
	<div class="col-md-7 well">
		<h3 class="text-primary"><center>Simple CRUD Application</center></h3>
		<hr style="border-top:1px dotted #ccc;" />
		<div class="col-md-3">
			<form method="POST" action="add.php">
				<div class="form-group">
					<label>Name</label>
					<input class="form-control" type="text" name="name"/>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="text" name="email"/>
				</div>
				<div class="form-group">
					<label>Password</label> 
					<input class="form-control" type="text" name="password"/>
				</div>
				<div class="form-group">
					<button class="btn btn-primary form-control" type="submit" name="save">Save</button>
				</div>
			</form>
		</div>
		<div class="col-md-9">
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT * FROM `user`");
						$sql->execute();
						while($fetch = $sql->fetch()){
					?>
					<tr>
						<td><?php echo $fetch['name']?></td>
						<td><?php echo $fetch['email']?></td>
						<td><?php echo $fetch['password']?></td>
						<td><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $fetch['user_id']?>">Edit</button> | <a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $fetch['user_id']?>">Delete</a></td>
					</tr>
					
					<div class="modal fade" id="update<?php echo $fetch['user_id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<form method="POST" action="update.php">
									<div class="modal-header">
										<h3 class="modal-title">Update User</h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<div class="form-group">
												<label>Name</label>
												<input class="form-control" type="text" value="<?php echo $fetch['name']?>" name="name"/>
												<input type="hidden" value="<?php echo $fetch['user_id']?>" name="user_id"/>
											</div>
											<div class="form-group">
												<label>Email</label>
												<input class="form-control" type="text" value="<?php echo $fetch['email']?>" name="email"/>
											</div>
											<div class="form-group">
												<label>Password</label> 
												<input class="form-control" type="text" value="<?php echo $fetch['password']?>" name="password"/>
											</div>
											<div class="form-group">
												<button class="btn btn-warning form-control" type="submit" name="update">Update</button>
											</div>
										</div>	
									</div>	
									<br style="clear:both;"/>
									<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>	
					
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>
</html>