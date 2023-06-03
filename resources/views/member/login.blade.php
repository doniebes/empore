<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login Member</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" type="image/png" href="<?= asset('img/favicon.png') ?>">

  <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet" />
  <link href="<?= asset('css/font-awesome.min.css') ?>" rel="stylesheet" />
  <link href="<?= asset('css/login.css') ?>" rel="stylesheet" />

</head>
<body>

  <div class="row">
    <a href="{{ route('portal') }}">
    <div class="col-md-5">
      <div class="row">
        <div class="logo hidden-xs hidden-sm" style="margin-top: 120px;">
          <?php if (isset($setting_logo) AND $setting_logo['setting_value'] == NULL) { ?>
          <img src="<?= asset('img/logo.png') ?>" class="img-responsive">
          <?php } else { ?>
          <img src="<?= asset('img/PT_EMPORE_HEZER_TAMA.png') ?>" class="img-responsive">
          <?php } ?>
        </div>
        <p class="merk"><span style="color: #2ABB9B">Sistem</span> Peminjaman Buku</p> 
        <p class="school">PT EMPORE HEZER TAMA</p>
      </div>       
    </a>
      
      <div class="" style="margin-left: 80px; margin-right: 80px;">
          <h4><strong>List Login Member :</strong></h4>
          <table id="" class="table" style="">
            <thead class="">						
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Status</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($members)) {
                    $i = 1;
                    foreach ($members as $row):
                        ?>
                        <tr>													
                            <td><?= $i; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td>123456</td>
                            <td><label class="label <?= ($row['is_active']==1) ? 'label-success' : 'label-danger' ?>"><?php echo ($row['is_active']==1) ? 'Aktif' : 'Tidak Aktif' ?></label></td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;
                } else {
                    ?>
                    <tr id="row">
                        <td colspan="4" align="center">Data Kosong</td>
                    </tr>
                    <?php } ?>
            </tbody>
          </table>	
        </div>
    </div>
   



    <div class="col-md-7">
      <div class="box">
        <form method="POST" action="{{ route('member.login.post') }}">
          @csrf
          <div class="col-md-12">
            <p class="title-login">Member Login</p>
            @error('email')
              <div class="alert alert-danger alert-dismissible" style="margin-top: -85px !important;">
                <h5><i class="fa fa-close"></i>{{ $message }}</h5>
              </div>
            @enderror
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" required="" autofocus="" name="username" placeholder="Masukan Username" class="form-control flat">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" required="" name="password" placeholder="Masukan password" class="form-control flat">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>



</body>
</html>
