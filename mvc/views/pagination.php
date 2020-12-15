<?php
class Pagination
{
    public $page = 1;

    function arrSlice($arr, $page = 1, $perPage)
    {
        $begin = ($page - 1) * $perPage;
        return array_slice($arr, $begin, $perPage);
    }

    function paginate($url, $total, $perPage, $page)
    {
        if (isset($page)) $this->page = $page;
        
        $queries = parse_url($url, PHP_URL_QUERY);
        $arrQueries = array();
        parse_str($queries, $arrQueries);
        $base_url = strtok($_SERVER["REQUEST_URI"], '?');
       
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $active = $this->page == $j ? "active" : "";
            $arrQueries['page'] = $j;
            $queryString = http_build_query($arrQueries);
            $link = $link . "<a href='$base_url?$queryString'><div class='btn btn-secondary py-1 px-3 mx-2 $active'>$j</div></a>";
        }
        return $link;
    }
}
