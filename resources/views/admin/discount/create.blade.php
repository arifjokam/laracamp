@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Insert a new Discount
                    </div>
                    <div class="card-body">
                    <form action="{{ route('admin.discount.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Code</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description"    cols="0" rows="2" class="form-control"></textarea>  
                        </div>
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Discount Percentage</label>
                            <input type="number" class="form-control" min="1" max="100">
                        </div>
                        <div class="form-group mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection