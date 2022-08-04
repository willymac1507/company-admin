@props(['alphaSearch', 'mainSearch'])

<x-card>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-2 pt-1 text-center text-md-start">Filter Results</div>
            <div class="col-12 col-md-7 border-end border-md text-center pt-1">
                <?php $alphabet = range('A', 'Z'); ?>
                @foreach ($alphabet as $letter)
                    <a class="ms-1" href="{{$mainSearch}}?{{ $alphaSearch }}={{ $letter }}">{{ strtoupper($letter)
                    }}</a>
                @endforeach
                <a href="{{ $mainSearch }}" class="ms-1">All</a>
            </div>
            <div class="col-12 col-md-3 text-center">
                <form action="{{ $mainSearch }}" method="get">
                    @csrf
                    <input class="form-control form-control-sm"
                           name="search"
                           id="search"
                           value=""
                           placeholder="Search All"
                    >
                </form>
            </div>
        </div>
    </div>
</x-card>

