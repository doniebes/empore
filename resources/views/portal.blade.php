<html lang="en"><head>
  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>E-PONPES </title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="https://staging.epesantren-almubarok.com/media/img/favicon.png">

  <!-- Font -->
  <link href="https://staging.epesantren-almubarok.com/media/front/assets/fonts.googleapis.com/css24ff7.css?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="https://staging.epesantren-almubarok.com/media/front/assets/css/vendor.min.css">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="https://staging.epesantren-almubarok.com/media/front/assets/css/theme.minc619.css?v=1.0">

  <link rel="preload" href="https://staging.epesantren-almubarok.com/media/front/assets/css/theme.min.css" data-hs-appearance="default" as="style">
  <link rel="preload" href="https://staging.epesantren-almubarok.com/media/front/assets/css/theme-dark.min.css" data-hs-appearance="dark" as="style">

  

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
<style data-hs-appearance-visability-styles="">[data-hs-theme-appearance]:not([data-hs-theme-appearance='default']){display:none!important;}</style><style class="fslightbox-styles">.fslightbox-absoluted{position:absolute;top:0;left:0}.fslightbox-fade-in{animation:fslightbox-fade-in .3s cubic-bezier(0,0,.7,1)}.fslightbox-fade-out{animation:fslightbox-fade-out .3s ease}.fslightbox-fade-in-strong{animation:fslightbox-fade-in-strong .3s cubic-bezier(0,0,.7,1)}.fslightbox-fade-out-strong{animation:fslightbox-fade-out-strong .3s ease}@keyframes fslightbox-fade-in{from{opacity:.65}to{opacity:1}}@keyframes fslightbox-fade-out{from{opacity:.35}to{opacity:0}}@keyframes fslightbox-fade-in-strong{from{opacity:.3}to{opacity:1}}@keyframes fslightbox-fade-out-strong{from{opacity:1}to{opacity:0}}.fslightbox-cursor-grabbing{cursor:grabbing}.fslightbox-full-dimension{width:100%;height:100%}.fslightbox-open{overflow:hidden;height:100%}.fslightbox-flex-centered{display:flex;justify-content:center;align-items:center}.fslightbox-opacity-0{opacity:0!important}.fslightbox-opacity-1{opacity:1!important}.fslightbox-scrollbarfix{padding-right:17px}.fslightbox-transform-transition{transition:transform .3s}.fslightbox-container{font-family:Arial,sans-serif;position:fixed;top:0;left:0;background:linear-gradient(rgba(30,30,30,.9),#000 1810%);touch-action:pinch-zoom;z-index:1000000000;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:transparent}.fslightbox-container *{box-sizing:border-box}.fslightbox-svg-path{transition:fill .15s ease;fill:#ddd}.fslightbox-nav{height:45px;width:100%;position:absolute;top:0;left:0}.fslightbox-slide-number-container{display:flex;justify-content:center;align-items:center;position:relative;height:100%;font-size:15px;color:#d7d7d7;z-index:0;max-width:55px;text-align:left}.fslightbox-slide-number-container .fslightbox-flex-centered{height:100%}.fslightbox-slash{display:block;margin:0 5px;width:1px;height:12px;transform:rotate(15deg);background:#fff}.fslightbox-toolbar{position:absolute;z-index:3;right:0;top:0;height:100%;display:flex;background:rgba(35,35,35,.65)}.fslightbox-toolbar-button{height:100%;width:45px;cursor:pointer}.fslightbox-toolbar-button:hover .fslightbox-svg-path{fill:#fff}.fslightbox-slide-btn-container{display:flex;align-items:center;padding:12px 12px 12px 6px;position:absolute;top:50%;cursor:pointer;z-index:3;transform:translateY(-50%)}@media (min-width:476px){.fslightbox-slide-btn-container{padding:22px 22px 22px 6px}}@media (min-width:768px){.fslightbox-slide-btn-container{padding:30px 30px 30px 6px}}.fslightbox-slide-btn-container:hover .fslightbox-svg-path{fill:#f1f1f1}.fslightbox-slide-btn{padding:9px;font-size:26px;background:rgba(35,35,35,.65)}@media (min-width:768px){.fslightbox-slide-btn{padding:10px}}@media (min-width:1600px){.fslightbox-slide-btn{padding:11px}}.fslightbox-slide-btn-container-previous{left:0}@media (max-width:475.99px){.fslightbox-slide-btn-container-previous{padding-left:3px}}.fslightbox-slide-btn-container-next{right:0;padding-left:12px;padding-right:3px}@media (min-width:476px){.fslightbox-slide-btn-container-next{padding-left:22px}}@media (min-width:768px){.fslightbox-slide-btn-container-next{padding-left:30px}}@media (min-width:476px){.fslightbox-slide-btn-container-next{padding-right:6px}}.fslightbox-down-event-detector{position:absolute;z-index:1}.fslightbox-slide-swiping-hoverer{z-index:4}.fslightbox-invalid-file-wrapper{font-size:22px;color:#eaebeb;margin:auto}.fslightbox-video{object-fit:cover}.fslightbox-youtube-iframe{border:0}.fslightbox-loader{display:block;margin:auto;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:67px;height:67px}.fslightbox-loader div{box-sizing:border-box;display:block;position:absolute;width:54px;height:54px;margin:6px;border:5px solid;border-color:#999 transparent transparent transparent;border-radius:50%;animation:fslightbox-loader 1.2s cubic-bezier(.5,0,.5,1) infinite}.fslightbox-loader div:nth-child(1){animation-delay:-.45s}.fslightbox-loader div:nth-child(2){animation-delay:-.3s}.fslightbox-loader div:nth-child(3){animation-delay:-.15s}@keyframes fslightbox-loader{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.fslightbox-source{position:relative;z-index:2;opacity:0}</style></head><link rel="stylesheet" href="https://staging.epesantren-almubarok.com/media/front/assets/css/theme.min.css" data-hs-current-theme="stylesheet">

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

  <script src="https://staging.epesantren-almubarok.com/media/front/assets/js/hs.theme-appearance.js"></script>

  <!-- ========== HEADER ========== -->
  <header id="header" class="navbar navbar-expand-lg navbar-center navbar-light bg-white navbar-absolute-top navbar-show-hide" data-hs-header-options="{
            &quot;fixMoment&quot;: 0,
            &quot;fixEffect&quot;: &quot;slide&quot;
          }" hsheader="true">
    <div class="container-lg">
      <nav class="js-mega-menu navbar-nav-wrap">
        <!-- Logo -->
        <a class="navbar-brand" href="https://staging.epesantren-almubarok.com/" aria-label="Gomahad">
          <span class="navbar-brand-logo h1 text-primary" data-hs-theme-appearance="default">E-PONPES</span>
          <span class="navbar-brand-logo h1" data-hs-theme-appearance="dark">E-PONPES</span>
        </a>
        <!-- End Logo -->

        <!-- Secondary Content -->
        <div class="navbar-nav-wrap-secondary-content">
          <!-- Style Switcher -->
          <div class="dropdown">
            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation=""><i class="bi-brightness-high"></i></button>

            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
              <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                <i class="bi-moon-stars me-2"></i>
                <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
              </a>
              <a class="dropdown-item active" href="#" data-icon="bi-brightness-high" data-value="default">
                <i class="bi-brightness-high me-2"></i>
                <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
              </a>
              <a class="dropdown-item" href="#" data-icon="bi-moon" data-value="dark">
                <i class="bi-moon me-2"></i>
                <span class="text-truncate" title="Dark">Dark</span>
              </a>
            </div>
          </div>
          <!-- End Style Switcher -->

          <a class="btn btn-primary navbar-btn" href="https://gomahad.dsbstudio.web.id/" target="_blank">Go Mahad</a>
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
            <h2 class="display-4"><span class="text-primary text-highlight-warning">YAYASAN AL-MUBAROK (SDIT-SMPIT-MTS-SMA)</span></h2>
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
          <a class="card card-lg card-transition h-100 bg-light border-0 shadow-none overflow-hidden" target="_blank" href="https://staging.epesantren-almubarok.com/manage">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Login Admin</h2>
            </div>
            <div class="card-footer border-0 pt-0 mb-n4 me-n6">
              <div class="card-body">
                  <img class="card-img" src="https://staging.epesantren-almubarok.com/media/front/assets/svg/illustrations/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
                  <img class="card-img" src="https://staging.epesantren-almubarok.com/media/front/assets/svg/illustrations-light/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-6 mb-4 text-center">
          <!-- Card -->
          <a class="card card-lg card-transition h-100 bg-light border-0 shadow-none overflow-hidden" target="_blank" href="https://staging.epesantren-almubarok.com/student">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Login Siswa</h2>
            </div>
            <div class="card-footer border-0 pt-0 mb-n4 me-n6">
              <div class="card-body">
                <img class="card-img" src="https://staging.epesantren-almubarok.com/media/front/assets/svg/illustrations/oc-looking-for-answers.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
                <img class="card-img" src="https://staging.epesantren-almubarok.com/media/front/assets/svg/illustrations-light/oc-looking-for-answers.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-6 mb-4 text-center">
          <!-- Card -->
          <a class="card card-lg card-transition h-100 bg-light border-0 shadow-none overflow-hidden" target="_blank" href="https://staging.epesantren-almubarok.com/ppdb">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">PPDB</h2>
            </div>
            <div class="card-footer border-0 pt-0 mb-n4 me-n6">
              <div class="card-body">
                <img class="card-img" src="https://staging.epesantren-almubarok.com/media/front/assets/svg/illustrations/oc-to-do.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
                <img class="card-img" src="https://staging.epesantren-almubarok.com/media/front/assets/svg/illustrations-light/oc-to-do.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">
              </div>
            </div>
          </a>
          <!-- End Card -->
        </div>
        <!-- End Col -->

        <div class="col-md-6 mb-4 text-center">
          <!-- Card -->
          <a class="card card-lg card-transition h-100 bg-light border-0 shadow-none overflow-hidden" target="_blank" href="https://staging.epesantren-almubarok.com/teacher">
            <div class="card-body">
              <h2 class="card-title h1 text-inherit">Login Guru</h2>
            </div>
            <div class="card-footer border-0 pt-0 mb-n4 me-n6">
              <div class="card-body">
                <img class="card-img" src="https://staging.epesantren-almubarok.com/media/front/assets/svg/illustrations/oc-unlock.svg" alt="Image Description" data-hs-theme-appearance="default" style="max-width: 15rem;">
                <img class="card-img" src="https://staging.epesantren-almubarok.com/media/front/assets/svg/illustrations-light/oc-unlock.svg" alt="Image Description" data-hs-theme-appearance="dark" style="max-width: 15rem;">
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

    <p class="mb-0">© Gomahad. 2023 - 2024. All rights reserved.</p>
  </footer>
  <!-- ========== END FOOTER ========== -->


  <!-- JS Implementing Plugins -->
  <script src="https://staging.epesantren-almubarok.com/media/front/assets/js/vendor.min.js"></script>

  <!-- JS Front -->
  <script src="https://staging.epesantren-almubarok.com/media/front/assets/js/theme.min.js"></script>

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

</body></html>