<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h2><?= $title ?></h2>
    <div>
        <div>
        <table>
            <tr>
                <th>Reason</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
            <?php foreach($claims as $claim): ?>
                <tr>
                    <td><?= $claim['reason']?></td>
                    <td><?= $claim['amount']?></td>
                    <td><?= $claim['status']?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <a href="index.php?action=home">Back</a>

</body>
</html>