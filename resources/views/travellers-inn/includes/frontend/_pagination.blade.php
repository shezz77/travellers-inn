<?php
// config
$link_limit = 6; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>
<div class="row">
    <div class="col-xs-12">
        @if ($paginator->lastPage() > 1)
            <div class="paginationCenter paginationTransparent">
                <ul class="pagination">
                    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $paginator->url(1) }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>Previous</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                        <?php
                        $half_total_links = floor($link_limit / 2);
                        $from = $paginator->currentPage() - $half_total_links;
                        $to = $paginator->currentPage() + $half_total_links;
                        if ($paginator->currentPage() < $half_total_links) {
                            $to += $half_total_links - $paginator->currentPage();
                        }
                        if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                            $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                        }
                        ?>
                        @if ($from < $i && $i < $to)
                            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @endfor
                    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $paginator->url($paginator->lastPage()) }}">
                            <span aria-hidden="true">Next<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</div>