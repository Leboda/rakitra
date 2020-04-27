<div class="container-fluid">
    <div class="row clearfix">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	        <div class="card">
	            <div class="header bg-red">
	                <h2>
	                   Liste des transactions
	                </h2>
	            </div>
	            <div class="body">
	                <div class="message"></div>
	                <br>
	                <br>
				    <div class="row clearfix">
					    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">		                  
					        <div class="body">
					            <div class="table-responsive">
					                <table class="table table-bordered table-striped table-hover list-transaction dataTable">
					                    <thead>
					                        <tr>
						    					<th>Eglise</th>
					                            <th>Fidéle</th>
						    					<th>Montant (En Ar)</th>
						    					<th>Date</th>
						    					<th>Status</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <?php foreach ($transaction as $t) { ?>
						    					<tr>
						    						<td><?php echo utf8_encode($this->egliseModel->getNameByIdCompte($t->id_compte)); ?></td>
						    						<td><?php echo utf8_encode($this->fideleModel->getNameById($t->id_fidele)); ?></td>
						    						<td><?php echo utf8_encode($t->montant); ?></td>
						    						<td><?php echo utf8_encode(date('d-m-Y',$t->date)); ?></td>
						    						<td><?php echo utf8_encode($t->status); ?></td>
						    						
						    					</tr>
						    				<?php } ?>
					                        
					                    </tbody>
					                </table>
					            </div>
					        </div>
					    </div>
					</div> 
				</div>  
			</div>
		</div>
	</div>
</div>