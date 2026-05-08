<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="index.php?action=create_claim" method="POST">
            <textarea name="claim_description" placeholder="Claim Description"></textarea>
            <input type="number" name="claim_amount" placeholder="Claim Amount">
            <button type="submit">Submit Claim</button>
        </form>
        <a href="index.php?action=my_claims">View My Claims</a>
    </div>
</body>
</html>