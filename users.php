<?php
function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}
function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) return $user;
    }
    return null;
}
function createUser($data): array
{
    $users = getUsers();
    $newId = $users[count($users) - 1]['id'];

    $newData = ['id' => $newId + 1] + $data;
    $users[] = $newData;

    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    return $newData;
}
function updateUser($data, $id): array
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
//            if (isset($user['extension']) && !isset($data['extension']))
//                $data['extension'] = $user['extension'];
            $users[$i] = $updateUser = array_merge($user, $data);
            break;
        }
    }

    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    return $updateUser;
}
function deleteUser($id): void
{
    $users = getUsers();
    foreach ($users as $key => $user) {
        if ($user['id'] == $id) {
            // Delete
            array_splice($users, $key, 1);
        }
    }
    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
}
function checkGetUserID($id)
{
    if (!isset($id)) {
        include 'partials/not_found.php';
        exit;
    }
    if ($user = getUserById($id)) {
        return $user;
    } else {
        include 'partials/not_found.php';
        exit;
    }
}
function uploadPhoto($file, $user): void
{
    if ( $fileName = $file['name']) {
        $fileTmpName = $file['tmp_name'];
        $fileExt = pathinfo($fileName)['extension'];

        $targetPath = __DIR__ . "/img/{$user['id']}.$fileExt";

        move_uploaded_file($fileTmpName, $targetPath);

        $user['extension'] = $fileExt;
        updateUser($user, $user['id']);
    }
}