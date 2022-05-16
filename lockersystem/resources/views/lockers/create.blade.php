@extends('layouts.main')

@section('content')
<h1>Create a Locker</h1>
    
{{-- stuur de form naar de store --}}
    <form action={{route('lockers.store')}} method="POST">
        @csrf
<label for="text">Locatiecode:</label>
<input class="form-control" type="text" name="locatiecode"  required>
<br>
<label for="text">Opleidingcode</label>
<input class="form-control" type="text" name="opleidingcode"  required>
<br>
<label for="text">Lockercode:</label>
<input class="form-control" type="text" name="lockercode"  required>
<br>
<input type="submit" name="Edit" class="btn btn-primary" value="Create Locker">

    </form>
@endsection