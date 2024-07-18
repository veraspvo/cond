@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif    

@if (session()->has('message'))
    <div class="alert alert-info" role="alert">
        {{ session('message') }}
    </div>
@endif    

@if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif   

@if (session()->has('message_novo_numero'))
    <div class="alert alert-success" role="alert">
        <h5>{{ session('message_novo_numero') }}</h5>
    </div>
@endif    

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif