<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Quick Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body side-menu">
        <!-- Search Form -->
        <form>
            <input type="text" class="form-control" placeholder="Search by book Name">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>



        <!-- Comic Thumbnails -->
        <div class="row pt-5">
            <div class="col-lg-6 menu-comic">
                <a href="comic_details.html"><img src="{{ asset('assets/main/images/comic1.png') }}" alt="comic" class="img-fluid"></a>
            </div>
            <div class="col-lg-6 menu-comic">
                <a href="comic_details.html"><img src="{{ asset('assets/main/images/popular1.png') }}" alt="comic" class="img-fluid"></a>
            </div>
            <div class="col-lg-6 menu-comic">
                <a href="comic_details.html"><img src="{{ asset('assets/main/images/popular2.png') }}" alt="comic" class="img-fluid"></a>
            </div>
            <div class="col-lg-6 menu-comic">
                <a href="comic_details.html"><img src="{{ asset('assets/main/images/comic3.png') }}" alt="comic" class="img-fluid"></a>
            </div>
        </div>

        <!-- Browse All Button -->
        <div class="row pt-5">
            <div class="col-lg-12 text-center">
                <a href="/books" class="button-primary">Browse All</a>
            </div>
        </div>
        @guest


        <div class="row pt-5">
            <div class="col-lg-12 text-center">
                <a href="/login" class="button-primary">Login</a>
            </div>
        </div>
        @endguest
        <div class="row pt-5">

            <div class="col-lg-9 text-center">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="button-primary"
                    style="background-color: red;padding:10px">Logout</button>
                </form>
            </div>

        </div>

    </div>
</div>