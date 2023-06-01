@extends('layouts.member')

@section('content')
<div class="">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<!-- ========== Breadcrumbs Start ========== -->
		<div class="card-header card-header-content-sm-between">
			<h1 class="card-header-title mb-2 mb-sm-0">
				<?= isset($title) ? '' . $title : null; ?>
				<small>List</small>
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
	<section class="content">
		<!-- Small cardes (Stat card) -->
		<div class="row">
			<div class="col-md-12">
				<div class="card card-success">
					<!-- /.card-header -->
					<div class="card-body">
						<div class="col-md-12 col-sm-12 col-xs-12 pull-left">
							<br>
							<div class="row">
								<div class="col-md-2">
									<?php if (!empty($member['member_img'])) { ?>
									<img src="<?= upload_url('member/'.$member['member_img']) ?>" class="img-responsive avatar">
									<?php } else { ?>
									<img src="<?= asset('img/user.png') ?>" class="img-responsive avatar">
									<?php } ?>
								</div>
								<div class="col-md-10">
									<table class="table table-hover">
										<tbody>
											<tr>
												<td>ID</td>
												<td>:</td>
												<td><?= $member->member_id ?></td>
											</tr>
											<tr>
												<td>Nama lengkap</td>
												<td>:</td>
												<td><?= $member->member_name ?></td>
											</tr>
											<tr>
												<td>Jenis Kelamin</td>
												<td>:</td>
												<td><?= ($member['member_gender']=='L')? 'Laki-laki' : 'Perempuan' ?></td>
											</tr>
											
											<tr>
												<td>No. Handphone</td>
												<td>:</td>
												<td><?= $member['member_phone'] ?></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td><?= $member['member_address'] ?></td>
											</tr>
											
										</tbody>
									</table>
								</div>
								<div class="col-md-4">
									<a href="#" class="btn btn-default">
										<i class="fa fa-arrow-circle-o-left"></i> Kembali
									</a>
								</div>
							</div>
							<!-- /.card-body -->
						</div>
					</div>
				</div>
				<!-- /.row -->
				<div class="modal modal-default fade" id="delModal<?php echo $member['member_id']; ?>">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
									<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi penghapusan</h3>
								</div>
								<div class="modal-body">
									<p>Apakah anda yakin akan menghapus data ini?</p>
								</div>
								<div class="modal-footer">
									<?php //echo form_open('manage/member/delete/' . $member['member_id']); ?>
									<input type="hidden" name="delName" value="<?php echo $member['member_full_name']; ?>">
									<button type="button" class="btn btn-default pull-left" data-bs-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
									<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
                                    </form>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>

				</section>
			</div>

            @endsection