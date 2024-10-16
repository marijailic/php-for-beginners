<?php require("partials/head.php"); ?>
<?php require("partials/nav.php"); ?>

    <div class="min-h-full">
        <?php require("partials/banner.php"); ?>
        <main>
            <div data-test-id="homepage" class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>! Welcome to the home page.</p>
            </div>
        </main>
    </div>

<?php require("partials/footer.php"); ?>