@extends('layouts.admin')

@section('main')

    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Mess Management System</h3>
    </div>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Edit Customer</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('products.update',$product->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label h5">Name</label>
                                <input value="{{ old('name',$product->name) }}" type="text" class="@error('name') is-invalid @enderror form-control-lg form-control" placeholder="Name" name="name">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="meal" class="form-label h5">Meal</label>
                                <select name="meal" id="meal" class="@error('meal') is-invalid @enderror form-control form-control-lg">
                                    <option value="monthly" {{ old('meal', $product->meal) == 'monthly' ? 'selected' : '' }}>Monthly Subscription</option>
                                    <option value="weekly" {{ old('meal', $product->meal) == 'weekly' ? 'selected' : '' }}>Weekly Subscription</option>
                                    <option value="per_meal" {{ old('meal', $product->meal) == 'per_meal' ? 'selected' : '' }}>Per Meal</option>
                                </select>
                                @error('meal')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Price</label>
                                <input value="{{ old('price',$product->price) }}" type="text" class="@error('price') is-invalid @enderror form-control form-control-lg" placeholder="Price" name="price">
                                @error('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label h5">Image</label>
                                <input type="file" class="form-control form-control-lg" placeholder="Price" name="image">
                                
                                @if ($product->image != "")
                                    <img  class="w-50 my-3" src="{{ asset('uploads/products/'.$product->image) }}" alt="">
                                @endif
                            </div>
                            <div class="mb-3">
                                    <label for="text" class="form-label h5">Email</label>
                                    <input type="text"  value="{{old('email', $product->email)}}" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" >
                                    @error('email')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label h5">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" >
                                    @error('password')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                    <label for="password_confirmation" class="form-label h5">Confirm Password</label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="Confirm Password" >
                                    @error('password_confirmation')
                                    <p class="invalid-feedback">{{$message}}</p>
                                    @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
 @endsection
