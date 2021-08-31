<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">	
    <title>Expo TIK</title>	
    <meta name="keywords" content="Expo TIK, Expo TIK PNJ, Expo, Exhibition TIK, Exhibition" />
    <meta name="description" content="Pameran proyek kekhususan jurusan teknik informatika dan komputer politeknik negeri jakarta (PNJ)">
    <meta name="author" content="Afandi Aziz">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('main/vendor/bootstrap/css/bootstrap.min.css') }}">		
    <link rel="stylesheet" href="{{ asset('main/vendor/fontawesome-free/css/all.min.css') }}">		
    <link rel="stylesheet" href="{{ asset('main/vendor/animate/animate.min.css') }}">		
    <link rel="stylesheet" href="{{ asset('main/vendor/magnific-popup/magnific-popup.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('main/vendor/owl.carousel/assets/owl.carousel.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('main/vendor/owl.carousel/assets/owl.theme.default.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('main/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/theme-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/skins/default.css') }}">		
    <link rel="stylesheet" href="{{ asset('main/css/custom.css') }}">
    <script src="{{ asset('main/vendor/modernizr/modernizr.min.js') }}"></script>
    <style>
        body {
            font-family: 'Poppins' !important;
        }
        h1, h2, h3, h4, h5, h6 {
            color: #444
        }
        .thumb-info:hover #title-project {
            /* color: #fff !important; */
            margin-bottom: 10px !important;
            white-space: pre-line; 
            text-overflow: unset; 
            overflow: hidden; 
            display: -webkit-box; 
            -webkit-line-clamp: unset; 
            -webkit-box-orient: vertical;
            transition: 0.5s;
        }
        .thumb-info #title-project {
            color: #34364a; 
            transition: 0.5s;
            white-space: pre-line; 
            text-overflow: ellipsis; 
            overflow: hidden; 
            display: -webkit-box; 
            -webkit-line-clamp: 1; 
            -webkit-box-orient: vertical;
        }
    </style>
</head>
<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 0}">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <body class="one-page" data-target="#header" data-spy="scroll" data-offset="100">
        <div class="body">
            <header id="header" class="header-effect-shrink shadow-sm" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
                <div class="header-body border-top-0 bg-light">
                    <div class="header-container container-fluid">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-logo">
                                        <a style="font-family: 'Viga';margin: 0; align-items: center;" href="#header" class="text-decoration-none d-flex text-10 text-primary font-weight-bold">
                                            <img src="{{ asset('img/logo.png') }}" alt="Expo TIK" width="180px" height="100%" class="mr-3 d-none d-md-block">
                                            <span style="white-space: nowrap; color: #1B8F9E">EXPO TIK</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-column justify-content-end">
                                <div class="header-row">
                                    <div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-dark-text order-2 order-lg-1">
                                        <div class="header-nav-main header-nav-main-mobile-light header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                            <nav class="collapse">
                                                <ul class="nav nav-pills" id="mainNav">
                                                    @foreach ($categories as $item)
                                                    <li>
                                                        <a class="dropdown-item text-3" data-hash data-hash-offset="68" href="#{{ Str::slug($item->name, '-') }}">{{ $item->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div role="main" class="main" id="home">
                <div class="container container-lg my-5">
					<div class="row">
						<div class="col-lg-6 my-lg-5 my-3 text-lg-left text-center order-lg-0 order-1">
                            <h2 class="font-weight-bold line-height-2 appear-animation animated fadeInRightShorter appear-animation-visible word-rotator slide" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1200" style="animation-delay: 1200ms;"><span style="color: #34364a; font-size: 46px; line-height: 55px">
                                <span class="word-rotator-words bg-primary">
									<b class="is-visible">KREATIVITAS</b>
									<b>INOVASI</b>
									<b>INSPIRATIF</b>
								</span>
                            </span></h2>
							<h4 class="font-weight-normal appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1500" style="animation-delay: 1500ms;"><span style="color: #34364a; font-size: 20px; line-height: 32px">
                                Expo TIK merupakan event pameran produk-produk penerapan teknologi karya mahasiswa semester 6 Jurusan Teknik Informatika dan Komputer. 
                                Terdapat {{ $projects->count() }} tim dengan {{ $categories->count() }} kategori produk terapan berupa 
                                <?php $i = 1; ?>
                                @foreach ($categories as $item)
                                    @if ($i < $categories->count())
                                    {{ $item->name }},
                                    @else 
                                    dan {{ $item->name }}.
                                    @endif
                                    <?php $i++; ?>
                                @endforeach
                                <br> <br>
                                Rangkaian event Expo TIK 2021 akan dilaksanakan pada tanggal <strong>{{ $conf->eventdate }}</strong> yang meliputi kegiatan pemilihan karya terbaik dan Webinar series. 
                                <br><br>
                                <strong>Lihat</strong> karyanya, 
                                <br>
                                <span class="" style=" font-weight: bold; ">Bincang</span> dengan timnya, 
                                <br>
                                dan <span class="" style=" font-weight: bold; ">Vote</span> karya terbaik pilihan kamu! 
                            </h4>
						</div>
                        <div class="col-lg-6 text-center order-lg-1 order-0 my-auto mx-auto" style="align-items: center;">
                            {{-- <div class="appear-animation animated expandIn appear-animation-visible owl-carousel owl-theme stage-margin" data-appear-animation-delay="400" data-appear-animation="expandIn" style="animation-delay: 400ms;" data-plugin-options="{'items': 1, 'autoplay':true, 'autoHeight': true, 'margin': 10, 'loop': true, 'nav': true, 'dots': true, 'stagePadding': 40}">
								<div> --}}
                                    <img class="appear-animation mb-2 border-radius animated expandIn appear-animation-visible" data-appear-animation-delay="400" data-appear-animation="expandIn" style="animation-delay: 400ms;" src="{{ asset('main/jumbotron.jpg') }}" alt="Expo TIK" width="100%">
								{{-- </div>
							</div> --}}
						</div>
					</div>
				</div>
                <?php $index = 1; ?>
                @foreach ($categories as $item)
                    <section class="{{ ($index % 2 == 1 ? 'section section-default bg-color-light-scale-1 mb-0' : null) }}">
                        <div id="{{ Str::slug($item->name, '-') }}" class="container-fluid">
                            <div class="row justify-content-center pt-5">
                                <div class="col-lg-9 text-center">
                                    <div class="appear-animation" data-appear-animation="fadeInUpShorter">
                                        <h5 class="font-weight-bold mb-5 text-9">{{ $item->name }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
                                        <ul class="nav nav-pills sort-source sort-source-style-3 d-none" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'masonry', 'filter': '*'}">
                                            <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
                                        </ul>
                                        <div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
                                            <div class="row portfolio-list sort-destination justify-content-center" data-sort-id="portfolio">
                                                @foreach ($projects as $project)
                                                @if($project->id_category == $item->id)
                                                <?php $fnd = Crypt::encrypt($project->id); ?>
                                                <div class="col-md-6 col-xl-3 col-lg-4 isotope-item brands">
                                                    <div class="portfolio-item">
                                                        <span class="thumb-info thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-light thumb-info-bottom-info-show-more shadow">
                                                            <span class="thumb-info-wrapper overlay overlay-op-8" style="padding-bottom: 100px;">
                                                                <img src="{{ asset('uploaded/'.$project->thumbnail) }}" class="img-fluid border-radius-0" alt="{{ $project->title }}">
                                                                <span class="thumb-info-title pl-3">
                                                                    <span class="thumb-info-inner font-weight-bold text-4 line-height-4 mb-3" id="title-project">{{ $project->title }}</span>
                                                                    <span class="thumb-info-show-more-content pr-3">
                                                                        <p class="mb-0 text-2 font-weight-normal line-height-6 mb-2 mt-2" style="white-space: pre-line; text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ $project->desc }}</p>
                                                                    </span>
                                                                    <span class="mt-1">
                                                                        <a href="{{ $project->url_youtube }}" target="_blank" class="btn btn-danger shadow-sm btn-rounded btn-py-lg-2 btn-py-1 py-lg-2 py-1 mb-2 mr-1">Video Youtube &nbsp;<i class="fab fa-youtube"></i></a>
                                                                        <a href="{{ $project->url_gmeet }}" target="_blank" class="btn btn-info shadow-sm btn-rounded btn-py-lg-2 btn-py-1 mb-2 py-lg-2 py-1 mr-1">Bincang Google Meet &nbsp;<i class="fas fa-comments"></i></a>
                                                                        <a href="#vote-form" onclick="$('#vote-title').text('{{ $project->title }}');$('#wvote').val('{{ Crypt::encrypt($project->id) }}')" class="popup-with-form btn btn-py-lg-2 btn-py-1 btn-rounded btn-warning py-lg-2 py-1 mb-2" href="#">Vote &nbsp;<span><i class="fas fa-vote-yea"></i></span></a>
                                                                    </span>
                                                                </span>
                                                                <span data-toggle="modal" data-target="#detail-project" class="thumb-info-action" onclick="$('#wvote-detail').val('{{ Crypt::encrypt($project->id) }}');$('#detail-project img').attr('src', '{{ asset(null) }}uploaded/{{ $project->thumbnail }}');$('#detail-project a[target=_blank]').attr('href', '{{ $project->url_gmeet }}');$('#detail-project #detail-title').text('{{ $project->title }}');$('#detail-project #detail-desc').html($('textarea#{{ $fnd }}').val());">
                                                                    <textarea id="{{ $fnd }}" class="d-none">{{ $project->desc }}</textarea>
                                                                    <span class="thumb-info-action-icon bg-light opacity-8"><i class="text-color-dark fas fa-search-plus"></i></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php $index++; ?>
                @endforeach
                <form id="vote-form" class="white-popup-block mfp-hide needs-validation">
                    <div class="form-row mt-2">
                        <div class="col-sm-12">
                            <h4>Expo TIK</h4>
                            <p class="mb-4 font-weight-bold">Vote : <span id="vote-title"></span></p>
                        </div>
                    </div>
                    <input type="hidden" id="wvote" name="wvote" required readonly autocomplete="off">
                    <div class="form-group">
                        <label>Nama *</label>
                        <input type="text" data-msg-required="Nama wajib diisi" id="vote-name" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" data-msg-required="Email wajib diisi" id="vote-email" data-msg-email="Masukkan email yang valid" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-modern btn-tertiary btn-block" type="submit">VOTE</button>
                    </div>
                </form>

                <div class="modal pr-0" id="detail-project" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body row">
                                <input type="hidden" id="wvote-detail" readonly>
                                <div class="col-lg-5">
                                    <img src="" class="img-fluid border-radius-0" width="100%">
                                </div>
                                <div class="col-lg-7 mt-4">
                                    <div class="text-6 font-weight-bold mb-3" id="detail-title"></div>
                                    <p id="detail-desc" class="mb-4"></p>
                                    <!--<a href="" target="_blank" class="popup-youtubex btn btn-danger shadow-sm mb-2 mr-1 btn-rounded">Video Youtube &nbsp;<i class="fab fa-youtube"></i></a>-->
                                    <a href="" target="_blank" class="btn btn-info shadow-sm btn-rounded mb-2">Bincang Google Meet &nbsp;<i class="fas fa-comments"></i></a>
                                    <br>
                                    <a href="#vote-form" onclick="$('#vote-title').text($('#detail-title').text());$('#wvote').val($('#wvote-detail').val())" class="popup-with-form btn btn-rounded btn-warning" href="#" data-dismiss="modal">Vote &nbsp;<span><i class="fas fa-vote-yea"></i></span></a>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer id="footer" class="mt-0">
                <div class="footer-copyright">
                    <div class="container py-2">
                        <div class="row">
                            <div class="col d-flex align-items-center justify-content-center">
                                <p><strong>Afandi Aziz</strong> © 2021</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src="{{ asset('main/vendor/jquery/jquery.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/jquery.appear/jquery.appear.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/jquery.easing/jquery.easing.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>	
        <script src="{{ asset('main/vendor/popper/umd/popper.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/bootstrap/js/bootstrap.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/common/common.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/jquery.validation/jquery.validate.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/isotope/jquery.isotope.min.js') }}"></script>		
        {{-- <script src="{{ asset('main/vendor/owl.carousel/owl.carousel.min.js') }}"></script> --}}
        <script src="{{ asset('main/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>		
        <script src="{{ asset('main/js/theme.js') }}"></script>
        <script src="{{ asset('main/js/theme.init.js') }}"></script>
        <script src="{{ asset('main/vendor/sweetalert.js') }}"></script>		
        <script>
            $('.popup-with-form').magnificPopup({
                type: 'inline',
                preloader: false,
                focus: '#name',
                callbacks: {
                    open: function() {
                        $('html').addClass('lightbox-opened');
                    },
                    close: function() {
                        $('html').removeClass('lightbox-opened');
                        $('#vote-name').val('') 
                        $('#wvote').val('') 
                        $('#vote-email').val('')
                    }
                }
            });
            $('.popup-detail').magnificPopup({
                type: 'inline',
                preloader: false,
                focus: '#name',
                callbacks: {
                    open: function() {
                        $('html').addClass('lightbox-opened');
                    },
                    close: function() {
                        $('html').removeClass('lightbox-opened');
                    }
                }
            });
            $('.popup-youtube').magnificPopup({
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,

                fixedContentPos: false
            });
            $('#vote-form').submit((e) => {
                e.preventDefault();
                if ($('#vote-name').val() && $('#wvote').val() && $('#vote-email').val()) {
                    $.ajax({
                        method: 'POST',
                        url: "{{ url('voting') }}",
                        data: { "_token": "{{ csrf_token() }}", vpk: $('#wvote').val(), vname: $('#vote-name').val(), vemail: $('#vote-email').val()},
                        error: function () { swal("Vote Gagal", '', "error"); },
                        success: function (res) {
                            if (res.status) {
                                if (res.message == 'success') { swal("Vote Berhasil", "Terima kasih sudah melakukan vote", "success"); }
                                if (res.message == 'due') { swal("Vote sudah ditutup", res.i, "info"); }
                                if (res.message == 'exists') { swal("Anda sudah melakukan vote", "", "info"); }
                            } else { swal("Vote Gagal", '', "error"); }
                        }
                    });
                    $('#vote-name').val('') 
                    $('#wvote').val('') 
                    $('#vote-email').val('')
                    $.magnificPopup.close()
                }
            });
        </script>
    </body>
</html>
