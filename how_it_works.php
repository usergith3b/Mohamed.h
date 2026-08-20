<?php
session_start();
$page_title = "How it works | Gear Out";
include('includes/header.php');
include('includes/nav.php');
?>
<!-- Start of content 1 -->
<div class="container pt-5">
    <div class="row">
        <h1 class="text-center">About Frenchichi</h1>
        <hr />
        <h3 class="pt-5">The problem</h3>
        <p>
            The Frenchichi resturent needed help with how they would manage their reservations.
            This is why they have created this website, in order to help customers who are willing to pay for a reservations.
            This website helps
        </p>
        <h3 class="pt-4">Who it's for</h3>
        <p>
            People who work for the restaurant, and need to keep track of reservations and table availability. 
            This includes the restaurant manager, host/hostess, and waitstaff. 
            The website is also useful for customers who want to make a reservation online.
        </p>
        <h3 class="pt-4">What it does</h3>
        <ul>
            <li>Lets a signed-in customer log a reservation — table, date, and time</li>
            <li>Shows anyone, monitor or staff, a live public list of what's currently available</li>
            <li>Flags any reservations that are overdue</li>
            <li>Lets a monitor mark a reservation as completed, or correct a mistaken entry</li>
    </div>
</div>

<?php
include('includes/footer.php');
?>
