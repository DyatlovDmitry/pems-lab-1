<?php

include 'vendor/autoload.php';

use App\User;
use App\Comment;

$user1 = new User(1, 'Dmitry', 'dmitry@gmail.com', 'SecretPassword');

try {
//    $user2 = new User(1, 'Michael', 'michaeljordan@gmail.com', 'SecretPassword');
    $user2 = new User(-1, '', '', '');
} catch (InvalidArgumentException $e) {
    echo $e->getMessage() . "\n";
}


$comments = [
    new Comment($user1, 'kek'),
    new Comment($user1, 'su'),
    new Comment($user1, 'bye!'),
];

$datetime1 = new DateTime('2023-01-01');

$datetime2 = new DateTime('2023-12-01');

echo "Comments after {$datetime1->format('Y-m-d')} : \n";

$filterComments = array_filter($comments, function (Comment $comment) use ($datetime1) {
    return $comment->getUser()->getCreatedAt() > $datetime1;
});

foreach ($filterComments as $comment) {
    echo $comment->getUser()->getName() . " " . $comment->getMessage() . "\n";
}

echo "Comments after {$datetime2->format('Y-m-d')} : \n";

$filterComments1 = array_filter($comments, function (Comment $comment) use ($datetime2) {
    return $comment->getUser()->getCreatedAt() > $datetime2;
});
// nothing to show
foreach ($filterComments1 as $comment) {
    echo $comment->getUser()->getName() . " " . $comment->getMessage() . "\n";
}



//git commit -m "first commit"
//git branch -M main
//git remote add origin https://github.com/DyatlovDmitry/pims-labs.git
//git push -u origin main