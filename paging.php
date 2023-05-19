<?php
echo "<ul class='pagination'>";

// Button for first page
if ($page > 1)
{
    echo "<li><a href='{$page_url}' title='Go to the first page.'>First</a></li>";
}

// Calculate total pages
echo 'total_pages ' . $total_pages = ceil($total_rows / $records_per_page);

// Range of links to show
$range = 2;

// Display links to 'range of pages' around 'current page'
echo ' initial_num ' .$initial_num         = $page - $range;

echo ' condition_limit_num ' .$condition_limit_num = ($page + $range) + 1;

for ($x = $initial_num; $x < $condition_limit_num; $x++)
{
    echo ' loop x ' .$x;
    // Be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
    if (($x > 0) && ($x <= $total_pages))
    {
        if ($x == $page) // Current page
        {
            echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
        }
        else // Not current page
        {
            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
        }
    }
}

if ($page < $total_pages) // Button for last page
{
    echo "<li><a href='" . $page_url . "page={$total_pages}' title='Last page is {$total_pages}.'>Last</a></li>";
}

echo "</ul>";