<?php 
//All code goes below  
    $photos_query = get_post_meta( $post->ID, 'gallery_data', true );
    if( !empty($photos_query['image_url'])){
        $url_array = $photos_query['image_url'];
        $count = count($url_array);	
    }else{
        $count =0;
    }
?>

<!--Basic Info -->
<div class="modal fade digi-modal" id="basic_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</div>

<!--Services -->
<div class="modal fade digi-modal" id="service_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <?php foreach($service as $singl_term) { ?>
                    <li><a href="#"><?php echo esc_attr($singl_term->name); ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!---------  Gallery Images --------->
<?php if($count): ?>
<div class="modal fade digi-modal" id="gallery_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php if($count){
                                for( $i=0; $i<$count; $i++ ){
                            ?>
                        <div class="carousel-item <?php echo($i == 0?'active':''); ?>">

                            <img class="d-block w-100 item-img" src="<?php echo esc_attr($url_array[$i]); ?>" alt="" />
                        </div>
                        <?php 
                            }
                            } 
                            ?>

                    </div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">					<span class="carousel-control-prev-icon" aria-hidden="true"></span>					<span class="visually-hidden">Previous</span>					</button>					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">					<span class="carousel-control-next-icon" aria-hidden="true"></span>					<span class="visually-hidden">Next</span>					</button>
                </div>

            </div>
        </div>
    </div>
</div>
<?php endif; ?>