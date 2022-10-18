<x-audience.master>
    <x-slot:title>
        {{__('Laravel Crud | Products')}}
    </x-slot:title>
    <div class="container marketing">
        <br><br><br><br>
        <!-- Three columns of text below the carousel -->
        <div class="row">
            @foreach($category->products as $product)
            <div class="col-lg-4 mb-2">

                <div class="card">
                    <div class="card-header">
                        <img height="250" src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->productName }}" />
                    </div>
                    <div class="card-body">
                        <h3>{{ Str::limit($product->productName, 40) }}</h3>
                        <p>{{ Str::limit($product->description, 50) }}</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-warning " href="#"><i class="fa-regular fa-eye"></i> View details &raquo;</a>
                    </div>
                </div>
            </div><!-- /.col-lg-4 -->
            @endforeach
        </div><!-- /.row -->
        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->
</x-audience.master>