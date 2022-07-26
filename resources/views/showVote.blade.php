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
        
        @media (max-width: 1200px) and (min-width: 992px){
            .header-logo img{
                display: none !important
            }
        }
        @media (max-width: 992px){
            .description span{
                font-size: 18px !important
            }
        }
    </style>
</head>
<body>
    <body class="one-page" data-target="#header" data-spy="scroll" data-offset="100">
        <form id="vote-form" class="white-popup-block needs-validation">
            <div class="form-row mt-2">
                <div class="col-sm-12">
                    <h4>Expo TIK</h4>
                    <p class="mb-4 font-weight-bold">Vote : <span id="vote-title">{{ $project->title }}</span></p>
                </div>
            </div>
            <input type="hidden" id="vpk" name="vpk" required readonly autocomplete="off" value="{{ Crypt::encrypt($project->id) }}">
            <div class="form-group" id="form-group-name">
                <label>Nama *</label>
                <input type="text" data-msg-required="Nama wajib diisi" id="vname" class="form-control" name="vname" required>
            </div>
            <div class="form-group">
                <label>Email *</label>
                <input type="email" data-msg-required="Email wajib diisi" id="vemail" data-msg-email="Masukkan email yang valid" class="form-control" name="vemail" required>
            </div>
            <div class="form-group">
                <button class="btn btn-modern btn-tertiary btn-block" type="submit">VOTE</button>
            </div>
        </form>

        <script src="{{ asset('main/vendor/jquery/jquery.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/jquery.appear/jquery.appear.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/jquery.easing/jquery.easing.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>	
        <script src="{{ asset('main/vendor/popper/umd/popper.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/bootstrap/js/bootstrap.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/common/common.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/jquery.validation/jquery.validate.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/isotope/jquery.isotope.min.js') }}"></script>		
        <script src="{{ asset('main/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>		
        <script src="{{ asset('main/js/theme.js') }}"></script>
        <script src="{{ asset('main/js/theme.init.js') }}"></script>
        <script src="{{ asset('main/vendor/sweetalert.js') }}"></script>
        
        <script>
            $('#vote-form').submit((e) => {
                e.preventDefault();
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if ($('#vname').val() && $('#vname').val() != ' ') {
                    if ($('#vpk').val() && $('#vemail').val() && re.test(String($('#vemail').val()).toLowerCase())) {
                        $.ajax({
                            method: 'POST',
                            url: "{{ url('voting') }}",
                            data: { "_token": "{{ csrf_token() }}", vpk: $('#vpk').val(), vname: $('#vname').val(), vemail: $('#vemail').val()},
                            error: function () { swal("Vote Gagal", '', "error"); },
                            success: function (res) {
                                if (res.status) {
                                    if (res.message == 'success') { swal("Vote Berhasil", "Terima kasih sudah melakukan vote", "success"); }
                                    if (res.message == 'due') { swal("Vote sudah ditutup", res.i, "info"); }
                                    if (res.message == 'exists') { swal("Anda sudah melakukan vote", "", "info"); }
                                } else { swal("Vote Gagal", '', "error"); }
                            }
                        });
                        $('#vemail, #vpk, #vname') 
                        $('#vote-form .form-group').removeClass('has-success');
                        $('#vote-form .form-group .form-control').removeClass('is-valid');
                        $.magnificPopup.close()
                    } 
                } else {
                    $('#vote-form #form-group-name').addClass('has-danger').append('<label id="vname-error" class="error" for="vname">Nama wajib diisi</label>').removeClass('has-success');
                    $('#vote-form #form-group-name .form-control').addClass('valid').addClass('is-invalid').removeClass('is-valid');
                    return false;
                }
            });
        </script>
    </body>
</html>
