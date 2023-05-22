@extends('layouts.admin.admin')
@section('main-head', __('translation.show_owners_detalis'))
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="card p-5">
                <div class="card-body p-3">
                    @include('layouts.includes.session')
                    <div class="card-header card-header-stretch">
                        <h3 class="card-title">{{ __('translation.owner_information') }}</h3>
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">
                                        {{ __('translation.owner_information') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_10">
                                        {{ __('translation.realstates') }}</a>
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
                                                        <th scope="row">
                                                            <b>{{ __('translation.title') }}</b>
                                                        </th>
                                                        <td>{{ $owner->name }}</td>
                                                        <th scope="row">{{ __('translation.id_number') }}</th>
                                                        <td>{{ $owner->id_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{ __('translation.address') }}</th>
                                                        <td>{{ $owner->address }}</td>
                                                        <th scope="row">{{ __('translation.email') }}</th>
                                                        <td>{{ $owner->email }}</td>
                                                    </tr>
                                                    <tr class="fw-bolder text-muted bg-light">
                                                        <th scope="row">{{ __('translation.province') }}</th>
                                                        <td>{{ $owner->Province->name ?? '' }}</td>
                                                        <th scope="row">{{ __('translation.single_subarea') }}</th>
                                                        <td>{{ $owner->SubArea->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">{{ __('translation.status') }}</th>
                                                        <td>{!! $owner->getStatusWithSpan() !!}</td>
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
                                    <form action="{{ route('attachments.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name='type' value='owner'>
                                        <input type="hidden" name="attachmentable" value='{{ $owner->id }}'>
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
                                        @if (count($owner->attachments) > 0)
                                            @foreach ($owner->attachments as $attachment)
                                                <tr>
                                                    <td class=" "> {{ $attachment->id }}</td>
                                                    <td class=" "> <img src="{{ $attachment->url }}" width="80"
                                                            alt=""></td>
                                                    <td class=" "> {{ $owner->title }}</td>
                                                    <td class=" ">
                                                        <div style="">
                                                            <a href="{{ route('show_attachments', $attachment->id) }}"
                                                                class="btn btn-light-primary btn-sm btn-icon">
                                                                <i class="fa fa-eye"></i>
                                                            </a>

                                                            <a href="{{ route('download_attachments', $attachment->id) }}"
                                                                class="btn btn-light-info btn-sm btn-icon">
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
                                            @forelse ($owner->Realstates as $item)
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
