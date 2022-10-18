<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">Fruit Fantasy</a>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle outline-secondary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{route('audience.products',$category->id)}}">{{ $category->categoryName }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <form class="d-flex"><a class="btn btn-outline-light" href="{{route('login')}}"><i class="fa-solid fa-arrow-right-to-bracket"> Login</i></a>
                </form>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light">
        <!-- <div class="container-fluid nav2"> -->
        <form class="container-fluid nav2" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">
                Search
            </button>
        </form>
        <!-- </div> -->
    </nav>
</header>