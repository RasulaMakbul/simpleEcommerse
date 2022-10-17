    <x-master>
        <x-slot:title>
            {{__('trash')}}
        </x-slot:title>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{__('Trash')}}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">

                <a type="button" href="{{route('sizeshape.index')}}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa-solid fa-list"></i>
                    {{__('Sizes')}}
                </a>
            </div>
        </div>

        <div class="container-fluid pt-4 px-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('Size')}}</th>
                        <th scope="col">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sizeshapes as $size)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $size->title }}</td>


                        <td>
                            <a href="{{route('sizeshape.restore',$size->id)}}" class="link-info"><i class="fa-solid fa-arrow-rotate-left fs-5"></i></a>
                            <form action="{{ route('sizeshape.delete', $size->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm link-danger" onclick="return confirm('Are you sure want to delete')" title="Permanent Delete"><i class="fa-solid fa-trash fs-5"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>

        </div>

    </x-master>