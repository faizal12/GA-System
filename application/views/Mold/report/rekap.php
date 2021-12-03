<?php
$this->load->view('templates/header');

?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card bg-default">
				<h5 class="card-header">
					Stock Card
				</h5>
				<div class="card-body">
					<p class="card-text">
						Item Code : 1121
					</p>
                    <p class="card-text">
						Nama    : asdsad
					</p>
				</div>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Item Code
						</th>
						<th>
							Item Name
						</th>
                        <th>
							Date
						</th>
						<th>
							IN
						</th>
                        <th>
							OUT
						</th>
                        <th>
							Balance
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
                        <td>1</td>
                        <td>1111</td>
                        <td>Asdasd</td>
                        <td>01/01/2021</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
$this->load->view('templates/footer');

?>