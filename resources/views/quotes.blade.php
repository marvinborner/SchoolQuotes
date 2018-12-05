@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-3">Zitate des {{ config('app.name') }}</h1>

    <form action="quote" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="quote">Zitat:</label>
            <input name="quote" type="text" class="form-control" id="quote" aria-describedby="emailHelp" placeholder="z.B. Ich bin toll!">
        </div>
        <div class="form-group">
            <label for="quotist">Person:</label>
            <input name="quotist" type="text" class="form-control" id="quotist" placeholder="z.B. Marvin/Herr Wolkersdorfer">
        </div>
        <button type="submit" class="btn btn-primary">Senden!</button>
    </form>
    <br>
    <table class="table table-dark rounded">
        <thead>
        <tr>
            <th scope="col">Zitat</th>
            <th scope="col">Person</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($quotes as $quote)
            <tr>
                <td class="table-text">{{ $quote->quote }}</td>
                <td class="table-text">{{ $quote->quotist }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
