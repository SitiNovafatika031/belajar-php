<?php
$products = array(
    array(
        'name' => 'Bakso Mercon',
        'image' => 'image/baksomercon.jpeg',
        'price' => '$10',
        'description' => 'Bakso dengan bumbu Pedas',
        'sold' => 50,
        'rating' => 4.5
    ),
    array(
        'name' => 'Baso Aci',
        'image' => 'image/basoaci.jpeg',
        'price' => '$20',
        'description' => 'Bakso dengan Kuah Pedas',
        'sold' => 150,
        'rating' => 4.7
    ),
    array(
      'name' => 'Basreng',
      'image' => 'image/basreng.jpeg',
      'price' => '$20',
      'description' => 'Bakso goreng bumbu pedas',
      'sold' => 500,
      'rating' => 4.9
  ),
  array(
      'name' => 'Ceker Mercon',
      'image' => 'image/ceker.jpeg',
      'price' => '$30',
      'description' => 'Ceker dengan bumbu pedas',
      'sold' => 50,
      'rating' => 4.8
  ),
  array(
      'name' => 'Cireng Mercon',
      'image' => 'image/cireng.jpeg',
      'price' => '$30',
      'description' => 'Cireng isian ayam suir Pedas',
      'sold' => 700,
      'rating' => 5.0
  ),
  array(
      'name' => 'Kripik Kaca',
      'image' => 'image/kripca.jpeg',
      'price' => '$10',
      'description' => 'Kripik kaca bumbu terpedas',
      'sold' => 40,
      'rating' => 4.3
  ),
  array(
      'name' => 'Mie Jontor',
      'image' => 'image/miejontor.jpeg',
      'price' => '$20',
      'description' => 'Mie dengan bumbu pedas',
      'sold' => 500,
      'rating' => 4.9
  ),
  array(
      'name' => 'Mie Lidi',
      'image' => 'image/mielidi.jpeg',
      'price' => '$20',
      'description' => 'Mie kering di bumbu pedas',
      'sold' => 100,
      'rating' => 4.5
  )
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Produk</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body background="image/baground.jpeg">
   <div class="container">
      <h1 class="product-title">Produk Kita</h1>
         <div class="products">
            <?php foreach ($products as $product): ?>
                  <div class="product">
                     <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                     <h2><?php echo $product['name']; ?></h2>
                     <p><?php echo $product['description']; ?></p>
                     <div class="additional-info">
                        <span><?php echo str_repeat("★", intval($product['rating'])) . str_repeat("☆", 5 - intval($product['rating'])); ?></span>
                        <span><?php echo $product['sold']; ?> Terjual</span>
                     </div>
                     <span class="price"><?php echo $product['price']; ?></span>
                     <button class="add-to-cart"><i class="fas fa-shopping-cart"></i></button>
                  </div>
               <?php endforeach; ?>
         </div>
   </div>
</body>
</html>
