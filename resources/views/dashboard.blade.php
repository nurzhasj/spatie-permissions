<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('add-company') }}" class="btn btn-success">Add new company</a>
                    @foreach($companies as $company)
                        <div class="card-body">
                            <h5 class="card-title">{{ $company->title }}</h5>
                            <h3 class="card-text">{{ $company->email }}</h3>
                            <a href="{{ route('edit-company', $company->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('delete-company', $company->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('add-client', $company->id) }}" class="btn btn-success">+</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
