{{-- @extends('layouts.admin.admin') --}}
@extends(auth()->guard('admin')->check() ?'layouts.admin.admin':'layouts.agents.agent_layouts')
@section('main-head' , __('translation.owners_dashboard'))
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
     <!--begin::Container-->
     <div id="kt_content_container" class="container-xxl">
          <!--begin::Card-->
          <div class="card">
               <!--begin::Card header-->
               <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                         <!--begin::Search-->
                         <div class="d-flex align-items-center position-relative my-1">
                              <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                              <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                   </svg>
                              </span>
                              <!--end::Svg Icon-->
                              <form action="{{ route('owners.index')}}" method="get">
                                   <input type="text" name='search' value="{{request()->search}}" class="form-control form-control-solid w-250px ps-15" placeholder="{{ __('translation.search') }}" />
                              </form>
                         </div>
                         <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                         <!--begin::Toolbar-->
                         <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                              <!--begin::Menu 1-->

                              <!--end::Menu 1-->
                              <!--end::Filter-->
                              <!--begin::Export-->

                              <!--end::Export-->
                              <!--begin::Add customer-->
                              <a href='{{ route('owners.create')}}' class="btn btn-primary">{{ __('translation.add_owners') }}</a>
                              <!--end::Add customer-->
                         </div>
                         <!--end::Toolbar-->
                         <!--begin::Group actions-->
                         <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                              <div class="fw-bolder me-5">
                                   <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                              </div>
                              <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                         </div>
                         <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
               </div>
               <!--end::Card header-->
               <!--begin::Card body-->
               <div class="card-body pt-0">
                    @include('layouts.includes.session')
                    <div class="table-reponsive">
                         <table class="table align-middle table-row-dashed fs-6 gy-5" id="owners-table">
                              <!--begin::Table head-->
                              <thead>
                                   <!--begin::Table row-->
                                   <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2">
                                             <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                  <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                             </div>
                                        </th>
                                        <th class="min-w-125px">{{ __('translation.name') }}</th>
                                        <th class="">{{ __('translation.id_number') }}</th>
                                        <th class="">{{ __('translation.phone') }}</th>
                                        <th class="">{{ __('translation.email') }}</th>
                                        <th class="">{{ __('translation.status') }}</th>
                                        <th class="">{{ __('translation.properties') }}</th>
                                        <th class="text-end min-w-70px">{{ __('translation.action') }}</th>
                                   </tr>
                                   <!--end::Table row-->
                              </thead>
                              <!--end::Table head-->
                              <!--begin::Table body-->

                              <!--end::Table body-->
                         </table>
                    </div>
                    <!--end::Table-->
               </div>
               <!--end::Card body-->
          </div>
          <!--end::Card-->

     </div>
     <!--end::Container-->
</div>
@endsection

@push('scripts')


<script>
     function SwitchStatus(url2) {
          // alert(id);
          // url = '{{ route('banks.show'  ,1) }}';
          // url2 = url.replace('1' , id);
          console.log(url2);

          var requestOptions = {
               method: 'GET'
               , redirect: 'follow'
          }
          fetch(url2).then(response => response.text())
               .then(result => {
                    console.log(result);
                    Swal.fire({
                         title: '{{ __("translation.status_change_success") }}'
                         , icon: 'success'
                    , });
                    rolesTable.draw();
               })
               .catch(error => {
                    Swal.fire({
                         title: '{{ __("translation.status_change_error") }}'
                         , icon: 'error'
                    , });
                    console.log('error', error);
                    rolesTable.draw();

               });
     }

     // alert('worgiing');
     // var isadmin = @json(auth()->guard('admin')->check());
     var OfferColums = [{
               data: 'record_select'
               , name: 'record_select'
               , searchable: false
               , sortable: false
               , width: '1%'
          },
          // {data: 'logo', name: 'logo' },
          {
               data: 'name'
               , name: 'name'
          }
          , {
               data: 'id_number'
               , name: 'id_number'
          },

          {
               data: 'phone'
               , name: 'phone'
          },

          {
               data: 'email'
               , name: 'email'
          },

          {
               data: 'status'
               , name: 'status'
          }
          , {
               data: 'properties'
               , name: 'properties'
          },

          {
               data: 'actions'
               , name: 'actions'
               , searchable: false
               , sortable: false
               , width: '20%'
          }
     , ];
     // var OfferColums = isadmin ? OfferColums : OfferColums.filter(el => el.data !== 'agent');
     let rolesTable = $('#owners-table').DataTable({
                    dom: "tiplr"
                    , serverSide: true
                    , processing: true
                    , "language": {
                         "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
                    }
                    , ajax: {
                         url: '{{ route("owners.data")}}'

                    }
               }
               '
          , }
          , columns: OfferColums
          , order: [
               [3, 'desc']
          ]
          , drawCallback: function(settings) {
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
