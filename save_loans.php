<?php
session_start();
require('includes/auth_check.php');
require('includes/conn_1dt.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: borrow.php');
    exit;
}

$table    = filter_var($_POST['table_number'] ?? '', FILTER_VALIDATE_INT);
$borrower = trim($_POST['borrower_name'] ?? '');
$due      = $_POST['due_back'] ?? '';
$today    = date('Y-m-d');
$errors   = [];

if ($table === false || $table < 1 || $table > 16) {
    $errors[] = 'Please choose a table between 1 and 16.';
}
if ($borrower === '') {
    $errors[] = 'Please enter a borrower name.';
}
if ($due === '' || $due < $today) {
    $errors[] = 'Reservation date must be today or later.';
}

if (!$errors) {
    $stmt = $pdo->prepare(
        'SELECT COUNT(*) FROM loans WHERE item_name = :item AND due_back = :due'
    );
    $stmt->execute([
        ':item' => 'Table ' . $table,
        ':due'  => $due,
    ]);

    if ((int) $stmt->fetchColumn() > 0) {
        $errors[] = 'That table is already reserved for the selected date.';
    }
}

if ($errors) {
    $_SESSION['borrow_errors'] = $errors;
    $_SESSION['borrow_old']    = ['table_number' => $_POST['table_number'] ?? '', 'borrower_name' => $borrower, 'due_back' => $due];
    header('Location: borrow.php');
    exit;
}

$sql = "INSERT INTO loans (item_name, borrower_name, borrowed_date, due_back, logged_by)
        VALUES (:item, :borrower, :borrowed, :due, :logged_by)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':item'      => 'Table ' . $table,
    ':borrower'  => $borrower,
    ':borrowed'  => $today,
    ':due'       => $due,
    ':logged_by' => $_SESSION['id'],
]);

header('Location: manage_loans.php?logged=1');
exit;
