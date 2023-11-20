@php
use Illuminate\Support\Carbon;
@endphp

@extends('base')
@section('big-title')
<h1 class="mt-4">Data pembacaan</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Rekam kondisi kandang ayam petelur</li>
          </ol>
@endsection
@section('title')
    <i class="fas fa-table me-1"></i>
    Tabel Data
@endsection

@section('body')

<div class="dropdown">
  <form action="/table" method="GET" class="mb-3">
        <label for="posisi"> Posisi : </label>
        <select name="posisi" id="posisi">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
          </select>
        
        <label for="tanggal">Tanggal :</label>
        <input type="datetime-local" id="tanggal" name="tanggal">
        <input type="submit" value="Ambil Data">
      </form>
</div>

<table data-s-dom="lrtip" id="datatablesSimple">
    <thead>
      <tr>
        <th>No</th>
        <th>Waktu</th>
        <th>Suhu</th>
        <th>Kelembaban</th>
        <th>Gas</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th>No</th>
        <th>Waktu</th>
        <th>Suhu</th>
        <th>Kelembaban</th>
        <th>Gas</th>
      </tr>
    </tfoot>
    <tbody> 
      @foreach ($data as $data)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ Carbon::parse("$data->created_at")->setTimezone('Asia/Jakarta')->toDateTimeString() }}</td>
          @if($pos == 'A')
          <td>{{ $data->temperature_1 }}</td>
          <td>{{ $data->humid_1 }}</td>
          <td>{{ $data->gas_1 }}</td>
          @elseif($pos == 'B')
          <td>{{ $data->temperature_2 }}</td>
          <td>{{ $data->humid_2 }}</td>
          <td>{{ $data->gas_2 }}</td>
          @elseif($pos == 'C')
          <td>{{ $data->temperature_3 }}</td>
          <td>{{ $data->humid_3 }}</td>
          <td>{{ $data->gas_3 }}</td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>

  <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>

@endsection