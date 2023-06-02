<?php
echo "<ul class='pagination'>";

// Button for first page
if ($current_page > 1)
{
    echo "<li><a href='{$page_url}' title='Go to the first page.'>First</a></li>";
}

// Calculate total pages
$total_pages = ceil($total_rows / $records_per_page);

// Range of links to show
$range = 2;

// Get left side links number
$left_side_initial_num = $current_page - $range;

for ($x = $left_side_initial_num; $x <= $total_pages; $x++)
{
    if ($x == $current_page) // Current page
    {
        echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
    }
    else // Not current page
    {
        if ($x > 0 && $x < $current_page) {
            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
        }
    }
}

// Get right side links number
$right_side_initial_num = $current_page + 1;
$right_side_links_num   = $current_page + $range;

for ($x = $right_side_initial_num; $x <= $total_pages; $x++)
{
    if ($x <= $right_side_links_num) {
        echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
    }
}

if ($current_page < $total_pages) // Button for last page
{
    echo "<li><a href='" . $page_url . "page={$total_pages}' title='Last page is {$total_pages}.'>Last</a></li>";
}

echo "</ul>";