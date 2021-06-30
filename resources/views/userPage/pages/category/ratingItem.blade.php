<?php
    $result = "";
    if(isset($point)){
        $starFull = 0;
        $startEmpty = 0;

        if(round($point) > $point){
            $starFull = round($point) -1;
            $startEmpty = 5 - ($starFull + 1);
        }else if (round($point) == $point) {
            $starFull = round($point);
            $startEmpty = 5 - $starFull;
        }else if(round($point) < $point){
            $starFull = round($point);
            $startEmpty = 5 - ($starFull + 1);
        }

        $result .= str_repeat('<small class="fas fa-star"></small>', $starFull);
        !($starFull + $startEmpty == 5) && $result .= '<small class="fas fa-star-half-alt"></small>';
        $result .= str_repeat('<small class="far fa-star text-muted"></small>', $startEmpty);
    }
?>
@if(isset($point))
    @if($show)
        <a class="d-inline-flex align-items-center small font-size-14" href="#">
            <div class="text-warning mr-2">
                {!! $result !!}
            </div>
            <span class="text-secondary">{{$point}}</span>
        </a>
    @else
        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
            {!! $result !!}
        </div>
    @endif

@endif
