@props(['alphaSearch', 'mainSearch'])

<x-card>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-2 pt-1 text-center text-md-start border-end border-md">
                @if(request('search') || request($alphaSearch))
                    <a href="{{ $mainSearch }}" class="ms-2">Reset Filter</a>
                @else
                    Filter Results
                @endif
            </div>
            <div class="col-12 col-md-7 border-end border-md text-center pt-1 flex-row">
                <?php $alphabet = range('A', 'Z'); ?>
                @foreach ($alphabet as $letter)
                    <a class="filter-list" href="{{$mainSearch}}?{{ $alphaSearch }}={{ $letter }}">{{ strtoupper
                    ($letter)
                    }}</a>
                @endforeach
            </div>
            <div class="col-12 col-md-3 text-center">
                <form action="{{ $mainSearch }}" method="get">
                    @csrf
                    <input class="form-control form-control-sm"
                           name="search"
                           id="search"
                           value="{{ request('search') }}"
                           placeholder="Search All"
                    >
                </form>
            </div>
        </div>
    </div>
</x-card>

