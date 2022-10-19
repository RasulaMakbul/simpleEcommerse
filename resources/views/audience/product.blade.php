<x-audience.master>
    <x-slot:title>
        {{__('Laravel Crud | Products')}}
    </x-slot:title>
    <div class="container ">
        <div class="justify-content-md-center pb-2">
            <div class="main">
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="mt3">
                                    <h3>{{$product->productName}}</h3>
                                    <img height="250" src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->productName }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mt-1">
                        <div class="card mb-3 content">
                            <h1 class="m-3 pt-3">About</h1>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Product Name</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{$product->productName}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Category</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{$product->category->categoryName}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5> Price</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{$product->stock}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Stock Available</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{$product->stock}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Description</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{$product->description}}
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-md-3">
                                        <h5>available Color</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{-- @foreach($colors as $key=>$color)
                                        @if(in_array($key,$selectedColors))
                                        <p> {{$color->title}}</p>
                                        @endif
                                        @endforeach --}}
                                        @foreach($product->colors as $key=>$color)
                                        <span class="col border px-2 m-2" style="background-color:{{$color->colorCode}} ;">
                                            <input type="checkbox" id="{{ $key.$color->id}}" style="accent-color:{{$color->colorCode}} ;">
                                        </span>
                                        <!-- <input type="checkbox" id="{{ $key.$color->id}}" style="accent-color:{{$color->colorCode}} ;">
                                        <label class="form-check-label" for="{{ $key.$color->id }}">
                                            <span class="col border px-2" style="background-color:{{$color->colorCode}} ;"></span>
                                        </label> -->
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row m-3">
                                    <div class="col-md-3">
                                        <h5>available Sizes</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        {{-- @foreach($sizeshapes as $key=>$sizes)
                                        @if(in_array($key,$selectedsizeshapes))
                                        <p>{{$sizes->title}}</p>
                                        @endif
                                        @endforeach --}}
                                        @foreach($product->sizeshapes as $size)
                                        <span class="col px-2 m-2">
                                            <input type="checkbox" id="{{ $key.$size->id}}"> <label for="{{ $key.$size->id}}">{{$size->title}}</label>
                                        </span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class=" justify-content-center fs-1 mb-3">
                                    <a href="#" class="btn btn-success w-20 mt-1" type="submit"><i class="fa-solid fa-cart-plus"></i></a>
                                    <a href="{{route('home')}}" class="btn btn-secondary w-20 mt-1" type="submit">Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



</x-audience.master>