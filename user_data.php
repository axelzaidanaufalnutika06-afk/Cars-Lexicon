<table class="table table-hover border">
    <thead class="table-dark">
        <tr>
            <th class="text-center" style="width: 5%;">No</th>
            <th class="text-start" style="width: 25%;">Username</th>
            <th class="text-center" style="width: 45%;">Foto</th> 
            <th class="text-end" style="width: 25%;">Aksi</th> 
        </tr>
    </thead>
    <tbody>
        <?php
        include "koneksi.php";
        
        $hlm = (isset($_POST['hlm'])) ? $_POST['hlm'] : 1;
        $limit = 5; 
        $limit_start = ($hlm - 1) * $limit;
        $no = $limit_start + 1;

        $sql = "SELECT * FROM user ORDER BY id DESC LIMIT $limit_start, $limit";
        $hasil = $conn->query($sql);

        while ($row = $hasil->fetch_assoc()) {
        ?>
            <tr>
                <td class="text-center align-middle"><?= $no++ ?></td>
                <td class="align-middle"><strong><?= $row["username"] ?></strong></td>
                <td class="text-center align-middle"> 
                    <?php if ($row["foto"] != '' && file_exists('img/' . $row["foto"])) { ?>
                        <img src="img/<?= $row["foto"] ?>" width="100" class="img-thumbnail shadow-sm">
                    <?php } else { echo "-"; } ?>
                </td>
                <td class="text-end align-middle">
                    <div class="pe-3"> 
                        <a href="#" class="badge rounded-pill text-bg-success p-2" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <a href="#" class="badge rounded-pill text-bg-danger p-2" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    </div>

                    <div class="modal fade text-start" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Edit User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?= $row["username"] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ganti Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ganti">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Ganti Foto</label>
                                            <input type="file" class="form-control" name="foto">
                                        </div>
                                        <div class="mb-3 text-center">
                                            <label class="form-label d-block text-start">Foto Lama</label>
                                            <img src="img/<?= $row["foto"] ?>" width="100" class="img-thumbnail">
                                            <input type="hidden" name="foto_lama" value="<?= $row["foto"] ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade text-start" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5">Konfirmasi Hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="post" action="">
                                    <div class="modal-body">
                                        <p>Yakin menghapus user "<strong><?= $row["username"] ?></strong>"?</p>
                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                        <input type="hidden" name="foto" value="<?= $row["foto"] ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <input type="submit" value="hapus" name="hapus" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php 
$sql1 = "SELECT id FROM user";
$hasil1 = $conn->query($sql1); 
$total_records = $hasil1->num_rows;
?>

<div class="d-flex justify-content-between align-items-center mt-3">
    <p class="mb-0 text-muted small">Total User : <?= $total_records; ?></p>
    <nav>
        <ul class="pagination pagination-sm mb-0">
        <?php
            $jumlah_page = ceil($total_records / $limit);
            $jumlah_number = 1; 
            $start_number = ($hlm > $jumlah_number)? $hlm - $jumlah_number : 1;
            $end_number = ($hlm < ($jumlah_page - $jumlah_number))? $hlm + $jumlah_number : $jumlah_page;

            if($hlm == 1){
                echo '<li class="page-item disabled"><a class="page-link">First</a></li>';
                echo '<li class="page-item disabled"><a class="page-link">&laquo;</a></li>';
            } else {
                $link_prev = ($hlm > 1)? $hlm - 1 : 1;
                echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                echo '<li class="page-item halaman" id="'.$link_prev.'"><a class="page-link" href="#">&laquo;</a></li>';
            }

            for($i = $start_number; $i <= $end_number; $i++){
                $active = ($hlm == $i)? ' active' : '';
                echo '<li class="page-item halaman '.$active.'" id="'.$i.'"><a class="page-link" href="#">'.$i.'</a></li>';
            }

            if($hlm == $jumlah_page || $jumlah_page == 0){
                echo '<li class="page-item disabled"><a class="page-link">&raquo;</a></li>';
                echo '<li class="page-item disabled"><a class="page-link">Last</a></li>';
            } else {
                $link_next = ($hlm < $jumlah_page)? $hlm + 1 : $jumlah_page;
                echo '<li class="page-item halaman" id="'.$link_next.'"><a class="page-link" href="#">&raquo;</a></li>';
                echo '<li class="page-item halaman" id="'.$jumlah_page.'"><a class="page-link" href="#">Last</a></li>';
            }
        ?>
        </ul>
    </nav>
</div>