<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Product List</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button {
	box-sizing: border-box;
	display: inline-block;
	min-width: 1.5em;
	padding: 1px;
	margin-left: 2px;
	text-align: center;
	text-decoration: none !important;
	cursor: pointer;
	color: #333 !important;
	border: 1px solid transparent;
	border-radius: 2px;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a href="#" class="navbar-brand">DEMO.COM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="#" class="nav-link">Home</a>
      </li>      
    </ul>
  </div>  
</nav> 
<div class="container">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12">
				<h1>Iteam List<br>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addIteamModal"><span class="fa fa-plus"></span> Add New</a></div><br>
                </h1>
            </div>            
            <table class="table table-striped" id="iteamListing">
                <thead>
                    <tr>
                        <th>ID</th>
						<th>Iteam Name</th>
                        <th>Price</th>
						<th>Description</th>
						<th>Time</th>

                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="listRecords">                    
                </tbody>
            </table>
        </div>
    </div>
        
</div>	
<form id="saveIteamForm" method="post">
	<div class="modal fade" id="addIteamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add New Iteam</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">                       
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Product Name*</label>
					<div class="col-md-10">
					  <input type="text" name="product_name" id="product_name" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Price*</label>
					<div class="col-md-10">
					  <input type="text" name="price" id="price" class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Description*</label>
					<div class="col-md-10">
					  <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<form id="editIteamForm" method="post">
	<div class="modal fade" id="editIteamModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="editModalLabel">Edit Iteam</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Product Name*</label>
					<div class="col-md-10">
					  <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Name" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Price*</label>
					<div class="col-md-10">
					  <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Age" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Description*</label>
					<div class="col-md-10">
					   <textarea name="description_edit" id="description_edit" class="form-control" rows="5" required></textarea>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			 <input type="hidden" name="iteamId" id="iteamId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Update</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/crud_operation.js'?>"></script>
</body>
</html>
