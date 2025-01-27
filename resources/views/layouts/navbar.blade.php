<nav style="padding:10px 0; z-index: 100;">
    <div class="container" style="    flex-direction: column;
    width: 100%;">
        <div style="    width: 100%;
    display: flex
;
    align-items: center;
    justify-content: space-between;">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="موقع سيارات" style="height: 50px;">
            </a>
            <button class="navbar-toggler" style="color: white;" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">جميع السيارات</a></li>
                <li class="nav-item"><a href="{{ url('pricing') }}" class="nav-link">التصنيفات</a></li>
                <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">تواصل معنا</a></li>
            </ul>
        </div>
    </div>
</nav>
<style>
.navbar-nav {
    margin-left: 0 !important;
    padding-left: 0 !important;
}

.navbar-nav .nav-item {
    margin-right: 20px;
}

.nav-link {
    font-size: 16px;
    font-weight: 500;
}

.navbar-brand {
    margin-right: 0;
    margin-left: 1rem;
}

@media (max-width: 991.98px) {
    .navbar-collapse {
        text-align: right;
    }
    
    .navbar-brand {
        margin-right: auto;
    }
}

</style>