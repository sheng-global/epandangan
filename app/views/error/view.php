
		<div class="wrapper-page">
            <div class="panel panel-<?php echo $data['error_type'] ?> panel-pages">
                <div class="panel-heading"> 
                    <h3 class="text-center m-t-10 text-white">
                        Error Code <?php echo $data['error_code'] ?>
                    </h3>
                </div> 
                <div class="panel-body">
					<p class="text-center">
                        <?php echo $data['error_msg'] ?>
                    </p>
					<div class="text-center m-t-40">
						<button class="btn btn-<?php echo $data['error_type'] ?> btn-lg w-lg waves-effect waves-light" type="button" id="back">Return</button>
					</div>
				</div>
            </div>
        </div>