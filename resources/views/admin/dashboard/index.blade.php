@extends('layouts.admin.admin')
@section('main-head', __('translation.Admin Dashboard'))
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
     <!--begin::Toolbar-->
     <!--begin::Post-->
     <div class="post d-flex flex-column-fluid" id="kt_post">
          <!--begin::Container-->
          <div id="kt_content_container" class="container-xxl">
               <!--begin::Row-->
               <div class="row g-5 g-xl-8">
                    <div class="col-xl-4">
                         <!--begin: Statistics Widget 6-->
                         <div class="card bg-light-success card-xl-stretch mb-xl-8">
                              <!--begin::Body-->
                              <div class="card-body my-3">
                                   <a href="#" class="card-title fw-bolder text-success fs-5 mb-3 d-block">{{__('translation.owners')}}</a>
                                   <div class="py-1">
                                        <span class="text-dark fs-1 fw-bolder me-2">{{$recored[0]}}%</span>
                                        <span class="fw-bold text-muted fs-7">{{__('translation.owner_presentage')}}</span>
                                   </div>
                                   <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                   </div>
                              </div>
                              <!--end:: Body-->
                         </div>
                         <!--end: Statistics Widget 6-->
                    </div>
                    <div class="col-xl-4">
                         <!--begin: Statistics Widget 6-->
                         <div class="card bg-light-warning card-xl-stretch mb-xl-8">
                              <!--begin::Body-->
                              <div class="card-body my-3">
                                   <a href="#" class="card-title fw-bolder text-warning fs-5 mb-3 d-block">{{ __('translation.realstates')}}</a>
                                   <div class="py-1">
                                        <span class="text-dark fs-1 fw-bolder me-2">{{$recored[1]}}%</span>
                                        <span class="fw-bold text-muted fs-7">{{ 23}} {{__('translation.offer_precntage')}}</span>
                                   </div>
                                   <div class="progress h-7px bg-warning bg-opacity-50 mt-7">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                   </div>
                              </div>
                              <!--end:: Body-->
                         </div>
                         <!--end: Statistics Widget 6-->
                    </div>
                    <div class="col-xl-4">
                         <!--begin: Statistics Widget 6-->
                         <div class="card bg-light-primary card-xl-stretch mb-5 mb-xl-8">
                              <!--begin::Body-->
                              <div class="card-body my-3">
                                   <a href="#" class="card-title fw-bolder text-primary fs-5 mb-3 d-block">{{__('translation.clients')}}</a>
                                   <div class="py-1">
                                        <span class="text-dark fs-1 fw-bolder me-2">{{$recored[2]}}%</span>
                                        <span class="fw-bold text-muted fs-7">{{__('translation.client_precnetage')}}</span>
                                   </div>
                                   <div class="progress h-7px bg-primary bg-opacity-50 mt-7">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 76%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                   </div>
                              </div>
                              <!--end:: Body-->
                         </div>
                         <!--end: Statistics Widget 6-->
                    </div>
               </div>
               <div class="row">
                    <div class="col-xl-6 col-lg-6 col-6">
                         <div class="card pull-up">
                              <div class="card-content">
                                   <div class="card-body">
                                        <canvas id="myChart" width="600" height="400"></canvas>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-6">
                         <div class="card pull-up">
                              <div class="card-content">
                                   <div class="card-body">
                                        <canvas id="myChart2" width="600" height="400"></canvas>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="row gy-5 g-xl-8 mt-4">
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-4">
                         <!--begin::List Widget 5-->
                         <div class="card card-xl-stretch">
                              <!--begin::Header-->
                              <div class="card-header align-items-center border-0 mt-4">
                                   <h3 class="card-title align-items-start flex-column">
                                        <span class="fw-bolder mb-2 text-dark">{{ __('translation.activity_history') }}</span>
                                        <span class="text-muted fw-bold fs-7">890,344</span>
                                   </h3>

                              </div>
                              <!--end::Header-->
                              <!--begin::Body-->
                              <div class="card-body pt-5">
                                   <!--begin::Timeline-->
                                   <div class="timeline-label">
                                        <!--begin::Item-->
                                        @foreach($activety as $item) <div class="timeline-item">
                                             <!--begin::Label-->
                                             <div class="timeline-label fw-bolder text-gray-800 fs-6">{{ $item[2]}}</div>
                                             <!--end::Label-->
                                             <!--begin::Badge-->
                                             <div class="timeline-badge">
                                                  <i class="fa fa-genderless {{  $item[0] }} fs-1"></i>
                                             </div>
                                             <!--end::Badge-->
                                             <!--begin::Text-->
                                             <div class="fw-mormal timeline-content text-muted ps-3">{{ $item[1]}}</div>
                                             <!--end::Text-->
                                        </div>
                                        @endforeach

                                        <!--end::Item-->
                                        <!--begin::Item-->

                                        <!--end::Item-->
                                        <!--begin::Item-->

                                        <!--end::Item-->
                                   </div>
                                   <!--end::Timeline-->
                              </div>
                              <!--end: Card Body-->
                         </div>
                         <!--end: List Widget 5-->
                    </div>
                    <div class="col-xl-8">
                         <!--begin::Tables Widget 5-->
                         <div class="card card-xxl-stretch mb-5 mb-xl-8">
                              <!--begin::Header-->
                              <div class="card-header border-0 pt-5">
                                   <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">{{ __('translation.Latest_offer')}}</span>
                                        {{-- <span class="text-muted mt-1 fw-bold fs-7">More than 400 new products</span> --}}
                                   </h3>
                                   <div class="card-toolbar">
                                        <ul class="nav">
                                             {{-- <li class="nav-item" onclick="drow_the_table(1)">
                                                  <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 active" data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">{{__('translation.rent')}}</a>
                                             </li>
                                             <li class="nav-item" onclick="drow_the_table(2)">
                                                  <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 " data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">{{__('translation.sale')}}</a>
                                             </li>
                                             <li class="nav-item" onclick="drow_the_table(3)">
                                                  <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-secondary fw-bolder px-4 " data-bs-toggle="tab" href="#kt_table_widget_5_tab_3">{{__('translation.exchange')}}</a>
                                             </li> --}}
                                        </ul>
                                   </div>
                              </div>
                              <!--end::Header-->
                              <!--begin::Body-->
                              <div class="card-body py-3">
                                   <div class="tab-content">
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade" id="kt_table_widget_5_tab_1">
                                             <!--begin::Table container-->
                                             <div class="table-responsive">
                                                  <!--begin::Table-->

                                             </div>
                                             <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade" id="kt_table_widget_5_tab_2">
                                             <!--begin::Table container-->
                                             <div class="table-responsive">
                                                  <!--begin::Table-->

                                             </div>
                                             <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                        <!--begin::Tap pane-->
                                        <div class="tab-pane fade show active" id="kt_table_widget_5_tab_3">
                                             <!--begin::Table container-->
                                             <div class="table-responsive">
                                                  <!--begin::Table-->
                                                  <div class="table-responsive">
                                                       <table class="table datatable align-middle table-row-dashed fs-6 gy-5" id="roles-table" style="width: 100%;">
                                                            <thead>
                                                                 <tr>
                                                                      <th class="text-center">{{__('translation.name')}}</th>
                                                                      <th class="text-center">{{__('translation.owner')}}</th>
                                                                      <th class="text-center">{{__('translation.subarea')}}</th>
                                                                      <th class="text-center">{{__('translation.province')}}</th>
                                                                      <th class="text-center">{{__('translation.status')}}</th>
                                                                      <th class="text-center">{{__('translation.action')}}</th>
                                                                 </tr>
                                                            </thead>
                                                       </table>
                                                  </div>
                                             </div>
                                             <!--end::Table-->
                                        </div>
                                        <!--end::Tap pane-->
                                   </div>
                              </div>
                              <!--end::Body-->
                         </div>
                         <!--end::Tables Widget 5-->
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection



@push('scripts');
<script src="{{ asset('admin_assets/js/custom/index.js')}}"></script>
<script src="//code.jquery.com/jquery.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
     const data = @json($chartOne);
     const labels = ['May', 'Jun', "Jul", 'Septemer', 'Nov', 'Dsc'];
     const CartData = {
          labels: labels
          , datasets: [{
               label: '{{ __("translation.achivements_chart") }}'
               , backgroundColor: 'rgb(30, 159, 242)'
               , borderColor: 'rgb(30, 159, 242)'
               , data: [12, 32, 43, 65, 76, 87]
          , }]
     };
     const config = {
          type: 'line'
          , data: CartData
          , options: {
               legend: true
               , bezierCurve: true
               , lineTension: 0.3

          }

     };
     const myChart = new Chart(
          document.getElementById('myChart')
          , config
     );
     const array = @json($charttwo);
     // cahrt tow option -----------------------------------------
     const labels2 = ["المدينه المنوره", "جده", "الدمام", "الرياض", "ابها", 'الخرج'];
     const CartData2 = {
          labels: labels2
          , datasets: [{
               label: '{{ __("translation.realstate_area_chart") }}'
               , backgroundColor: [
                    'rgb(255 ,145, 73,0.5)'
                    , 'rgb(102 ,110, 232,0.5)'
                    , 'rgb(40, 208, 148,0.5)'
                    , 'rgba(253, 73, 97, 0.5)'
               , ]
               , borderColor: [
                    'rgb(40, 208, 242 )'
                    , 'rgba(102, 110, 232)'
                    , 'rgb(30, 159, 242)'
                    , 'rgba(253, 73, 97)'
               , ]
               , data: [100, 73, 10, 40, 101, 94]
          , }]
     };
     const config2 = {
          type: 'bar'
          , data: CartData2
          , options: {
               scales: {
                    y: {
                         beginAtZero: true
                    }
               }
          }
     , };
     const myChart2 = new Chart(
          document.getElementById('myChart2')
          , config2
     );
     const Online_Driver_Count = @json('');
     // var String_Online = (Online_Driver_Count + ",").repeat(4) + Online_Driver_Count;
     // console.log(String_Online);
     // console.log();
     const data3 = @json($chartOne);
     const labels3 = data.map(item => item.label);
     const CartData3 = {
          labels: labels
          , datasets: [{
               label: '{{ __("translation.achivements_chart") }}'
               , backgroundColor: 'rgb(30, 159, 242)'
               , borderColor: 'rgb(30, 159, 242)'
               , data: data.map(item => item.Data)
          , }]
     };
     const config3 = {
          type: 'line'
          , data: CartData
          , options: {}
     };
     const myChart3 = new Chart(
          document.getElementById('myChart3')
          , config3
     );

</script>
@endpush




@push('scripts');
{{-- <script src="{{ asset('admin_assets/js/custom/index.js')}}"></script> --}}
{{-- <script src="//code.jquery.com/jquery.js"></script> --}}
{{-- <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> --}}
{{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
<script>
     // alert('worgiing');
     var isadmin = true;
     var OfferColums = [
          // {data: 'logo', name: 'logo' },
          {
               data: 'name'
               , name: 'name'
          }
          , {
               data: 'owner'
               , name: 'owner'
          },

          {
               data: 'subarea'
               , name: 'subarea'
          },
          // {data: 'phone', name: 'phone'},
          // {data: 'agent', name: 'agent'},
          // {data: 'service', name: 'service'},
          {
               data: 'province'
               , name: 'province'
          }
          , {
               data: 'status'
               , name: 'status'
               , searchable: false
          },
          // {data: 'created_at', name: 'created_at', searchable: false},
          {
               data: 'actions'
               , name: 'actions'
               , searchable: false
               , sortable: false
               , width: '20%'
          }
     , ];
     var OfferColums = isadmin ? OfferColums : OfferColums.filter(el => el.data !== 'agent');
     console.log(isadmin, OfferColums);
     let service_id = 1;
     let rolesTable = $('#roles-table').DataTable({
          dom: "tiplr"
          , serverSide: true
          , processing: true
          , pageLength: 5
          , "language": {
               "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
          }
          , ajax: {
               url: '{{ route("realstate.data") }}'
               , data: function(d) {
                    // d.service_id = service_id;
               }
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

     $('#data-table-search').keyup(function() {
          rolesTable.search(this.value).draw();
     });
     // $('#roles').on('change' , function(){
     //     role = $(this).val();
     // });
     function drow_the_table(number) {
          service_id = number;
          rolesTable.ajax.reload();
          console.log(service_id);
     }

</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
     const data = @json($chartOne);
     const labels = data.map(item => item.label);
     const CartData = {
          labels: labels
          , datasets: [{
               label: '{{ __('
               translation.offers_chart ') }}'
               , backgroundColor: 'rgb(30, 159, 242)'
               , borderColor: 'rgb(30, 159, 242)'
               , data: data.map(item => item.Data)
          , }]
     };
     const config = {
          type: 'line'
          , data: CartData
          , options: {}
     };
     const myChart = new Chart(
          document.getElementById('myChart')
          , config
     );
     const array = @json($charttwo);
     // cahrt tow option -----------------------------------------
     const labels2 = ["المدينه المنوره", "جده", "الدمام", "الرياض", "ابها", 'الخرج'];
     const CartData2 = {
          labels: labels2
          , datasets: [{
               label: '{{ __("translation.realstate_area") }}'
               , backgroundColor: [
                    'rgb(255 ,145, 73,0.5)'
                    , 'rgb(102 ,110, 232,0.5)'
                    , 'rgb(40, 208, 148,0.5)'
                    , 'rgba(253, 73, 97, 0.5)'
               , ]
               , borderColor: [
                    'rgb(40, 208, 242 )'
                    , 'rgba(102, 110, 232)'
                    , 'rgb(30, 159, 242)'
                    , 'rgba(253, 73, 97)'
               , ]
               , data: [100, 73, 10, 40, 101, 94]
               , 
          , }]
     };
     const config2 = {
          type: 'bar'
          , data: CartData2
          , options: {
               scales: {
                    y: {
                         beginAtZero: true
                    }
               }
          }
     , };
     const myChart2 = new Chart(
          document.getElementById('myChart2')
          , config2
     );

     const myChart3 = new Chart(
          document.getElementById('myChart3')
          , config3
     );

</script>
@endpush
