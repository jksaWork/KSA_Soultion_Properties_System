@extends('layouts.admin.admin')
@section('main-head', __('translation.show_real_state_detalis'))
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
     <!--begin::Container-->
     <div id="kt_content_container" class="container-xxl">
          <div class="card p-5">
               <div class="card-body p-3">
                    {{-- <h2>{{ __('translation.agent_details')}}</h2> --}}
                    {{-- <div class="card "> --}}
                    @include('layouts.includes.session')
                    <div class="card-header card-header-stretch">
                         <h3 class="card-title">{{ __('translation.realstate_information') }}</h3>
                         <div class="card-toolbar">
                              <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                   <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">
                                             {{ __('translation.realstate_information') }}</a>
                                   </li>

                                   <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_10">
                                             {{ __('translation.realstate_units') }}</a>
                                   </li>
                                   <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_9">
                                             {{ __('translation.realstate_attachment') }}</a>
                                   </li>
                              </ul>
                         </div>
                    </div>
                    <div class="card-body">
                         <div class="tab-content" id="myTabContent">

                              <div class="tab-pane fade show active" id="kt_tab_pane_7">
                                   <!--begin::Table container-->


                                   <div class="border rodunded-sm ">

                                        <div class="col-md-12 bg-secondary p-4 rodunded-xl">

                                             <span class="text-2xl font-bold ">
                                                  {{ __('translation.main_info') }}
                                             </span>
                                        </div>
                                        <div class="table-responsive mt-4">
                                             <table class="table align-middle gs-0 gy-3">
                                                  <!--begin::Table head-->
                                                  <thead>
                                                       <tr class="fw-bolder text-muted bg-light">
                                                            <th scope="row">
                                                                 <b>{{ __('translation.name') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.unit') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.realstate_number') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.floors_number') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.unit_number') }}</b>
                                                            </th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <tr>
                                                            <td>{{ $realstate->name }}</td>
                                                            <td>{{ $realstate->Unit->name ?? '' }}</td>
                                                            <td>{{ $realstate->realstate_number }}</td>
                                                            <td>{{ $realstate->floors_number }}</td>
                                                            <td>{{ $realstate->unit_number }}</td>
                                                       </tr>
                                                  </tbody>
                                             </table>

                                             <span class="mt-3 text-2xl">
                                                  {{ __('translation.spector_and_agent') }}
                                             </span>
                                             <table class="table align-middle gs-0 mt-5 gy-3">
                                                  <!--begin::Table head-->
                                                  <thead>
                                                       <tr class="fw-bolder text-muted bg-light">
                                                            <th scope="row">
                                                                 <b>{{ __('translation.owner') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->Owner->name }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.instrument_number') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->instrument_number }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.instrument_date') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->instrument_date }}</b>
                                                            </th>
                                                       </tr>
                                                       <tr class="fw-bolder text-muted ">
                                                            <th scope="row">
                                                                 <b>{{ __('translation.spectator') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->Spectator->name ?? '' }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.spectator_number') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->spectator_number }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.spectator_date') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->spectator_date }}</b>
                                                            </th>
                                                       </tr>
                                                       <tr class="fw-bolder text-muted bg-light">
                                                            <th scope="row">
                                                                 <b>{{ __('translation.agent') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->Agent->name ?? '' }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.agent_number') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->agent_number }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.agent_date') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ $realstate->agent_date }}</b>
                                                            </th>
                                                       </tr>
                                                  </thead>
                                             </table>
                                        </div>
                                   </div>

                                   <div class="border rodunded-sm ">

                                        <div class="col-md-12 bg-secondary p-4 rodunded-xl">

                                             <span class="text-2xl font-bold ">
                                                  {{ __('translation.address') }}
                                             </span>
                                        </div>
                                        <div class="table-responsive mt-4">
                                             <table class="table align-middle gs-0 gy-3">
                                                  <!--begin::Table head-->
                                                  <thead>
                                                       <tr class="fw-bolder text-muted bg-light">
                                                            <th scope="row">
                                                                 <b>{{ __('translation.province') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.subarea') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.address') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.map_address') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.national_address') }}</b>
                                                            </th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <tr>
                                                            <td>{{ $realstate->Province->name ?? '' }}</td>
                                                            <td>{{ $realstate->SubArea->name ?? '' }}</td>
                                                            <td>{{ $realstate->address }}</td>
                                                            <td>{{ $realstate->map_address }}</td>
                                                            <td>{{ $realstate->national_address }}</td>
                                                       </tr>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>

                                   <div class="border rodunded-sm mt-10">

                                        <div class="col-md-12 bg-secondary p-4 rodunded-xl">

                                             <span class="text-2xl font-bold ">
                                                  {{ __('translation.service_information') }}
                                             </span>
                                        </div>
                                        <div class="table-responsive mt-4">
                                             <table class="table align-middle gs-0 gy-3">
                                                  <!--begin::Table head-->
                                                  <thead>
                                                       <tr class="fw-bolder text-muted bg-light">
                                                            <th scope="row">
                                                                 <b>{{ __('translation.electricity_account_number') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.electricity_service_number') }}</b>
                                                            </th>
                                                            <th scope="row">
                                                                 <b>{{ __('translation.water_account_number') }}</b>
                                                            </th>

                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <tr>
                                                            <td>{{ $realstate->electricity_account_number }}</td>
                                                            <td>{{ $realstate->electricity_service_number }}</td>
                                                            <td>{{ $realstate->water_account_number }}</td>
                                                       </tr>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>

                                   <div class="border rodunded-sm mt-10 ">

                                        <div class="col-md-12 bg-secondary p-4 rodunded-xl">

                                             <span class="text-2xl font-bold ">
                                                  {{ __('translation.notes') }}
                                             </span>
                                        </div>
                                        <div class='p-5'>
                                             <p class='m-3 '>
                                                  {!! $realstate->note !!}
                                             </p>
                                        </div>
                                   </div>
                              </div>
                              <!--end::Table-->


                              <div class="tab-pane fade" id="kt_tab_pane_8" role="tabpanel">
                                   <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
                                        {{--
                                    <x:rent-real-state-owner :realstates='$realState -> Owners'
                                        :realstate='$realState' />
                                    --}}
                                   </div>
                              </div>

                              <div class="tab-pane fade" id="kt_tab_pane_9" role="tabpanel">
                                   <div>
                                        <form action="{{ route('attachments.store') }}" method="post" enctype="multipart/form-data">
                                             @csrf
                                             <input type="hidden" name='type' value='realstate'>
                                             <input type="hidden" name="attachmentable" value='{{ $realState->id }}'>
                                             <x:input-file class="col-12" name='attachments[]' />
                                             <button class="btn btn-light-primary mt-3">{{ __('translation.Attach') }}
                                             </button>
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
                                             {{-- @dd(count($realState->attachments)); --}}
                                             @if (count($realState->attachments) > 0)
                                             @foreach ($realState->attachments as $attachment)
                                             <tr>
                                                  <td class=" "> {{ $attachment->id }}</td>
                                                  <td class=" "> <img src="{{ $attachment->url }}" width="80" alt=""></td>
                                                  <td class=" "> {{ $realState->title }}</td>
                                                  <td class=" ">
                                                       <div style="">
                                                            <a href="{{ route('show_attachments', $attachment->id) }}" class="btn btn-light-primary btn-sm btn-icon">
                                                                 <i class="fa fa-eye"></i>
                                                            </a>

                                                            <a href="{{ route('download_attachments', $attachment->id) }}" class="btn btn-light-info btn-sm btn-icon">
                                                                 <i class="fa fa-download"></i>
                                                            </a>
                                                  </td>
                                             </tr>
                                             @endforeach
                                             @endif
                                        </tbody>
                                   </table>
                              </div>

                              {{-- @dd($realstate->RealstateUnits) --}}
                              <div class="tab-pane fade" id="kt_tab_pane_10" role="tabpanel">
                                   <x:show-unit :realstateunits='$realstate->RealstateUnits' :realstate='$realstate->id' />
                              </div>

                              <div class="tab-pane fade" id="kt_tab_pane_11" role="tabpanel">
                                   <div>
                                        <div class="d-flex justify-content-between">
                                             <h3 class='p-2'>
                                                  {{ __('translation.ownersale_info') }}
                                             </h3>

                                        </div>
                                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="">
                                             <thead>
                                                  <tr class=" text-gray-400 fw-bolder fs-7 text-uppercase ">
                                                       <th>{{ __('translation.id') }}</th>
                                                       <th>{{ __('translation.name') }}</th>
                                                       <th>{{ __('translation.phone') }}</th>
                                                       <th>{{ __('translation.workplace') }}</th>
                                                       <th>{{ __('translation.identification_type') }}</th>
                                                       <th>{{ __('translation.identification_number') }}</th>
                                                       <th>{{ __('translation.status') }}</th>
                                                  </tr>
                                                  <!--end::Table row-->
                                             </thead>
                                             <!--end::Table head-->
                                             <!--begin::Table body-->
                                             <tbody class="fw-bold text-gray-600">
                                                  @forelse ([$realState->Owner] as $item)
                                                  <tr>
                                                       <td> {{ $item->id }}</td>
                                                       <td> {{ $item->name }}</td>
                                                       <td> {{ $item->phone }}</td>
                                                       <td> {{ $item->workplace }}</td>
                                                       <td> {{ $item->identification_type }}</td>
                                                       <td> {{ $item->identification_number }}</td>
                                                       <td>
                                                            {!! $item->getStatusWithSpan() !!}
                                                       </td>
                                                  </tr>
                                                  @empty
                                                  <tr>
                                                       <td collspan='12'>
                                                            {{ __('translation.no_data_found') }}
                                                       </td>
                                                  </tr>
                                                  @endforelse
                                             </tbody>
                                        </table>
                                   </div>
                              </div>

                              <div class="tab-pane fade" id="kt_tab_pane_12" role="tabpanel">
                                   <div class="div">
                                        <table class="table align-middle gs-0 gy-3">
                                             <thead>
                                                  <!--begin::Table row-->
                                                  <tr class=" text-gray-400 fw-bolder fs-7 text-uppercase ">
                                                       <th class="">{{ __('translation.title') }}</th>
                                                       <th class="">{{ __('translation.owner_name') }}</th>
                                                       <th class="">{{ __('translation.precentage') }}</th>
                                                       <th class="">{{ __('translation.amount') }}</th>
                                                       <th class="">{{ __('translation.is_payed') }}</th>
                                                       <th class="">{{ __('translation.qast_date') }}</th>
                                                       <th class="">{{ __('translation.action') }}</th>
                                                  </tr>
                                                  <!--end::Table row-->
                                             </thead>
                                             <!--end::Table head-->
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     @endsection
