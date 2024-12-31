<?php

enum UserRole: string {
    case Admin = 'admin';
    case User = 'user';
    case Subscriber = 'subscriber';
}

function generateRoleDropdown(): string
{
    $options = '';

    foreach (UserRole::cases() as $role) {
        $options .= sprintf('<option value="%s">%s</option>', $role->value, ucfirst($role->name));
    }

    return $options;
}

function handleFormSubmission(string $selectedRole): string {
    try {
        $role = UserRole::from($selectedRole);
        return "Selected Role: {$role->value}";
    } catch (ValueError $e) {
        return 'Invalid role';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedRole = $_POST['role'] ?? '';
    echo handleFormSubmission($selectedRole);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Select User Role</title>
</head>
<body>
<form method="post">
    <label for="role">Select Role:</label>
    <select name="role" id="role">
        <?php echo generateRoleDropdown(); ?>
    </select>
    <button type="submit">Submit</button>
</form>
</body>
</html>
