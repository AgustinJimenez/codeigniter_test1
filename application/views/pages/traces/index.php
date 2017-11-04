
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Trace Form</h3>
	</div>

    <div class="box-body">
        <div class="row">

            <div class="col-md-6">
                <div id="gmap"  style="height: 450px; width: 100%;"></div>
            </div>

            <div class="col-md-6" style="overflow-y: auto; max-height: 400px; height: 100px" id="controls">
            </div>
            
        </div>
    </div>

</div>

<?= $this->load->view('pages/traces/scripts/main', ['scripts_path' => 'pages/traces/scripts/'], true); ?>
