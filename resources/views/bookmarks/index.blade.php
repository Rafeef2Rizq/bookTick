<!DOCTYPE html>
<html lang="en">


<x-main.head />

<body>

    <!-- perloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>
    <!-- preloader -->

    <!-- HEADER AREA START -->
    <x-main.header />

    <!-- right-menu modal -->
    <x-main.menu />
    <!-- contact modal -->
    <x-main.contact />

    <!-- HEADER AREA ENDS -->
    <!-- bookmark -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    @endif
    <section id="page-title">
        <div id="backtotop">
            <a href="#page-title" id="backtotop-value"><i class="fa-solid fa-arrow-up"></i></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <div class="row">
                        <div class="col-lg-6">
                            <span>Bookmark</span>
                            <h3>Your Favourite Comic Books.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="bookmark">

        <div class="container">

            <div class="row">
                @foreach ($bookmarks as $bookmark)
                <div class="col-lg-3 col-md-6 bookmark-item text-center">
                    <img src="images/{{ $bookmark->book->image }}" alt="comic-img" class="img-fluid">
                    <h3>{{ $bookmark->book->title }}</h3>
                    <form action="{{ route('bookmarks.destroy', $bookmark->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-primary">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
                  @endforeach
            
            </div>
        </div>
    </section>
   

    <!-- bookmark -->



    <!-- FOOTER AREA START -->
    <x-main.footer />
    <!-- FOOTER AREA END -->

    <!-- COPY_RIGHT AREA START -->
    <section id="copy_right">
        <div class="container">
            <div class="row copyright-txt">
                <div class="col-lg-6">
                    <span>LANGUAGE: </span>
                    <a href="#">BAN</a>
                    <a href="#">NL</a>
                    <a href="#" class="active">EN</a>
                    <a href="#">FR</a>
                    <a href="#">EU</a>
                </div>
                <div class="col-lg-6 text-end">
                    <p>&copy; Made by EpikTheme. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- COPY_RIGHT AREA END -->

    <!-- JavaScript -->
    <x-main.script />
</body>


<!-- Mirrored from epiktheme.com/demos/html/comixo_live_preview/demos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 03:52:57 GMT -->

</html>