@extends('app')
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ url('menu.store') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-6">
                    <label for="" class="form-label">Name</label><br>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                </div>

                <div class="col-6">
                    <label for="" class="form-label">Parent</label><br>
                    <select name="parent_id" id="" class="form-select">
                        <option value=""></option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                        <option value="pimpinan">Pimpinan/Manager</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Icon</label><br>
                    <input type="text" class="form-control" name="icon" placeholder="Enter Icon">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">URL</label><br>
                    <input type="text" class="form-control" name="url"
                    placeholder="Enter Url">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Sort Order</label><br>
                    <input type="number" class="form-control" name="sort_order">
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Status</label><br>
                    <input type="radio" class="form-control" name="is_active" value="1">Active
                    <input type="radio" class="form-control" name="is_active" value="0">In-Active
                </div>
                <div class="col-6">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
