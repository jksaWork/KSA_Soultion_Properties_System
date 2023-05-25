@extends('layouts.admin.admin')
@section('main-head', __('translation.show_contracts_detalis'))
@section('content')
{{-- @dd('asdas') --}}
<div class="post d-flex flex-column-fluid" id="kt_post">
     <!--begin::Container-->
     <div id="kt_content_container" class="container-xxl">
          <div class="card p-5">
               <div class="card-body p-3">
                    @include('layouts.includes.session')
                    <div class="card-header card-header-stretch">
                         <h3 class="card-title">{{ __('translation.contract_info') }}</h3>
                         <div class="card-toolbar">
                              <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                   <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">
                                             {{ __('translation.contract_info') }}</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_10">
                                             {{ __('translation.realstate_units') }}</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_9">
                                             {{ __('translation.attachments') }}</a>
                                   </li>
                              </ul>
                         </div>
                    </div>
                    <div class="card-body">
                         <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
                                   <div>
                                        <div class="tab-pane fade show active" id="kt_table_widget_7_tab_1">
                                             <!--begin::Table container-->
                                             <div class="table-responsive">
                                                  <!--begin::Table-->
                                                  <table class="table align-middle gs-0 gy-3">
                                                       <!--begin::Table head-->
                                                       <thead>
                                                            <tr class="fw-bolder text-muted bg-light">

                                                            <tr class="fw-bolder text-muted bg-light">
                                                                 <th scope="row">{{ __('translation.client') }}</th>
                                                                 <td>{{ $contract->Client->name ?? '' }}</td>
                                                                 <th scope="row">{{ __('translation.realstate') }}</th>
                                                                 <td>{{ $contract->Realstate->name }}</td>
                                                            </tr>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.contract_number') }}</b>
                                                            </th>
                                                            <td>{{ $contract->contract_number }}</td>
                                                            <th scope="row">{{ __('translation.payment_way') }}</th>
                                                            <td>{{ __('translation.' . $contract->payment_way )}}</td>
                                                            </tr>
                                                            <tr>
                                                                 <th scope="row">{{ __('translation.start_date') }}</th>
                                                                 <td>{{ $contract->start_date }}</td>
                                                                 <th scope="row">{{ __('translation.end_date') }}</th>
                                                                 <td>{{ $contract->end_date }}</td>
                                                            </tr>

                                                            <tr>
                                                                 <th scope="row">{{ __('translation.amount') }}</th>
                                                                 <td>{{ $contract->amount }}</td>
                                                                 <th scope="row">{{ __('translation.amount') }}</th>
                                                                 <td>{{ $contract->amount }}</td>
                                                            </tr>

                                                            <tr>
                                                                 <th scope="row">{{ __('translation.status') }}</th>
                                                                 <td>{!! $contract->getStatusWithSpan() !!}</td>
                                                            </tr>
                                                       </thead>
                                                       <!--end::Table head-->
                                                       <!--begin::Table body-->

                                                       <!--end::Table body-->
                                                  </table>
                                             </div>
                                             <!--end::Table-->
                                        </div>
                                   </div>
                              </div>
                              <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                                   <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
                                        {{-- <x:rent-real-state-owner :realstates='$realState -> Owners' :realstate='$realState' /> --}}
                                   </div>
                              </div>

                              <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
                                   <div>
                                        <form action="{{ route('attachments.store') }}" method="post" enctype="multipart/form-data">
                                             @csrf
                                             <input type="hidden" name='type' value='contract'>
                                             <input type="hidden" name="attachmentable" value='{{ $contract->id }}'>
                                             <x:input-file class="col-12" name='attachments[]' />
                                             <button class="btn btn-light-primary mt-3">{{ __('translation.Attach') }} </button>
                                        </form>
                                   </div>
                                   <table class="table align-middle table-row-dashed fs-6 gy-5" id="">
                                        <!--begin::Table head-->
                                        <thead>
                                             <!--begin::Table row-->
                                             <tr class=" text-gray-400 fw-bolder fs-7 text-uppercase ">
                                                  <th class="">{{ __('translation.no') }}</th>
                                                  <th class="">{{ __('translation.file') }}</th>
                                                  <th class="">{{ __('translation.name') }}</th>
                                                  <th class="">{{ __('translation.action') }}</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             {{-- dd($owner->attachments); --}}
                                             @if (count($contract->attachments) > 0)
                                             @foreach ($contract->attachments as $attachment)
                                             <tr>
                                                  <td class=" "> {{ $attachment->id }}</td>
                                                  <td class=" "> <img src="{{ $attachment->url }}" width="80" alt=""></td>
                                                  <td class=" "> {{ $contract->Client->name }}</td>
                                                  <td class=" ">
                                                       <div style="">
                                                            <a href="{{ route('show_attachments', $attachment->id) }}" class="btn btn-light-primary btn-sm btn-icon">
                                                                 <i class="fa fa-eye"></i>
                                                            </a>

                                                            <a href="{{ route('download_attachments', $attachment->id) }}" class="btn btn-light-info btn-sm btn-icon">
                                                                 <i class="fa fa-download"></i>
                                                            </a>

                                                            {{-- <a href="{{ route('agent.show', ['status' => true , 'agent' => $attachment->id]) }}" class="btn btn-light-success btn-sm btn-icon">
                                                            <i class="fa fa-toggle-on"></i>
                                                            </a> --}}
                                                  </td>
                                             </tr>
                                             @endforeach
                                             @endif
                                        </tbody>
                                   </table>
                              </div>
                              <div class="tab-pane fade" id="attachments" role="tabpanel">
                                   <div>
                                        <form action="{{ route('attachments.store') }}" method="post" enctype="multipart/form-data">
                                             @csrf
                                             <input type="hidden" name='type' value='contract'>
                                             <input type="hidden" name="attachmentable" value='{{ $contract->id }}'>
                                             <x:input-file class="col-12" name='attachments[]' />
                                             <button class="btn btn-light-primary mt-3">{{ __('translation.Attach') }} </button>
                                        </form>
                                   </div>
                                   <table class="table align-middle table-row-dashed fs-6 gy-5" id="">
                                        <!--begin::Table head-->
                                        <thead>
                                             <!--begin::Table row-->
                                             <tr class=" text-gray-400 fw-bolder fs-7 text-uppercase ">
                                                  <th class="">{{ __('translation.no') }}</th>
                                                  <th class="">{{ __('translation.file') }}</th>
                                                  <th class="">{{ __('translation.name') }}</th>
                                                  <th class="">{{ __('translation.action') }}</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             {{-- dd($client->attachments); --}}
                                             @if (count($contract->attachments) > 0)
                                             @foreach ($contract->attachments as $attachment)
                                             <tr>
                                                  <td class=" "> {{ $attachment->id }}</td>
                                                  <td class=" "> <img src="{{ $attachment->url }}" width="80" alt=""></td>
                                                  <td class=" "> {{ $contract->title }}</td>
                                                  <td class=" ">
                                                       <div style="">
                                                            <a href="{{ route('show_attachments', $attachment->id) }}" class="btn btn-light-primary btn-sm btn-icon">
                                                                 <i class="fa fa-eye"></i>
                                                            </a>

                                                            <a href="{{ route('download_attachments', $attachment->id) }}" class="btn btn-light-info btn-sm btn-icon">
                                                                 <i class="fa fa-download"></i>
                                                            </a>

                                                            {{-- <a href="{{ route('agent.show', ['status' => true , 'agent' => $attachment->id]) }}" class="btn btn-light-success btn-sm btn-icon">
                                                            <i class="fa fa-toggle-on"></i>
                                                            </a> --}}
                                                  </td>
                                             </tr>
                                             @endforeach
                                             @endif
                                        </tbody>
                                   </table>
                              </div>



                              <div class="tab-pane fade" id="kt_tab_pane_10" role="tabpanel">
                                   <div>
                                        <x:show-unit :realstateunits='$contract->RealStateUnits' :realstate='$contract' type='contract' />
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@push('scripts')
<script>
     let contract = @json($contract);
     //  alert();
     let url = "{{ route('realstate.unit.ajax') }}";
     console.log(url);
     $("#realstatee_unit_select").select2({
          //  dropdownParent: $('#kt_modal_add_customer')
          ajax: {
               url: url
               , type: "get"
               , dataType: 'json'
               , delay: 250
               , data: function(params) {
                    let term = {
                         search: params.term
                         , realstate_id: contract.realstate_id,
                         //  , province_id: $('#province_select').val() // area_id: area_id
                    };
                    console.log(term, params);
                    return term;
               }
               , processResults: function(response) {
                    console.log(response);
                    return {
                         results: response
                    };
               }
               , cache: true
          }
     });

</script>

@endpush
