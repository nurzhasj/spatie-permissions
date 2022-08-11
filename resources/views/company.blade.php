<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
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
                    @foreach($clients as $client)
                        <div class="card-body">
                            <h5 class="card-title" id="name">{{ $client->name }}</h5>
                            <h5 class="card-title" id="surname">{{ $client->surname }}</h5>
                            <h3 class="card-text" id="phone">{{ $client->number }}</h3>
                            <h3 class="card-text" id="balance">Balance: {{ $client->balance }}</h3>
                            <a href="" class="btn btn-primary">Check Bonus</a>
                            <form action="" method="post" style="display: inline-block">
                                <button type="submit" class="btn btn-danger">Send Bonus</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
