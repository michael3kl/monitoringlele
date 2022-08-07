<div class="content">
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
        </div>
        <form action="<?= base_url(); ?>farmer/agenda" method="post">

            <div class="row">
                <div class="col-md-3" id="col_hari">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title">Pilih Hari</h4>
                        </div>
                        <div class="card-body">

                            <select name="hari" id="hari" class="form-control" required>
                                <option value="">-- Pilih Hari --</option>
                                <?php
                                foreach ($hari as $hari) {
                                    echo "<option value='" . $hari->hari . "'>" . $hari->hari . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" id="col_customer">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Pilih Customer</h4>
                        </div>
                        <div class="card-body">
                            <select name="customer" id="customer" class="form-control" disabled="" required>
                                <option value="">-- Pilih Customer --</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" id="col_bibit">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Pilih Bibit</h4>
                        </div>
                        <div class="card-body">
                            <select name="bibit" id="bibit" class="form-control" disabled="" required>
                                <option value="">-- Pilih BIBIT --</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" id="col_kolam">
                    <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">Pilih Kolam</h4>
                        </div>
                        <div class="card-body">
                            <select name="kolam" id="kolam" class="form-control" disabled="" required>
                                <option value="">-- Pilih KOLAM --</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-3" id="col_tanggal">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Pilih Tanggal</h4>
                        </div>
                        <div class="card-body">
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo date('d/m/Y') ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Isi Agenda</button>
        </form>
    </div>
</div>
<script src="<?= base_url(); ?>template/admin/assets/js/jquery-3.3.1.js"></script>
<script>
    $(document).ready(function() {
        var hari = document.getElementById('hari');
        var customer = document.getElementById('customer');
        $("#hari").on('change', function() {
            // var hari = $(this).val();
            if (hari == '') {
                $("#customer").prop('disabled', true);
            } else {
                $("#customer").prop('disabled', false);
                $.ajax({
                    url: "<?= base_url('farmer/get_customer'); ?>",
                    type: "post",
                    data: {
                        'hari': hari.value
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#customer").html(data);
                    },
                    error: function() {
                        alert('??');
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#customer").on('change', function() {
            var hari = $("#hari").val();
            var customer = $("#customer").val();
            if (customer == '') {
                $("#kolam").prop('disabled', true);
            } else {
                $("#kolam").prop('disabled', false);
                $.ajax({
                    url: '<?= base_url(); ?>farmer/get_kolam',
                    type: 'post',
                    data: {
                        'kode': customer,
                        'hari': hari
                    },
                    success: function(data) {
                        $("#kolam").html(data);
                    },
                    error: function() {
                        alert('?');
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $("#customer").on('change', function() {
            var hari = $("#hari").val();
            var customer = $("#customer").val();
            if (customer == '') {
                $("#bibit").prop('disabled', true);
            } else {
                $("#bibit").prop('disabled', false);
                $.ajax({
                    url: '<?= base_url(); ?>farmer/get_bibit',
                    type: 'post',
                    data: {
                        'kode': customer,
                        'hari': hari
                    },
                    success: function(data) {
                        $("#bibit").html(data);
                    },
                    error: function() {
                        alert('?');
                    }
                });
            }
        });
    });
</script>