
<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif -->
            @if(session('success'))
            <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @if(session('error'))
                <h1>{{session('error')}}</h1>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- <div class="p-6 bg-white border-b border-gray-200">
                    User List
                </div> -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="btn btn-success" href="{{ route('addNotifications') }}">Add Notifications</a>
                </div>
                <div>
                <table id="users">
                    <tr>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Expiry Date</th>
                        <th>Destination User</th>
                        <th>Status</th>
                    </tr>
                    @foreach($notifications_list as $list)
                    <tr>
                        <td>{{$list->type}}</td>
                        <td>{{$list->description}}</td>
                        <td>{{$list->expiry_date}}</td>
                        <td>{{$list->user->name}}</td>
                        <td>{{$list->status == 1 ? 'Read' : 'Unread'}}</td>
                        
                    </tr>
                    @endforeach
                    
                    
                </table>
            </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
