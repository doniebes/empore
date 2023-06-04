@extends('layouts.app')

@section('content')
<div class=""> 
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- ========== Breadcrumbs Start ========== -->
		<div class="card-header card-header-content-sm-between">
			<h1 class="card-header-title mb-2 mb-sm-0">
				<?= isset($title) ? '' . $title : null; ?>
			</h1>
			<!-- Nav -->
			<ul class="nav nav-segment nav-fill">
				<li class="nav-item">
					<a class="nav-link " href="#" >Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active "><?= isset($title) ? '' . $title : null; ?></a>
				</li>
			</ul>
			<!-- End Nav -->
		</div>
		<!-- ========== Breadcrumbs End ========== -->
	</section>

	<!-- Main content -->
	<section class=""> 
        <form id="bookForm">
		
            <!-- Small cardes (Stat card) -->
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">	
                            <div class="mb-3">
                                <label>Kode Buku <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                                <input id="code" name="code" type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="title">Judul Buku <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="publication_year">Tahun Terbit <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                                <input type="number" id="publication_year" name="publication_year" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="author">Penulis <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                                <input type="text" id="author" name="author" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="stock">Stok Buku <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                                <input type="number" id="stock" name="stock" class="form-control" required>
                            </div>
                            <p class="text-muted">*) Kolom wajib diisi.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-primary">
                        <!-- /.card-header -->
                        <div class="card-body">					
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>                          
                            <a href="<?= route('books.index'); ?>" class="btn btn-block btn-danger">Batal</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </form>
		<!-- /.row -->
	</section>
</div>

<script>
    $(document).ready(function() {
    $('#bookForm').submit(function(e) {
        e.preventDefault(); // Mencegah halaman refresh saat submit form
        var formData = $(this).serialize(); // Mengambil data form dalam format URL-encoded

        $.ajax({
        url: "{{ route('api.post_books') }}", // URL endpoint API untuk membuat buku baru
        type: "POST",
        data: formData,
        success: function(response) {
            // Proses berhasil, lakukan tindakan yang sesuai, seperti menampilkan pesan sukses atau me-refresh halaman
            console.log(response); // Contoh: Log respon API ke konsol
            alert(response['message']);
            location.reload(); // Contoh: Me-refresh halaman
        },
        error: function(xhr, status, error) {
            // Terjadi error, lakukan tindakan yang sesuai, seperti menampilkan pesan error
            console.error(xhr.responseText); // Contoh: Log pesan error ke konsol
            alert('Terjadi kesalahan. Silakan coba lagi.');
        }
        });
    });
    });
</script>

@endsection
