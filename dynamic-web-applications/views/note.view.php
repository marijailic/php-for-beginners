<?php require("partials/head.php"); ?>
<?php require("partials/nav.php"); ?>

    <div class="min-h-full">
        <?php require("partials/banner.php"); ?>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <p class="mb-6">
                    <a href="/notes" class="text-blue-500 underline">go back...</a>
                </p>
                <p> <?= htmlspecialchars($note['body']) ?> </p>
            </div>
        </main>
    </div>

<?php require("partials/footer.php"); ?>