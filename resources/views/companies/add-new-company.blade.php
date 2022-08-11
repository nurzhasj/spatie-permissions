<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('store-company') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Company name</label>
                        <input name="title" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="Some company">
                        <label for="exampleFormControlInput2" class="form-label">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com">
                        <label for="exampleFormControlInput3" class="form-label">Bank Identification Number</label>
                        <input name="bin" type="text" class="form-control" id="exampleFormControlInput3" placeholder="0000 0000 0000">
                        <label for="exampleFormControlInput3" class="form-label">Balance</label>
                        <input name="balance" type="number" class="form-control" id="exampleFormControlInput4" placeholder="0">
                        <label for="exampleFormControlInput3" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleFormControlInput5" placeholder="*******">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
