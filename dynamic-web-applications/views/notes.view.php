<?php require("partials/head.php"); ?>
<?php require("partials/nav.php"); ?>

    <div class="min-h-full">
        <?php require("partials/banner.php"); ?>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <ul>
                    <?php foreach ($notes as $note): ?>
                        <li>
                            <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                                <!-- htmlspecialchars je php funkcija -->
                                <!-- konvertira sve primjenjive znakove u HTML entities -->
                                <!-- zamjenjuje ih svojim ekvivalentima kako ih ne bi renderirao kao HTML -->
                                <?= htmlspecialchars($note['body']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p class="mt-6">
                    <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
                </p>
            </div>
        </main>
    </div>

<?php require("partials/footer.php"); ?>