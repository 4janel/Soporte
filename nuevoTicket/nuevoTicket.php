<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Ticket</title>
</head>
<body>

<div class="page-content">
		<div class="container-fluid">

			<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Nuevo Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Nuevo Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">
				<p>
					Desde esta ventana podra generar nuevos tickets de HelpDesk.
				</p>

				<h5 class="m-t-lg with-border">Ingresar Información</h5>

				<div class="row">
					<form method="post" id="ticket_form">

						<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["usu_id"] ?>">

						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tick_titulo">Titulo</label>
								<input type="text" class="form-control" id="tick_titulo" name="tick_titulo" placeholder="Ingrese Titulo">
							</fieldset>
						</div>

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Categoria</label>
								<select id="cat_id" name="cat_id" class="form-control">

								</select>
							</fieldset>
						</div>

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Documentos Adicionales</label>
								<input type="file" name="fileElem" id="fileElem" class="form-control" multiple>
							</fieldset>
						</div>

						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tick_descrip">Descripción</label>
								<div class="summernote-theme-1">
									<textarea id="tick_descrip" name="tick_descrip" class="summernote" name="name"></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
    
</body>
</html>