{{-- @if (auth()->user()->hasPermission('update_admins')) --}}
<div style="min-width: 200px">
     <a href="{{ route('achivement.create',
     ['type' => 'achivement' , 'contracts' => $contract->id]) }}" class="btn btn-light-success btn-sm ">
          {{-- <i class="fa fa-eye"></i> --}}
          {{ __('translation.achivement') }}
     </a>

     <a href="{{ route('achivement.create',
     ['type' => 'penalty' , 'contracts' => $contract->id]) }}" class="btn btn-light-danger btn-sm ">
          {{-- <i class="fa fa-eye"></i> --}}
          {{ __('translation.penalty') }}
     </a>

     <a href="{{ route('achivement.create',
     ['type' => 'amnesty' , 'contracts' => $contract->id]) }}" class="btn btn-light-info btn-sm ">
          {{-- <i class="fa fa-eye"></i> --}}
          {{ __('translation.amnesty') }}
     </a>
</div>
{{-- @endif --}}
