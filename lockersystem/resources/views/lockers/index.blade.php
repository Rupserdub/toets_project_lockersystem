@extends('layouts.main')

@section('content')
    <h1>Locker overzicht</h1>

    {{-- LET OP DIT IS EEN HARDCODED VOORBEELD DIE JE KUNT GEBRUIKEN TER INSPIRATIE --}}
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Lockercode</th>
                <th>Locatie </th>
                <th>Opleiding </th>
                <th>Studentnummer </th>
                <th>Uitgegeven op</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{-- check of studentnummer is ingevuld of niet --}}
       
        {{-- laat lockers zien met studentnummer --}}
            @foreach ($lockers as $locker)
            @if ($locker->studentnummer != NULL)
            <tr>
                <td>{{$locker->id}}</td>
                <td>{{$locker->lockercode}}</td>
                <td>{{$locker->locatiecode}}</td>
                <td>{{$locker->opleidingcode}}</td>
                <td>{{$locker->studentnummer}}</td>
                <td>{{$locker->uitgegeven_op}}</td>
                <td>
                   {{-- Roep de vrij geef functie aan --}}
                    <form action={{route('lockers.release', $locker->id)}} method="POST">
                        @csrf
                        @method('PUT')
                        <input type="submit" value="vrijgeven" class="btn btn-info">
                    </form>
                    
                </td>
            </tr>
            
            @else
            <tr>
                {{-- laat lockers zien zonder studentnummer --}}
                <td>{{$locker->id}}</td>
                <td>{{$locker->lockercode}}</td>
                <td>{{$locker->locatiecode}}</td>
                <td>{{$locker->opleidingcode}}</td>
                <td></td>
                <td>
                    {{-- roep de koppel functie aan --}}
                    <form action={{route('lockers.update', $locker->id)}} method="POST">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="locker" value="">
                        <input type="text" placeholder="studentnummer" name="student" value="{{$locker->studentnummer}}">
                        <input type="date" name="uitgegeven" value="{{$locker->uitgegeven_op}}">
                        <input type="submit" value="student koppelen" class="btn btn-primary">
                    </form>
                </td>
            </tr>

        </tbody>
            @endif
            @endforeach

          
    </table>
    <a href={{route('lockers.create')}} class="btn btn-primary">+ Nieuwe locker Toevoegen</a>
@endsection