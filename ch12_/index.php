<?php
session_set_cookie_params(1209600);
session_start();

function addToCart($id, $name, $price, $qty = 1) {
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = [
            'id' => $id,
            'name' => $name,
            'price' => (float)$price,
            'qty' => 0,
        ];
    }

    $_SESSION['cart'][$id]['qty'] += (int)$qty;
}

function updateCart($id, $change) {
    if (!isset($_SESSION['cart'][$id])) {
        return;
    }

    $_SESSION['cart'][$id]['qty'] += $change;

    if ($_SESSION['cart'][$id]['qty'] <= 0) {
        unset($_SESSION['cart'][$id]);
    }
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [
        'ms10' => ['id' => 'ms10', 'name' => 'Product 10', 'price' => 200, 'qty' => 2],
        'ms11' => ['id' => 'ms11', 'name' => 'Product 11', 'price' => 300, 'qty' => 6],
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'add') {
            $id = trim($_POST['id'] ?? '');
            $name = trim($_POST['name'] ?? '');
            $price = $_POST['price'] ?? 0;
            $qty = $_POST['qty'] ?? 1;

            if ($id !== '' && $name !== '') {
                addToCart($id, $name, $price, $qty);
            }
        }

        if ($action === 'remove') {
            $id = $_POST['id'] ?? '';
            if ($id !== '') {
                unset($_SESSION['cart'][$id]);
            }
        }

        if ($action === 'plus') {
            $id = $_POST['id'] ?? '';
            if ($id !== '') {
                updateCart($id, 1);
            }
        }

        if ($action === 'minus') {
            $id = $_POST['id'] ?? '';
            if ($id !== '') {
                updateCart($id, -1);
            }
        }
    }
}

$cart = $_SESSION['cart'] ?? [];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['qty'];
}
$amount = array_sum(array_map(function($item) { return (int)$item['qty']; }, $cart));
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="browser-shell">
        <div class="browser-topbar">
            <div class="browser-nav-left">
                <span class="nav-icon">←</span>
                <span class="nav-icon">→</span>
                <span class="nav-icon">↻</span>
            </div>
            <div class="browser-address">localhost/gianghphp/cart.php</div>
            <div class="browser-nav-right">
                <span class="nav-icon">☆</span>
                <span class="nav-icon">⌂</span>
                <span class="nav-icon">☰</span>
            </div>
        </div>

        <div class="page-shell">
            <div class="main-layout">
                <section class="cart-box">
                    <h2>Gio do</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Price</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($cart)): ?>
                                <tr>
                                    <td colspan="4" class="empty">Giỏ hàng trống</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($cart as $id => $item): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($id); ?></td>
                                        <td><?php echo number_format((float)$item['price'], 0, ',', '.'); ?></td>
                                        <td><?php echo (int)$item['qty']; ?></td>
                                        <td class="actions">
                                            <form method="post" class="mini-form">
                                                <input type="hidden" name="action" value="remove">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                                                <button type="submit" class="btn remove">Remove</button>
                                            </form>
                                            <form method="post" class="mini-form">
                                                <input type="hidden" name="action" value="plus">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                                                <button type="submit" class="btn plus">+</button>
                                            </form>
                                            <form method="post" class="mini-form">
                                                <input type="hidden" name="action" value="minus">
                                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                                                <button type="submit" class="btn minus">-</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </section>

                <aside class="invoice-box">
                    <h2>Hoa don</h2>
                    <div class="invoice-row">
                        <span>Amount</span>
                        <span><?php echo $amount; ?></span>
                    </div>
                    <div class="invoice-row total">
                        <span>Total</span>
                        <span><?php echo number_format($total, 0, ',', '.'); ?></span>
                    </div>
                </aside>
            </div>

            <div class="add-box">
                <h3>Them san pham</h3>
                <form method="post">
                    <input type="hidden" name="action" value="add">
                    <div class="field">
                        <label for="id">Ma san pham</label>
                        <input type="text" id="id" name="id" placeholder="ms10" required>
                    </div>
                    <div class="field">
                        <label for="name">Ten san pham</label>
                        <input type="text" id="name" name="name" placeholder="Product name" required>
                    </div>
                    <div class="field">
                        <label for="price">Gia</label>
                        <input type="number" id="price" name="price" min="0" step="1000" value="2000" required>
                    </div>
                    <div class="field">
                        <label for="qty">so luong</label>
                        <input type="number" id="qty" name="qty" min="1" value="1" required>
                    </div>
                    <button type="submit" class="submit-btn">Them vao gio</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
