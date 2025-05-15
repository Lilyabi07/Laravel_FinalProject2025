{{-- Success --}}
@if(session('success'))
<div class="alert alert-success shadow-lg mb-4">
  <div><x-heroicon-o-check-circle class="w-6 h-6 mr-2" /><span>{{ session('success') }}</span></div>
</div>
@endif
{{-- Error --}}
@if(session('error'))
<div class="alert alert-error shadow-lg mb-4">
  <div><x-heroicon-o-exclamation-circle class="w-6 h-6 mr-2" /><span>{{ session('error') }}</span></div>
</div>
@endif
@if($errors->any())
<div class="alert alert-error shadow-lg mb-4">
  <ul class="list-disc list-inside">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
</div>
@endif