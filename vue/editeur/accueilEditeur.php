<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualités</title>
	<link rel="stylesheet" type="text/css" href="/diop/assets/datatables.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link rel="stylesheet" href="vue/editeur/inc/style.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="/diop/assets/datatables.js"></script>
</head>
<body>
	<?php require_once 'inc/entete.php';
	
	  
	 ?>
	 <?php 
		require_once 'inc/menu.php'; 
	?>
	<div >
		<ul >
		<a class ="button" href="../../diop/index.php?a=formulaireajout">ajouter article</a>
		<a  class ="button"href="../../diop/?a=lister">lister articles</a>
		<a class ="button" href="../../diop/index.php?a=addcategorie">ajouter Categorie</a>
		<a  class ="button"href="../../diop/?a=listercategorie">lister Categories</a>
	
		</ul>


		<!-- <?php if (!empty($articles)): ?>
			<?php foreach ($articles as $article): ?>
				<div class="article">
					<h1><a href="../../diop/index.php?action=article&id=<?= $article->id ?>"><?= $article->titre ?></a></h1>
					<p><?= substr($article->contenu, 0, 300) . '...' ?></p>
				</div>
			<?php endforeach ?>
		<?php else: ?>
			<div class="message">Aucun article trouvé</div>
		<?php endif ?>
 -->

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