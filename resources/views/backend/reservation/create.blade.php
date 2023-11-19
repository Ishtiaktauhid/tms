@extends('backend.layout.app')
@section('content')
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Reservation Lavel</h6>
        <form class="form" method="post" enctype="multipart/form-data" action="{{route('reservation.store')}}">
            @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="team_id">
            @if($errors->has('team_id'))
            <span class="text-danger"> {{ $errors->first('team_id') }}</span>
            @endif
            <label for="team_id">Team ID</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select"  
                aria-label="Floating label select example" name="sports_type">
                <option value="">Game Type</option>
                <option value="cricket" @if(old('sports_type')=="cricket") selected @endif>Cricket</option>
                <option value="football" @if(old('sports_type')=="football") selected @endif>Football</option>
             </select>
            @if($errors->has('sports_type'))
            <span class="text-danger"> {{ $errors->first('sports_type') }}</span>
            @endif
           </div>
           <div class="form-floating mb-3">
            <input type="time" class="form-control" id="floatingInput" name="start_time">
            <label for="start_time">Start Time</label>
        </div>
           <div class="form-floating mb-3">
            <input type="time" class="form-control" id="floatingInput" name="end_time">
            <label for="end_time">End Time</label>
        {{-- </div>
           <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="reservation_date">
            <label for="reservation_date">Reservation Date</label>
        </div> --}}
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
         
    </div>
</div>
@endsection