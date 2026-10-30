<!DOCTYPE html>
<html>
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <header>
        <h1>Product Manager</h1>
    </header>
    
    <main>
        <h1>Error</h1>
        <p class="first">An error occurred while processing your request.</p>
        <p><?php echo htmlspecialchars($error_message); ?></p>
        <p><a href="category_list.php">Back to Category List</a></p>
    </main>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>