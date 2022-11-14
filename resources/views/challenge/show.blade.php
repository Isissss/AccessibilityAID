@extends('layouts.web')

@section('content')
    <header class="p-3 w-100 bg-primary d-flex flex-row align-items-center justify-content-between header-color">
        <a href="" class="text-decoration-none text-black"><h1>Webshop</h1></a>
        <div class="col-md-5 d-flex align-items-center gap-2">
            <label for="search" class="fw-bold">Zoeken:</label>
            <input id="search" type="text" class="form-control">
            <button class="btn btn-primary nav-color">Zoeken</button>
        </div>
        <a href="" class="d-flex align-items-center text-decoration-none text-black">
            <svg class="svg-icon" viewBox="0 0 20 20" width="32" height="32">
                <path
                    d="M12.075,10.812c1.358-0.853,2.242-2.507,2.242-4.037c0-2.181-1.795-4.618-4.198-4.618S5.921,4.594,5.921,6.775c0,1.53,0.884,3.185,2.242,4.037c-3.222,0.865-5.6,3.807-5.6,7.298c0,0.23,0.189,0.42,0.42,0.42h14.273c0.23,0,0.42-0.189,0.42-0.42C17.676,14.619,15.297,11.677,12.075,10.812 M6.761,6.775c0-2.162,1.773-3.778,3.358-3.778s3.359,1.616,3.359,3.778c0,2.162-1.774,3.778-3.359,3.778S6.761,8.937,6.761,6.775 M3.415,17.69c0.218-3.51,3.142-6.297,6.704-6.297c3.562,0,6.486,2.787,6.705,6.297H3.415z"></path>
            </svg>
            <div>Profiel</div>
        </a>
    </header>
    <nav class="d-flex flex-row bg-info p-1 px-3 gap-4 nav-color">
        <a href="" class="text-decoration-none text-black"><h4 class="mt-2">Categorie 1</h4></a>
        <a href="" class="text-decoration-none text-black"><h4 class="mt-2">Categorie 2</h4></a>
        <a href="" class="text-decoration-none text-black"><h4 class="mt-2">Categorie 3</h4></a>
        <a href="" class="text-decoration-none text-black"><h4 class="mt-2">Categorie 4</h4></a>
        <a href="" class="text-decoration-none text-black"><h4 class="mt-2">Categorie 5</h4></a>
        <a href="" class="text-decoration-none text-black"><h4 class="mt-2">Categorie 6</h4></a>
        <a href="" class="text-decoration-none text-black"><h4 class="mt-2">Categorie 7</h4></a>
    </nav>
    <main class="d-flex m-5 gap-5">
        <filters class="col-md-2 border d-flex flex-column p-3 gap-4 my-auto">
            <h1>Filters</h1>
            <div class="form-group">
                <h2><label for="prijsRange" class="form-label">Prijs</label></h2>
                <input type="range" class="form-range" id="prijsRange">
            </div>
            <div class="form-group">
                <h2><label for="lengteRange" class="form-label">Lengte</label></h2>
                <input type="range" class="form-range" id="lengteRange">
            </div>
            <div class="form-group">
                <h2><label for="breedteRange" class="form-label">Breedte</label></h2>
                <input type="range" class="form-range" id="breedteRange">
            </div>
            <div class="form-group">
                <h2><label for="hoogteRange" class="form-label">Hoogte</label></h2>
                <input type="range" class="form-range" id="hoogteRange">
            </div>
        </filters>
        <products class="col-md-9 gap-4 d-flex flex-wrap">
            <div class="col-md-2">
                <div class="card">
                    <img
                        src="https://www.mountaingoatsoftware.com/uploads/blog/2016-09-06-what-is-a-product.png"
                        alt="" class="card-img top">
                    <div class="card-body ">
                        <h3>Product 1</h3>
                        <a href="" class="stretched-link opacity-0">Product 1</a>
                    </div>
                </div>
            </div>
        </products>
    </main>
@endsection
