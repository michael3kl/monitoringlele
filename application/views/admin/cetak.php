<style>
    th {
        text-align: center;
        padding: 10px;
        vertical-align: middle;
    }

    td {
        padding-left: 5px;
        vertical-align: super;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cetak
            <small>Agenda Monitoring</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    Home</a>
            </li>
            <li class="active">Cetak</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua">
                        <i class="fa fa-search"></i>
                    </span>
                    <form action="<?= base_url() ?>admin/print" target="_blank" method="post">
                        <div class="info-box-content">
                            <span class="info-box-text">Pilih Petani</span>
                            <br>
                            <select name="farmer" id="farmer" class="form-control" required>
                                <option value="">
                                    -- Pilih Petani --
                                </option>

                                <?php
                                foreach ($farmer as $datafarmer) {
                                ?>
                                    <option value="<?= $datafarmer->email; ?>"><?= $datafarmer->nama; ?></option>
                                <?php
                                }; ?>
                            </select>

                        </div>
                        <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-print"></i>Cetak Agenda</button>
            </div>
            </form>
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

        </div>
        <!-- /.row -->

        <div class="row" id="tempat" style="display:none;">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agenda Monitoring</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button> -->
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12" id="tampil">

                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->

                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
        var tempat = document.getElementById('tempat');

        $("#farmer").on('change', function() {

            tempat.style.display = 'block';

            var farmer = $(this).val();

            $.ajax({
                method: 'post',
                url: '<?= base_url() ?>admin/get_cetak',
                data: {
                    farmer: farmer
                },
                type: 'json encode',
                success: function(data) {
                    $("#tampil").html(data);
                },
                error: function() {
                    alert('error');
                }
            });


        });

    });
</script>