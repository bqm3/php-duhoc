<section class="vnpc-section">
  <div class="container-xxl text-center">
    <h2 class="vnpc-h2 mb-2">Đối tác tiêu biểu</h2>
    <p class="vnpc-p mb-5" >
      Danh sách các trường đại học uy tín trải rộng tại các quốc gia như Mỹ, Úc, Canada, Anh, châu Âu, Nhật Bản, Hàn Quốc và nhiều quốc gia khác.
    </p>
    
    <div class="d-flex flex-wrap justify-content-center align-items-center gap-5">
      <?php 
      $partners = ['img_main1.png', 'img_main2.png', 'img_main3.png', 'img_main4.png', 'img_main5.png', 'img_main6.png'];
      foreach($partners as $i => $img): 
      ?>
        <img src="<?= $base ?>/assets/img/client/<?= $img ?>" 
             alt="Partner <?= $i + 1 ?>" 
             class="partner-logo"
             style="height: 60px; object-fit: contain; transition: transform 0.3s ease, opacity 0.3s ease;">
      <?php endforeach; ?>
    </div>
  </div>
</section>

<style>
.partner-logo:hover {
  transform: scale(1.1);
  opacity: 0.8;
}
</style>