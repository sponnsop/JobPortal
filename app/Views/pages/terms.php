<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>
<section><div class="container"><div class="text-center">
     <h1>Terms &amp; Conditions</h1><br>
     <p class="lead">Please read these terms carefully before using our platform.</p>
</div></div></section>

<section class="section-background"><div class="container"><div class="about-info">
     <h2>Terms of Use for <?php echo SITE_NAME; ?></h2>
     <?php
     $sections = [
          '1. Acceptance of Terms'   => 'By accessing and using this website, you accept and agree to be bound by these terms. If you do not agree, please do not use this site.',
          '2. Use of the Service'    => 'You agree to use this service only for lawful purposes. You must not use the platform in any way that violates applicable local, national, or international laws.',
          '3. Account Registration'  => 'To access certain features you must register an account. You are responsible for maintaining the confidentiality of your credentials.',
          '4. Job Listings'          => 'Employers are solely responsible for the accuracy and legality of their job listings. We reserve the right to remove any listing that violates our policies.',
          '5. Privacy Policy'        => 'We are committed to protecting your personal information and will never sell your data to third parties.',
          '6. Changes to Terms'      => 'We reserve the right to modify these terms at any time. Continued use of the platform after changes constitutes your acceptance.',
     ];
     foreach ($sections as $title => $text): ?>
     <figure><figcaption><h3><?php echo $title; ?></h3><p><?php echo $text; ?></p></figcaption></figure>
     <?php endforeach; ?>
</div></div></section>
<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>
