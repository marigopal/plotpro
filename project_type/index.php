<?php
include ("../include/menu/menu.php");
include ("modal/modals.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Types</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                        <li class="breadcrumb-item active">Project Types</li>
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
                        <div class="card-body">
                            <a href="#" data-toggle="modal" data-target="#projecttype_modal_box"><img src="/img/add_row.png" alt="Smiley face" height="25" width="25" data-toggle="modal" data-target="#new_users" title="New"></a>
                            <table id="product_type_list" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th hidden="">ID</th>
                                        <th>Name</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="_index_product_type_list"></tbody>
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