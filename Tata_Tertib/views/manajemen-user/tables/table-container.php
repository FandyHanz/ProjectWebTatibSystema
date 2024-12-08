<div class="table-container">
    <h1>List Pelanggaran Mahasiswa</h1>
<?= $text?>
    <!-- toggle button untuk navigasi table -->
    <div class="table-nav" data-toggle="buttons">
        <ul id="tab-nav">
            <li class="nav-table-button active"><a href="#Mahasiswa"><img src="assets/icon/student-icon.svg" class="icon" style="opacity: 1;" alt="">Mahasiswa</a></li>
            <li class="nav-table-button"><a href="#Dosen"><img src="assets/icon/teacher-icon.svg" class="icon" style="opacity: 1;" alt="">Dosen</a></li>
            <li class="nav-table-button"><a href="#Contact"><img src="assets/icon/karyawan-icon.svg" class="icon" style="opacity: 1;" alt="">Karyawan</a></li>
        </ul>
    </div>
    <div class="line">
        <div class="line-active" id="line-active"></div>
    </div>
    <div class="filter d-flex flex-row justify-content-between align-items-center mx-auto mb-4">
        <div class="filter-button" id="filter-button">
            <a href="#" class="btn btn-light d-inline-flex" style="gap:10px;">
                <img src="assets/icon/book-open-icon.svg" alt=""> Program Studi
                <img src="assets/icon/caret-down-icon-filter.svg" alt="">
            </a>
            <a href="#" class="btn btn-light d-inline-flex" style="gap:10px;"><img src="assets/icon/classroom-icon.svg" alt="">Kelas<img src="assets/icon/caret-down-icon-filter.svg" alt=""></a>
            <a href="#" class="btn btn-light d-inline-flex" style="height: 38px;"><img src="assets/icon/filter-icon.svg" alt=""></a>
        </div>
        <div class="search">
            <form action="">
                <div class="form-group">
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                </div>
            </form>
        </div>
    </div>

    <!-- Tempat untuk memuat konten tabel -->
    <div id="table-content-container" class="table-content-container">
        <!-- Konten tabel akan dimuat di sini -->
    </div>
</div>