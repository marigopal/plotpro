<?php
include ("../include/menu/menu.php");
include ("modal/modals_tasklist.php");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tasks</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home/">Home</a></li>
                        <li class="breadcrumb-item active">Tasks</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" data-toggle="modal" data-target="#leads_tasklist_modal"><img src="/img/add_row.png" alt="Smiley face" height="25" width="25" data-toggle="modal" data-target="#new_users" title="New"></a>
                        </div>
                        <div class="card-body">
                            <table id="taskslist" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th hidden="">ID</th>
                                        <th>Project</th>
                                        <th>Lead</th>
                                        <th>Managed By</th>
                                        <th>Task Name</th>
                                        <th>Status</th>
                                        <th>Modified On</th>
                                        <th>Modified By</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="_index_tasklists_report">
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                                </div>
            
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../include/footer.php'); ?>
<script src="jquery/index_tasklist.js" type="text/javascript"></script>
