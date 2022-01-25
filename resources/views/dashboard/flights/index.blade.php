@extends('adminlte::page')

@section('content_header')
    <h1>@lang('dashboard.profile')</h1>
@stop

@php
$heads = [
    'ID',
    'Name',
    ['label' => 'Phone', 'width' => 40],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];



$config = [
    // 'data' => [
    //     [22, 'John Bender', '+02 (123) 123456789', '<nobr></nobr>'],
    //     [19, 'Sophia Clemens', '+99 (987) 987654321', '<nobr></nobr>'],
    //     [3, 'Peter Sousa', '+69 (555) 12367345243', '<nobr></nobr>'],
    // ],
    'order' => [[1, 'asc']],
    // 'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

@section('content')


<x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
  @foreach($flights as $row)
      @include('dashboard.flights.partials.row', ['row' => $row])
  @endforeach
</x-adminlte-datatable>


  
@endsection



