@extends('backend.layout.app')
@section('title',trans('Users List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Reservation List</h6>
            <div class="table-responsive">
                <a class="pull-right fs-1" href="{{route('reservation.create')}}"><i class="fa fa-plus"></i></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Team Id')}}</th>
                            <th scope="col">{{__('Sports Type')}}</th>
                            <th scope="col">{{__('Start Time')}}</th>
                            <th scope="col">{{__('End Time')}}</th>
                            {{-- <th scope="col">{{__('Reservation Date')}}</th> --}}
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservation as $r)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$r->team_id}}</td>
                            <td>{{$r->sports_type}}</td>
                            <td>{{$r->start_time}}</td>
                            <td>{{$r->end_time}}</td>
                         
                           <td class="white-space-nowrap">
                                <a href="{{route('reservation.edit',encryptor('encrypt',$r->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$r->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$r->id}}" action="{{route('reservation.destroy',encryptor('encrypt',$r->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="8" class="text-center">No Reservation Found</th>
                        </tr>
                        @endforelse
                      </tbody> 
                </table>
            </div>
        </div>
    </div>
                
</section>
@endsection
