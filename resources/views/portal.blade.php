<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Aplikasi Peminjaman Buku</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

  <!-- Font -->
  <link href="{{ asset('') }}front/assets/fonts.googleapis.com/css24ff7.css?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="{{ asset('') }}front/assets/css/vendor.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="{{ asset('') }}front/assets/css/theme.minc619.css?v=1.0">

  <link rel="preload" href="{{ asset('') }}front/assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="{{ asset('') }}front/assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

  <style data-hs-appearance-onload-styles>
    *
    {
      transition: unset !important;
    }

    body
    {
      opacity: 0;
    }
  </style>

  <script>
  window.hs_config = {"autopath":"@@autopath","deleteLine":"hs-builder:delete","deleteLine:build":"hs-builder:build-delete","deleteLine:dist":"hs-builder:dist-delete","previewMode":false,"startPath":"/index.html","vars":{"themeFont":"https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap","version":"?v=1.0"},"layoutBuilder":{"extend":{"switcherSupport":true},"header":{"layoutMode":"default","containerMode":"container-fluid"},"sidebarLayout":"default"},"themeAppearance":{"layoutSkin":"default","sidebarSkin":"default","styles":{"colors":{"primary":"#377dff","transparent":"transparent","white":"#fff","dark":"132144","gray":{"100":"#f9fafc","900":"#1e2022"}},"font":"Inter"}},"languageDirection":{"lang":"en"},"skipFilesFromBundle":{"dist":["assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","assets/js/demo.js"],"build":["assets/css/theme.css","assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js","assets/js/demo.js","assets/css/theme-dark.html","assets/css/docs.css","assets/vendor/icon-set/style.html","assets/js/hs.theme-appearance.js","assets/js/hs.theme-appearance-charts.js","node_modules/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.html","assets/js/demo.js"]},"minifyCSSFiles":["assets/css/theme.css","assets/css/theme-dark.css"],"copyDependencies":{"dist":{"*assets/js/theme-custom.js":""},"build":{"*assets/js/theme-custom.js":"","node_modules/bootstrap-icons/font/*fonts/**":"assets/css"}},"buildFolder":"","replacePathsToCDN":{},"directoryNames":{"src":"./src","dist":"./dist","build":"./build"},"fileNames":{"dist":{"js":"theme.min.js","css":"theme.min.css"},"build":{"css":"theme.min.css","js":"theme.min.js","vendorCSS":"vendor.min.css","vendorJS":"vendor.min.js"}},"fileTypes":"jpg|png|svg|mp4|webm|ogv|json"}
  window.hs_config.gulpRGBA = (p1) => {
  const options = p1.split(',')
  const hex = options[0].toString()
  const transparent = options[1].toString()

  var c;
  if(/^#([A-Fa-f0-9]{3}){1,2}$/.test(hex)){
    c= hex.substring(1).split('');
    if(c.length== 3){
      c= [c[0], c[0], c[1], c[1], c[2], c[2]];
    }
    c= '0x'+c.join('');
    return 'rgba('+[(c>>16)&255, (c>>8)&255, c&255].join(',')+',' + transparent + ')';
  }
  throw new Error('Bad Hex');
}
            window.hs_config.gulpDarken = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = -parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
            window.hs_config.gulpLighten = (p1) => {
  const options = p1.split(',')

  let col = options[0].toString()
  let amt = parseInt(options[1])
  var usePound = false

  if (col[0] == "#") {
    col = col.slice(1)
    usePound = true
  }
  var num = parseInt(col, 16)
  var r = (num >> 16) + amt
  if (r > 255) {
    r = 255
  } else if (r < 0) {
    r = 0
  }
  var b = ((num >> 8) & 0x00FF) + amt
  if (b > 255) {
    b = 255
  } else if (b < 0) {
    b = 0
  }
  var g = (num & 0x0000FF) + amt
  if (g > 255) {
    g = 255
  } else if (g < 0) {
    g = 0
  }
  return (usePound ? "#" : "") + (g | (b << 8) | (r << 16)).toString(16)
}
</script>
</head>

<body>
  <style type="text/css">
    @media (min-width: 1400px)
    {
      .container-lg
      {
        max-width: 1140px;
      }
    }
  </style>

  <script src="{{ asset('') }}front/assets/js/hs.theme-appearance.js"></script>

  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-center navbar-light bg-white navbar-absolute-top navbar-show-hide" data-hs-header-options='{
            "fixMoment": 0,
            "fixEffect": "slide"
          }'>
    <div class="container-lg">
      <nav class="js-mega-menu navbar-nav-wrap">
        <!-- Logo -->
        <a class="navbar-brand" href="<?= asset('')?>" aria-label="Gomahad">
          <span class="navbar-brand-logo h1 text-primary" data-hs-theme-appearance="default"></span>
          <span class="navbar-brand-logo h1" data-hs-theme-appearance="dark"><?= config('app.name') ?></span>
        </a>
        <!-- End Logo -->

        <!-- Secondary Content -->
        <div class="navbar-nav-wrap-secondary-content">
          <!-- Style Switcher -->
          <div class="dropdown">
            <button type="button" 
                    class="btn btn-ghost-secondary btn-icon rounded-circle" 
                    id="selectThemeDropdown" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false" 
                    data-bs-dropdown-animation>
            </button>

            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
              <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                <i class="bi-moon-stars me-2"></i>
                <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
              </a>
              <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                <i class="bi-brightness-high me-2"></i>
                <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
              </a>
              <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                <i class="bi-moon me-2"></i>
                <span class="text-truncate" title="Dark">Dark</span>
              </a>
            </div>
          </div>
          <!-- End Style Switcher -->

          <a class="btn btn-primary navbar-btn" href="https://dsbstudio.web.id/" target="_blank">DSB Studio</a>
        </div>
        <!-- End Secondary Content -->

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContainerNavDropdown" aria-controls="navbarContainerNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-default">
            <i class="bi-list"></i>
          </span>
          <span class="navbar-toggler-toggled">
            <i class="bi-x"></i>
          </span>
        </button>
        <!-- End Toggler -->

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarContainerNavDropdown">
        </div>
        <!-- End Collapse -->
      </nav>
    </div>
  </header>

  <!-- ========== END HEADER ========== -->

  <!-- ========== MAIN CONTENT ========== -->
  <main id="content" role="main" class="main">
    <!-- Hero -->
    <div class="overflow-hidden gradient-radial-sm-primary">
      <div class="container-lg content-space-t-3 content-space-t-lg-4 content-space-b-1">
        <div class="w-lg-75 text-center mx-lg-auto text-center mx-auto">
          <!-- Heading -->
          <div class="mb-3 animated fadeInUp">
            <h1 class="display-3 mb-3">Selamat Datang di Sistem </h1>
            <h2 class="display-4"><span class="text-primary text-highlight-warning">Peminjaman Buku PT Empore</span></h2>
          </div>
          <!-- End Heading -->
        </div>

        
      </div>
    </div>
    <!-- End Hero -->

    <!-- Card Grid -->
    <div class="container-lg">
      
      <div class="row">
        <div class="col-md-6 mb-4 text-center">
          <!-- Card -->
          <a class="card card-lg card-transition h-100 bg-light border-0 shadow-none overflow-hidden" target="_blank" href="{{ route('admin.login') }}">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Login Admin</h2>
            </div>
            <div class="card-footer border-0 pt-0 mb-n4 me-n6">
              <div class="card-body">
                  <img class="card-img" src="{{ asset('') }}front/assets/svg/illustrations/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
                  <img class="card-img" src="{{ asset('') }}front/assets/svg/illustrations-light/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-6 mb-4 text-center">
          <!-- Card -->
          <a class="card card-lg card-transition h-100 bg-light border-0 shadow-none overflow-hidden" target="_blank" href="{{ route('member.login') }}">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Login Anggota</h2>
            </div>
            <div class="card-footer border-0 pt-0 mb-n4 me-n6">
              <div class="card-body">
                <img class="card-img" src="{{ asset('') }}front/assets/svg/illustrations/oc-looking-for-answers.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
                <img class="card-img" src="{{ asset('') }}front/assets/svg/illustrations-light/oc-looking-for-answers.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>
        <!-- End Col -->
     
      </div>
      <!-- End Row -->
    </div>
    <!-- End Card Grid -->
    
  </main>
  <!-- ========== END MAIN CONTENT ========== -->
 


  
    
<!-- modal start  -->
<div class="modal fade" id="myModalPengumuman" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h2 class="modal-title" id="myModalLabel">
          <i class="bi bi-envelope"></i> &nbsp; Info
        </h2>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="popup">

              <p>Sebelum menggunakan aplikasi, pastikan untuk mengunduh file SQL dari <a href="{{ asset('db/empore.sql') }}">tautan berikut</a> dan mengimpornya ke database.</p>

              <p>Jika ada kendala silahkan hubungi ke nomor berikut : <br>                
                <a href="https://api.whatsapp.com/send?phone=6281286479731">+62 812-8647-9731.</a>
              </p>
              <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-soft-dark"> 
                  <span>Tutup</span> 
                </button>
              </div>
            </div>

        </div>                                   
      </div>
    </div>
  </div>
</div>
<!-- modal end -->

  <!-- ========== FOOTER ========== -->
  <footer class="container-lg text-center py-10">
    <!-- Socials -->
    <ul class="list-inline mb-3">
      <li class="list-inline-item">
        <a class="btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
          <i class="bi-facebook"></i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
          <i class="bi-twitter"></i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-soft-secondary btn-sm btn-icon rounded-circle" href="#">
          <i class="bi-instagram"></i>
        </a>
      </li>
    </ul>
    <!-- End Socials -->

    <p class="mb-0"><?= config('app.created') ?></p>
  </footer>
  <!-- ========== END FOOTER ========== -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $('#myModalPengumuman').modal('show');
</script>

  <!-- JS Implementing Plugins -->
  <script src="{{ asset('') }}front/assets/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="{{ asset('') }}front/assets/js/theme.min.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    (function() {
      // INITIALIZATION OF NAVBAR
      // =======================================================
      new HSHeader('#header').init()


      // INITIALIZATION OF GO TO
      // =======================================================
      new HSGoTo('.js-go-to')


      // TRANSFORMATION
      // =======================================================
      const $figure = document.querySelector('.js-img-comp')

      // if (window.pageYOffset) {
      //   $figure.style.transform = `rotateY(${-18 + window.pageYOffset}deg) rotateX(${window.pageYOffset / 5}deg)`
      // }

      let y = -18 + window.pageYOffset,
        x = 55 - window.pageYOffset

      const figureTransformation = function () {
        if (-18 + window.pageYOffset / 5 > 0) {
          y = 0
        }

        if (55 - window.pageYOffset / 3 < 0) {
          x = 0
        }

        y = -18 + window.pageYOffset / 5 < 0 ? -18 + window.pageYOffset / 5 : y
        x = 55 - window.pageYOffset / 3 > 0 ? 55 - window.pageYOffset / 3 : x
        // $figure.style.transform = `rotateY(${y}deg) rotateX(${x}deg)`
      }

      figureTransformation()
      window.addEventListener('scroll', figureTransformation)
    })()
  </script>

  <!-- Style Switcher JS -->

  <script>
      (function () {
        // STYLE SWITCHER
        // =======================================================
        const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
        const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

        // Function to set active style in the dorpdown menu and set icon for dropdown trigger
        const setActiveStyle = function () {
          $variants.forEach($item => {
            if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
              $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
              return $item.classList.add('active')
            }

            $item.classList.remove('active')
          })
        }

        // Add a click event to all items of the dropdown to set the style
        $variants.forEach(function ($item) {
          $item.addEventListener('click', function () {
            HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
          })
        })

        // Call the setActiveStyle on load page
        setActiveStyle()

        // Add event listener on change style to call the setActiveStyle function
        window.addEventListener('on-hs-appearance-change', function () {
          setActiveStyle()
        })
      })()
    </script>



  <!-- End Style Switcher JS -->
</body>
</html>

