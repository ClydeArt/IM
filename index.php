<?php
    require 'clyderouter.php';

    $users = getUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clyde</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10 bg-gray-100">
    <div class="max-w-6xl mx-auto bg-white p-6 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Clyde User Management</h1>
        <div class="flex justify-end mb-4">
            <a href="clyde.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add User</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="border p-3">#</th>
                        <th class="border p-3">Name</th>
                        <th class="border p-3">Address</th>
                        <th class="border p-3">Age</th>
                        <th class="border p-3">Contact</th>
                        <th class="border p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $row): ?>
                        <tr class="text-center border bg-gray-100 hover:bg-gray-200">
                            <td class="p-3"> <?= $row['id'] ?> </td>
                            <td class="p-3 font-semibold"> <?= $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] ?> </td>
                            <td class="p-3 text-gray-700"> <?= $row['address'] ?> </td>
                            <td class="p-3"> <?= $row['age'] ?> </td>
                            <td class="p-3 capitalize"> <?= $row['contact'] ?> </td>
                            <td class="p-3">
                                <a href="clydeEdit.php?id=<?= $row['id'] ?>" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</a>
                                <a href="clydeDelete.php?id=<?= $row['id'] ?>" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>