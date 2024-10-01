<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>

    <div class="min-h-full">
        <?php require base_path("views/partials/banner.php"); ?>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

                <form method="POST" action="/notes" id="createNote">

                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Here's an idea for a note..." required><?= $_POST['body'] ?? '' ?></textarea>
                        </div>
                    </div>

                    <?php if(isset($errors['message'])) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors['message'] ?></p>
                    <?php endif; ?>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>

                </form>

            </div>
        </main>
    </div>

    <script>
        $(document).ready(() => {
            $('#body').on('keydown', (e) => {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    $('#createNote').submit();
                }
            });
        });
    </script>

<?php require base_path("views/partials/footer.php"); ?>