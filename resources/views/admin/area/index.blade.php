{{-- @extends('layouts.admin.admin') --}}
@extends(
     'layouts.admin.admin'
)
@section('main-head',__('translation.areas'))
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card p-5">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card p-4">
                                <div class="tile ">
                                    <div class="row mb-2">
                                    </div><!-- end of row -->
                                    @include('layouts.includes.session')
                                    <div class="mx-2  border-0 ">
                                        <!--begin::Card title-->

                                        <div class="d-flex justify-content-between">
                                            <input type="text" id="data_search"
                                                    data-kt-customer-table-filter="search"
                                                    class="form-control form-control-solid w-250px"
                                                    placeholder="{{ __('translation.search_on_areas') }}">

                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_add_customer">{{ __('translation.add_area') }}</button>
                                                <!--end::Add customer-->

                                        </div>
                                        <!--begin::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Toolbar-->
                                            {{-- <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                                <a href="{{ route('offers.create', ['service_id' => $service_id]) }}"
                                                    type="button" class="btn btn-light-primary">
                                                    {{ __('translation.add_offer') }} </a>
                                            </div> --}}

                                            <div class="d-flex justify-content-end align-items-center d-none"
                                                data-kt-customer-table-toolbar="selected">
                                                <div class="fw-bolder me-5">
                                                    <span class="me-2"
                                                        data-kt-customer-table-select="selected_count"></span>Selected
                                                </div>
                                                <button type="button" class="btn btn-danger"
                                                    data-kt-customer-table-select="delete_selected">Delete Selected</button>
                                            </div>
                                            <!--end::Group actions-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table datatable align-middle table-row-dashed fs-6 gy-5"
                                                    id="roles-table" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                <div class="animated-checkbox">
                                                                    <label class="m-0">
                                                                        <input type="checkbox" id="record__select-all">
                                                                        <span class="label-text"></span>
                                                                    </label>
                                                                </div>
                                                            </th>
                                                            <th class="text-center">{{ __('translation.name') }}</th>
                                                            <th class="text-center">{{ __('translation.status') }}</th>
                                                            <th class="text-center">{{ __('translation.number_of_realstate') }}</th>
                                                            <th class="text-center">{{ __('translation.created_at') }}</th>
                                                            <th class="text-center">{{ __('translation.action') }}</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div><!-- end of table responsive -->
                                        </div><!-- end of col -->
                                    </div><!-- end of row -->
                                </div><!-- end of tile -->
                            </div><!-- end of col -->
                        </div>
                        <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Form-->
                                    <form class="form" action="{{ route('area.store') }}" method="post"
                                    >
                                    @csrf
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_customer_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">{{ __('translation.add_area') }}</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div id="kt_modal_add_customer_close"
                                            data-bs-dismiss="modal" aria-label="Close"
                                                class="btn btn-icon btn-sm btn-active-icon-primary">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                                            rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                            transform="rotate(45 7.41422 6)" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body py-10 px-lg-17">
                                            <!--begin::Scroll-->
                                            <div class="scroll-y me-n7 pe-7" id="#">
                                                <x:text-input class="col-md-12" name='name'  />
                                            </div>
                                            <!--end::Scroll-->
                                        </div>
                                        <!--end::Modal body-->
                                        <!--begin::Modal footer-->
                                        <div class="modal-footer flex-start items-center">
                                            <!--begin::Button-->
                                            <button type="reset" id="kt_modal_add_customer_cancel"
                                            data-bs-dismiss="modal" aria-label="Close"
                                            class="btn btn-light me-3">{{ __('translation.cancel') }}</button>
                                            <!--end::Button-->
                                            <!--begin::Button-->
                                           <button class="btn btn-primary"> {{ __('translation.save') }} </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Modal footer-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                            </div>
                        </div>
                    </div><!-- end of row -->

                @endsection

                @push('scripts')


                <script>
                function SwitchStatus(url2){
                // alert(id);
                // url = '{{ route('banks.show'  ,1) }}';
                // url2 = url.replace('1' , id);
                console.log(url2);

                var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            }
            fetch(url2).then(response => response.text())
                .then(result => {
                    console.log(result);
                    Swal.fire({
                        title: '{{ __("translation.status_change_success") }}',
                        icon: 'success',
                    });
                    rolesTable.draw();
                })
                .catch(error =>{
                    Swal.fire({
                        title:'{{ __("translation.status_change_error") }}',
                        icon: 'error',
                    });
                    console.log('error', error);
                    rolesTable.draw();

                });
                }

                // alert('worgiing');
                        // var isadmin = @json(auth()->guard('admin')->check());
                        var OfferColums = [{
                                data: 'record_select',
                                name: 'record_select',
                                searchable: false,
                                sortable: false,
                                width: '1%'
                            },
                            // {data: 'logo', name: 'logo' },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'status',
                                name: 'status'
                            },
                            {
                                data: 'realstate_count',
                                name: 'realstate_count'
                            },
                            {
                                data: 'created_at',
                                name: 'created_at'
                            },
                            {
                                data: 'actions',
                                name: 'actions',
                                searchable: false,
                                sortable: false,
                                width: '20%'
                            },
                        ];
                        // var OfferColums = isadmin ? OfferColums : OfferColums.filter(el => el.data !== 'agent');
                        let rolesTable = $('#roles-table').DataTable({
                            dom: "tiplr",
                            serverSide: true,
                            processing: true,
                            "language": {
                                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
                            },
                            ajax: {
                                url: '{{ route('area.data') }}',
                            },
                            columns: OfferColums,
                            order: [
                                [3, 'desc']
                            ],
                            drawCallback: function(settings) {
                                $('.record__select').prop('checked', false);
                                $('#record__select-all').prop('checked', false);
                                $('#record-ids').val();
                                $('#bulk-delete').attr('disabled', true);
                            }
                        });

                        $('#data_search').keyup(function() {
                            rolesTable.search(this.value).draw();
                        });
                        // $('#roles').on('change' , function(){
                        //     role = $(this).val();
                        //     rolesTable.ajax.reload();
                        // });
                    </script>
                @endpush
