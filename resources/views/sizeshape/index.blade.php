    <x-master>
        <x-slot:title>
            {{__('Sizes')}}
        </x-slot:title>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h5 class="h2">{{__('Add Sizes')}}</h5>
            <div class="btn-toolbar mb-2 mb-md-0">

                <a type="button" href="{{route('sizeshape.trash')}}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-trash"></i>
                    {{__('Trash')}}
                </a>
            </div>
        </div>

        <form action="{{route('sizeshape.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <form class="form-light">
                <div class="d-flex">
                    <div class="col-6">
                        <x-forms.input name="title" class="mt-2" title="Size" type="text" id="title" :value="old('title')" />
                    </div>

                </div>
                <div class="form-group col-8 m-3">
                    <button type="submit" class="btn btn-outline-info m-3 col-6">{{__('Save')}}</button>
                </div>


            </form>
        </form>
        <hr>
        <div class="container-fluid pt-2 px-2">
            <h5 class="h2">{{__('Sizes')}}</h5>

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Sizes')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sizeshapes as $size)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $size->title }}</td>


                        <td>
                            <form action="{{ route('sizeshape.destroy', $size->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')"><i class="fa-solid fa-trash fs-5"></i></button>
                            </form>



                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>

        </div>

    </x-master>