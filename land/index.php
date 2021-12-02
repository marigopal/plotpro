<?php
include ("../include/menu/menu.php");
include ("modal/modals.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lands</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                        <li class="breadcrumb-item active">Lands</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" data-toggle="modal" data-target="#land_modal_box"><img src="/img/add_row.png" alt="Smiley face" height="25" width="25" data-toggle="modal" data-target="#new_users" title="New"></a>
                        </div>
                        <div class="card-body">
                            <table id="land_report" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th hidden="">ID</th>
                                        <th>Land Name</th>
                                        <th>Location</th>
                                        <th>Landmark</th>
                                        <th>Total Acres</th>
                                        <th>Total Value</th>
                                        <th>Total Cent</th>
                                        <th>Square Feet</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="_index_land_report"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ('../include/footer.php'); ?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
<script src="jquery/_index.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeABm6C1O66yUCU4Kic0V90EZgP4o6Vgk&callback=location_autocomplete&libraries=places"></script>