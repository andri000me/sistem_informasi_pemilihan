<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="" class="header-title ultrabold"
                style="margin-left: 15px!important;font-size: 18px;"><span class="color-highlight">SIS</span>PANLIH</a>
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
        </div>

        <?php $this->load->view('front/menu'); ?>

        <div class="page-content header-clear">
            <link rel="stylesheet" type="text/css" href="front/styles/sisp.css">
            <div class="single-slider owl-carousel owl-no-dots bottom-30">
                
                
                <?php 
                $this->db->limit(5);
                $this->db->where('aktif', 1);
                foreach ($this->db->get('slide')->result() as $rw) {
                 ?>
                <!-- <a href="#" class="sisp-slide-1">
                    <img src="front/images/pictures/17m.jpg" class="responsive-image" alt="">
                    <strong class="font-16"><?php echo $rw->nama_pemilihan ?>.</strong>
                    <em class="bg-aktif">Aktif</em>
                    <span class="bg-gradient"></span>
                </a> -->
                <a href="#" class="sisp-slide-1">
                    <img src="front/images/slide/<?php echo $rw->foto ?>" class="responsive-image" alt="">
                    <strong class="font-16"><?php echo $rw->keterangan ?>.</strong>
                    <!-- <em class="bg-aktif"></em> -->
                    <span class="bg-gradient"></span>
                    
                </a>


               
                

            <?php } ?>
                
            </div>

            <div class="divider divider-margins"></div>

            <div class="content">
                <div class="one-half">
                    <?php 
                    $this->db->where('status', 1);
                    foreach ($this->db->get('pemilihan', 2, 0)->result() as $rw) {

                     ?>
                    <div class="sisp-col-item">
                        <a href="#" @click="infoModal('<?php echo $rw->id_pemilihan ?>','<?php echo $rw->nama_pemilihan ?>','<?php echo $rw->kelurahan ?>')" data-menu="menu-pemilihan">
                            <img class="preload-image shadow-large round-small crop" src="front/images/empty.png"
                                data-src="front/images/pemilihan/<?php echo $rw->foto ?>" class="responsive-image" alt="img" style="width: 200px; height: 100px;">
                            <em class="bg-aktif"> <?php echo selisih_waktu($rw->start_date) ?></em>
                            <strong><?php echo $rw->nama_pemilihan ?></strong>
                        </a>
                        <span><i class="fas fa-map-marked-alt"></i><?php echo $rw->kelurahan ?></span>
                    </div>
                <?php } ?>
                </div>
                <div class="one-half last-column">
                    <?php 
                    $this->db->where('status', 1);
                    foreach ($this->db->get('pemilihan', 2, 2)->result() as $rw) {
                    // cek_query();
                     ?>
                    <div class="sisp-col-item">
                        <a href="#" @click="infoModal('<?php echo $rw->id_pemilihan ?>','<?php echo $rw->nama_pemilihan ?>','<?php echo $rw->kelurahan ?>')" data-menu="menu-pemilihan">
                            <img class="preload-image shadow-large round-small crop" src="front/images/empty.png"
                                data-src="front/images/pemilihan/<?php echo $rw->foto ?>" class="responsive-image" alt="img" style="width: 200px; height: 100px;">
                            <em class="bg-aktif"><?php echo selisih_waktu($rw->start_date) ?></em>
                            <strong><?php echo $rw->nama_pemilihan ?></strong>
                        </a>
                        <span><i class="fas fa-map-marked-alt"></i><?php echo $rw->kelurahan ?></span>
                    </div>
                <?php } ?>
                </div>
                <div class="clear"></div>

                <a href="app/pemilihan_aktif"
                    class="button button-s button-full button-round-medium bg-highlight shadow-large">LIHAT
                    SEMUA PEMILIHAN AKTIF </a>

            </div>

            <div class="content top-30">
                <?php 
                $this->db->limit(5);
                $this->db->where('status', 2);
                foreach ($this->db->get('pemilihan')->result() as $rw) {

                 ?>

                <div class="sisp-list-item">
                    <a href="#"  @click="infoModal('<?php echo $rw->id_pemilihan ?>','<?php echo $rw->nama_pemilihan ?>','<?php echo $rw->kelurahan ?>')" data-menu="menu-pemilihan-arsip">
                        <img class="preload-image shadow-large round-small" src="front/images/empty.png"
                            data-src="front/images/pemilihan/<?php echo $rw->foto ?>" alt="img">
                        <strong><?php echo $rw->nama_pemilihan ?></strong>
                    </a>
                    <span><i class="fas fa-map-marked-alt"></i><?php echo $rw->kelurahan ?> <a href="#"
                            class="bg-arsip">Arsip</a></span>
                </div>
                
                <?php } ?>

                <div class="clear"></div>
                <a href="app/pemilihan_arsip"
                    class="button button-s button-full button-round-medium bg-arsip-lg shadow-large">LIHAT
                    SEMUA ARSIP PEMILIHAN</a>
                <br><br>
            </div>
        </div>

        <!-- Menu Lakukan Pemilihan REV -->
        <div id="menu-pemilihan" class="menu menu-box-modal" data-menu-height="320" data-menu-width="310" data-menu-effect="menu-over">
            <h4 class="center-text top-30">{{judul}}</h4>
            <div class="divider-small"></div>
            <h6 class="center-text">{{kab}}</h6>
            <div class="link-list link-list-1 content bottom-0">
                <a :href="link1" class="">
                    <i class="fas fa-info-circle fa-lg"></i>
                    <span class="font-13">Informasi Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a :href="link2" class="">
                    <i class="fas fa-chevron-circle-up fa-2x fa-spin" style="color:green"></i>
                    <span class="font-13">Lakukan Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a :href="link3" class="">
                    <i class="fas fa-poll fa-lg" style="color:green"></i>
                    <span class="font-13">Lihat Hasil Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a :href="link4" class="">
                    <i class="fas fa-user-check fa-lg" style="color:green"></i>
                    <span class="font-13">Lihat Status Pemilih</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

        <!-- Menu Lakukan Pemilihan REV -->
        <div id="menu-pemilihan-arsip" class="menu menu-box-modal" data-menu-height="320" data-menu-width="310" data-menu-effect="menu-over">
            <h4 class="center-text top-30">{{judul}}</h4>
            <div class="divider-small"></div>
            <h6 class="center-text">{{kab}}</h6>
            <div class="link-list link-list-1 content bottom-0">
                <a :href="link1" class="">
                    <i class="fas fa-info-circle fa-lg"></i>
                    <span class="font-13">Informasi Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <!-- <a :href="link2" class="">
                    <i class="fas fa-chevron-circle-up fa-2x fa-spin" style="color:green"></i>
                    <span class="font-13">Lakukan Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a> -->
                <a :href="link3" class="">
                    <i class="fas fa-poll fa-lg" style="color:green"></i>
                    <span class="font-13">Lihat Hasil Pemilihan</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a :href="link4" class="">
                    <i class="fas fa-user-check fa-lg" style="color:green"></i>
                    <span class="font-13">Lihat Status Pemilih</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>

        <!-- Cari Pemilihan -->
        <div id="menu-cari-pemilihan" class="menu menu-box-bottom" data-menu-height="230" data-menu-effect="menu-over">
            <div class="content">
                <p class="font-11 under-heading bottom-20 top-20">
                    Ketikan keyword untuk mencari.
                </p>
                <div class="input-style has-icon input-style-1 input-required bottom-30">
                    <i class="input-icon fa fa-search"></i>
                    <span>Masukan keyword pencarian</span>
                    <em>(wajib)</em>
                    <input type="text" placeholder="Ketik disini">
                </div>
                <a href="#" class="button button-full button-m shadow-large button-round-small bg-highlight top-20">Cari
                    Pemilihan</a>
            </div>
        </div>

        <div class="menu-hider"></div>
    </div>

<script type="text/javascript">
    var vm = new Vue({
    el: "#page",
    data : {
        judul : '',
        kab : '',
        link1 : '',
        link2 : '',
        link3 : '',
        link4 : '',
    },
    computed:{
        
    }, 
    methods:{
        infoModal: function(id_p,judul,kab) {
            this.judul = judul
            this.kab = kab
            this.link1 = 'app/info_pemilihan/'+id_p
            this.link2 = 'app/lakukan_pemilihan/'+id_p
            this.link3 = 'app/lihat_hasil/'+id_p
            this.link4 = 'app/lihat_status_pemilih/'+id_p
        }
    }
})
</script>