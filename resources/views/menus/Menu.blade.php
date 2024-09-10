@extends('layouts.admin')

@section('main')

<div class="container mt-4">
    <div class="card shadow-lg rounded-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Today's Menu</h3>
        </div>
        <div class="card-body bg-light p-4">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th>
                            <th width="200px" class="text-center">Actions</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menuData as $itemdata => $value)
                        <tr>
                            <td>{{ $value->breakfast }}</td>
                            <td>{{ $value->lunch }}</td>
                            <td>{{ $value->dinner }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-outline-primary mx-1" href="{{ route('menus.editMenu', $value->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Menu">
                                    <i class="fas fa-edit"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination links -->
            <div class="d-flex justify-content-center mt-3">
                {!! $menuData->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection
