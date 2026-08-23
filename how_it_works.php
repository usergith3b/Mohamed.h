<?php
session_start();
$page_title = "How it works | Gear Out";
include('includes/header.php');
include('includes/nav.php');
?>
<!-- Start of content 1 -->
<div class="container pt-5">
    <div class="row">
        <h1 class="text-center">About Gear Out</h1>
        <hr />
        <div class="col-12 mb-4">
            <?php include('includes/carousel.php'); ?>
        </div>
        <h3 class="pt-5">The problem</h3>
        <p>
            Gear Out helps schools and teams keep track of equipment loans.
            It records who borrowed each item, when it was borrowed, and when it is due back.
        </p>
        <h3 class="pt-4">Who it's for</h3>
        <p>
            Monitors and staff who need to keep track of shared equipment.
            It makes it easier to see which items are currently out and which loans are overdue.
        </p>
        <h3 class="pt-4">What it does</h3>
        <ul>
            <li>Lets a signed-in monitor log an item loan, borrower, and due-back date</li>
            <li>Shows a live public list of equipment that is currently out</li>
            <li>Flags loans that are overdue</li>
            <li>Lets a monitor mark an item as returned or delete a mistaken entry</li>
    </div>
</div>

<?php
include('includes/footer.php');
?>
