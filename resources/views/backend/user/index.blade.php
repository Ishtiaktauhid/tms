@extends('backend.layout.app')
@section('title',trans('Users List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">User List</h6>
            <div class="table-responsive">
                <a class="pull-right fs-1" href="{{route('user.create')}}"><i class="fa fa-plus"></i></a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{__('#SL')}}</th>
                            <th scope="col">{{__('Name')}}</th>
                            <th scope="col">{{__('Email')}}</th>
                            <th scope="col">{{__('Contact')}}</th>
                            <th scope="col">{{__('Role')}}</th>
                            <th scope="col">{{__('Image')}}</th>
                            <th scope="col">{{__('Status')}}</th>
                            <th class="white-space-nowrap">{{__('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $d)
                        <tr>
                            <th scope="row">{{ ++$loop->index }}</th>
                            <td>{{$d->name_en}}</td>
                            <td>{{$d->email}}</td>
                            <td>{{$d->contact_no_en}}</td>
                            <td>{{$d->role?->type}}</td>
                            <td><img width="50px" src="{{asset('public/uploads/users/'.$d->image)}}" alt=""></td>
                            <td>@if($d->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                            <td class="white-space-nowrap">
                                <a href="{{route('user.edit',encryptor('encrypt',$d->id))}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:void()" onclick="$('#form{{$d->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="form{{$d->id}}" action="{{route('user.destroy',encryptor('encrypt',$d->id))}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th colspan="8" class="text-center">No Pruduct Found</th>
                        </tr>
                        @endforelse
                      </tbody> 
                </table>
            </div>
        </div>
    </div>
                
</section>
@endsection