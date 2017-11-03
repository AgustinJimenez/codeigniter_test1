
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Trace Form</h3>
	</div>

    <div class="box-body">
        <div class="row">

            <div class="col-md-6">
                <div id="map" style="height: 450px; width: 100%;"></div>
            </div>

            <div class="col-md-2" style="overflow-y: auto; max-height: 400px;">
                <ul class="list-group" id="markers-with-index">
                    <a href="#" class="list-group-item active"><b>Using indices</b></a>
                </ul>
            </div>
            
            <div class="col-md-2 col-md-offset-1" style="overflow-y: auto; max-height: 400px; overflow-y: ">
                <ul class="list-group" id="markers-with-coordinates">
                <a href="#" class="list-group-item active"><b>Using coordinates</b></a>
                </ul>
            </div>
            
        </div>
    </div>

</div>

<?= $this->load->view('pages/traces/scripts/main', ['scripts_path' => 'pages/traces/scripts/'], true); ?>
