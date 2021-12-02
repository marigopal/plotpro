<?php
include ("../include/menu/menu.php");
include ("modal/modals.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sales</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                        <li class="breadcrumb-item active">Sales</li>
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
                            <a href="#" data-toggle="modal" data-target="#salesplot_modal_box"  onclick="add_sales();"><img src="/img/add_row.png" alt="Smiley face" height="25" width="25" data-toggle="modal" data-target="#new_users" title="New"></a>
                        </div>
                        <div class="card-body">
                            <table id="sales_list" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th hidden="">ID</th>
                                        <th>Lead</th>
                                        <th>Plot</th>
                                        <th>Sqt Value</th>
                                        <th>Total Sqt</th>
                                        <th>Cent Value</th>
                                        <th>Total Cent</th>
                                        <th>Total Cost</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="_index_sales_report">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ('../include/footer.php'); ?>
<script src="jquery/_index.js" type="text/javascript"></script>