  <!-- ======= Contact Section ======= -->
  <section id="rakitra" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Hanao rakitra</h2>
        
      </div>
      <p>Mitohy hatrany ny asan'ny Fiangonana amin'ny fanompoana anan'Andriamanitra. </p>


      <form action="confirm-paiement" name="formRakitra" id="formRakitra" method="post" role="form" class="php-email-form mt-4">
        
        <div class="form-row">
          <div class="col-md-12 form-group">
            <select name="eglise" id="eglise" class="form-control selectpicker">
              <option>Fiangonana misy anao</option>
              <?php foreach ($eglise as $e) { ?>
                <option value="<?php echo $e->id; ?>"><?php echo utf8_decode($e->nom); ?></option>
              <?php } ?>
            </select>
          </div> 
        </div>       
        <div class="form-row">
          <div class="col-md-6 form-group">
            <input type="text" name="nom" class="form-control" id="nom" placeholder="Anarana feno" />
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <input type="email" name="mail" class="form-control" id="mail" placeholder="adiresy-mailaka@mmmm.mm" />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 form-group">
            <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Toerana misy anao (Adiresy Mazava)" />
            <div class="validate"></div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 form-group">
            <input type="text" class="form-control" name="tel" id="tel" placeholder="Laharana Finday"/>
            <div class="validate"></div>
          </div>
          <div class="col-md-6 form-group">
            <input type="text" name="vola" id="vola" class="form-control"  placeholder="Vola arotsaka (Ariary)"/>
            <div class="validate"></div>
          </div>
        </div>
        
        <div class="text-center">
          <button type="submit" id="boutton" class="boutton">Handrotsaka</button>
        </div>
      </form>

    </div>
  </section><!-- End Contact Section -->

  <!-- ======= About Section ======= -->
  <section id="mombamomba" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>Mombamomba</h2>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="assets/img/uf.png" class="img-thumbnail" alt="Logo univ-fianar">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>Tetikasa RAKITRA</h3>          
          <p>
            Ity vokatra arateknolojia ity dia nivoaka tao anatin'izao "Fihiboana" na koa mijanona an-trano izao, izay fanampahakevitra noraisin'ny Fanjakana sy ny Fiangonana na ny Fikambanam-mpiangonana misy eto Madagasikara.
          </p>
          <p>
            Maro amintsika kristianina na finoana hafa anefa no te hanampy ny Fiangonana izay misy azy tsirairay avy. Anton'izany no nananganana an'ity tetikasa RAKITRA ity.
          </p>
          <p>
            Raha misy toromarika, torohevitra na fanampiana dia manaraka eto ny fifandraisana: 
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="icofont-rounded-right"></i> <strong>Adiresy:</strong> Oniverisiten'ny Fianarantsoa</li>
                <li><i class="icofont-rounded-right"></i> <strong>Toerana:</strong> Andrainjato</li>
                <li><i class="icofont-rounded-right"></i> <strong>Mailaka:</strong> dtic.univfianar@gmail.com</li>
              </ul>
            </div>
          </div>
          <p class="font-italic">
            Fiarahamiasa teo amin'ny Oniversiten'ny Fianarantsoa sy ny Orange Madagascar (Orange Money)
          </p>
        </div>
      </div>

    </div><!-- End About Me -->


  </section><!-- End About Section -->