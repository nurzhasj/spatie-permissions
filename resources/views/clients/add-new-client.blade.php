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
                <form method="post" action="{{ route('store-client') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput0" class="form-label">{{ $company->title }}</label>
                        <input name="company_id" value="{{ $company->id }}" readonly type="number"  class="form-control" id="exampleFormControlInput0" placeholder="Some company">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input name="name" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="Freddie">
                        <label for="exampleFormControlInput2" class="form-label">Surname</label>
                        <input name="surname" type="text"  class="form-control" id="exampleFormControlInput2" placeholder="Mercury">
                        <label for="exampleFormControlInput3" class="form-label">Telephone number</label>
                        <input name="number" type="number" class="form-control" id="exampleFormControlInput3" placeholder="+7 777 111 22 33">
                        <label for="exampleFormControlInput4" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput4" placeholder="queen@gmail.com">
                        <label for="exampleFormControlInput5" class="form-label">Balance</label>
                        <input name="balance" type="number" class="form-control" id="exampleFormControlInput5" placeholder="0">
                        <label for="exampleFormControlInput6" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleFormControlInput6" placeholder="********">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
