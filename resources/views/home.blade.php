<!DOCTYPE html>
<html>
<head lang="lt">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalėdinės eglutės</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search input').on('focus blur', function(e){
                var search = $('#search');
                if (e.type == 'focus') {
                    search.addClass('active');
                } else {
                    search.removeClass('active');
                }
            });

            $('input[id=photo]').on('change', function (e) {
                e.preventDefault();

                var image = $(this);

                if ($.trim(image.val()).length < 1) {
                    return false;
                }

                var files = [];

                $.each(image.get(0).files, function( key, value ) {
                    files[key] = new FormData();
                    files[key].append('ajax_iframe_upload', true);
                    files[key].append('page_id', image.data("page-id"));
                    files[key].append('type', 'image');
                    files[key].append('image', value);
                });

                console.log(files);
                var myXhr = $.ajaxSettings.xhr();
                console.log(myXhr.upload);
                uploadFile(image, files, 0);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            uploadFile = function(inputElement, files, index) {
                if (typeof files[index] === 'undefined') {
                    return false;
                }

                $.ajax({
                    method: 'POST',
                    url: '{{ route('ads_insert') }}',
                    data: files[index],
                    forceSync: true,
                    cache: false,
                    contentType: false,
                    processData: false,
                    xhr: function () {
                        var myXhr = $.ajaxSettings.xhr();
                        //if (myXhr.upload) {
                        //    myXhr.upload.addEventListener('progress', progressHandlingFunction.bind(inputElement), false);
                        //}
                        //mano
                        myXhr.upload.addEventListener("progress", function(evt){
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                //Do something with download progress
                                console.log(percentComplete);
                            }
                        }, false);

                        return myXhr;
                    },
                    success: function (xhr) {
                        //resetImageFile(inputElement);
                        if (typeof(xhr) !== 'object') {
                            //gallery_onError(null);
                            return false;
                        }

                        if (xhr.hasOwnProperty('error')) {
                            //gallery_onError(xhr.error);
                            return false;
                        }

                        if (!xhr.hasOwnProperty('success')) {
                            //gallery_onError(null);
                            return false;
                        }
                        //addPhoto(xhr);
                    },
                    error: function () {
                        //resetImageFile(inputElement);
                        //gallery_onError(null);
                    },
                    complete: function () {
                        uploadFile(inputElement, files, ++index);
                    }
                });
            };

            $('.tabs a').on('click', function (e) {
                e.preventDefault();
                var tab = $(this);
                var tabId = $(this).data('tab');
                var beforeTab = $('.tabs a.active');
                var beforeTabId = $(beforeTab).data('tab');

                if (tabId && beforeTab) {
                    /* remove active class from tab */
                    beforeTab.removeClass('active');
                    $(beforeTabId).removeClass('active');
                    $(beforeTabId).addClass('no-active');
                    console.log(beforeTabId);
                    console.log(tabId);
                    /* add active class to tab */
                    tab.addClass('active');
                    $(tabId).removeClass('no-active');
                    $(tabId).addClass('active');
                }

            });

            $('#more-cities').on('click', function(e) {
                e.preventDefault();
                var cities = $('.more-cities');
                if (cities.hasClass('hidden')) {
                    cities.removeClass('hidden');
                } else {
                    cities.addClass('hidden');
                }
            });
        });
    </script>
</head>

<body>
<header>
    <div class="container">
        <div class="header-container">
            <a href="" title=""><img src="img/small-2.png" alt="" title="" /></a>
            <div class="header-button">
                <a href="" title="" class="heart-header-button">
                    <i class="fa fa-heart fa-fw" aria-hidden="true"></i> (1) Įsiminti
                </a>
                <a href="" title="" class="add-header-button">
                    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Įkelti skelbimą
                </a>
            </div>
        </div>
        <h1><span class="text-shadow">Kalėdinių eglučių paieška Lietuvoje</span></h1>
        <div id="search">
            <input type="text" value="" placeholder="Įveskite miesto pavadinimą..." />
            <button><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
        </div>
    </div>
</header>
<section>
    <div class="container">
        @yield('content')
    </div>
</section>
<footer>
    <div class="container">
        2017 &copy; eglutekaledoms.lt. Visos teisės saugomos
    </div>
</footer>
</body>
</html>