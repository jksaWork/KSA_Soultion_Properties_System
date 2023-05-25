<div>
     <a class="btn btn-sm btn-primary fs-10px" href='#' data-bs-toggle="modal" data-bs-target="#kt_modal_{{ $client->id }}">
          {{ __('translation.contracts') }} ({{ count($client->Contracts) }})
     </a>

     <div class="modal fade " tabindex="-1" id="kt_modal_{{ $client->id }}">
          <div class="modal-dialog modal-xl">
               <div class="modal-content ">
                    <div class="modal-header">
                         <h5 class="modal-title">{{ __('translation.contracts') }} {{ $client->name }}</h5>
                         <!--begin::Close-->
                         <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                              <span class="svg-icon svg-icon-2x"></span>
                         </div>
                    </div>

                    <div class="modal-body">

                         <x:show-contracts :contracts='$client->Contracts' />
                    </div>

                    <div class="modal-footer">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('translation.cancel') }}</button>
                    </div>

               </div>
          </div>
     </div>
</div>
