<?php
session_start();
require('includes/auth_check.php');

$page_title = "Manage your reservations | Frenchichi";

// If save_loans.php redirected back here with errors, read them once.
$errors = $_SESSION['borrow_errors'] ?? [];
$old    = $_SESSION['borrow_old'] ?? [];
unset($_SESSION['borrow_errors'], $_SESSION['borrow_old']);

include('includes/header.php');
include('includes/nav.php');
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h2 class="pt-5">Create a reservation</h2>

            <?php if ($errors): ?>
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="save_loans.php" method="POST">
                <div class="mb-3">
                    <label for="table_number" class="form-label">Table</label>
                    <select class="form-select" id="table_number" name="table_number" required>
                        <option value="">Choose a table</option>
                        <?php for ($table = 1; $table <= 16; $table++): ?>
                            <option value="<?= $table ?>" <?= ($old['table_number'] ?? '') == $table ? 'selected' : '' ?>>
                                Table <?= $table ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="borrower_name" class="form-label">Borrower</label>
                    <input type="text" class="form-control" id="borrower_name" name="borrower_name"
                           value="<?= htmlspecialchars($old['borrower_name'] ?? '') ?>">
                </div>
                <div class="mb-3">
                    <label for="due_back" class="form-label">Reservation date</label>
                    <input type="date" class="form-control" id="due_back" name="due_back"
                           value="<?= htmlspecialchars($old['due_back'] ?? '') ?>">
                </div>
                <button type="submit" class="btn btn-primary">Make a reservation</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
