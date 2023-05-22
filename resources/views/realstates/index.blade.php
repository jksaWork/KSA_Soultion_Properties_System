{{-- @extends('layouts.admin.admin') --}}
@extends('layouts.admin.admin')
@section('main-head', __('translation.realstate_mangements'))
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                {{-- <div class="card-title"> --}}
                    <!--begin::Search-->
                    <div class="d-flex justify-conetnt-between align-items-center position-relative my-1 col-md-8">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <div class="col-md-6  d-flex align-items-center position-relative my-1 ">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            {{-- <form action="{{ route('owners.index')}}" method="get"> --}}
                                <input type="text" name='search' id="handelSearch" value="{{ request()->search }}"
                                    class="form-control form-control-solid  ps-15"
                                    placeholder="{{ __('translation.search_with_number_title_and_place') }}" />

                        </div>

                    </div>

                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href='{{ route( "realstate.create" , [' type'=> request()->type]) }}' class="btn
                                btn-primary">{{ __('translation.add_real_state') }}</a>
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-customer-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger"
                                data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    @include('layouts.includes.session')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    id="roles-table" style="width: 100%;">
                                    <thead>
                                        <tr>

                                            <th>{{ __('translation.id') }}</th>
                                            <th>{{ __('translation.realstate_number') }}</th>
                                            <th>{{ __('translation.national_address') }}</th>
                                            <th>{{ __('translation.instrument_number') }}</th>
                                            <th>{{ __('translation.province') }}</th>
                                            <th>{{ __('translation.subarea') }}</th>
                                            <th>{{ __('translation.opration_precentage') }}</th>
                                            <th>{{ __('translation.status') }}</th> {{-- جاهز ولا م جاهز --}}
                                            <th>{{ __('translation.realstate_units') }}</th> {{-- جاهز ولا م جاهز --}}
                                            <th>@lang('translation.created_at')</th>
                                            <th>@lang('translation.action')</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div><!-- end of table responsive -->
                        </div>
                        <!-- end of col -p->
                    </div><!-- end of row -->
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
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

            let type = @json(request() -> type);
     let status, is_rent, is_sale;
     let rolesTable = $('#roles-table').DataTable({
          dom: "Brtp"
          , buttons: [
               'copy', {
                    extend: 'excel'
                    ,text: '{{ __('translation.export_As_exel') }}'
                },

               {
                    extend: 'print'
                    , title: '@lang("translation.realstates")'
                    , className: 'btn btn-default'
                    , autoPrint: true,

                    customize: function(win) {
                         $(win.document.body).css('direction', 'rtl');
                         $(win.document.body).find('th').addClass('display').css('text-align', 'center');
                         $(win.document.body).find('table').addClass('display').css('font-size', '16px');
                         $(win.document.body).find('table').addClass('display').css('text-align', 'center');
                         $(win.document.body).find('tr:nth-child(odd) td').each(function(index) {
                              $(this).css('background-color', '#D0D0D0');
                         });
                         $(win.document.body).find('h1').css('text-align', 'center');
                    }
               }

          ]
          , serverSide: true
          , processing: true
          , "language": {
               "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
          }
          , ajax: {
               url: '{{ route('realstate.data') }}'
          }
          , columns: [
                {
                    data: 'name'
                    , name: 'name'
               }
               , {
                    data: 'realstate_number'
                    , name: 'realstate_number'
               }
               , {
                    data: 'national_address'
                    , name: 'national_address'
               }
               , {

                    data: 'instrument_number'
                    , name: 'instrument_number'
               }
               , {
                    data: 'province'
                    , name: 'province'
               }
               , {
                    data: 'subarea'
                    , name: 'subarea'
               }
               , {
                    data: 'opration_precentage'
                    , name: 'opration_precentage'
               }
               , {
                    data: 'status'
                    , name: 'status'
                    , sortable: false

                 },
                 {
                    data: 'realstate_units'
                    , name: 'realstate_units'
                    , sortable: false

                 } ,
                 {
                    data: 'created_at'
                    , name: 'created_at'
                    , sortable: false
                 } ,
                 {
                    data: 'actions'
                    , name: 'actions'
                    , searchable: false
                    , sortable: false
                    , width: '20%'
               }
          , ]
          , order: [
               [2, 'desc']
          ]
          , drawCallback: function(settings) {
               $('.record__select').prop('checked', false);
               $('#record__select-all').prop('checked', false);
               $('#record-ids').val();
               $('#bulk-delete').attr('disabled', true);
          }
     });
     $('#handelSearch').keyup(function() {
          rolesTable.search(this.value).draw();
     });


     $('#rent_status').on('change', function() {
          is_rent = $(this).val();
          rolesTable.ajax.reload();
     });

     $('#sale_status').on('change', function() {
          is_sale = $(this).val();
          rolesTable.ajax.reload();
     });


     $('#status').on('change', function() {
          console.log('helllo');
          status = $(this).val();
          rolesTable.ajax.reload();
     });

        </script>
        @endpush