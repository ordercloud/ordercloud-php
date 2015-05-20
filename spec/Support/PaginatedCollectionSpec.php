<?php namespace spec\Ordercloud\Support;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PaginatedCollectionSpec extends ObjectBehavior
{
    function let()
    {
        $items = range(1, 10);
        $totalCount = 94;
        $currentPage = 1;
        $pageSize = 10;

        $this->beConstructedWith($items, $totalCount, $currentPage, $pageSize);
    }

    function it_knows_the_total_nr_of_items()
    {
        $this->getTotalCount()->shouldReturn(94);
    }

    function it_knows_the_current_page()
    {
        $this->getCurrentPage()->shouldReturn(1);
    }

    function it_knows_the_page_size()
    {
        $this->getPageSize()->shouldReturn(10);

        $this->getPreviousPage();
    }

    function it_can_calculate_the_total_number_of_pages()
    {
        $this->getTotalNrPages()->shouldBeLike(10);
    }

    function it_can_calculate_the_next_page()
    {
        $this->getNextPage()->shouldReturn(2);
    }

    function it_returns_null_when_there_is_no_next_page()
    {
        $items = range(1, 10);
        $totalCount = 94;
        $currentPage = 10;
        $pageSize = 10;

        $this->beConstructedWith($items, $totalCount, $currentPage, $pageSize);

        $this->getNextPage()->shouldReturn(null);
    }

    function it_can_calculate_the_prev_page()
    {
        $items = range(1, 10);
        $totalCount = 94;
        $currentPage = 10;
        $pageSize = 10;

        $this->beConstructedWith($items, $totalCount, $currentPage, $pageSize);

        $this->getCurrentPage()->shouldReturn(10);
        $this->getPreviousPage()->shouldReturn(9);
    }

    function it_returns_null_when_there_is_no_prev_page()
    {
        $this->getPreviousPage()->shouldReturn(null);
    }

    function it_returns_true_when_there_is_a_next_page()
    {
        $this->hasNextPage()->shouldReturn(true);
    }

    function it_returns_false_when_there_is_no_next_page()
    {
        $items = range(1, 10);
        $totalCount = 94;
        $currentPage = 10;
        $pageSize = 10;

        $this->beConstructedWith($items, $totalCount, $currentPage, $pageSize);

        $this->hasNextPage()->shouldReturn(false);
    }

    function it_returns_false_when_there_is_no_prev_page()
    {
        $this->hasPreviousPage()->shouldReturn(false);
    }

    function it_returns_true_when_there_is_a_prev_page()
    {
        $items = range(1, 10);
        $totalCount = 94;
        $currentPage = 10;
        $pageSize = 10;

        $this->beConstructedWith($items, $totalCount, $currentPage, $pageSize);

        $this->hasPreviousPage()->shouldReturn(true);
    }
}
