<div class="container m-5">
    <div class="row">
        <div class="col-3">
            <ul>
                @foreach($categories as $category)
                <li><a class="dropdown-item" href="{{route('audience.products',$category->id)}}">{{ $category->categoryName }}</a></li>
                <hr>
                @endforeach
            </ul>
        </div>
        <div class="col-9">

            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($products as $key => $product)
                <div class="col">
                    <div class="card">
                        <img height="250" src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->productName }}" />
                        <div class="card-body">

                            <h3>{{ Str::limit($product->productName, 40) }}</h3>
                            <h5>Category: {{ Str::limit($product->category->categoryName) }}</h5>
                            <p>{{ Str::limit($product->description, 50) }}</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-warning " href="{{route('audience.product.show',$product->id)}}"><i class="fa-regular fa-eye"></i> View details &raquo;</a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>