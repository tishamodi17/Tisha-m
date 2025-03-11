<?php
session_start();

// Initialize task lists if not already set
if (!isset($_SESSION['lists'])) {
    $_SESSION['lists'] = [
        "Fruit Market Manager" => [],
        "Add Fruit Stalls" => [],
        "Organize Fruit Stock" => []
    ];
}

$lists = $_SESSION['lists'];
$selectedList = $_GET['list'] ?? null;
$action = $_GET['action'] ?? null;
$item = $_GET['item'] ?? null;

// Handle actions
if ($action == 'add' && $selectedList && !empty($item)) {
    $_SESSION['lists'][$selectedList][] = htmlspecialchars($item);
} elseif ($action == 'remove' && $selectedList !== null && $item !== null) {
    $index = (int)$item - 1;
    if (isset($_SESSION['lists'][$selectedList][$index])) {
        unset($_SESSION['lists'][$selectedList][$index]);
        $_SESSION['lists'][$selectedList] = array_values($_SESSION['lists'][$selectedList]); // Reindex
    }
} elseif ($action == 'clear') {
    $_SESSION['lists'] = [
        "Fruit Market Manager" => [],
        "Add Fruit Stalls" => [],
        "Organize Fruit Stock" => []
    ];
}

// Output the HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <h1>Welcome to Fruit Market</h1>
    <h2>Select a List</h2>
    <ul>
        <?php foreach ($lists as $listName => $items): ?>
            <li>
                <a href="?list=<?= urlencode($listName) ?>"><?= htmlspecialchars($listName) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <hr>

    <?php if ($selectedList): ?>
        <h2>Managing: <?= htmlspecialchars($selectedList) ?></h2>
        <h3>Items:</h3>
        <ul>
            <?php foreach ($lists[$selectedList] as $index => $task): ?>
                <li>
                    <?= htmlspecialchars($task) ?>
                    <a href="?list=<?= urlencode($selectedList) ?>&action=remove&item=<?= $index + 1 ?>">Remove</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <form method="get">
            <input type="hidden" name="list" value="<?= htmlspecialchars($selectedList) ?>">
            <input type="hidden" name="action" value="add">
            <input type="text" name="item" placeholder="Add new item" required>
            <button type="submit">Add Item</button>
        </form>
        <br>
        <a href="?action=clear">Clear All Lists</a>
        <br><br>
        <a href="/">Go Back to Main Menu</a>
    <?php endif; ?>
</body>
</html>
