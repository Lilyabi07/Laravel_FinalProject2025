
{{-- Success Message --}}
@if(session('success'))
<div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 flex items-center shadow">
    <x-heroicon-o-check-circle class="w-6 h-6 mr-2" />
    <span>{{ session('success') }}</span>
</div>
@endif

{{-- Error Message --}}
@if(session('error'))
<div class="mb-4 px-4 py-3 rounded bg-red-100 text-red-800 flex items-center shadow">
    <x-heroicon-o-exclamation-circle class="w-6 h-6 mr-2" />
    <span>{{ session('error') }}</span>
</div>
@endif

{{-- Validation Errors --}}
@if($errors->any())
<div class="mb-4 px-4 py-3 rounded bg-red-100 text-red-800 shadow">
    <ul class="list-disc list-inside ml-6">
        @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
</div>
@endif