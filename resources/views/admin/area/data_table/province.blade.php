<div>
     <a class="btn btn-sm btn-primary" href='#' data-bs-toggle="modal" data-bs-target="#kt_modal_provice_{{ $area->id }}">
          {{ __('translation.provinces') }} ({{ count($area->Provinces) }})
     </a>

     <div class="modal fade " tabindex="-1" id="kt_modal_provice_{{ $area->id }}">
          <div class="modal-dialog modal-xl">
               <div class="modal-content ">
                    <div class="modal-header">
                         <h5 class="modal-title">{{ __('translation.owner_realstate') }} {{ $area->name }}</h5>
                         <!--begin::Close-->
                         <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                              <span class="svg-icon svg-icon-2x"></span>
                         </div>
                         <!--end::Close-->
                    </div>

                    <div class="modal-body">
                         {{-- <x:owner-realstate :realstates='$owner->Realstates' realstate='$realstate->id' /> --}}
                         <x:area-childs :childs='$area->Provinces' :title='__("translation.single_province") . " ". $area->name' :route='route("subarea.create")' />
                         {{-- <p>Modal body text goes here.</p> --}}
                    </div>

                    <div class="modal-footer">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('translation.cancel') }}</button>
                    </div>
               </div>
          </div>
     </div>
</div>
