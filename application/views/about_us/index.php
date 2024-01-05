<?
// Banner heading
$this->load->view('widgets/inner_banner');
// Banner section
?>

<!-- <section class="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img src="<?php echo get_image($about_us['cms_page_image_path'], $about_us['cms_page_image']);?>" alt=""></div>
            <div class="col-md-6">
                <div class="about-blk">
                    <h3><?php echo $about_us['cms_page_title'];?></h3>
                    <?php echo html_entity_decode($about_us['cms_page_content'])?>
                </div>
            </div>
        </div>
    </div>
</section>
-->

<div class="container">
    <form method="POST" action="<?= g('base_url') ?>about_us/form_insert">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="" />
        </div>
        <div>
            <label for="val">Value</label>
            <input type="number" name="val" id="val" value="" />
        </div>
        <input type="submit" name="" id="button" value="submit">
    </form>
</div>