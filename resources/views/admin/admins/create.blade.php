{{-- @extends('layouts.admin.admin') --}}
@extends(auth()->guard('admin')->check() ?'layouts.admin.admin':'layouts.agents.agent_layouts')

@section('main-head' , __('translation.add_new_users'))
@section('content')

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
        <div class="card p-5">
            @include('layouts.includes.session')

            <div class="card-body p-3">
    <div class="row">
        <form action="{{route('admin.admin.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="col-md-12">
            <div class="card p-4">
                <div class="row">
                    <x:text-input class="col-md-6" name='name'  />
                    <x:text-input class="col-md-6" name='email'  />
                    <x:text-input class="col-md-6" name='password'  />
                    <x:select-options name='id_type' :options="App\Models\Admin::IDTYPES" class='col-md-6' />
                    <x:text-input class="col-md-6" name='id_number'   />
                    <x:text-input class="col-md-6" name='phone'  />
                    <x:input-file class="col-md-6" name='id_image'  />
                    <x:input-file class="col-md-6" name='profile_image'  />

                    <x:select-options name='role_idd' :options="$roles" class='col-md-6' />


                    <div class="mt-3">
                        <button class="btn-primary btn">
                            {{ __('translation.save') }}
                        </button>
                        <a href="javascript::back()" class="btn btn-light-danger">
                            {{ __('translation.cancel') }}
                        </a>
                    </div>
                </div>
            </div><!-- end of tile -->
        </div><!-- end of col -->
    </form>
    </div>
</div><!-- end of row -->
        </div>
        </div>
    </div>
@endsection

@push('scripts');
<script src="{{ asset('admin_assets/js/custom/index.js')}}"></script>
<script src="//code.jquery.com/jquery.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    // alert('worgiing');
        let rolesTable = $('#roles-table').DataTable({
            dom: "tiplr",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('admin.admins.data') }}',
            },
            columns: [
                {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email', searchable: false},
                {data: 'roles', name: 'roles', searchable: false},
                {data: 'created_at', name: 'created_at', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            order: [[3, 'desc']],
            drawCallback: function (settings) {
                $('.record__select').prop('checked', false);
                $('#record__select-all').prop('checked', false);
                $('#record-ids').val();
                $('#bulk-delete').attr('disabled', true);
            }
        });

        $('#data-table-search').keyup(function () {
            rolesTable.search(this.value).draw();
        });
</script>

@endpush
