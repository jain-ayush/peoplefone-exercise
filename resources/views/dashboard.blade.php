
<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- <div class="p-6 bg-white border-b border-gray-200">
                    User List
                </div> -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="btn btn-success" href="{{ route('listNotifications') }}">Notifications</a>
                </div>
                <div>
                <table id="users">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Notification Switch</th>
                        <th>Action</th>
                    </tr>
                    @foreach($lists as $list)
                    <tr>
                        <td><a class="text-success" href="{{ url('view-notification/'.$list->id) }}">{{$list->name}}</a></td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone_number}}</td>
                        <td>{{$list->address}}</td>                        
                        <td>{{$list->notification_switch == 1 ? 'On' : 'Off'}}</td>
                        <td>
                            <a href="{{ url('edit-user/'.$list->id) }}"><i class="fa fa-edit"></i></a> 
                        </td>
                    </tr>
                    @endforeach
                    
                    
                </table>
            </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
