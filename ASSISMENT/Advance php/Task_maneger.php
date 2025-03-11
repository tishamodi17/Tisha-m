<?php
session_start();

// Initialize task lists if not already set
if (!isset($_SESSION['taskLists'])) {
    $_SESSION['taskLists'] = [];
}

// Add a new task list
function addTaskList($listName) {
    if (!empty($listName) && !isset($_SESSION['taskLists'][$listName])) {
        $_SESSION['taskLists'][$listName] = [];
    }
}

// Add a task to a specific list
function addTask($listName, $task) {
    if (!empty($listName) && !empty($task) && isset($_SESSION['taskLists'][$listName])) {
        $_SESSION['taskLists'][$listName][] = $task;
    }
}

// Delete a task from a specific list
function deleteTask($listName, $task) {
    if (!empty($listName) && isset($_SESSION['taskLists'][$listName])) {
        $_SESSION['taskLists'][$listName] = array_filter($_SESSION['taskLists'][$listName], function($t) use ($task) {
            return $t !== $task;
        });
    }
}

// Clear all task lists
function clearAll() {
    $_SESSION['taskLists'] = [];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $listName = $_POST['listName'] ?? '';
    $task = $_POST['task'] ?? '';

    switch ($action) {
        case 'addList':
            addTaskList($listName);
            break;
        case 'addTask':
            addTask($listName, $task);
            break;
        case 'deleteTask':
            deleteTask($listName, $task);
            break;
        case 'clearAll':
            clearAll();
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task List Manager</h1>

        <!-- Add Task List Section -->
        <div class="section">
            <h3>Add a New Task List</h3>
            <form method="POST">
                <input type="hidden" name="action" value="addList">
                <input type="text" name="listName" placeholder="Enter list name" required>
                <button type="submit">Add List</button>
            </form>
        </div>

        <!-- Display and Manage Lists -->
        <div class="section">
            <h3>Manage Task Lists</h3>
            <form method="POST">
                <label for="listSelect">List Selection:</label>
                <select name="listName" id="listSelect">
                    <option value="">Select a list</option>
                    <?php foreach (array_keys($_SESSION['taskLists']) as $list): ?>
                        <option value="<?= htmlspecialchars($list) ?>"><?= htmlspecialchars($list) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Select List</button>
            </form>
        </div>

        <!-- Selected Task List -->
        <?php if (!empty($_POST['listName']) && isset($_SESSION['taskLists'][$_POST['listName']])): ?>
            <?php $selectedList = $_POST['listName']; ?>
            <div class="section">
                <h3><?= htmlspecialchars($selectedList) ?></h3>

                <!-- Add Task -->
                <form method="POST">
                    <input type="hidden" name="action" value="addTask">
                    <input type="hidden" name="listName" value="<?= htmlspecialchars($selectedList) ?>">
                    <input type="text" name="task" placeholder="Enter task" required>
                    <button type="submit">Add Task</button>
                </form>

                <!-- List Tasks -->
                <ul>
                    <?php foreach ($_SESSION['taskLists'][$selectedList] as $task): ?>
                        <li>
                            <?= htmlspecialchars($task) ?>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="action" value="deleteTask">
                                <input type="hidden" name="listName" value="<?= htmlspecialchars($selectedList) ?>">
                                <input type="hidden" name="task" value="<?= htmlspecialchars($task) ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Clear All Task Lists -->
        <div class="section">
            <form method="POST">
                <input type="hidden" name="action" value="clearAll">
                <button type="submit">Clear All</button>
            </form>
        </div>
    </div>
</body>
</html>
