@extends('backend.layout.app')
@section('content')
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Reservation Edit</h6>
        <form action="" method="post">
            @csrf
            @method('PATCH')
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="">
            <label for="floatingInput">Team ID</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select"  
                aria-label="Floating label select example">
                <option value="">Game Type</option>
                <option value="1">Cricket</option>
                <option value="2">Football</option>
                <option value="3">Vollyball</option>
                <option value="3">Pool</option>
                <option value="3">Basketball</option>
            </select>
           </div>
           <div class="form-floating mb-3">
            <input type="time" class="form-control" id="floatingInput" name="">
            <label for="floatingInput">Start Time</label>
        </div>
           <div class="form-floating mb-3">
            <input type="time" class="form-control" id="floatingInput" name="">
            <label for="floatingInput">End Time</label>
        </div>
           <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" name="">
            <label for="floatingInput">Reservation Date</label>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
         
    </div>
</div>
@endsection