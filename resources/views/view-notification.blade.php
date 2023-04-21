
<x-app-layout>
    <x-slot name="header">
  
        <div>
            <a class="y" data-bs-toggle="collapse" href="#collapseExample" role="button"      aria-expanded="false" aria-controls="collapseExample">
                <span class="fa-stack fa-2x" data-count="{{count($user_notifications->unread_notifications)}}">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-bell fa-stack-1x fa-inverse"></i>
                </span>
            </a>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                <ul class="">
                    @foreach($user_notifications->unread_notifications as $list)
                        <li onclick="changeStatus({{$list->id}})"><a class="dropdown-item" href="#">{{$list->description}}</a></li>
                    @endforeach
                </ul>
                </div>
                <p>{{$user_notifications->name}}</p>
            </div>
        </div>
        
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
            
            <span><b>Name : {{$user_notifications->name}}</b></span>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                <table id="users">
                    <tr>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                    </tr>
                    @foreach($user_notifications->notifications as $list)
                    <tr>
                        <td>{{$list->type}}</td>
                        <td>{{$list->description}}</td>
                        <td>{{$list->expiry_date}}</td>
                        <td>{{$list->status == 1 ? 'Read' : 'Unread'}}</td>
                        
                    </tr>
                    @endforeach
                    
                    
                </table>
            </div>
            </div>
            
        </div>
    </div>
</x-app-layout>

<script>

    function changeStatus(notificationId)
    {
        $.ajax({
        type:'POST',
        url:"{{ route('changeStatus') }}",
        data:{
            "_token": "{{ csrf_token() }}",
            notificationId:notificationId
        },
        success:function(data){
            if(data == 'success'){
                location.reload();
            }
        }

        });
    }
</script>