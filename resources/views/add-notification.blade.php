<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <strong>Add Notification</strong>
                </div>
                
                <div class="card mx-auto" style="width: 50%;">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                    <form action="{{ url('add-notifications/') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-3">
                            <label for="">Type</label>
                            <select name="type" id="type" class="form-select">
                                <option value="">Select Type</option>
                                <option value="marketing">Marketing</option>
                                <option value="invoice">Invoice</option>
                                <option value="system">System</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Expiry Date</label>
                            <input type="date" name="expiry_date" value="" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Destination</label>
                            <select name="destination" id="destination" class="form-select">
                                <option value="">Select User</option>
                                @foreach($user_lists as $list)
                                <option value="{{$list->id}}">{{$list->name}}</option>
                                @endforeach
                                <option value="select_all">Select All Users</option>

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Add Notification</button>
                        </div>

                    </form>

                </div>
            </div>
            </div>
            
        </div>
    </div>

</x-app-layout>