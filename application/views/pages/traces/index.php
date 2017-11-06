<?= $this->load->view('pages/traces/styles', null, true); ?>

<div class="row">

    <div class="col-md-6">
        <div class="box container">
            <div class="box-body">
                <div class="row">
                    <div id="map"  style="height: 450px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <form action="#" method="post" accept-charset="utf-8">
        <div class="col-md-6">
            <div class="box container">
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="text-center">ORIGIN</h3>
                            <input type="text" class="form-control" id="origin" name="trace[start]" placeholder="Latitude, Longitude" />
                        </div>

                        <div class="col-md-6">
                            <h3 class="text-center">END</h3>
                            <input type="text" class="form-control" id="end" name="trace[end]" placeholder="Latitude, Longitude"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <div class="form-group">
                                <h3 class="text-center">WAYPOINT</h3>
                                <input type="text" class="form-control" />
                            </div>
                            <div style="overflow-y: auto; max-height: 300px;">
                                <table class="table table-bordered table-condensed table-responsive" id="waypoints-table">
                                    <thead>
                                        <tr>
                                            <td class="text-center" colspan="10">
                                                added waypoints
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td class="text-center">
                                            <input type="text" class="form-control white-input" readonly="readonly" name="trace[waypoints][][point]"/>
                                        </td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="panel"></div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary btn-block" value="save" id="submit"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


<?= $this->load->view('pages/traces/scripts/main', ['scripts_path' => 'pages/traces/scripts/'], true); ?>
