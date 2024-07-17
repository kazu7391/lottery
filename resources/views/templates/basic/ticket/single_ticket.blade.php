<li class="ticket" data-ticket_number="{{ $lotteryNumber }}">
    <div class="lottery">
        <div class="lottery__body">
            <ul class="list--row flex-wrap lottery__list nbBallList">
                @php
                    $no_of_tickets = "";
                    for ($i = 0; $i < $lottery->no_of_ball; $i++) {
                        $no_of_tickets .= "9";
                    }
                @endphp
                @for ($i = 1; $i <= intval($no_of_tickets); $i++)
                    <li class="normalBallNo-{{ $i }}">
                        <button class="lottery__btn normalBtn" data-no="{{ $i }}">
                            {{ str_pad($i, $lottery->no_of_ball, '0', STR_PAD_LEFT) }}
                        </button>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
</li>
