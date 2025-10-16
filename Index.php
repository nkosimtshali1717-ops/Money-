<!DOCTYPE html>
<html>
<head>
    <title>SA Side Hustle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { font-family: Arial, sans-serif; padding: 15px; max-width: 600px; margin: auto; }
        .gig { border: 1px solid #ddd; padding: 10px; margin: 10px 0; border-radius: 5px; }
        input, textarea { width: 100%; margin: 5px 0; padding: 8px; box-sizing: border-box; }
        input[type="submit"] { background: #28a745; color: white; border: none; padding: 10px; cursor: pointer; }
        .telegram-btn { display: inline-block; background: #0088cc; color: white; padding: 10px; text-decoration: none; border-radius: 5px; margin: 10px 0; }
    </style>
</head>
<body>
    <h2>SA side Hustle-gigs-nk - Post a Gig</h2>
    <a href="https://whatsapp.com/channel/0029VbBOYx1AYlUS2l62p30u" class="telegram-btn">Join Our Pioneers on whatsapp</a>
    <form method="POST">
        <input type="text" name="title" placeholder="Gig Title (e.g., Design Logo)" required>
        <textarea name="desc" placeholder="Describe the gig" required></textarea>
        <input type="text" name="price" placeholder="Price (e.g., R200)" required>
        <input type="text" name="contact" placeholder="WhatsApp/Telegram number" required>
        <input type="submit" value="Post Gig">
    </form>

    <h3>Available Gigs</h3>
    <?php
    $gigs = file_exists('gigs.json') ? json_decode(file_get_contents('gigs.json'), true) : [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newGig = [
            'title' => $_POST['title'],
            'desc' => $_POST['desc'],
            'price' => $_POST['price'],
            'contact' => $_POST['contact']
        ];
        $gigs[] = $newGig;
        file_put_contents('gigs.json', json_encode($gigs));
    }
    foreach ($gigs as $gig) {
        echo "<div class='gig'>";
        echo "<h4>" . htmlspecialchars($gig['title']) . "</h4>";
        echo "<p>" . htmlspecialchars($gig['desc']) . "</p>";
        echo "<p>Price: " . htmlspecialchars($gig['price']) . "</p>";
        echo "<p>Contact: <a href='https://wa.me/" . htmlspecialchars($gig['contact']) . "'>WhatsApp</a></p>";
        echo "</div>";
    }
    ?>
</body>
</html>
