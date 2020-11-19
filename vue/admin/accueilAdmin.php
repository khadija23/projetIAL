
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>Actualites</title>
<link rel="stylesheet" type="text/css" href="/diop/assets/datatables.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="/diop/assets/datatables.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


</head>
<body>

	<?php require_once 'inc/entete.php';
	 ?>
	 <link rel="stylesheet" href="vue/admin/inc/style.css">
	 <ol class="list-type1">
	 <li><a href="../../diop/index.php?a=formulaireAjout">ajouter article</a>
        </li>
		<li><a href="../../diop/index.php?a=lister">lister articles</a></li>
		<li><a class ="button" href="../../diop/index.php?a=addcategorie">ajouter Categorie</a></li>
		<li><a  class ="button"href="../../diop/?a=listercategorie">lister Categories</a></li>
		<li>
         <a href="../../diop/index.php?a=ajouterutilisateur">creer utilisateur</a></li>
		
        <li><a href="../../diop/index.php?a=listerUtilisateur	">lister utilisateurs</a></li>
		</ol>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gestion <b >Articles</b></h2>
					</div>
				
				</div>
			</div>
			<table class="table table-striped table-hover" id="table_id">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Titre</th>
						<th>Contenu</th>
						
						
						
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php foreach ($articles as $article): 

							?>
							
			
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td><a href="index.php?a=article&id=<?= $article->id ?>"><?= $article->titre ?></a></td>
						<td><p><?= substr($article->contenu, 0, 100) . '...' ?></p></td>
						
						
						
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			
		</div>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/diop/index.php" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Ajouter articles</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Titre</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Contenu</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Categorie</label>
						<select class="form-control" required>
							<option>politique</option>
							<option>Religion</option>
							<option>Societe</option>
						</select>
					</div>
									
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Editer article/h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Titre</label>
						<input type="text" class="form-control" value="<?php echo $article->titre ?>" required>
					</div>
					<div class="form-group">
						<label>Contenu</label>
						<input type="email" class="form-control" value="<?php echo $article->contenu ?>" required>
					</div>
					<div class="form-group">
						<label>Categorie</label>
						<select class="form-control" required>
						<?php foreach ($categories as $category) {
			
							if($category->id === $categorie->id){

								echo "<option value=$category->id selected>$category->libelle</option>";

							}else{

								echo "<option value=$category->id>$category->libelle</option>";

							}


						} 

						?>
					</select>
					</div>
								
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="modifier" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){

    $('#table_id').DataTable();
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</body>
</html>